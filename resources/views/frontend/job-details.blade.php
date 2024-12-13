@extends('frontend.app')
@section('content')
<div class="job-details-section-area section-padding">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="job-details-hero">
					<div class="job-details-hero-content text-center">
						<h1>Job Details</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="job-details-wrapper section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-7 col-12 order-2 order-md-1">
				<div class="job-details-content">
					<div class="details-top d-flex flex-column flex-md-row align-items-center">
						<div class="job-details-company-logo">
							<img src="{{asset('frontend/images/company-logo.png')}}" alt="Company Logo">
						</div>
						<div class="job-details-company-info">
							<h2>Frontend Developer</h2>
							<ul>
								<li>
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
									Mirpur 10, Dhaka
								</li>
								<li>
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
									07 May, 2021
								</li>
							</ul>
						</div>
					</div>
					<div class="details-area">
						<h2>কাজের বিবরণ</h2>
						<ul>
							<li>কাজের দায়িত্বসমূহ</li>
							<li>ডিজাইন ও নির্দেশনা অনুযায়ী গার্মেন্ট/পণ্য স্যাম্পল তৈরি করা।</li>
							<li>সঠিক স্যাম্পল তৈরিতে ডিজাইন ও প্রোডাকশন টিমের সাথে কাজ করা।</li>
							<li>সেলাই মেশিন এবং অন্যান্য প্রাসঙ্গিক সরঞ্জাম পরিচালনা ও রক্ষণাবেক্ষণ।</li>
							<li>স্যাম্পলের গুণমান পরীক্ষা এবং প্রয়োজনীয় সংশোধনী করা।</li>
							<li>কাজের অগ্রগতি রেকর্ড করা এবং সুপারভাইজারকে রিপোর্ট করা।</li>
						</ul>
						<p>আপনার সিভি এবং পূর্বের কাজের নমুনা [ইমেইল ঠিকানা]-এ পাঠান বা আমাদের অফিসে সরাসরি যোগাযোগ করুন: [কোম্পানির ঠিকানা]।</p>
					</div>
					<div class="job-apply-btn">
						<a href="#">Apply Now</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-5 col-12 order-1 order-md-2">
				<div class="job-details-summery">
					<h2>কাজের সারাংশ</h2>
					<ul>
						<li><span>প্রকাশের তারিখ:</span> ২৩ নভেম্বর ২০২৪</li>
						<li><span>শূন্যপদ:</span> ৪</li>
						<li><span>বেতন:</span> ৫৪৬৫০</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection