@extends('frontend.app')
@section('content')
<div class="elearning-page-area section-padding">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="found-jobs-count-wrap e-learning-top d-flex flex-column flex-md-row align-items-center justify-content-between">
					<h3>E-Learning</h3>
                    <form class="find-a-jobs-wrap" action="{{ route('eLearning') }}" method="GET">
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
                    @foreach($training as $trainingData)
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="learning-card">
                                <div class="learning-card-image">
                                    <a href="{{route('eLearning.details',$trainingData->id)}}">
                                        <img src="{{asset('images/training/'. $trainingData->image )}}" alt="">
                                    </a>
                                </div>
                                <div class="learning-card-content">
                                    <div class="top">
                                        <a href="{{route('eLearning.details',$trainingData->id)}}">
                                            <h3>{{$trainingData->title}}</h3>
                                        </a>
                                        <p>
                                            {{ \Illuminate\Support\Str::limit(strip_tags($trainingData->details), 150) }}
                                        </p>
                                        <div class="deadline d-flex align-items-center">
                                            <svg
                                                width="18"
                                                height="20"
                                                viewBox="0 0 18 20"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    d="M16 18H2V7H16V18ZM13 0V2H5V0H3V2H2C0.89 2 0 2.89 0 4V18C0 18.5304 0.210714 19.0391 0.585786 19.4142C0.960859 19.7893 1.46957 20 2 20H16C16.5304 20 17.0391 19.7893 17.4142 19.4142C17.7893 19.0391 18 18.5304 18 18V4C18 2.89 17.1 2 16 2H15V0H13ZM14 11H9V16H14V11Z"
                                                    fill="currentColor"
                                                />
                                            </svg>
                                            {{ \Carbon\Carbon::parse($trainingData->training_date)->format('d M Y') }} {{ \Carbon\Carbon::parse($trainingData->training_time)->format('h:i A') }}
                                        </div>
                                        <div class="price-box d-flex align-items-center">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 15 14"
                                                fill="currentColor"
                                            >
                                                <g clip-path="url(#clip0_1545_11374)">
                                                    <path
                                                        d="M7.5 10.02V11.03"
                                                        stroke="#fff"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                    <path
                                                        d="M7.5 5.01001V5.95001"
                                                        stroke="#fff"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                    <path
                                                        d="M7.5 13.49C11 13.49 13.5 12.25 13.5 9.48997C13.5 6.48997 12 4.48997 9 2.98997L10.18 1.46997C10.2399 1.37024 10.2725 1.25644 10.2743 1.14009C10.276 1.02374 10.247 0.908993 10.1902 0.807468C10.1333 0.705943 10.0506 0.621254 9.95051 0.561984C9.85038 0.502714 9.73636 0.47097 9.62 0.469971H5.38C5.26364 0.47097 5.14962 0.502714 5.04949 0.561984C4.94935 0.621254 4.86667 0.705943 4.80982 0.807468C4.75296 0.908993 4.72396 1.02374 4.72575 1.14009C4.72754 1.25644 4.76005 1.37024 4.82 1.46997L6 2.99997C3 4.50997 1.5 6.50997 1.5 9.50997C1.5 12.25 4 13.49 7.5 13.49Z"
                                                        stroke="#fff"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                    <path
                                                        d="M6.5 9.55986C6.62201 9.70469 6.77558 9.81965 6.94893 9.89592C7.12227 9.97219 7.31078 10.0077 7.5 9.99985C7.7892 10.0196 8.07479 9.92639 8.29671 9.7399C8.51864 9.55341 8.65961 9.28813 8.69 8.99985C8.65961 8.71157 8.51864 8.4463 8.29671 8.25981C8.07479 8.07332 7.7892 7.98014 7.5 7.99985C7.21079 8.01957 6.92521 7.92639 6.70328 7.7399C6.48136 7.55341 6.34038 7.28813 6.31 6.99985C6.33794 6.71056 6.47824 6.44377 6.70074 6.25679C6.92325 6.06981 7.21022 5.97756 7.5 5.99985C7.68588 5.98848 7.87198 6.01846 8.04489 6.08762C8.2178 6.15679 8.37323 6.26342 8.5 6.39985"
                                                        stroke="#fff"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1545_11374">
                                                        <rect
                                                            width="14"
                                                            height="14"
                                                            fill="white"
                                                            transform="translate(0.5)"
                                                        />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            Price {{$trainingData->training_fee}}
                                        </div>
                                    </div>
                                </div>
                                <div class="register-now">
                                    <a href="#">Register</a>
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
                        <li><a href="#">Category 1</a></li>
                        <li><a href="#">Category 1</a></li>
                        <li><a href="#">Category 1</a></li>
                        <li><a href="#">Category 1</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="pagination-wrapper">
            {{ $training->links('pagination::bootstrap-4') }}
        </div>
	</div>
</div>
@endsection
