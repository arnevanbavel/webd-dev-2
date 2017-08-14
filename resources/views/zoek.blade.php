@extends('layouts.app')

@section('content')

	<div class="search-wrapper clearfix">

		<div class="search col-md-10 col-md-offset-1">	
			<form method="POST" action="{{ url('search') }}">
				{{ csrf_field() }}		
				<div class="advanced-search-filter-wrapper">
					<h3>Advanced filter <a class="toggle-search-filter">Toggle</a></h3>

					<div class="advanced-search-filter clearfix">
						<div class="category-search-filter col-md-6">
							<h4>Category</h4>
							<ul>
								@foreach($categories as $category)

									<li class="col-md-3">
										
										<input type="checkbox" @if($searchCategoriesExplode != "") @foreach($searchCategoriesExplode as $searchCategory) @if($searchCategory == $category->id) checked @endif @endforeach @endif value="{{ $category->id }}" name="categories[]">
										{{ $category->name }}
										
									</li>

								@endforeach
							</ul>
						</div>

						<div class="price-search-filter col-md-6">
							<h4>Price range</h4>
						    <div id="slider"></div>
						    <div class="min-search-range col-md-5">
						    	<span class="input-symbol-euro"><input class="sliderValue value1 form-control" data-index="0" value="@if(isset($search)){{$minValue}}@else{{8}}@endif" type="number" name="minValue"></span>
						    </div>
						    <div class="seperator-search-range col-md-2">
						    	<p>-</p>
						    </div>
						    <div class="max-search-range col-md-5">
						    	<span class="input-symbol-euro"><input class="sliderValue value2 form-control" data-index="1" value="@if(isset($search)){{$maxValue}}@else{{499}}@endif" type="number" name="maxValue"></span>
						    </div>
						</div>
					</div>
				</div>

				<div class="advanced-search">						
					<input type="text" name="keyword" @if(isset($search)) value="{{ $search }}" @endif placeholder="Just start typing and hit enter to search">
					<button type="submit" style="display:none;"></button>
				</div>
			</form>
				<div class="search-results">
					<a class="clear-advanced-search pull-right" href="{{ url('search') }}">Clear</a>
					@if(isset($search))

						{{$products->total()}} results for the word {{$search}}

					@else

					<div class="customer-service">
						<p>Don't find what you're looking for?</p>
						<p>You can always contact our <a href="{{ url('about#contact') }}">customer service</a>. We're happy to help you!</p>
					</div>

					@endif
				</div>
				
			@if(isset($search))

				<div class="searched-products">
			
					@foreach($products as $product)
						<a href="{{ url('categories', [$product->categorie->url, 'product', $product->link]) }}">
							<div class="searched-product">
								<h4>{{$product->name}}</h4>
								<h5>{{ $product->categorie->name }}</h5>
								<h6>€{{ $product->prijs }}</h6>
								{{$product->korteBeschrijving}}
							</div>
						</a>
					@endforeach
				</div>
				{{ $products->links() }}
			@endif
			

		</div>

	</div>

@endsection