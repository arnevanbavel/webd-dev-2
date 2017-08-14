@extends('layouts.app')

@section('content')
<div class="carousel-wrapper">

		<div class="slider-wrapper" id="slick1">
			<div class="header-photos">
				<div class="img-carousel"></div>
				<div class="img-carousel2"></div>
			</div>
		</div>
		<div class="slider-progress">
			<div class="progress"></div>
		</div>
	</div>
<div class="content-wrapper clearfix">

		<div class="col-md-10 col-md-offset-1">

			<div class="category-tags">
				<ul>
					<li><h1>K</h1></li>
					<li>{{ $category->name }}</li>
				</ul>
			</div>

			<h1>{{ strtoupper($category->name) }} ARTICLES</h1>
			<div class="toggle-button"><a class="toggle-category-filter">Filter</a></div>
			<form method="POST" action="{{ url('categories', [$category->url, 'search']) }}">
				{{ csrf_field() }}
				<div class="category-filter-wrapper clearfix">
					
					<div class="category-filter">
						<div class="filter-by-collection">
							<h4>By collection</h4>
							<ul>
								@foreach($tags as $tag)
									<li><input type="checkbox" @if($tagsExplode != "") @foreach($tagsExplode as $searchTag) @if($searchTag == $tag->id) checked @endif @endforeach @endif name="tags[]" value="{{ $tag->id }}">{{ $tag->name }}</li>
								@endforeach
							</ul>
						</div>
						<div class="filter-by-price">
							<h4>Price range</h4>

							<div id="slider" class="col-md-5"></div>
							<div class="min-search-range col-md-2 col-md-offset-1">
								<span class="input-symbol-euro"><input class="sliderValue form-control" data-index="0" value="8" type="number" name="minValue"></span>
							</div>
							<div class="seperator-search-range col-md-1">
								<p>-</p>
							</div>
							<div class="max-search-range col-md-2">
								<span class="input-symbol-euro"><input class="sliderValue form-control" data-index="1" value="499" type="number" name="maxValue"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="horizontal-divider"></div>
				<div class="relevance">
					<select name="sort">
						<option value="relevance" @if($sort != "" && $sort == 'relevance') selected  @endif>Sort by relevance</option>
						<option value="lowToHigh" @if($sort != "" && $sort == "lowToHigh") selected  @endif>Price: low to high</option>
						<option value="highToLow" @if($sort != "" && $sort == 'highToLow') selected  @endif>Price: high to low</option>
						<option value="latest" @if($sort != "" && $sort == 'latest') selected  @endif>Latest</option>
						<option value="oldest" @if($sort != "" && $sort == 'oldest') selected  @endif>Oldest</option>
					</select>

					<button type="submit" class="btn btn-filter">Filter</button>

					<span class="pull-right"><a href="{{ url('categories', $category->url) }}">Clear</a>{{ ucfirst($category->url) }} items: {{ $products->count() }} of {{ $products->total() }}</span>
				</div>
			</form>
			<div class="products clearfix">

				@if(count($products) < 1)
					<div class="alert alert-info">Er zijn nog geen producten voor deze categorie.</div>
				@endif
				@foreach($products as $product)
					<a href="{{ url('categories', [$category->url, 'product', $product->url]) }}">
						<div class="col-md-3">
							<div class="product">
								<div class="photo">
									@if(count($product->photos) > 0)
										@if(count($product->photos) > 1)
											<div class="product-count-photos"> {{ count($product->photos) }} </div>
										@endif
										<img src="{{ url('uploads/products', $product->photos[0]->name) }}">
									@else
										<img src="{{ url('img/Home_img2.png') }}">
									@endif
								</div>
								<div class="hot-item-info clearfix">
									<div class="pull-left">
										{{$product->name}}
									</div>
									<div class="pull-right">
										€{{$product->prijs}}
									</div>
								</div>
							</div>
						</div>
					</a>
				@endforeach
			</div>
			{{$products->links()}}
		</div>

	</div>
@endsection