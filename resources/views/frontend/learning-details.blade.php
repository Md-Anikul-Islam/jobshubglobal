@extends('frontend.app')
@section('content')
<div class="learning-details-section-area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="learning-details-hero-content position-relative">
					<h4>Training / Course</h4>
					<h1>Training Name</h1>
					<ul>
						<li>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
								<path d="M12.6667 4.5H3.33333C2.59695 4.5 2 5.09695 2 5.83333V13.1667C2 13.903 2.59695 14.5 3.33333 14.5H12.6667C13.403 14.5 14 13.903 14 13.1667V5.83333C14 5.09695 13.403 4.5 12.6667 4.5Z" stroke="currentColor"/>
								<path d="M2 7.16667C2 5.90933 2 5.28133 2.39067 4.89067C2.78133 4.5 3.40933 4.5 4.66667 4.5H11.3333C12.5907 4.5 13.2187 4.5 13.6093 4.89067C14 5.28133 14 5.90933 14 7.16667H2Z" fill="currentColor"/>
								<path d="M4.66699 2.5V4.5M11.3337 2.5V4.5" stroke="currentColor" stroke-linecap="round"/>
							</svg>
							15 December 2024
						</li>
						<li>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
								<path d="M10.5 9.16667C10.5 9.03406 10.4473 8.90689 10.3536 8.81312C10.2598 8.71935 10.1326 8.66667 10 8.66667H6C5.86739 8.66667 5.74022 8.71935 5.64645 8.81312C5.55268 8.90689 5.5 9.03406 5.5 9.16667C5.5 9.29928 5.55268 9.42646 5.64645 9.52022C5.74022 9.61399 5.86739 9.66667 6 9.66667H10C10.1326 9.66667 10.2598 9.61399 10.3536 9.52022C10.4473 9.42646 10.5 9.29928 10.5 9.16667ZM10.5 11.8333C10.5 11.7007 10.4473 11.5736 10.3536 11.4798C10.2598 11.386 10.1326 11.3333 10 11.3333H6C5.86739 11.3333 5.74022 11.386 5.64645 11.4798C5.55268 11.5736 5.5 11.7007 5.5 11.8333C5.5 11.9659 5.55268 12.0931 5.64645 12.1869C5.74022 12.2807 5.86739 12.3333 6 12.3333H10C10.1326 12.3333 10.2598 12.2807 10.3536 12.1869C10.4473 12.0931 10.5 11.9659 10.5 11.8333Z" fill="currentColor"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M4.66634 2C4.18011 2 3.7138 2.19315 3.36998 2.53697C3.02616 2.88079 2.83301 3.3471 2.83301 3.83333V13.1667C2.83301 13.6529 3.02616 14.1192 3.36998 14.463C3.7138 14.8068 4.18011 15 4.66634 15H11.333C11.8192 15 12.2856 14.8068 12.6294 14.463C12.9732 14.1192 13.1663 13.6529 13.1663 13.1667V5.812C13.1663 5.558 13.0837 5.31133 12.9303 5.10867L10.9317 2.46333C10.8229 2.31941 10.6823 2.20267 10.5208 2.12227C10.3593 2.04188 10.1814 2.00002 10.001 2H4.66634ZM3.83301 3.83333C3.83301 3.37333 4.20634 3 4.66634 3H9.49967V5.93133C9.49967 6.20733 9.72367 6.43133 9.99967 6.43133H12.1663V13.1667C12.1663 13.6267 11.793 14 11.333 14H4.66634C4.20634 14 3.83301 13.6267 3.83301 13.1667V3.83333Z" fill="currentColor"/>
							</svg>
							No of Classes
						</li>
						<li>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M8.00033 15.8333C12.0503 15.8333 15.3337 12.55 15.3337 8.50001C15.3337 4.45001 12.0503 1.16667 8.00033 1.16667C3.95033 1.16667 0.666992 4.45001 0.666992 8.50001C0.666992 12.55 3.95033 15.8333 8.00033 15.8333ZM8.00033 14.5C7.21239 14.5 6.43218 14.3448 5.70423 14.0433C4.97627 13.7418 4.31484 13.2998 3.75768 12.7426C3.20053 12.1855 2.75858 11.5241 2.45705 10.7961C2.15552 10.0682 2.00033 9.28794 2.00033 8.50001C2.00033 7.71207 2.15552 6.93186 2.45705 6.2039C2.75858 5.47595 3.20053 4.81452 3.75768 4.25736C4.31484 3.70021 4.97627 3.25826 5.70423 2.95673C6.43218 2.6552 7.21239 2.50001 8.00033 2.50001C9.59162 2.50001 11.1177 3.13215 12.243 4.25736C13.3682 5.38258 14.0003 6.90871 14.0003 8.50001C14.0003 10.0913 13.3682 11.6174 12.243 12.7426C11.1177 13.8679 9.59162 14.5 8.00033 14.5ZM8.66699 4.50001V8.50001H7.33366V4.50001H8.66699Z" fill="currentColor"/>
							</svg>
							Duration
						</li>
						<li>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
								<path d="M8 5.16667V8.5H11.3333M8 14.5C7.21207 14.5 6.43185 14.3448 5.7039 14.0433C4.97595 13.7417 4.31451 13.2998 3.75736 12.7426C3.20021 12.1855 2.75825 11.5241 2.45672 10.7961C2.15519 10.0681 2 9.28793 2 8.5C2 7.71207 2.15519 6.93185 2.45672 6.2039C2.75825 5.47595 3.20021 4.81451 3.75736 4.25736C4.31451 3.70021 4.97595 3.25825 5.7039 2.95672C6.43185 2.65519 7.21207 2.5 8 2.5C9.5913 2.5 11.1174 3.13214 12.2426 4.25736C13.3679 5.38258 14 6.9087 14 8.5C14 10.0913 13.3679 11.6174 12.2426 12.7426C11.1174 13.8679 9.5913 14.5 8 14.5Z" stroke="currentColor" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
							Class Schedule
						</li>
						<li>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
								<path d="M9.5 7.5C9.5 7.10218 9.34196 6.72064 9.06066 6.43934C8.77936 6.15804 8.39782 6 8 6C7.60218 6 7.22064 6.15804 6.93934 6.43934C6.65804 6.72064 6.5 7.10218 6.5 7.5C6.5 7.89782 6.65804 8.27936 6.93934 8.56066C7.22064 8.84196 7.60218 9 8 9C8.39782 9 8.77936 8.84196 9.06066 8.56066C9.34196 8.27936 9.5 7.89782 9.5 7.5ZM14 7.5C14 10.374 10.903 13.516 9.159 15.058C8.84011 15.3428 8.42754 15.5002 8 15.5002C7.57246 15.5002 7.15989 15.3428 6.841 15.058C5.097 13.516 2 10.374 2 7.5C2 6.71207 2.15519 5.93185 2.45672 5.2039C2.75825 4.47595 3.20021 3.81451 3.75736 3.25736C4.31451 2.70021 4.97595 2.25825 5.7039 1.95672C6.43185 1.65519 7.21207 1.5 8 1.5C8.78793 1.5 9.56815 1.65519 10.2961 1.95672C11.0241 2.25825 11.6855 2.70021 12.2426 3.25736C12.7998 3.81451 13.2417 4.47595 13.5433 5.2039C13.8448 5.93185 14 6.71207 14 7.5ZM13 7.5C13 6.17392 12.4732 4.90215 11.5355 3.96447C10.5979 3.02678 9.32608 2.5 8 2.5C6.67392 2.5 5.40215 3.02678 4.46447 3.96447C3.52678 4.90215 3 6.17392 3 7.5C3 8.608 3.615 9.895 4.57 11.183C5.504 12.441 6.657 13.56 7.503 14.309C7.63912 14.4324 7.81628 14.5007 8 14.5007C8.18372 14.5007 8.36088 14.4324 8.497 14.309C9.343 13.56 10.497 12.442 11.43 11.183C12.385 9.895 13 8.608 13 7.5Z" fill="currentColor"/>
							</svg>
							Venue
						</li>
					</ul>
					<div class="learning-details-pricing">
						<h2>Price: TK 5,000</h2>
						<p>(5% VAT is applicable in every purchase)</p>
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
					<p>Lorem ipsum dolor sit amet consectetur. Duis vitae eu aliquam in quis quis sed et. Hendrerit iaculis orci faucibus sagittis suspendisse mauris magna vel massa. Erat nunc odio feugiat quis in lacus ut porttitor accumsan. In fames augue ultricies amet amet in ac nisl porta. Semper tellus risus enim nunc id. Sem pulvinar malesuada viverra sit enim. Venenatis morbi nisl aliquam tempor scelerisque ac consequat faucs consectetur. Consequat gravida convallis sit sed morbi a. Sit enim eget viverra in viverra ultricies lorem. Lorem ipsum dolor sit amet consectetur. Duis vitae eu aliquam in quis quis sed et. Hendrerit iaculis orci faucibus sagittis suspendisse mauris magna vel massa. Erat nunc odio feugiat quis in lacus ut porttitor accumsan. In fames augue ultricies amet amet in ac nisl porta. Semper tellus risus enim nunc id. Sem pulvinar malesuada viverra sit enim. Venenatis morbi nisl aliquam tempor scelerisque ac consequat faus consectetur. Consequat gravida convallis sit sed morbi a. Sit enim eget viverra in viverra ultricies lorem. Lorem ipsum dolor sit amet consectetur. Duis vitae eu aliquam in quis quis sed et. Hendrerit iaculis orci faucibus sagittis suspendisse mauris magna vel massa. Erat nunc odio feugiat quis </p>
					<h2>Methodology</h2>
					<p>Lorem ipsum dolor sit amet consectetur. </p>
					<h2>Context of Training</h2>
					<p>Lorem ipsum dolor sit amet consectetur. </p>
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
			<div class="col-lg-3 col-md-6 col-12">
				<div class="learning-card">
					<div class="learning-card-image">
						<a href="{{route('details')}}">
							<img src="frontend/images/mission.png" alt="">
						</a>
					</div>
					<div class="learning-card-content">
						<div class="top">
							<a href="{{route('details')}}">
								<h3>Training or Event Name</h3>
							</a>
							<p>Lorem ipsum dolor sit amet consectetur. Non pellentesque id est turpis feugiat porta faucibus diam.</p>
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
								20 Dec 2024 | 12:00 Pm
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
								Price 1111 Tk + VAT
							</div>
						</div>
					</div>
					<div class="register-now">
						<a href="#">Register</a>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-12">
				<div class="learning-card">
					<div class="learning-card-image">
						<a href="#">
							<img src="frontend/images/mission.png" alt="">
						</a>
					</div>
					<div class="learning-card-content">
						<div class="top">
							<a href="#">
								<h3>Training or Event Name</h3>
							</a>
							<p>Lorem ipsum dolor sit amet consectetur. Non pellentesque id est turpis feugiat porta faucibus diam.</p>
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
								20 Dec 2024 | 12:00 Pm
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
								Price 1111 Tk + VAT
							</div>
						</div>
					</div>
					<div class="register-now">
						<a href="#">Register</a>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-12">
				<div class="learning-card">
					<div class="learning-card-image">
						<a href="#">
							<img src="frontend/images/mission.png" alt="">
						</a>
					</div>
					<div class="learning-card-content">
						<div class="top">
							<a href="#">
								<h3>Training or Event Name</h3>
							</a>
							<p>Lorem ipsum dolor sit amet consectetur. Non pellentesque id est turpis feugiat porta faucibus diam.</p>
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
								20 Dec 2024 | 12:00 Pm
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
								Price 1111 Tk + VAT
							</div>
						</div>
					</div>
					<div class="register-now">
						<a href="#">Register</a>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-12">
				<div class="learning-card">
					<div class="learning-card-image">
						<a href="#">
							<img src="frontend/images/mission.png" alt="">
						</a>
					</div>
					<div class="learning-card-content">
						<div class="top">
							<a href="#">
								<h3>Training or Event Name</h3>
							</a>
							<p>Lorem ipsum dolor sit amet consectetur. Non pellentesque id est turpis feugiat porta faucibus diam.</p>
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
								20 Dec 2024 | 12:00 Pm
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
								Price 1111 Tk + VAT
							</div>
						</div>
					</div>
					<div class="register-now">
						<a href="#">Register</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection