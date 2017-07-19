<script>
	export default {
		data() {
			return {
				newTodo: false,
				tasks: [],
				todo: [],
				doing: [],
				done: []
			}
		},
		created() {
			this.fetchTasks();
			setTimeout(() => {
				this.setSubArrays();
			}, 100);
		},
		methods: {
			fetchTasks() {
				axios.get('/api/tasks').then(response => {
					this.tasks = response.data;
					this.setSubArrays();
				});
			},
			closeNewTask() {
				this.newTodo = !this.newTodo;
			},
			setSubArrays() {
				this.todo = this.tasks[0];
				this.doing = this.tasks[1];
				this.done = this.tasks[2];
			}
		},
	}
</script>