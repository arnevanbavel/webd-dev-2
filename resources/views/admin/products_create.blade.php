@extends('layouts.app')

@section('content')

	<div class="dashboard-products-wrapper clearfix">

		<div class="dashboard-products col-md-10 col-md-offset-1">

			<h1>Nieuw product</h1> 

			<div class="new-product">

				<form method="POST" action="{{ url('/admin/product/create') }}" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						<label>Product naam</label>
						<input type="text" class="form-control" name="name" value="{{ old('name') }}">
						@if ($errors->has('name'))
							<span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('prijs') ? 'has-error' : '' }}">
						<label>Prijs</label>
						<input type="number" class="form-control" min="0" step="0.01" name="prijs" value="{{ old('prijs') }}">
						@if ($errors->has('prijs'))
							<span class="help-block"><strong>{{ $errors->first('prijs') }}</strong></span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('korteBeschrijving') ? 'has-error' : '' }}">
						<label>Beschrijving</label>
						<textarea class="form-control" name="korteBeschrijving" rows="5">{{ old('korteBeschrijving') }}</textarea>
						@if ($errors->has('korteBeschrijving'))
							<span class="help-block"><strong>{{ $errors->first('korteBeschrijving') }}</strong></span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('uitleg') ? 'has-error' : '' }}">
						<label>Specificaties</label>
						<textarea class="form-control" name="uitleg" rows="5">{{ old('uitleg') }}</textarea>
						@if ($errors->has('uitleg'))
							<span class="help-block"><strong>{{ $errors->first('uitleg') }}</strong></span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
						<label>Foto</label>
						<input type="file" class="form-control" name="photo[]" multiple>
						@if ($errors->has('photo'))
							<span class="help-block"><strong>{{ $errors->first('photo') }}</strong></span>
						@endif
					</div>
					<div class="form-group color-field {{ $errors->has('color_id') ? 'has-error' : '' }}">
						<label>Kleur</label>
						@foreach($colors as $color)
							<ul>
								<li>
									<input @if(old('color_id') != "") @foreach(old('color_id') as $colorId) @if($colorId == $color->id) checked @endif @endforeach @endif type="checkbox" id="color{{ $color->id }}" name="color_id[]" value="{{ $color->id }}"> <label for="color{{ $color->id }}">{{ $color->name }}</label>
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
								<option @if(old('tag_id') == $tag->id) selected @endif value="{{ $tag->id }}">{{ $tag->name }}</option>
							@endforeach
						</select>
						@if ($errors->has('tag_id'))
							<span class="help-block"><strong>{{ $errors->first('tag_id') }}</strong></span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
						<label>Categorie</label>
						<select class="form-control" name="category_id">
							@foreach($categories as $category)
								<option @if(old('category_id') == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
							@endforeach
						</select>
						@if ($errors->has('category_id'))
							<span class="help-block"><strong>{{ $errors->first('category_id') }}</strong></span>
						@endif
					</div>


					<button type="submit" class="btn btn-primary">Verstuur</button>

				</form>

			</div>

		</div>

	</div>

@endsection