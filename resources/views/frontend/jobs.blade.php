@extends('frontend.app')
@section('content')
<div class="my-jobs-section-area section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-12">
				<div class="quick-search">
					<h2>Quick Search</h2>
                    <form class="jobs-search-form" method="GET" action="{{ route('all.jobs') }}">
                        <input type="text" name="job_title" placeholder="Job Title" value="{{ request('job_title') }}" />
                        <select name="locationId">
                            <option value="">Select Location</option>
                            @foreach($locations as $location)
                                <option value="{{ $location->id }}" {{ request('locationId') == $location->id ? 'selected' : '' }}>
                                    {{ $location->name }}
                                </option>
                            @endforeach
                        </select>
                        <select name="categoryId">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('categoryId') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        <select name="job_type">
                            <option selected value="">Job Type</option>
                            <option value="1">Part Time</option>
                            <option value="2">Full Time</option>
                        </select>

                        <input type="number" name="min_salary" placeholder="Minimum Salary" value="{{ request('min_salary') }}" />
                        <input type="number" name="max_salary" placeholder="Maximum Salary" value="{{ request('max_salary') }}" />
                        <button type="submit">Search Jobs</button>
                    </form>
                </div>
			</div>
			<div class="col-lg-9 col-md-8">
				<div class="jobs-card-wrapper">
					<div class="found-jobs-count-wrap">
						<h3>We found <span>({{$jobVacancy}})</span> jobs</h3>
					</div>
					<div class="jobs-card-wrap">
                        <div class="row">
                            @foreach($jobs as $jobData)
                                <div class="col-md-6 col-12">
                                    <div class="job-card position-relative">
                                        <div class="company-logo">
                                            <a href="{{route('job.details',$jobData->id)}}">
                                                <img src="{{asset('images/logo/'. $jobData->company->profile )}}" alt="Company Name">
                                            </a>
                                        </div>
                                        <h3>
                                            <a href="{{route('job.details',$jobData->id)}}">{{$jobData->title}}</a>
                                        </h3>
                                        <div class="company-info">
                                            <h4>{{$jobData->company->name}}.</h4>
                                            <div
                                                class="location-job-type d-flex align-items-center"
                                            >
                                                <p>
                                                    <svg
                                                        width="14"
                                                        height="20"
                                                        viewBox="0 0 14 20"
                                                        fill="none"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <path
                                                            d="M7 9.5C6.33696 9.5 5.70107 9.23661 5.23223 8.76777C4.76339 8.29893 4.5 7.66304 4.5 7C4.5 6.33696 4.76339 5.70107 5.23223 5.23223C5.70107 4.76339 6.33696 4.5 7 4.5C7.66304 4.5 8.29893 4.76339 8.76777 5.23223C9.23661 5.70107 9.5 6.33696 9.5 7C9.5 7.3283 9.43534 7.65339 9.3097 7.95671C9.18406 8.26002 8.99991 8.53562 8.76777 8.76777C8.53562 8.99991 8.26002 9.18406 7.95671 9.3097C7.65339 9.43534 7.3283 9.5 7 9.5V9.5ZM7 0C5.14348 0 3.36301 0.737498 2.05025 2.05025C0.737498 3.36301 0 5.14348 0 7C0 12.25 7 20 7 20C7 20 14 12.25 14 7C14 5.14348 13.2625 3.36301 11.9497 2.05025C10.637 0.737498 8.85652 0 7 0V0Z"
                                                            fill="currentColor"
                                                        />
                                                    </svg>
                                                    {{$jobData->address}}
                                                </p>
                                                <p class="employee-type">Full Time</p>
                                            </div>
                                        </div>
                                        <div class="exp-salary d-flex align-items-center">
                                            <h3 class="d-flex align-items-center">
                                                <svg
                                                    width="20"
                                                    height="19"
                                                    viewBox="0 0 20 19"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        d="M18 4H14V2C14 1.46957 13.7893 0.960859 13.4142 0.585786C13.0391 0.210714 12.5304 0 12 0H8C6.89 0 6 0.89 6 2V4H2C0.89 4 0 4.89 0 6V17C0 17.5304 0.210714 18.0391 0.585786 18.4142C0.960859 18.7893 1.46957 19 2 19H18C18.5304 19 19.0391 18.7893 19.4142 18.4142C19.7893 18.0391 20 17.5304 20 17V6C20 5.46957 19.7893 4.96086 19.4142 4.58579C19.0391 4.21071 18.5304 4 18 4V4ZM8 2H12V4H8V2ZM10 7C10.663 7 11.2989 7.26339 11.7678 7.73223C12.2366 8.20107 12.5 8.83696 12.5 9.5C12.5 10.163 12.2366 10.7989 11.7678 11.2678C11.2989 11.7366 10.663 12 10 12C9.33696 12 8.70107 11.7366 8.23223 11.2678C7.76339 10.7989 7.5 10.163 7.5 9.5C7.5 8.83696 7.76339 8.20107 8.23223 7.73223C8.70107 7.26339 9.33696 7 10 7V7ZM15 17H5V15.75C5 14.37 7.24 13.25 10 13.25C12.76 13.25 15 14.37 15 15.75V17Z"
                                                        fill="currentColor"
                                                    />
                                                </svg>
                                                {{$jobData->vacancy}}
                                            </h3>
                                            <h3
                                                class="d-flex align-items-center salary-icon"
                                            >
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
                                                {{$jobData->salary}} Monthly
                                            </h3>
                                        </div>
                                        <p class="job-short-details">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($jobData->details), 200) }}
                                        </p>
                                        <div
                                            class="bottom-part d-flex align-items-center justify-content-between"
                                        >
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
                                                Deadline: {{ \Carbon\Carbon::parse($jobData->deadline)->format('d M Y') }}

                                            </div>
                                            <div class="apply-btn">
                                                <a href="{{ route('jobs.apply', $jobData->id) }}">Apply Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
					</div>
                    <div class="pagination-wrapper">
                        {{ $jobs->links('pagination::bootstrap-4') }}
                    </div>

                </div>
			</div>
		</div>
	</div>
</div>
@endsection
