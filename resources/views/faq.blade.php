@extends('layouts.app')

@section('content')

	<div class="FAQ-wrapper clearfix">

		<div class="FAQ col-md-10 col-md-offset-1">
			<div class="FAQ-search-wrapper">
				<h1>FREQUENTLY ASKED QUESTIONS</h1>
				<div class="FAQ-search">
					<form method="POST" action="{{ url('faq') }}">
						{{ csrf_field() }}
						<input class="FAQ-search-input" value="@if(isset($search)) {{ $search }} @endif" type="text" name="keyword" placeholder="Search on keyword">
					</form>
					<a class="clear-FAQ-search pull-right" href="{{ url('FAQ') }}">Clear</a>
				</div>
				@if(!isset($search))

					<div class="customer-service">
						<p>Don't find what you're looking for?</p>
						<p>You can always contact our <a href="{{ url('about#contact') }}">customer service</a>. We're happy to help you!</p>
					</div>

				@else

					<div class="searched-input">
						<p>{{$faqs->total()}} results for the word "{{ $search }}"</p>
					</div>

				@endif
			</div>
			<div class="FAQ-questions">
				@foreach($faqs as $faq)
					<div class="FAQ-question">
						<h4>{{ $faq->question }}</h4>
						{{ $faq->answer }}
					</div>
				@endforeach
			</div>
			{{ $faqs->links() }}
		</div>

	</div>

@endsection