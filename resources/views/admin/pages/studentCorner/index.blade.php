@extends('admin.app')
@section('admin_content')
    {{-- CKEditor CDN --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Jobs Hub Global</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Student Corner</a></li>
                        <li class="breadcrumb-item active">Student Corner!</li>
                    </ol>
                </div>
                <h4 class="page-title">Student Corner!</h4>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end">
                    <!-- Large modal -->
                    @can('student-corner-create')
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addNewModalId">Add New</button>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($studentCorner as $key=>$studentCornerData)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$studentCornerData->studentCornerCategory->name??''}}</td>
                            <td>{{$studentCornerData->title}}</td>
                            <td>{{$studentCornerData->date}}</td>
                            <td>
                                <img src="{{asset('images/studentCorner/'. $studentCornerData->image )}}" alt="Current Image" style="max-width: 50px;">
                            </td>
                            <td>{{$studentCornerData->status==1? 'Active':'Inactive'}}</td>
                            <td style="width: 100px;">
                                <div class="d-flex justify-content-end gap-1">
                                    @can('student-corner-edit')
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editNewModalId{{$studentCornerData->id}}">Edit</button>
                                    @endcan

                                    @can('student-corner-delete')
                                        <a href="{{route('student.corner.destroy',$studentCornerData->id)}}"class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$studentCornerData->id}}">Delete</a>
                                    @endcan
                                </div>
                            </td>

                            <div id="danger-header-modal{{$studentCornerData->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel{{$studentCornerData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-danger">
                                            <h4 class="modal-title" id="danger-header-modalLabe{{$studentCornerData->id}}l">Delete</h4>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="mt-0">Are You Went to Delete this ? </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <a href="{{route('student.corner.destroy',$studentCornerData->id)}}" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Edit Modal -->
                            <div class="modal fade" id="editNewModalId{{$studentCornerData->id}}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editNewModalLabel{{$studentCornerData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="addNewModalLabel{{$studentCornerData->id}}">Edit</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{route('student.corner.update',$studentCornerData->id)}}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">

                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label">Student Corner Category</label>
                                                            <select name="student_corner_category_id" class="form-select">
                                                                <option selected>Select Student Corner Category</option>
                                                                @foreach($category as $categoryData)
                                                                    <option value="{{$categoryData->id}}" {{ $studentCornerData->student_corner_category_id === $categoryData->id ? 'selected' : '' }}>{{$categoryData->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="title" class="form-label">Title</label>
                                                            <input type="text" id="title" name="title" value="{{$studentCornerData->title}}"
                                                                   class="form-control" placeholder="Enter Title" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="title" class="form-label">Published Date</label>
                                                            <input type="date" id="date" name="date" value="{{$studentCornerData->date}}"
                                                                   class="form-control" placeholder="Enter Published Date" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="link" class="form-label">Link/Source</label>
                                                            <input type="text" id="link" name="link" value="{{$studentCornerData->link}}"
                                                                   class="form-control" placeholder="Enter Link/Source">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="example-fileinput" class="form-label">Image</label>
                                                            <input type="file" name="image" id="example-fileinput" class="form-control">
                                                            <img src="{{asset('images/studentCorner/'. $studentCornerData->image )}}" alt="Current Image" class="mt-2" style="max-width: 100px;">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label">Status</label>
                                                            <select name="status" class="form-select">
                                                                <option value="1" {{ $studentCornerData->status === 1 ? 'selected' : '' }}>Active</option>
                                                                <option value="0" {{ $studentCornerData->status === 0 ? 'selected' : '' }}>Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label>Details </label>
                                                            <textarea id="summernoteEdit{{ $studentCornerData->id }}" name="details">{{ $studentCornerData->details }}</textarea>
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
                    <form method="post" action="{{route('student.corner.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Student Corner Category</label>
                                    <select name="student_corner_category_id" class="form-select" required>
                                        <option selected>Select Student Corner Category</option>
                                        @foreach($category as $categoryData)
                                            <option value="{{$categoryData->id}}">{{$categoryData->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" id="title" name="title"
                                           class="form-control" placeholder="Enter Title" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Published Date</label>
                                    <input type="date" id="date" name="date"
                                           class="form-control" placeholder="Enter Published Date" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="link" class="form-label">Link/Source</label>
                                    <input type="text" id="link" name="link"
                                           class="form-control" placeholder="Enter Link/Source">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="example-fileinput" class="form-label">Image</label>
                                    <input type="file" name="image" id="example-fileinput" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label> Details </label>
                                    <textarea id="summernote" name="details"></textarea>
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
