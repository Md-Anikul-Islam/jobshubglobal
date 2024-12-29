@extends('admin.app')
@section('admin_content')
    {{-- CKEditor CDN --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Jobs Hub Global</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Resource</a></li>
                        <li class="breadcrumb-item active">News!</li>
                    </ol>
                </div>
                <h4 class="page-title">Resource!</h4>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end">
                    <!-- Large modal -->
                    @can('training-create')
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addNewModalId">Add New</button>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Image</th>
                        <th>Title Category</th>
                        <th>Title En</th>
                        <th>Training Date</th>
                        <th>Training Time</th>
                        <th>Training Duration</th>
                        <th>Fees</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($training as $key=>$trainingData)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                <img src="{{asset('images/training/'. $trainingData->image )}}" alt="Current Image" style="max-width: 50px;">
                            </td>
                            <td>{{$trainingData->trainingCategory->name}}</td>
                            <td>{{$trainingData->title}}</td>
                            <td>{{$trainingData->training_date}}</td>

                            <td>{{$trainingData->training_time}}</td>
                            <td>{{$trainingData->training_duration}}</td>
                            <td>{{$trainingData->training_fee}}</td>
                            <td>{{$trainingData->status==1? 'Active':'Inactive'}}</td>

                            <td style="width: 100px;">
                                <div class="d-flex justify-content-end gap-1">
                                    @can('training-edit')
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editNewModalId{{$trainingData->id}}">Edit</button>
                                    @endcan
                                    @can('training-delete')
                                        <a href="{{route('training.destroy',$trainingData->id)}}"class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$trainingData->id}}">Delete</a>
                                    @endcan
                                </div>
                            </td>
                            <!--Edit Modal -->
                            <div class="modal fade" id="editNewModalId{{$trainingData->id}}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editNewModalLabel{{$trainingData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="addNewModalLabel{{$trainingData->id}}">Edit</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{route('training.update',$trainingData->id)}}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label">Training Category</label>
                                                            <select name="training_category_id" class="form-select">

                                                                @foreach($trainingCategory as $category)
                                                                    <option value="{{$category->id}}" {{ $trainingData->training_category_id === $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="title" class="form-label">Title En</label>
                                                            <input type="text" id="title" name="title" value="{{$trainingData->title}}"
                                                                   class="form-control" placeholder="Enter Title" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="title" class="form-label">Title Bn</label>
                                                            <input type="text" id="title_bn" name="title_bn" value="{{$trainingData->title_bn}}"
                                                                   class="form-control" placeholder="Enter Title">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="training_date" class="form-label">Training Date</label>
                                                            <input type="date"  name="training_date"
                                                                   class="form-control" placeholder="Enter Training Date" value="{{$trainingData->training_date}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="training_time" class="form-label">Training Time</label>
                                                            <input type="time"  name="training_time"
                                                                   class="form-control" placeholder="Enter Training Time" value="{{$trainingData->training_time}}" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="training_duration" class="form-label">Training Duration</label>
                                                            <input type="text"  name="training_duration"
                                                                   class="form-control" placeholder="Enter Training Duration" value="{{$trainingData->training_duration}}" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="training_fee" class="form-label">Training Fees</label>
                                                            <input type="text"  name="training_fee"
                                                                   class="form-control" placeholder="Enter Training Fees" value="{{$trainingData->training_fee}}" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="example-fileinput" class="form-label">Image</label>
                                                            <input type="file" name="image" id="example-fileinput" class="form-control">
                                                            <img src="{{asset('images/training/'. $trainingData->image )}}" alt="Current Image" class="mt-2" style="max-width: 100px;">
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label">Status</label>
                                                            <select name="status" class="form-select">
                                                                <option value="1" {{ $trainingData->status === 1 ? 'selected' : '' }}>Active</option>
                                                                <option value="0" {{ $trainingData->status === 0 ? 'selected' : '' }}>Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label>Details English </label>
                                                            <textarea id="summernoteEdit{{ $trainingData->id }}" name="details">{{ $trainingData->details }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label>Details Bangle</label>
                                                            <textarea id="summernoteEdit{{ $trainingData->id }}" name="details_bn">{{ $trainingData->details_bn }}</textarea>
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
                            <div id="danger-header-modal{{$trainingData->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel{{$trainingData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-danger">
                                            <h4 class="modal-title" id="danger-header-modalLabe{{$trainingData->id}}l">Delete</h4>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="mt-0">Are You Went to Delete this ? </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <a href="{{route('training.destroy',$trainingData->id)}}" class="btn btn-danger">Delete</a>
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
                    <form method="post" action="{{route('training.store')}}">
                        @csrf
                        <div class="row">

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Training Category</label>
                                    <select name="training_category_id" class="form-select">
                                        <option selected>Select Training Category</option>
                                        @foreach($trainingCategory as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title En</label>
                                    <input type="text" id="title" name="title"
                                           class="form-control" placeholder="Enter Title" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title_bn" class="form-label">Title Bn</label>
                                    <input type="text" id="title_bn" name="title_bn"
                                           class="form-control" placeholder="Enter Title">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="training_date" class="form-label">Training Date</label>
                                    <input type="date"  name="training_date"
                                           class="form-control" placeholder="Enter Training Date" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="training_time" class="form-label">Training Time</label>
                                    <input type="time"  name="training_time"
                                           class="form-control" placeholder="Enter Training Time" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="training_duration" class="form-label">Training Duration</label>
                                    <input type="text"  name="training_duration"
                                           class="form-control" placeholder="Enter Training Duration" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="training_fee" class="form-label">Training Fees</label>
                                    <input type="text"  name="training_fee"
                                           class="form-control" placeholder="Enter Training Fees" required>
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
                                    <label> Details English</label>
                                    <textarea id="summernote" name="details"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label> Details Bangle</label>
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
