@extends('admin.app')
@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Job Hub Global</a></li>
                        <li class="breadcrumb-item active">Candidate!</li>
                    </ol>
                </div>
                <h4 class="page-title">Candidate ({{$jobApplicationCount}}) !</h4>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addNewModalId">Add New</button>
                </div>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Image</th>
                        <th>Name En</th>
                        <th>Name Bn</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jobApplication as $key=>$jobApplicationData)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                @if($jobApplicationData->user->profile!=null)
                                    <img src="{{asset($jobApplicationData->user->profile)}}" alt="Current Image"  style="max-width: 50px;">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>{{$jobApplicationData->user->name}}</td>
                            <td>{{$jobApplicationData->user? $jobApplicationData->user->name_bn:'N/A'}}</td>
                            <td>{{$jobApplicationData->user->email}}</td>
                            <td>{{$jobApplicationData->user->phone}}</td>
                            <td>
                                @if($jobApplicationData->user? $jobApplicationData->user->resume:'')
                                    <a href="{{asset($jobApplicationData->user? $jobApplicationData->user->resume:'' )}}" target="_blank">Download Resume</a>
                                @endif
                            </td>
                            <td style="width: 100px;">
                                <div class="d-flex">
                                    <a href="{{route('company.under.job.application.delete',$jobApplicationData->id)}}" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$jobApplicationData->id}}">Delete</a>
                                </div>


                            </td>
                            <!-- Delete Modal -->
                            <div id="danger-header-modal{{$jobApplicationData->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel{{$jobApplicationData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-danger">
                                            <h4 class="modal-title" id="danger-header-modalLabe{{$jobApplicationData->id}}l">Delete</h4>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="mt-0">Are You Went to Delete this ? </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <a href="{{route('company.under.job.application.delete',$jobApplicationData->id)}}" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
