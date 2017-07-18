@extends('layouts.app')

@section('content')
	<body>
		<todo-view inline-template>
			<section class="section">
				<new-task v-show="newTodo" @close-new-task="newTodo = !newTodo"></new-task>
				<div class="container">
					<h1 class="title text-center">Your Tasks</h1>
					<h2 class="subtitle text-center">
						<a href="#" @click="newTodo = !newTodo">New Task</a>
					</h2>
					<div class="columns">
						<div class="flex-container">
							<div class="column">
								<h3 class="header text-center">To Do</h3>
								<div class="items">
									@include('todos.card')
									@include('todos.card')
								</div>
							</div>
							<div class="column">
								<h3 class="header text-center">Doing</h3>
								<div class="items">
									@include('todos.card')
								</div>
							</div>
							<div class="column">
								<h3 class="header text-center">Done</h3>
								<div class="items">
									@include('todos.card')
									@include('todos.card')
									@include('todos.card')
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</todo-view>
	</body>
@endsection