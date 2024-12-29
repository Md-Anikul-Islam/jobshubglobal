@extends('admin.app')
@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Job Portal</a></li>
                        <li class="breadcrumb-item active">Job!</li>
                    </ol>
                </div>
                <h4 class="page-title">Job!</h4>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end">
                    @can('job-create')
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addNewModalId">Add New</button>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Title</th>
                        <th>Title(Bn)</th>
                        <th>No Of Vacancy</th>
                        <th>Deadline</th>
                        <th>Salary</th>
                        <th>Job Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($job as $key=>$jobData)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$jobData->title}}</td>
                            <td>{{$jobData->title_bn}}</td>
                            <td>{{$jobData->vacancy}}</td>
                            <td>{{$jobData->deadline}}</td>
                            <td>{{$jobData->salary}}</td>
                            <td>{{$jobData->job_type== 1 ? 'Part Time':'Full Time'}}</td>
                            <td>{{$jobData->status==1? 'Active':'Inactive'}}</td>
                            <td style="width: 100px;">
                                <div class="d-flex justify-content-end gap-1">
                                    @can('job-edit')
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editNewModalId{{$jobData->id}}">Edit</button>
                                    @endcan
                                    @can('job-delete')
                                    <a href="{{route('job.destroy',$jobData->id)}}"class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$jobData->id}}">Delete</a>
                                    @endcan
                                </div>
                            </td>
                            <!--Edit Modal -->
                            <div class="modal fade" id="editNewModalId{{$jobData->id}}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editNewModalLabel{{$jobData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-lg  modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="addNewModalLabel{{$jobData->id}}">Edit</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{route('job.update',$jobData->id)}}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label">Category</label>
                                                            <select name="category_id" class="form-select">
                                                                @foreach($category as $categoryData)
                                                                    <option value="{{$categoryData->id}}" {{ $jobData->category_id === $categoryData->id ? 'selected' : '' }}>{{$categoryData->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label">Location</label>
                                                            <select name="location_id" class="form-select">
                                                                @foreach($location as $locationData)
                                                                    <option value="{{$locationData->id}}" {{ $jobData->location_id === $locationData->id ? 'selected' : '' }}>{{$locationData->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="title" class="form-label">Title (En)</label>
                                                            <input type="text"  name="title" value="{{$jobData->title}}"
                                                                   class="form-control" placeholder="Enter Title En" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="title_bn" class="form-label">Title (Bn)</label>
                                                            <input type="text"  name="title_bn" value="{{$jobData->title_bn}}"
                                                                   class="form-control" placeholder="Enter Title Bn">
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="vacancy" class="form-label">Vacancy</label>
                                                            <input type="number"  name="vacancy" value="{{$jobData->vacancy}}"
                                                                   class="form-control" placeholder="Enter Vacancy" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label">Job Type</label>
                                                            <select name="job_type" class="form-select">
                                                                <option value="1" {{ $jobData->job_type === 1 ? 'selected' : '' }}>Part Time</option>
                                                                <option value="2" {{ $jobData->job_type === 2 ? 'selected' : '' }}>Full Time</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="salary" class="form-label">Salary</label>
                                                            <input type="number" name="salary" value="{{$jobData->salary}}"
                                                                   class="form-control" placeholder="Enter Salary" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="address" class="form-label">Address(En)</label>
                                                            <input type="text"  name="address" value="{{$jobData->address}}"
                                                                   class="form-control" placeholder="Enter Address(En)" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="address_bn" class="form-label">Address(Bn)</label>
                                                            <input type="text" name="address_bn" value="{{$jobData->address_bn}}"
                                                                   class="form-control" placeholder="Enter Address(Bn)">
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="deadline" class="form-label">Deadline</label>
                                                            <input type="date" name="deadline" value="{{$jobData->deadline}}"
                                                                   class="form-control" placeholder="Enter Deadline" required>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label>Short Description(En)</label>
                                                            <textarea id="summernoteEdit{{ $jobData ? $jobData->id : '' }}" name="details">{{ $jobData ? $jobData->details : '' }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label>Short Description(Ba)</label>
                                                            <textarea id="summernoteEdit{{ $jobData ? $jobData->id : '' }}" name="details_bn">{{ $jobData ? $jobData->details_bn : '' }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label">Status</label>
                                                            <select name="status" class="form-select">
                                                                <option value="1" {{ $jobData->status === 1 ? 'selected' : '' }}>Active</option>
                                                                <option value="0" {{ $jobData->status === 0 ? 'selected' : '' }}>Inactive</option>
                                                            </select>
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
                            <div id="danger-header-modal{{$jobData->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel{{$jobData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-danger">
                                            <h4 class="modal-title" id="danger-header-modalLabe{{$jobData->id}}l">Delete</h4>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="mt-0">Are You Went to Delete this ? </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <a href="{{route('job.destroy',$jobData->id)}}" class="btn btn-danger">Delete</a>
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
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addNewModalLabel">Add</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('job.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Category</label>
                                    <select name="category_id" class="form-select">
                                        <option value="">Select Category</option>
                                        @foreach($category as $categoryData)
                                            <option value="{{$categoryData->id}}">{{$categoryData->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Location</label>
                                    <select name="location_id" class="form-select">
                                        <option value="">Select Location</option>
                                        @foreach($location as $locationData)
                                            <option value="{{$locationData->id}}">{{$locationData->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title (En)</label>
                                    <input type="text"  name="title"
                                           class="form-control" placeholder="Enter Title En" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title_bn" class="form-label">Title (Bn)</label>
                                    <input type="text"  name="title_bn"
                                           class="form-control" placeholder="Enter Title Bn">
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="vacancy" class="form-label">Vacancy</label>
                                    <input type="number"  name="vacancy"
                                           class="form-control" placeholder="Enter Vacancy" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Job Type</label>
                                    <select name="job_type" class="form-select">
                                        <option value="1">Part Time</option>
                                        <option value="2">Full Time</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="salary" class="form-label">Salary</label>
                                    <input type="number" name="salary"
                                           class="form-control" placeholder="Enter Salary" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address(En)</label>
                                    <input type="text"  name="address"
                                           class="form-control" placeholder="Enter Address(En)" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="address_bn" class="form-label">Address(Bn)</label>
                                    <input type="text" name="address_bn"
                                           class="form-control" placeholder="Enter Address(Bn)">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="deadline" class="form-label">Deadline</label>
                                    <input type="date" name="deadline"
                                           class="form-control" placeholder="Enter Deadline" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label>Short Description(En)</label>
                                    <textarea id="summernote" name="details"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label>Short Description(Ba)</label>
                                    <textarea id="summernoteBn" name="details_bn"></textarea>
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
