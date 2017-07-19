<template>
	<div>
		<div class="modal is-active">
		  <div class="modal-background"></div>
		  <div class="modal-content">
		    <div class="task-form">
		    	<div v-if="hasErrors" class="alert alert-danger" role="alert">
		    		<ul>
		    			<li v-for="error in errors">{{ error[0] }}</li>
		    		</ul>
		    	</div>
				<div class="field">
				  <label class="label">Title</label>
				  <div class="control">
				    <input class="input" type="text" placeholder="Go to the grocery store." v-model="dataSet.title" required autofocus>
				  </div>
				</div>

				<div class="field">
				  <label class="label">Description</label>
				  <div class="control">
				    <textarea class="textarea" placeholder="Pick up eggs, milk, and staples..." v-model="dataSet.description" required></textarea>
				  </div>
				</div>

				<div class="field is-grouped flex-center">
				  <div class="control">
				    <button class="button is-primary" @click="createNewTask">Submit</button>
				  </div>
				  <div class="control">
				    <button class="button is-link" @click="closeModal">Cancel</button>
				  </div>
				</div>
			  </div>
			  <button class="modal-close is-large" @click="closeModal"></button>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				dataSet: {
					title: '',
					description: ''
				},
				errors: {}
			}
		},
		methods: {
			closeModal() {
				this.$emit('close-new-task');
			},
			createNewTask() {
				axios.post('/tasks', this.dataSet).then((response) => {
					this.dataSet.title = '';
					this.dataSet.description = '';
					this.$emit('new-task-created');
					this.$emit('close-new-task');
				}).catch(error => {
					if (error.response.status == 422) {
						this.errors = error.response.data;
					}
				});
			}
		},
		computed: {
			hasErrors() {
				return Object.keys(this.errors).length > 0;
			}
		}
	}
</script>