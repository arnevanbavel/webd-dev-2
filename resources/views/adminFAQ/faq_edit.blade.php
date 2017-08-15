@extends('layouts.app')

@section('content')

	<div class="dashboard-faq-wrapper">

		<div class="dashboard-faq col-md-10 col-md-offset-1">

			<h1>Wijzig faq</h1> 

			<div class="edit-FAQ">

				<form method="POST" action="{{ url('admin/faq/edit', $faq->id) }}">
					{{ csrf_field() }}
					<div class="form-group {{ $errors->has('question') ? 'has-error' : '' }}">
						<label>Vraag</label>
						<input type="text" class="form-control" name="question" value="{{ $faq->question }}">
						@if ($errors->has('question'))
							<span class="help-block"><strong>{{ $errors->first('question') }}</strong></span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('answer') ? 'has-error' : '' }}">
						<label>Antwoord</label>
						<textarea class="form-control" name="answer" rows="5">{{ $faq->answer }}</textarea>
						@if ($errors->has('answer'))
							<span class="help-block"><strong>{{ $errors->first('answer') }}</strong></span>
						@endif
					</div>

					<button type="submit" class="btn btn-primary">Verstuur</button>

				</form>

			</div>

		</div>

	</div>

@endsection