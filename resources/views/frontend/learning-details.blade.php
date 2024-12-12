@extends('frontend.app')
@section('content')
<div class="learning-details-section-area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="learning-details-hero-content position-relative">
					<h4>Training / Course</h4>
					<h1>{{$training->title}}</h1>
					<ul>
						<li>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
								<path d="M12.6667 4.5H3.33333C2.59695 4.5 2 5.09695 2 5.83333V13.1667C2 13.903 2.59695 14.5 3.33333 14.5H12.6667C13.403 14.5 14 13.903 14 13.1667V5.83333C14 5.09695 13.403 4.5 12.6667 4.5Z" stroke="currentColor"/>
								<path d="M2 7.16667C2 5.90933 2 5.28133 2.39067 4.89067C2.78133 4.5 3.40933 4.5 4.66667 4.5H11.3333C12.5907 4.5 13.2187 4.5 13.6093 4.89067C14 5.28133 14 5.90933 14 7.16667H2Z" fill="currentColor"/>
								<path d="M4.66699 2.5V4.5M11.3337 2.5V4.5" stroke="currentColor" stroke-linecap="round"/>
							</svg>
                            {{ \Carbon\Carbon::parse($training->training_date)->format('d M Y') }}
						</li>
						<li>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M8.00033 15.8333C12.0503 15.8333 15.3337 12.55 15.3337 8.50001C15.3337 4.45001 12.0503 1.16667 8.00033 1.16667C3.95033 1.16667 0.666992 4.45001 0.666992 8.50001C0.666992 12.55 3.95033 15.8333 8.00033 15.8333ZM8.00033 14.5C7.21239 14.5 6.43218 14.3448 5.70423 14.0433C4.97627 13.7418 4.31484 13.2998 3.75768 12.7426C3.20053 12.1855 2.75858 11.5241 2.45705 10.7961C2.15552 10.0682 2.00033 9.28794 2.00033 8.50001C2.00033 7.71207 2.15552 6.93186 2.45705 6.2039C2.75858 5.47595 3.20053 4.81452 3.75768 4.25736C4.31484 3.70021 4.97627 3.25826 5.70423 2.95673C6.43218 2.6552 7.21239 2.50001 8.00033 2.50001C9.59162 2.50001 11.1177 3.13215 12.243 4.25736C13.3682 5.38258 14.0003 6.90871 14.0003 8.50001C14.0003 10.0913 13.3682 11.6174 12.243 12.7426C11.1177 13.8679 9.59162 14.5 8.00033 14.5ZM8.66699 4.50001V8.50001H7.33366V4.50001H8.66699Z" fill="currentColor"/>
							</svg>
                            {{ \Carbon\Carbon::parse($training->training_time)->format('h:i A') }}
						</li>
						<li>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
								<path d="M8 5.16667V8.5H11.3333M8 14.5C7.21207 14.5 6.43185 14.3448 5.7039 14.0433C4.97595 13.7417 4.31451 13.2998 3.75736 12.7426C3.20021 12.1855 2.75825 11.5241 2.45672 10.7961C2.15519 10.0681 2 9.28793 2 8.5C2 7.71207 2.15519 6.93185 2.45672 6.2039C2.75825 5.47595 3.20021 4.81451 3.75736 4.25736C4.31451 3.70021 4.97595 3.25825 5.7039 2.95672C6.43185 2.65519 7.21207 2.5 8 2.5C9.5913 2.5 11.1174 3.13214 12.2426 4.25736C13.3679 5.38258 14 6.9087 14 8.5C14 10.0913 13.3679 11.6174 12.2426 12.7426C11.1174 13.8679 9.5913 14.5 8 14.5Z" stroke="currentColor" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
                            {{$training->training_duration}} hr
						</li>
					</ul>
					<div class="learning-details-pricing">
						<h2>Price: TK  {{$training->training_fee}}</h2>
						<a href="#">Register</a>
						<div class="contact-details">
							<div class="contact-item">
								<h3>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M20.0002 10.999H22.0002C22.0002 5.869 18.1272 2 12.9902 2V4C17.0522 4 20.0002 6.943 20.0002 10.999Z" fill="#388EA9"/>
										<path d="M13.0003 7.99999C15.1033 7.99999 16.0003 8.89699 16.0003 11H18.0003C18.0003 7.77499 16.2253 5.99999 13.0003 5.99999V7.99999ZM16.4223 13.443C16.2302 13.2681 15.9777 13.1748 15.7181 13.1828C15.4585 13.1909 15.2122 13.2996 15.0313 13.486L12.6383 15.947C12.0623 15.837 10.9043 15.476 9.71228 14.287C8.52028 13.094 8.15928 11.933 8.05228 11.361L10.5113 8.96699C10.6977 8.78612 10.8064 8.53982 10.8144 8.2802C10.8225 8.02059 10.7292 7.76804 10.5543 7.57599L6.85928 3.51299C6.68432 3.32035 6.44116 3.2035 6.18143 3.18725C5.92171 3.17101 5.66588 3.25665 5.46828 3.42599L3.29828 5.28699C3.12539 5.46051 3.0222 5.69145 3.00828 5.93599C2.99328 6.18599 2.70728 12.108 7.29928 16.702C11.3053 20.707 16.3233 21 17.7053 21C17.9073 21 18.0313 20.994 18.0643 20.992C18.3086 20.9776 18.5392 20.874 18.7123 20.701L20.5723 18.53C20.7417 18.3325 20.8276 18.0768 20.8115 17.817C20.7954 17.5573 20.6788 17.3141 20.4863 17.139L16.4223 13.443Z" fill="#388EA9"/>
									</svg>
									Contact
								</h3>
								<h3>0177777777, 01726463655</h3>
							</div>
							<div class="contact-item">
								<h3>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M20 4H4C2.9 4 2.01 4.9 2.01 6L2 18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6C22 4.9 21.1 4 20 4ZM20 8L12 13L4 8V6L12 11L20 6V8Z" fill="#388EA9"/>
									</svg>
									Email
								</h3>
								<h3>info@jobshubglobal.com</h3>
							</div>
						</div>
					</div>
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
					<h2>Introduction</h2>
					<p>{!! $training->details !!}</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Related Traning -->
<div class="related-traning-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="related-content-heading">
					<h2>Smilar Traning</h2>
				</div>
			</div>
		</div>
		<div class="row">
            @foreach($trainingAll as $trainingData)
            <div class="col-lg-3 col-md-6 col-12">
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
</div>
@endsection
