@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				@if ($errors->any())
					<div class="alert alert-danger" role="alert">
						<ul>
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<form action="{{ action('TodosController@store') }}" method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="title">Task Title</label>
						<input type="text" class="form-control" id="title" name="title">
					</div>
					<div class="form-group">
						<label for="description">Task Description</label>
						<textarea name="description" id="description" rows="7" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="button is-primary btn-block">Add Task</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection