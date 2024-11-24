@extends('admin.app')
@section('admin_content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">About</li>
                            </ol>
                        </div>
                        <h4 class="page-title">About</h4>
                    </div>
                </div>
            </div>
            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Form</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('about.createOrUpdate',$about ? $about->id : null)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-2">


                                    <div class="mb-3 col-md-4">
                                        <label for="name" class="form-label">About Title English</label>
                                        <input type="text" class="form-control" name="title" value="{{$about?$about->title:''}}"
                                               placeholder="Enter Title English">
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label for="name" class="form-label">About Title Bangle </label>
                                        <input type="text" class="form-control" name="title_bn" value="{{$about?$about->title_bn:''}}"
                                               placeholder="Enter Title Bangle">
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label for="image" class="form-label">About Image Image</label>
                                        <input type="file" class="form-control" name="image" value="{{$about?$about->image:''}}"
                                               placeholder="Enter Image">
                                        @if($about? $about->image:'')
                                            <img src="{{asset($about? $about->image:'' )}}" alt="Current Image" class="mt-2" style="max-width: 100px;">
                                        @endif
                                    </div>

                                </div>

                                <div class="row g-2">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label>Short Description English</label>
                                                <textarea id="summernoteEdit{{ $about ? $about->id : '' }}" name="details">{{ $about ? $about->details : '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label>Short Description Bangle</label>
                                                <textarea id="summernoteEdit{{ $about ? $about->id : '' }}" name="details_bn">{{ $about ? $about->details_bn : '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
