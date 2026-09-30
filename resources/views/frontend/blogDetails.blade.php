
@extends('frontend.app')

@section('content')

    <div class="blog-details-page-area section-padding">
        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-9 col-md-10 col-12">

                    <div class="blog-details-wrap">

                        {{-- Blog Image --}}
                        @if($blog->image)
                            <div class="blog-details-image mb-4">
                                <img
                                    src="{{ asset('images/blog/' . $blog->image) }}"
                                    alt="{{ $blog->title }}"
                                    class="img-fluid w-100"
                                >
                            </div>
                        @endif


                        {{-- Blog Content --}}
                        <div class="blog-details-content">

                            {{-- Date --}}
                            <div class="deadline d-flex align-items-center mb-3">

                                <svg
                                    width="18"
                                    height="20"
                                    viewBox="0 0 18 20"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M16 18H2V7H16V18ZM13 0V2H5V0H3V2H2C0.89 2 0 2.89 0 4V18C0 18.5304 0.210714 19.0391 2 20H16C16.5304 20 17.0391 19.7893 17.4142 19.4142C17.7892 19.0391 18 18.5304 18 18V4C18 2.89 17.1 2 16 2H15V0H13ZM14 11H9V16H14V11Z"
                                        fill="currentColor"
                                    />
                                </svg>

                                <span class="ms-2">
                                    {{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}
                                </span>

                            </div>


                            {{-- Title --}}
                            <h1 class="mb-4">
                                {{ $blog->title }}
                            </h1>


                            {{-- Details --}}
                            <div class="blog-details-description">

                                {!! $blog->details !!}

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection
