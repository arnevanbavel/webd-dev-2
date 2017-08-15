@extends('layouts.app')

@section('content')

	<div class="dashboard-products-wrapper clearfix">

		<div class="dashboard-products col-md-10 col-md-offset-1">
			@if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

			<h1>Wijzig faq {{ $product->name }}</h1> 

			<div class="new-product">

				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Vraag</th>
							<th>Antwoord</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($product->Faqs as $faq)
								<tr>
									<td>{{ $faq->question }}</td>
									<td>{{ $faq->answer }}</td>
									<td>
										<ul>
											<li>
												<form method="POST" action="{{ url('admin/product/faq/delete', [$product->link, $faq->id]) }}">
													{{ csrf_field() }}
													<input type="hidden" name="_method" value="DELETE" />
													<button type="submit" class="btn btn-danger" aria-label="Left Align">
													  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
													</button>
												</form>
											</li>
										</ul>
									</td>
								</tr>
						@endforeach
					</tbody>

				</table>

			</div>

		</div>

		<div class="dashboard-products col-md-10 col-md-offset-1">

			<h1>Voeg faq {{ $product->name }} toe</h1> 

			<div class="new-product">

				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Vraag</th>
							<th>Antwoord</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($faqs as $faq)
								<tr>
									<td>{{ $faq->question }}</td>
									<td>{{ $faq->answer }}</td>
									<td>

										<ul>
											<li @foreach($product->Faqs as $productfaq) @if($productfaq->id == $faq->id) style='display:none' @endif @endforeach>
												<form method="POST" action="{{ url('admin/product/faq/add', [$product->id, $faq->id]) }}">
													{{ csrf_field() }}
													<button type="submit" class="btn btn-success" aria-label="Left Align">
													  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
													</button>
												</form>
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