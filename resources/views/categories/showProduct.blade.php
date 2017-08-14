@extends('layouts.app')

@section('content')

	<div class="product-wrapper clearfix">

		<div class="col-md-10 col-md-offset-1">
			
			<div class="product clearfix">
				@if (session('success'))
	                <div class="alert alert-success">
	                    {{ session('success') }}
	                </div>
	            @endif
	            @if ($errors->has('email'))
	                <div class="alert alert-danger">
	                    Email was not sent. {{ $errors->first('email') }}
	                </div>
	            @endif
				<div class="col-md-6">
					<div class="product-pictures clearfix">
						<div class="main-picture">
							@if(count($product->photos) > 0)
								@foreach($product->photos as $photo)
									<a href='#img{{$photo->id}}'><img class="center-photo" src="{{ url('uploads/products', $photo->name) }}"></a>
								@endforeach
							@else
								<img src="{{ url('img/Home_img2.png') }}">
							@endif
						</div>
						<div class="other-pictures">
							@if(count($product->photos) > 0)
								@foreach($product->photos as $photo)
									<div class="col-md-4">
										<div class="other-picture">
											<img src="{{ url('uploads/products', $photo->name) }}">
										</div>
									</div>
								@endforeach
							@endif
						</div>
						@if(count($product->photos) < 1)
							<div class="alert alert-info">{{ Lang::get('product.noPhoto') }}</div>
						@endif
					</div>
				</div>

				@foreach($product->photos as $photo)
					<a href="#_" class="lightbox" id="img{{ $photo->id }}">
						<img src="{{ url('uploads/products', $photo->name) }}">
					</a>
				@endforeach

				<div class="col-md-6">
					<div class="product-info">

						<div class="product-tags">
							<ul>
								<li><h2>K</h2></li>
								<li>{{ $category->name }}</li>
								<li>{{ $product->Tag->name }}</li>
							</ul>
						</div>

						<h1 class="product-name">{{ strtoupper($product->name) }}</h1>
						<h4 class="product-price">€ {{ $product->prijs }}</h4>

						<div class="product-colors">
							<h5>{{ Lang::get('product.colors') }}</h5>
							<ul>
								@foreach($product->colors as $color)
									<li>
										<div class="product-color" style="background-color: {{ $color->code }};"></div>
									</li>
								@endforeach
							</ul>
						</div>

						<div class="product-description">
							<h5>{{ Lang::get('product.description') }}</h5>
							{{ $product->kortebeschrijving }}
						</div>

					</div>
				</div>

				<div class="col-md-12">
					<div class="product-specifications">
						<h5>{{ Lang::get('product.specifications') }}</h5>
						<h6>Specificaties</h6>
						<ul>
							<li>{{ $product->uitleg }}</li>
						</ul>
					</div>
				</div>

			</div>

			<div class="related-products clearfix">

				<h4>{{ Lang::get('product.related') }}</h4>
				@if(count($products) == 1)
					<div class="alert alert-info">{{ Lang::get('product.noRelated') }}</div>
				@endif
				@foreach($products as $relatedProduct)

					@if($product->id != $relatedProduct->id)
						<a href="{{ url('categories', [$category->url, 'product', $relatedProduct->link]) }}">
							<div class="col-md-3">
								<div class="related-product">
									<div class="related-product-picture">
										@if(count($relatedProduct->photos) < 1) <img src="{{ url('img/Home_img2.png') }}"> @else <img src="{{ url('uploads/products', $relatedProduct->photos[0]->name) }}"> @endif
									</div>
									<div class="product-name clearfix"> {{ $relatedProduct->name }}	<div class="pull-right"> €{{ $relatedProduct->prijs }} </div></div>
								</div>
							</div>
						</a>
					@endif
				@endforeach

			</div>

			<div class="product-FAQ-wrapper clearfix">
				<h4>{{ Lang::get('product.faq') }}</h4>
				@if(count($product->Faqs) == 0)
					<div class="alert alert-info">{{ Lang::get('product.noFaq') }}</div>
				@endif
				<div class="product-FAQs">
					<!--FAQS-->
					<!--FAQS-->
					<!--FAQS-->
					<!--FAQS-->
				</div>
				<div class="pull-right">
					<a href="{{ url('FAQ') }}">{{ Lang::get('product.more') }}</a>
				</div>
			</div>

			@include('inc.subscribe')

		</div>

	</div>

@endsection