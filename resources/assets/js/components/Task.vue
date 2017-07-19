<template>
    <div class="card mar-top-bot-15">
        <header class="card-header">
            <p class="card-header-title center-text">
                {{ todo.title }}
            </p>
            <a class="card-header-icon">
                <span class="icon">
                    <i class="fa fa-times" @click="deleteTask"></i>
                </span>
            </a>
        </header>
        <div class="card-content">
            <div class="content">
                {{ todo.description }}
                <br>
                <small v-text="created"></small>
            </div>
        </div>
        <footer class="card-footer">
            <a class="card-footer-item" href="#" @click="demoteTask" v-show="column !== 'todo'">
                <i class="fa fa-angle-double-left"></i>
            </a>
            <a class="card-footer-item">Edit</a>
            <a class="card-footer-item" href="#" @click="promoteTask" v-show="column !== 'done'">
                <i class="fa fa-angle-double-right" ></i>
            </a>
        </footer>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        props: ['todo', 'column'],
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
            }
        },
        computed: {
            endpoint() {
                let newStatus = this.todo.status;
                return `/tasks/${this.todo.id}/${newStatus}`;
            },
            created() {
                return moment(this.todo.created_at).format('hh:mm A - D MMM YYYY');
            }
        }
    }
</script>
