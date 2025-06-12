@extends('admin.app')
@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Jobs Hub Global</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">List Of Worker/Employee</a></li>
                        <li class="breadcrumb-item active">List Of Worker/Employee</li>
                    </ol>
                </div>
                <h4 class="page-title">List Of Worker/Employee</h4>
            </div>
        </div>
    </div>



    <div class="card-header">
    </div>
    <br>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Profile</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>CV</th>

        </tr>
        @foreach ($subscription as $key => $user)
            <tr>
                <td>{{ ++$key }}</td>
                <td>
                    @if($user->profile)
                        <img src="{{ asset($user->profile) }}" alt="Profile Image" style="width: 50px; height: 50px; border-radius: 50%;">
                    @else
                       No Profile Image
                    @endif
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>
                    @if($user->cv)
                        <a href="{{ asset($user->cv) }}" target="_blank">View CV</a>
                    @else
                        No CV uploaded
                    @endif
                </td>
            </tr>
        @endforeach
    </table>




@endsection
