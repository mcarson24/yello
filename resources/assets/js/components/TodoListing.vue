<template>
	<div>
		<todo v-for="todo in todos" 
		      :todo="todo" 
		      :key="todo.id" 
		      @task-changed="taskChanged"
		      :column="column">
      	</todo>
	</div>
</template>

<script>
	export default {
		props: ['todos', 'column'],
		methods: {
			taskChanged() {
				this.$emit('task-changed');
			}
		}
	}
</script>