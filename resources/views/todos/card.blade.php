<div class="card mar-top-bot-15">
	<header class="card-header">
		<p class="card-header-title center-text">
			{{ $todo->title }}
		</p>
		<a class="card-header-icon">
			<span class="icon">
				{{-- <form action="{{ action('TodosController@destroy', $todo)}}" method="POST">
					{{ csrf_field() }}
					{{ method_field('delete') }}
					<button type="submit" class="hide-button-style">
						<i class="fa fa-times"></i>
					</button>
				</form> --}}
				<i class="fa fa-times" @click="deleteTask(task)"></i>
			</span>
		</a>
	</header>
	<div class="card-content">
		<div class="content">
			{{ $todo->description }}
			<br>
			<small>{{ $todo->formatted_date }}</small>
		</div>
	</div>
	<footer class="card-footer">
		@if ($todo->isStillTodo())
			<a class="card-footer-item" href="#">
		@elseif ($todo->isBeingDone())
			<a class="card-footer-item" href="{{ action('TodosController@update', [$todo, 'todo']) }}">
		@else
			<a class="card-footer-item" href="{{ action('TodosController@update', [$todo, 'doing']) }}">
		@endif
		{{-- <a class="card-footer-item" href="{{ action('TodosController@update', [$todo, 'doing']) }}"> --}}
			<i class="fa fa-angle-double-left"></i>
		</a>
		<a class="card-footer-item">Edit</a>
		@if ($todo->isStillTodo())
			<a class="card-footer-item" href="{{ action('TodosController@update', [$todo, 'doing']) }}">
		@elseif ($todo->isBeingDone())
			<a class="card-footer-item" href="{{ action('TodosController@update', [$todo, 'done']) }}">
		@else
			<a class="card-footer-item" href="#">
		@endif
			<i class="fa fa-angle-double-right"></i>
		</a>
	</footer>
</div>