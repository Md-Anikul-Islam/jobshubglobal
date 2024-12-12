
@php
    $sliders = DB::table('sliders')->get();
@endphp
<div class="hero-section-slider position-relative">
    <div class="swiper heroSlider">
        <div class="swiper-wrapper">
            @foreach ($sliders as $slider)
                <div class="swiper-slide">
                    <div class="slider-image slider-bg-image" style="background-image: url('{{asset('images/slider/'. $slider->image )}}')">
						<div class="container">
							<div class="slider-content">
                                <h2>{{$slider->title}}</h2>
								<p>
                                    {!! $slider->details  !!}
								</p>
							</div>
						</div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <div class="container">
        <div class="hero-container-wrapper">
            <div class="hero-content">
                <form class="find-a-jobs-wrap" method="GET" action="{{ route('all.jobs') }}">
                    <div class="input-group search-jobs">
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
                            name="job_title"
                            class="form-control"
                            placeholder="Job Title"
                            value="{{ request('job_title') }}"
                        />
                    </div>
                    <button type="submit">Find Job</button>
                </form>
            </div>

        </div>
        <div class="jobs-information">
            <div class="info-card">
                <h2><span class="number">{{$jobVacancy}}</span></h2>
                <h4>Vacancies</h4>
            </div>
            <div class="info-card">
                <h2><span class="number">{{$company}}</span>+</h2>
                <h4>Company</h4>
            </div>
            <div class="info-card">
                <h2><span class="number">{{$jobTotal}}</span>+</h2>
                <h4>Live Jobs</h4>
            </div>
        </div>
    </div>
</div>

