<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class BulkEmailController extends Controller
{
    /**
     * Display users list.
     */
    public function index(Request $request)
    {
        $users = User::query()
            ->select([
                'id',
                'name',
                'email',
                'phone',
                'is_registration_by',
                'status',
            ])
            ->where('is_registration_by', 'User')
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->search;

                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%");
                });
            })
            ->latest('id')
            ->paginate(20)
            ->withQueryString();

        return view('admin.pages.bulkEmail.index', compact('users'));
    }

    /**
     * Send email to selected users.
     */
    public function send(Request $request)
    {
        $request->validate([
            'users' => ['required', 'array', 'min:1', 'max:100'],
            'users.*' => ['required', 'integer', 'distinct'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:10000'],
        ], [
            'users.required' => 'Please select at least one user.',
            'users.min' => 'Please select at least one user.',
            'users.max' => 'You can select a maximum of 100 users at a time.',
            'subject.required' => 'Email subject is required.',
            'message.required' => 'Email message is required.',
        ]);

        $users = User::query()
            ->whereIn('id', $request->input('users'))
            ->whereNotNull('email')
            ->where('email', '!=', '')
            ->get();

        if ($users->isEmpty()) {
            return back()->with('error', 'No users with valid email addresses were found.');
        }

        $sent = 0;
        $failed = 0;

        // Send a separate email to each selected user.
        foreach ($users as $user) {
            try {
                Mail::raw($request->input('message'), function ($mail) use ($user, $request) {
                    $mail->to($user->email, $user->name)
                        ->subject($request->input('subject'));
                });

                $sent++;
            } catch (\Throwable $e) {
                $failed++;

                Log::error('Bulk email failed', [
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        if ($failed > 0) {
            return back()->with(
                'warning',
                "Email sending completed. Sent: {$sent}, Failed: {$failed}."
            );
        }

        return back()->with(
            'success',
            "Email sent successfully to {$sent} user(s)."
        );
    }
}
