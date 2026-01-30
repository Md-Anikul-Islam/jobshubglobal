@extends('admin.app')
@section('admin_content')
    {{-- CKEditor CDN --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Purchased E-Learning</a></li>
                        <li class="breadcrumb-item active">Purchased E-Learning!</li>
                    </ol>
                </div>
                <h4 class="page-title">Purchased E-Learning!</h4>
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
                        <th>Title</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($purchasedElearning as $key=>$purchasedElearningData)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$purchasedElearningData->eLearning->title}}</td>
                            <td>{{$purchasedElearningData->price? $purchasedElearningData->price:'N/A'}}</td>
                            <td>
                                @if($purchasedElearningData->payment_status == 'pending')
                                    <b class="badge badge-success" style="color: red">Unpaid</b>
                                @elseif($purchasedElearningData->payment_status == 'completed')
                                    <b class="badge badge-success" style="color: green">Paid</b>
                                @else
                                @endif


                            </td>
                            <td style="width: 100px;">
                                @if($purchasedElearningData->payment_status == 'pending')
                                    <a class="btn btn-success" href="{{ route('pay.now', $purchasedElearningData->id) }}">Pay Now</a>
                                @elseif($purchasedElearningData->payment_status == 'completed')
                                    <a class="btn btn-info" href="#">View</a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
