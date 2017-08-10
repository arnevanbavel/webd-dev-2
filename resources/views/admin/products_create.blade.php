@extends('layouts.app')

@section('content')

	<div class="dashboard-products-wrapper clearfix">

		<div class="dashboard-products col-md-10 col-md-offset-1">

			<h1>Nieuw product</h1> 

			<div class="new-product">

				<form method="POST" action="{{ url('admindashboard/product/new') }}" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						<label>Product naam</label>
						<input type="text" class="form-control" name="name" value="{{ old('name') }}">
						@if ($errors->has('name'))
							<span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
						<label>Prijs</label>
						<input type="number" class="form-control" min="0" step="0.01" name="price" value="{{ old('price') }}">
						@if ($errors->has('price'))
							<span class="help-block"><strong>{{ $errors->first('price') }}</strong></span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
						<label>Descriptie</label>
						<textarea class="form-control" name="description" rows="5">{{ old('description') }}</textarea>
						@if ($errors->has('description'))
							<span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('technicalText') ? 'has-error' : '' }}">
						<label>Technische tekst</label>
						<textarea class="form-control" name="technicalText" rows="5">{{ old('technicalText') }}</textarea>
						@if ($errors->has('technicalText'))
							<span class="help-block"><strong>{{ $errors->first('technicalText') }}</strong></span>
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
						<label>Categorie</label>
						<select class="form-control" name="tag_id">
							@foreach($tags as $tag)
								<option @if(old('tag_id') == $tag->id) selected @endif value="{{ $tag->id }}">{{ $tag->displayName }}</option>
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