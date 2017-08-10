@extends('layouts.app')

@section('content')

	<div class="dashboard-products-wrapper clearfix">

		<div class="dashboard-products col-md-10 col-md-offset-1">
			@include('inc.message')
			
			<h1>Products <a class="btn btn-primary" href="{{ url('admin/product/create') }}">Maak een nieuw product aan</a></h1>

			@if($products->count() > 0)
				<div class="products-table">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Naam</th>
								<th>Prijs</th>
								<th>Descriptie</th>
								<th>Kleur</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($products as $product)
								@if(count($product->hotItems) < 1)
									<tr>
										<td>{{ $product->name }}</td>
										<td>€{{ $product->price }}</td>
										<td>{{ $product->description }}</td>
										<td>
											<ul>
												<li> @foreach($product->colors as $color) {{ $color->name }} @endforeach </li>
											</ul>
										</td>
										<td>
											<ul>
												<li>
													<a href="{{ url('admindashboard/product/edit', $product->url) }}" class="btn btn-default" aria-label="Left Align">
													  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
													</a>
												</li>
												<li>
													<form method="POST" action="{{ url('admindashboard/product/delete', $product->url) }}">
														{{ csrf_field() }}
														<input type="hidden" name="_method" value="DELETE" />
														<button type="submit" class="btn btn-danger" aria-label="Left Align">
														  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
														</button>
													</form>
												</li>
												<li>
													<a href="{{ url('admindashboard/product/faq/edit', $product->url) }}" class="btn btn-default" aria-label="Left Align">
													  <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
													</a>
												</li>
											</ul>
										</td>
									</tr>
								@endif
							@endforeach
						</tbody>

					</table>
				</div>
			@else
				<h1>Er zijn nog geen producten</h1>
			@endif
		</div>

	</div>

@endsection