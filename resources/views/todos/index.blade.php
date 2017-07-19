@extends('layouts.app')

@section('content')
	<div class="container">
		<todo-view inline-template>
			<section class="section">
				<div class="container todo-container">
					<h1 class="title text-center">Your Tasks</h1>
					<h2 class="subtitle text-center">
						<a href="#" @click="newTodo = !newTodo">New Task</a>
						<new-task v-show="newTodo" 
							 	  @close-new-task="newTodo = !newTodo"
							 	  @new-task-created="fetchTasks"></new-task>
					</h2>
					<div class="columns">
						<div class="flex-container">
							<div class="column">
								<h3 class="header text-center">To Do</h3>
								<div class="items">
									<todo-listing :todos="todo" 
												  title="Todo" 
												  @task-changed="fetchTasks"
												  column="todo">
								    </todo-listing>
								</div>
							</div>
							<div class="column">
								<h3 class="header text-center">Doing</h3>
								<div class="items">
									<todo-listing :todos="doing" 
												  title="Doing" 
												  @task-changed="fetchTasks"
												  column="doing">
									</todo-listing>
								</div>
							</div>
							<div class="column">
								<h3 class="header text-center">Done</h3>
								<div class="items">
									<todo-listing :todos="done" 
												  title="Done" 
												  @task-changed="fetchTasks"
												  column="done">
									</todo-listing>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</todo-view>
	</div>
@endsection