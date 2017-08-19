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
								<th>Id</th>
								<th>Naam</th>
								<th>Prijs</th>
								<th>Korte Beschrijving</th>
								<th>Uitleg</th>
								<th>Kleur</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($products as $product)
								@if(count($product->hotItems) < 1)
									<tr>
										<td>{{ $product->id }}</td>
										<td>{{ $product->name }}</td>
										<td>€{{ $product->prijs }}</td>
										<td>{{ $product->korteBeschrijving }}</td>
										<td>{{ $product->uitleg }}</td>
										<td>
											<ul>
												<li> @foreach($product->colors as $color) {{ $color->name }} @endforeach </li>
											</ul>
										</td>
										<td>
											<ul>
												<li>
													<a href="{{ url('admin/product/edit', $product->link) }}" >
													  Edit
													</a>
												</li>
												<li>
													<form method="POST" action="{{ url('admin/product/delete', $product->link) }}">
														{{ csrf_field() }}
														<input type="hidden" name="_method" value="DELETE" />
														<button type="submit" class="btn btn-danger not-100 delete" >
														  Delete
														</button>
													</form>
												</li>
												<li>
													<a href="{{ url('admin/product/faq/edit', $product->link) }}" >
													  Edit FAQ
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
			<h1>Hot products</h1>

			<div class="hotproducts-table">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Place</th>
							<th>Naam</th>
							<th>Prijs</th>
							<th>Korte Beschrijving</th>
							<th>Technical text</th>
							<th>Kleur</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($hotItems as $hotItem)
							<tr>
								<td>{{ $hotItem->place }}</td>
								<td>{{ $hotItem->product->name }}</td>
								<td>€{{ $hotItem->product->prijs }}</td>
								<td>{{ $hotItem->product->korteBeschrijving }}</td>
								<td>{{ $hotItem->product->uitleg }}</td>
								<td>@foreach($hotItem->product->colors as $color) {{ $color->name }} @endforeach</td>
								<td>
									<ul>
										<li>
											<a href="{{ url('admin/product/edit', $hotItem->Product->link) }}">
											  Edit Product
											</a>
										</li>
										<li>
											<a href="{{ url('admin/product/faq/edit', $hotItem->Product->link) }}">
											  Edit FAQ
											</a>
										</li>
									</ul>
								</td>
							</tr>
						@endforeach
					</tbody>

				</table>
			</div>
		</div>

	</div>

@endsection