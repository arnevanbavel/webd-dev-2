@extends('layouts.app')

@section('content')

	<div class="dashboard-faq-wrapper">

		<div class="dashboard-faq col-md-10 col-md-offset-1">
			@if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
			<h1>Faq <a class="btn btn-primary" href="{{ url('admin/faq/new') }}">Maak een nieuwe faq aan</a></h1> 
			<div class="FAQ-questions">
				@foreach($faqs as $faq)
					<div class="FAQ-question clearfix">
						<div class="col-md-10">
							<h4>{{ $faq->question }}</h4>
							{{ $faq->answer }}
						</div>
						<div class="FAQ-edit col-md-2">
							<ul>
								
								<li><a href="{{ url('admin/faq/edit', $faq->id) }}" class="btn btn-default" aria-label="Left Align">
									  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
								</li>
								<li>
									<form method="POST" action="{{ url('admin/faq/delete', $faq->id) }}">
										{{ csrf_field() }}
										<input type="hidden" name="_method" value="DELETE" />
										<button type="submit" class="btn btn-danger" aria-label="Left Align">
										  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
										</button>
									</form>
								</li>

							</ul>
							
						</div>
					</div>
				@endforeach
			</div>
			{{ $faqs->links() }}
		</div>

	</div>

@endsection