@extends('frontend.app')
@section('content')
<div class="job-details-section-area section-padding">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="job-details-hero">
					<div class="job-details-hero-content text-center">
						<h1>Contact Us</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="contact-form-section section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-12">
				<div class="contact-info">
					<h2>Contact Information</h2>
					<p>Feel free to contact us for any query. We are always here to help you.</p>
					<ul>
						<li>
							<i class="fa fa-map-marker"></i>
							<p>Address: 1234, New York, USA</p>
						</li>
						<li>
							<i class="fa fa-phone"></i>
							<p>Phone: +1234567890</p>
						</li>
						<li>
							<i class="fa fa-envelope"></i>
							<p>Email: infp@jobhubglobal.com
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-6 col-12">
				<div class="contact-form-wrap">
					<h2>Send Us a Message</h2>
					<form>
						<div class="row">
							<div class="col-md-6 col-12">
								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" id="name" class="form-control" placeholder="Enter your name">
								</div>
							</div>
							<div class="col-md-6 col-12">
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" id="email" class="form-control" placeholder="Enter your email">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="subject">Subject</label>
							<input type="text" id="subject" class="form-control" placeholder="Enter your subject">
						</div>
						<div class="form-group
						">
							<label for="message">Message</label>
							<textarea id="message" class="form-control" placeholder="Enter your message"></textarea>
						</div>
						<div class="form-group">
							<button type="submit">Send Message</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection