@extends('layouts.app')
@section('content')
	<div class="dashboard-wrapper">
		<div class="dashboard col-md-10 col-md-offset-1">
			<h1>Admin dashboard</h1>
			<h4><a href="{{ url('admin/products') }}">Products</a></h4>
			<h4><a href="{{ url('admin/faq') }}">FAQ</a></h4>
		</div>
	</div>
@endsection