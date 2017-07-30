<template>
    <div class="card mar-top-bot-15">
        <header class="card-header">
            <p class="card-header-title center-text">
                {{ todo.title }}
            </p>
            <a class="card-header-icon" @click="deleteTask">
                <span class="icon">
                    <i class="fa fa-times"></i>
                </span>
            </a>
        </header>
        <div class="card-content">
            <div class="content">
                <div v-if="editing" class="flex-container flex-vertical">
                    <div class="form-group">
                        <textarea class="form-control" v-model="todo.description"></textarea>
                    </div>
                    <a class="text-center" @click="editing = false">Cancel</a>
                </div>
                <div v-else v-text="todo.description"></div>
                <br>
                <small v-text="created"></small>
            </div>
        </div>
        <footer class="card-footer">
            <a class="card-footer-item" href="#" @click="demoteTask" v-show="column !== 'todo'">
                <svg class="zondicon arrow-thick-left icon" alt="Left facing arrow icon">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#zondicon-arrow-thick-left"></use>
                </svg>
            </a>
            <a class="card-footer-item" v-if="!editing" @click="editing = !editing">Edit</a>
            <a class="card-footer-item" v-else @click="updateTask">Update</a>
            <a class="card-footer-item" href="#" @click="promoteTask" v-show="column !== 'done'">
                <svg class="zondicon arrow-thick-right icon" alt="Right facing arrow icon">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#zondicon-arrow-thick-right"></use>
                </svg>
            </a>
        </footer>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        props: ['todo', 'column'],
        data() {
            return {
                editing: false
            }
        },
        methods: {
            promoteTask() {
                this.todo.status = this.todo.status + 1;

                axios.patch(this.endpoint, []);

                setTimeout(() => {
                    this.$emit('task-changed');
                }, 100);
            },
            demoteTask() {
                this.todo.status = this.todo.status - 1;

                axios.patch(this.endpoint, []);

                setTimeout(() => {
                    this.$emit('task-changed');
                }, 100);
            },
            deleteTask() {
                axios.delete(`tasks/${this.todo.id}`);
                this.$emit('task-changed');
            },
            updateTask() {
                axios.patch(`/tasks/${this.todo.id}`, {
                    title: this.todo.title,
                    description: this.todo.description
                }).then(() => {
                    this.editing = false;
                });
            }
        },
        computed: {
            endpoint() {
                let newStatus = this.todo.status;
                return `/tasks/${this.todo.id}/${newStatus}`;
            },
            created() {
                return moment(this.todo.created_at).fromNow();
            }
        }
    }
</script>
