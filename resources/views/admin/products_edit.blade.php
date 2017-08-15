@extends('layouts.app')

@section('content')

	<div class="dashboard-products-wrapper clearfix">

		<div class="dashboard-products col-md-10 col-md-offset-1">

			<h1>Wijzig {{ $product->name }}</h1> 

			<div class="new-product">

				<form method="POST" action="{{ url('admin/product/edit', $product->link) }}" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						<label>Product naam</label>
						<input type="text" class="form-control" name="name" value="{{ $product->name }}">
						@if ($errors->has('name'))
							<span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('prijs') ? 'has-error' : '' }}">
						<label>Prijs</label>
						<input type="number" class="form-control" min="0" step="0.01" name="prijs" value="{{ $product->prijs }}">
						@if ($errors->has('prijs'))
							<span class="help-block"><strong>{{ $errors->first('prijs') }}</strong></span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('korteBeschrijving') ? 'has-error' : '' }}">
						<label>Descriptie</label>
						<textarea class="form-control" name="korteBeschrijving" rows="5">{{ $product->korteBeschrijving }}</textarea>
						@if ($errors->has('korteBeschrijving'))
							<span class="help-block"><strong>{{ $errors->first('korteBeschrijving') }}</strong></span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('uitleg') ? 'has-error' : '' }}">
						<label>Technische tekst</label>
						<textarea class="form-control" name="uitleg" rows="5">{{ $product->uitleg }}</textarea>
						@if ($errors->has('uitleg'))
							<span class="help-block"><strong>{{ $errors->first('uitleg') }}</strong></span>
						@endif
					</div>
					<div class="form-group color-field {{ $errors->has('color_id') ? 'has-error' : '' }}">
						<label>Kleur</label>
						@foreach($colors as $color)
							<ul>
								<li>
									<input type="checkbox" name="color_id[]" value="{{ $color->id }}" @foreach($product->colors as $productColor) @if($color->id == $productColor->id) checked @endif @endforeach>{{ $color->name }}</option>
								</li>
							</ul>
						@endforeach
						@if ($errors->has('color_id'))
							<span class="help-block"><strong>{{ $errors->first('color_id') }}</strong></span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('tag_id') ? 'has-error' : '' }}">
						<label>Tag</label>
						<select class="form-control" name="tag_id">
							@foreach($tags as $tag)
								<option @if($product->tag_id == $tag->id) selected @endif value="{{ $tag->id }}">{{ $tag->name }}</option>
							@endforeach
						</select>
						@if ($errors->has('tag_id'))
							<span class="help-block"><strong>{{ $errors->first('tag_id') }}</strong></span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('categorie_id') ? 'has-error' : '' }}">
						<label>Categorie</label>
						<select class="form-control" name="categorie_id">
							@foreach($categories as $category)
								<option @if($product->categorie_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
							@endforeach
						</select>
						@if ($errors->has('categorie_id'))
							<span class="help-block"><strong>{{ $errors->first('categorie_id') }}</strong></span>
						@endif
					</div>
					<div class="form-group clearfix">
						<label>Foto's</label>
						<input type="file" class="form-control" name="photo[]" multiple>
						@foreach($product->photos as $photo)
							<div class="col-md-3">
								<div class="photo">
									<img src="{{ url('uploads/products', $photo->name) }}">
								</div>
								<input type="checkbox" id="{{ $photo->id }}" value="{{ $photo->id }}" name="deletePhoto[]"> <label for="{{ $photo->id }}">Delete</label>
							</div>
						@endforeach
					</div>
					<div class="form-group {{ $errors->has('place') ? 'has-error' : '' }}">
						<label>Plaats</label>
						<select name="place" class="form-control">
							@if(count($product->hotItems) < 1)<option value="4">Niet in hot item lijst steken.</option>@endif
							<option @if($product->id == $hotItems[0]->product_id) selected @endif value="1">1: @if($hotItems[0] != null) {{ $hotItems[0]->Product->name }} @else geen hot item @endif</option>
							<option @if($product->id == $hotItems[1]->product_id) selected @endif value="2">2: @if($hotItems[1] != null) {{ $hotItems[1]->Product->name }} @else geen hot item @endif</option>
							<option @if($product->id == $hotItems[2]->product_id) selected @endif value="3">3: @if($hotItems[2] != null) {{ $hotItems[2]->Product->name }} @else geen hot item @endif</option>
							<option @if($product->id == $hotItems[3]->product_id) selected @endif value="4">4: @if($hotItems[3] != null) {{ $hotItems[3]->Product->name }} @else geen hot item @endif</option>
						</select>
						@if ($errors->has('place'))
							<span class="help-block"><strong>{{ $errors->first('place') }}</strong></span>
						@endif
					</div>
					<button type="submit" class="btn btn-primary">Verstuur</button>

				</form>

			</div>

		</div>

	</div>

@endsection