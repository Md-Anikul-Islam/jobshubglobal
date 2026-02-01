@extends('admin.app')
@section('admin_content')
    {{-- CKEditor CDN --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Purchased Subscriptions</a></li>
                        <li class="breadcrumb-item active">Purchased Subscriptions!</li>
                    </ol>
                </div>
                <h4 class="page-title">Purchased Subscriptions!</h4>
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
                        <th>Details</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($purchasedSubscriptions as $key=>$purchasedSubscriptionsData)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$purchasedSubscriptionsData->subscription->title}}</td>
                            <td>{!! $purchasedSubscriptionsData->subscription->details !!}</td>
                            <td>{{$purchasedSubscriptionsData->price? $purchasedSubscriptionsData->price:'N/A'}}</td>
                            <td>
                                @if($purchasedSubscriptionsData->payment_status == 'pending')
                                    <b class="badge badge-success" style="color: red">Unpaid</b>
                                @elseif($purchasedSubscriptionsData->payment_status == 'completed')
                                    <b class="badge badge-success" style="color: green">Paid</b>
                                @else
                                @endif


                            </td>
                            <td style="width: 100px;">
                                @if($purchasedSubscriptionsData->payment_status === 'pending')
                                    <a href="{{ route('pay.now', ['type'=>'subscription', 'id'=>$purchasedSubscriptionsData->id]) }}"
                                       class="btn btn-success">
                                        Payment
                                    </a>
                                @else
                                    <a class="btn btn-info"
                                       href="{{ route('subscription.package.user.data') }}">
                                        Data
                                    </a>
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
