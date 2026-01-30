@extends('frontend.app')
@section('title', $help->name)
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <h1 class="mb-4">{{ $help->name }}</h1>

                <div class="help-content">
                    {!! $help->details !!}
                </div>

            </div>
        </div>
    </div>
@endsection
