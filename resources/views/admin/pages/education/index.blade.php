@extends('admin.app')
@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Job Hub Global</a></li>
                        <li class="breadcrumb-item active">Education!</li>
                    </ol>
                </div>
                <h4 class="page-title">Education!</h4>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end">
                    @can('education-create')
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addNewModalId">Add New</button>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Institute Name(En)</th>
                        <th>Institute Name(Bn)</th>
                        <th>Degree (En)</th>
                        <th>Degree (Bn)</th>
                        <th>Result</th>
                        <th>Passing Year</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($education as $key=>$educationData)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$educationData->institute_name}}</td>
                            <td>{{$educationData->institute_name_bn}}</td>
                            <td>{{$educationData->degree_name}}</td>
                            <td>{{$educationData->degree_name_bn}}</td>
                            <td>{{$educationData->result}}</td>
                            <td>{{$educationData->passing_year}}</td>
                            <td style="width: 100px;">
                                <div class="d-flex justify-content-end gap-1">
                                    @can('education-edit')
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editNewModalId{{$educationData->id}}">Edit</button>
                                    @endcan

                                    @can('education-delete')
                                    <a href="{{route('education.destroy',$educationData->id)}}"class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$educationData->id}}">Delete</a>
                                    @endcan
                                </div>
                            </td>
                            <!--Edit Modal -->
                            <div class="modal fade" id="editNewModalId{{$educationData->id}}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editNewModalLabel{{$educationData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="addNewModalLabel{{$educationData->id}}">Edit</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{route('education.update',$educationData->id)}}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="institute_name" class="form-label">Institute Name(En)</label>
                                                            <input type="text" id="institute_name" name="institute_name" value="{{$educationData->institute_name}}"
                                                                   class="form-control" placeholder="Enter Institute Name(En)" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="institute_name_bn" class="form-label">Institute Name(Bn)</label>
                                                            <input type="text" id="institute_name_bn" name="institute_name_bn" value="{{$educationData->institute_name_bn}}"
                                                                   class="form-control" placeholder="Enter Institute Name(Bn)" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="degree_name" class="form-label">Degree (En)</label>
                                                            <input type="text" id="degree_name" name="degree_name" value="{{$educationData->degree_name}}"
                                                                   class="form-control" placeholder="Enter Institute Name(En)" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="degree_name_bn" class="form-label">Degree (Bn)</label>
                                                            <input type="text" id="degree_name_bn" name="degree_name_bn" value="{{$educationData->degree_name_bn}}"
                                                                   class="form-control" placeholder="Enter Institute Name(Bn)" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="result" class="form-label">Result</label>
                                                            <input type="text" id="result" name="result" value="{{$educationData->result}}"
                                                                   class="form-control" placeholder="Enter Result" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="passing_year" class="form-label">Passing Year</label>
                                                            <input type="text" id="passing_year" name="passing_year" value="{{$educationData->passing_year}}"
                                                                   class="form-control" placeholder="Enter Passing Year" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-end">
                                                    <button class="btn btn-primary" type="submit">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Delete Modal -->
                            <div id="danger-header-modal{{$educationData->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel{{$educationData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-danger">
                                            <h4 class="modal-title" id="danger-header-modalLabe{{$educationData->id}}l">Delete</h4>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="mt-0">Are You Went to Delete this ? </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <a href="{{route('education.destroy',$educationData->id)}}" class="btn btn-danger">Delete</a>
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
    <!--Add Modal -->
    <div class="modal fade" id="addNewModalId" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addNewModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addNewModalLabel">Add</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('education.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="institute_name" class="form-label">Institute Name(En)</label>
                                    <input type="text" id="institute_name" name="institute_name"
                                           class="form-control" placeholder="Enter Institute Name(En)" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="institute_name_bn" class="form-label">Institute Name(Bn)</label>
                                    <input type="text" id="institute_name_bn" name="institute_name_bn"
                                           class="form-control" placeholder="Enter Institute Name(Bn)" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="degree_name" class="form-label">Degree (En)</label>
                                    <input type="text" id="degree_name" name="degree_name"
                                           class="form-control" placeholder="Enter Institute Name(En)" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="degree_name_bn" class="form-label">Degree (Bn)</label>
                                    <input type="text" id="degree_name_bn" name="degree_name_bn"
                                           class="form-control" placeholder="Enter Institute Name(Bn)" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="result" class="form-label">Result</label>
                                    <input type="text" id="result" name="result"
                                           class="form-control" placeholder="Enter Result" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="passing_year" class="form-label">Passing Year</label>
                                    <input type="text" id="passing_year" name="passing_year"
                                           class="form-control" placeholder="Enter Passing Year" required>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
