@extends('admin.app')
@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Job Portal</a></li>
                        <li class="breadcrumb-item active">Subscription!</li>
                    </ol>
                </div>
                <h4 class="page-title">Subscription!</h4>
            </div>
        </div>
    </div>


    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>User/Client</th>
                        <th>Subscription Plan</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subscription as $key => $order)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                {{ $order->user->name ?? 'User not found' }} <br>
                                {{ $order->user->email ?? 'N/A' }} <br>
                                {{ $order->user->phone ?? 'N/A' }}
                            </td>
                            <td>
                                {{ $order->subscription->title ?? 'Plan not found' }}
                            </td>
                            <td>${{ $order->price }}</td>
                            <td>
                                @if($order->payment_status == 'pending')
                                    <span class="badge bg-danger text-white">Pending</span>
                                @elseif($order->payment_status == 'completed')
                                    <span class="badge bg-success text-white">Completed</span>
                                @endif
                            </td>

                            <td style="width: 150px;">
                                <div class="d-flex ">
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
