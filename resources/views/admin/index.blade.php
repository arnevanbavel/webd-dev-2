@extends('layouts.app')
@section('content')
	<div class="dashboard-wrapper">
		<div class="dashboard col-md-10 col-md-offset-1">
			<h1>Admin dashboard</h1>
			<a href="{{ url('admin/products') }}" class="btn btn-primary">Producten Beheren</a> -
			<a href="{{ url('admin/faq') }}" class="btn btn-primary">FAQ Aanmaken</a>
		</div>
		<div class="dashboard-products col-md-10 col-md-offset-1">
			<h1>Subscribers</h1> 
			<div class="new-product">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Email</th>
							<th>Datum</th>
						</tr>
					</thead>
					<tbody>
						@foreach($subscribers as $subscriber)
								<tr>
									<td>{{ $subscriber->email }}</td>
									<td>{{ $subscriber->created_at }}</td>
								</tr>
						@endforeach
					</tbody>

				</table>

			</div>
	</div>
@endsection