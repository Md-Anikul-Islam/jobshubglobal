@extends('admin.app')
@section('admin_content')

    @php
        $siteSetting = DB::table('site_settings')->first();
    @endphp

    <div class="card">
        <div class="card-body">

            <!-- Logo -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <img src="{{ asset($siteSetting->logo) }}" height="70">
                <h3>INVOICE</h3>
            </div>

            <!-- Customer Info -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <h6><strong>Bill To:</strong></h6>
                    <p>{{ $training->user->name }}</p>
                    <p>{{ $training->user->email }}</p>
                    <p>{{ $training->user->phone }}</p>
                    <p>{{ $training->user->address }}</p>
                </div>

                <div class="col-md-6 text-end">
                    <p><strong>Invoice No:</strong> #{{ $training->id }}</p>
                    <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($training->created_at)->format('d M Y') }}</p>

                    <p>
                        <strong>Status:</strong>
                        @if($training->payment_status == 'pending')
                            <span class="badge bg-warning">Pending</span>
                        @elseif($training->payment_status == 'completed')
                            <span class="badge bg-success">Completed</span>
                        @else
                            <span class="badge bg-danger">Canceled</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Table -->
            <table class="table table-bordered">
                <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Training Title</th>
                    <th class="text-end">Price</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $training->training->title }}</td>
                    <td class="text-end">৳ {{ number_format($training->price,2) }}</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="2" class="text-end">Total</th>
                    <th class="text-end">৳ {{ number_format($training->price,2) }}</th>
                </tr>
                </tfoot>
            </table>

            <div class="text-center mt-4 d-print-none">
                <button onclick="window.print()" class="btn btn-primary">Print</button>
            </div>

        </div>
    </div>

@endsection
