@extends('admin.app')
@section('admin_content')
    {{-- CKEditor CDN --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Purchased Training</a></li>
                        <li class="breadcrumb-item active">Purchased Training!</li>
                    </ol>
                </div>
                <h4 class="page-title">Purchased Training!</h4>
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
                    @foreach($purchasedTraining as $key=>$purchasedTrainingData)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$purchasedTrainingData->training->title}}</td>
                            <td>{{$purchasedTrainingData->price? $purchasedTrainingData->price:'N/A'}}</td>
                            <td>
                                @if($purchasedTrainingData->payment_status == 'pending')
                                    <b class="badge badge-success" style="color: red">Unpaid</b>
                                @elseif($purchasedTrainingData->payment_status == 'completed')
                                    <b class="badge badge-success" style="color: green">Paid</b>
                                @else
                                @endif


                            </td>
                            <td style="width: 100px;">
                                @if($purchasedTrainingData->payment_status === 'pending')
                                    <a href="{{ route('pay.now', ['type'=>'training', 'id'=>$purchasedTrainingData->id]) }}"
                                       class="btn btn-success">
                                        Payment
                                    </a>
                                @else
                                    <span class="badge bg-success">Paid</span>
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
