@extends('admin.app')
@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Job Portal</a></li>
                        <li class="breadcrumb-item active">Training!</li>
                    </ol>
                </div>
                <h4 class="page-title">Training!</h4>
            </div>
        </div>
    </div>


    <div class="col-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>User/Client</th>
                        <th>Order</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($training as $key=>$trainingData)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                @if($trainingData->user)
                                    {{$trainingData->user->name}} <br>
                                    {{$trainingData->user->email}} <br>
                                    {{$trainingData->user->phone}}
                                @else
                                    User not found
                                @endif
                            </td>
                            <td>
                                @if($trainingData->training)
                                    <strong>Title:</strong> {{ $trainingData->training->title }} <br>
                                    <strong>Start Date:</strong> {{ $trainingData->training->training_date }} <br>
                                    <strong>End Date:</strong>
                                    {{ \Carbon\Carbon::parse($trainingData->training->training_date)->addHours($trainingData->training->training_duration)->format('Y-m-d H:i') }} <br>
                                    <strong>Duration:</strong> {{ $trainingData->training->training_duration }} Hours <br>
                                @else
                                    Training not found
                                @endif
                            </td>
                            <td>
                                <strong>Fee:</strong> ${{ $trainingData->training->training_fee }}
                            </td>
                            <td>
                                @if($trainingData->payment_status == 'pending')
                                    <span class="badge" style="background-color: red; color: white;">Pending</span>
                                @elseif($trainingData->payment_status == 'completed')
                                    <span class="badge" style="background-color: green; color: white;">Completed</span>
                                @endif
                            </td>
                            <td style="width: 150px;">
                                <div class="d-flex justify-content-end gap-1">
                                    <!-- Send Courier Button -->
                                    <a href="#"
                                       class="btn btn-sm btn-primary">
                                        Send Courier
                                    </a>

                                    <!-- Invoice Button -->
                                    <a href="#"
                                       class="btn btn-sm btn-success">
                                        Invoice
                                    </a>
                                </div>
                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
