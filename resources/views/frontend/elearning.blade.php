@extends('frontend.app')
@section('content')

    <div class="elearning-page-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="found-jobs-count-wrap e-learning-top d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <h3>E-Learning</h3>
                        <form class="find-a-jobs-wrap" action="{{ route('elearning') }}" method="GET">
                            <div class="input-group search-jobs e-learning-input">
                                <div class="search-icon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                    >
                                        <path
                                            d="M21.0002 21L16.6572 16.657M16.6572 16.657C17.4001 15.9141 17.9894 15.0322 18.3914 14.0616C18.7935 13.0909 19.0004 12.0506 19.0004 11C19.0004 9.94942 18.7935 8.90911 18.3914 7.93848C17.9894 6.96785 17.4001 6.08591 16.6572 5.34302C15.9143 4.60014 15.0324 4.01084 14.0618 3.6088C13.0911 3.20675 12.0508 2.99982 11.0002 2.99982C9.9496 2.99982 8.90929 3.20675 7.93866 3.6088C6.96803 4.01084 6.08609 4.60014 5.34321 5.34302C3.84288 6.84335 3 8.87824 3 11C3 13.1218 3.84288 15.1567 5.34321 16.657C6.84354 18.1574 8.87842 19.0002 11.0002 19.0002C13.122 19.0002 15.1569 18.1574 16.6572 16.657Z"
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </div>
                                <input
                                    type="text"
                                    name="find_job"
                                    class="form-control"
                                    placeholder="Search by Keywords"
                                    value="{{ request('find_job') }}"
                                />
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-9 col-12 order-2 order-md-1">
                    <div class="row">
                        @foreach($elearning as $elearningData)
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="learning-card">
                                    <div class="">
                                      <img src="{{asset('images/eLearning/'. $elearningData->image )}}" style="height: 300px;" alt="" >
                                    </div>
                                    <div class="learning-card-content">
                                        <div class="top">
                                            <h3 class="text-center">{{$elearningData->title}}</h3>

                                            <p>
                                                {{ \Illuminate\Support\Str::limit(strip_tags($elearningData->details), 50) }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="register-now">
                                        <a href="#">{{$elearningData->fee}} Tk</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12 order-1 order-md-2">
                    <div class="category_wrap section-heading">
                        <h2>Category</h2>
                        <ul>
                            <li>
                                <a href="{{ route('elearning') }}"
                                   class="{{ request('category_id') ? '' : 'active-category' }}">
                                    All
                                </a>
                            </li>
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('elearning', ['category_id' => $category->id]) }}"
                                       class="{{ request('category_id') == $category->id ? 'active-category' : '' }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>


            </div>
            <div class="pagination-wrapper">
                {{ $elearning->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
