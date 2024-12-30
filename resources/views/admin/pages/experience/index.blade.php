@extends('admin.app')
@section('admin_content'))
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Garments Niyog</a></li>
                        <li class="breadcrumb-item active">Experiences!</li>
                    </ol>
                </div>
                <h4 class="page-title">Experiences!</h4>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end">
                    @can('experience-create')
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addNewModalId">Add New</button>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Office Name(En)</th>
                        <th>Office Name(Bn)</th>
                        <th>Designation (En)</th>
                        <th>Designation (Bn)</th>
                        <th>Year Of Experience</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($experience as $key=>$experiencesData)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$experiencesData->office_name}}</td>
                            <td>{{$experiencesData->office_name_bn}}</td>
                            <td>{{$experiencesData->designation}}</td>
                            <td>{{$experiencesData->designation_bn}}</td>
                            <td>{{$experiencesData->year_of_experience}}</td>
                            <td style="width: 100px;">
                                <div class="d-flex justify-content-end gap-1">
                                    @can('experience-edit')
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editNewModalId{{$experiencesData->id}}">Edit</button>
                                    @endcan

                                    @can('experience-delete')
                                     <a href="{{route('experience.destroy',$experiencesData->id)}}"class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$experiencesData->id}}">Delete</a>
                                    @endcan
                                </div>
                            </td>
                            <!--Edit Modal -->
                            <div class="modal fade" id="editNewModalId{{$experiencesData->id}}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editNewModalLabel{{$experiencesData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="addNewModalLabel{{$experiencesData->id}}">Edit</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{route('experience.update',$experiencesData->id)}}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="office_name" class="form-label">Office Name(En)</label>
                                                            <input type="text" id="office_name" name="office_name" value="{{$experiencesData->office_name}}"
                                                                   class="form-control" placeholder="Enter Office Name(En)" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="office_name_bn" class="form-label">Office Name(Bn)</label>
                                                            <input type="text" id="office_name_bn" name="office_name_bn" value="{{$experiencesData->office_name_bn}}"
                                                                   class="form-control" placeholder="Enter Office Name(Bn)" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="designation" class="form-label">Designation (En)</label>
                                                            <input type="text" id="designation" name="designation" value="{{$experiencesData->designation}}"
                                                                   class="form-control" placeholder="Enter Designation(En)" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="designation_bn" class="form-label">Designation (Bn)</label>
                                                            <input type="text" id="designation_bn" name="designation_bn" value="{{$experiencesData->designation_bn}}"
                                                                   class="form-control" placeholder="Enter Designation(Bn)" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="year_of_experience" class="form-label">Year Of Experience</label>
                                                            <input type="text" id="year_of_experience" name="year_of_experience" value="{{$experiencesData->year_of_experience}}"
                                                                   class="form-control" placeholder="Enter Year Of Experience" required>
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
                            <div id="danger-header-modal{{$experiencesData->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel{{$experiencesData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-danger">
                                            <h4 class="modal-title" id="danger-header-modalLabe{{$experiencesData->id}}l">Delete</h4>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="mt-0">Are You Went to Delete this ? </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <a href="{{route('experience.destroy',$experiencesData->id)}}" class="btn btn-danger">Delete</a>
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
                    <form method="post" action="{{route('experience.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="office_name" class="form-label">Office Name(En)</label>
                                    <input type="text" id="office_name" name="office_name"
                                           class="form-control" placeholder="Enter Office Name(En)" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="office_name_bn" class="form-label">Office Name(Bn)</label>
                                    <input type="text" id="office_name_bn" name="office_name_bn"
                                           class="form-control" placeholder="Enter Office Name(Bn)" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="designation" class="form-label">Designation (En)</label>
                                    <input type="text" id="designation" name="designation"
                                           class="form-control" placeholder="Enter Designation(En)" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="designation_bn" class="form-label">Designation (Bn)</label>
                                    <input type="text" id="designation_bn" name="designation_bn"
                                           class="form-control" placeholder="Enter Designation(Bn)" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="year_of_experience" class="form-label">Year Of Experience</label>
                                    <input type="text" id="year_of_experience" name="year_of_experience"
                                           class="form-control" placeholder="Enter Year Of Experience" required>
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
