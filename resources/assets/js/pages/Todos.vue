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
		mounted() {
			document.addEventListener('keydown', e => {
				if (this.newTodo && e.keyCode == 27) {
					this.closeNewTask();
				}
			});
		},
		created() {
			this.fetchTasks();
			setTimeout(() => {
				this.setSubArrays();
			}, 100);
		},
		methods: {
			fetchTasks() {
				axios.get('/').then(response => {
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