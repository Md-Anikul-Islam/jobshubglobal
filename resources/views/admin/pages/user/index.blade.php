@extends('admin.app')
@section('admin_content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/dashboard">Job Hub Global</a></li>
                                <li class="breadcrumb-item active">Account Setting</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Account Setting</h4>
                    </div>
                </div>
            </div>
            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Account Information</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('user.account.create.update',$user ? $user->id : null)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-2">
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Name English</label>
                                        <input type="text" class="form-control" name="name" value="{{$user?$user->name:''}}"
                                               placeholder="Enter Name English">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Name Bangle</label>
                                        <input type="text" class="form-control" name="name_bn" value="{{$user?$user->name_bn:''}}"
                                               placeholder="Enter Name Bangle">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{$user?$user->email:''}}"
                                               placeholder="Enter Email">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{$user?$user->phone:''}}"
                                               placeholder="Enter Phone">
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Father Name English</label>
                                        <input type="text" class="form-control" name="father_name" value="{{$user?$user->father_name:''}}"
                                               placeholder="Enter Father Name English">
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Father Name Bangle</label>
                                        <input type="text" class="form-control" name="father_name_bn" value="{{$user?$user->father_name_bn:''}}"
                                               placeholder="Enter Father Name Bangle">
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Mother Name English</label>
                                        <input type="text" class="form-control" name="mother_name" value="{{$user?$user->mother_name:''}}"
                                               placeholder="Enter Mother Name Bangle">
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Mother Name Bangle</label>
                                        <input type="text" class="form-control" name="mother_name_bn" value="{{$user?$user->mother_name_bn:''}}"
                                               placeholder="Enter Mother Name Bangle">
                                    </div>


                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Nationality (En)</label>
                                        <input type="text" class="form-control" name="nationality" value="{{$user?$user->nationality:''}}"
                                               placeholder="Enter Nationality English">
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Nationality (Bn)</label>
                                        <input type="text" class="form-control" name="nationality_bn" value="{{$user?$user->nationality_bn:''}}"
                                               placeholder="Enter Nationality Bangle">
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Blood Group (En)</label>
                                        <input type="text" class="form-control" name="blood_group" value="{{$user?$user->blood_group:''}}"
                                               placeholder="Enter Blood Group English">
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Blood Group (Bn)</label>
                                        <input type="text" class="form-control" name="blood_group_bn" value="{{$user?$user->blood_group_bn:''}}"
                                               placeholder="EnterBlood Group Bangle">
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">NID</label>
                                        <input type="text" class="form-control" name="nid" value="{{$user?$user->nid:''}}"
                                               placeholder="Enter NID">
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Birth Date</label>
                                        <input type="date" class="form-control" name="dob" value="{{$user?$user->dob:''}}"
                                               placeholder="Enter Birth Date">
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Address (En)</label>
                                        <input type="text" class="form-control" name="address" value="{{$user?$user->address:''}}"
                                               placeholder="Enter Address (En)">
                                    </div>


                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Address (Bn)</label>
                                        <input type="text" class="form-control" name="address_bn" value="{{$user?$user->address_bn:''}}"
                                               placeholder="Enter Address (Bn)">
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Short Bio (En)</label>
                                        <textarea type="text" class="form-control" name="details">{{$user?$user->details:''}}</textarea>
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Short Bio (Bn)</label>
                                        <textarea type="text" class="form-control" name="details_bn">{{$user?$user->details_bn:''}}</textarea>
                                    </div>


                                    <div class="mb-3 col-md-4">
                                        <label for="profile" class="form-label">Profile Image</label>
                                        <input type="file" class="form-control" name="profile" value="{{$user?$user->profile:''}}"
                                               placeholder="Enter Logo">
                                        @if($user? $user->profile:'')
                                            <img src="{{asset($user? $user->profile:'' )}}" alt="Current Image" class="mt-2" style="max-width: 50px;">
                                        @endif
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label for="profile" class="form-label">CV</label>
                                        <input type="file" class="form-control" name="cv" value="{{$user?$user->cv:''}}"
                                               placeholder="Enter CV">
                                        @if($user? $user->cv:'')
                                            <a href="{{asset($user? $user->cv:'' )}}" target="_blank">Download CV</a>
                                        @endif
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label for="profile" class="form-label">Resume</label>
                                        <input type="file" class="form-control" name="resume" value="{{$user?$user->resume:''}}"
                                               placeholder="Enter Resume">
                                        @if($user? $user->resume:'')
                                            <a href="{{asset($user? $user->resume:'' )}}" target="_blank">Download Resume</a>
                                        @endif
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
