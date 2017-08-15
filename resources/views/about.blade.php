@extends('layouts.app')

@section('content')

	<div class="about-wrapper">

		<div class="jumbotron">
		
		</div>

		<div class="about clearfix">

			<div class="col-md-10 col-md-offset-1">

				<div class="about-breadcrumb">
					<ul>
						<li><h3>K</h3></li>
						<li>about us</li>
					</ul>
				</div>
				@if (session('success'))
				    <div class="alert alert-success">
				        {{ session('success') }}
				    </div>
				@endif
				<div class="about-us clearfix">
					<h1>ABOUT US</h1>
					<div class="about-kowloon col-md-8">
						<h4>KOWLOON</h4>
						Pet Concept, active since 1998. Is developing, importing and exporting products for pets worldwide.<br><br>
						natus error sit voluptalem accusantium doloremque laudrantium, totam rem aperiam, caque ipsa quae ab ilo invetore verbalis et quasi achlecto beatac vitea sequi mesciunt.
					</div>

					<div class="about-contact-info col-md-4">
						<h4>CONTACT</h4>
						<ul>
							<li>Deckx Johan</li>
							<li>Bosdreef 7</li>
							<li>2200 Herentals</li>
						</ul>
					</div>
				</div>
				<div id="contact" class="contact clearfix">
					<h4>LEAVE US A MESSAGE</h4>
					<form method="POST" action="{{ url('about/send') }}" class="col-md-8">
						{{csrf_field()}}
						<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
							<label>E-mail</label>
							<input class="form-control" type="text" placeholder="name@domain.com" name="email" value="{{ old('email') }}">
							@if ($errors->has('email'))
								<span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
							@endif
						</div>
						<div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
							<label>Your message</label>
							<textarea class="form-control" rows="5" placeholder="Write your message here" name="text">{{ old('text') }}</textarea>
							@if ($errors->has('text'))
								<span class="help-block"><strong>{{ $errors->first('text') }}</strong></span>
							@endif
						</div>
						<div class="form-group">
							<button class="form-control">Send</button>
						</div>
					</form>
				</div>
				<div class="product-FAQ-wrapper clearfix">
					<h4>FREQUENTLY ASKED QUESTIONS</h4>
					@if(count($faqs) == 0)
						Er zijn geen FAQs voor dit product.
					@endif
					<div class="product-FAQs">
						@foreach($faqs as $faq)
							<div class="product-FAQ">
								<div class="product-question">
									<h5 class="FAQ-slide-toggle"><strong>{{ $faq->question }}</strong></h5>
								</div>
								<div class="product-answer">
									{{ $faq->answer }}
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>

	</div>

@endsection