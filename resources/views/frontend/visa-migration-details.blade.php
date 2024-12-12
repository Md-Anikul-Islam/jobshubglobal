@extends('frontend.app')
@section('content')
    <div class="learning-details-section-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="learning-details-hero-content position-relative">
                        <h4>Visa Migration</h4>
                        <h1>{{$visaMigration->title}}</h1>
                        <ul>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                    <path d="M12.6667 4.5H3.33333C2.59695 4.5 2 5.09695 2 5.83333V13.1667C2 13.903 2.59695 14.5 3.33333 14.5H12.6667C13.403 14.5 14 13.903 14 13.1667V5.83333C14 5.09695 13.403 4.5 12.6667 4.5Z" stroke="currentColor"/>
                                    <path d="M2 7.16667C2 5.90933 2 5.28133 2.39067 4.89067C2.78133 4.5 3.40933 4.5 4.66667 4.5H11.3333C12.5907 4.5 13.2187 4.5 13.6093 4.89067C14 5.28133 14 5.90933 14 7.16667H2Z" fill="currentColor"/>
                                    <path d="M4.66699 2.5V4.5M11.3337 2.5V4.5" stroke="currentColor" stroke-linecap="round"/>
                                </svg>
                                {{ \Carbon\Carbon::parse($visaMigration->date)->format('d M Y') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="learning-details-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="learning-details-content-wrap">
                        <p>{!! $visaMigration->details !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
