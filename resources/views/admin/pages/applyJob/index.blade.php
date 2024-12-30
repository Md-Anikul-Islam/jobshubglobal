@extends('admin.app')
@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Job Hub Global</a></li>
                        <li class="breadcrumb-item active">Apply Job!</li>
                    </ol>
                </div>
                <h4 class="page-title">Apply Job!</h4>
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
                        <th>Company Name</th>
                        <th>Job Title</th>
                        <th>Job Vacancy</th>
                        <th>Salary</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($candidate as $key=>$candidateData)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$candidateData->company->name}}</td>
                            <td>{{$candidateData->job->title}}</td>
                            <td>{{$candidateData->job->vacancy}}</td>
                            <td>{{$candidateData->job->salary}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
