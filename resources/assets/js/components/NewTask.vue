<template>
	<div>
		<div class="modal is-active">
		  <div class="modal-background"></div>
		  <div class="modal-content">
		    <!-- Any other Bulma elements you want -->
		    <div class="task-form">
				<div class="field">
				  <label class="label">Task Title</label>
				  <div class="control">
				    <input class="input" type="text" placeholder="Task Title">
				  </div>
				</div>

				<div class="field">
				  <label class="label">Task Description</label>
				  <div class="control">
				    <textarea class="textarea" placeholder="Pick up eggs, milk, and staples..."></textarea>
				  </div>
				</div>

				<div class="field is-grouped flex-center">
				  <div class="control">
				    <button class="button is-primary">Submit</button>
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
		methods: {
			closeModal() {
				this.$emit('close-new-task');
			}
		}
	}
</script>