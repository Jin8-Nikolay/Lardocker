<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">TodoList</div>
                    <div class="form-inline offset-md-2 form-margin-r-b">
                        <div class="form-group mb-3">
                            <label for="name"
                                   class="col-md-4 col-form-label">Name</label>
                            <input id="name" type="text"
                                   class="form-control" name="name"
                                   required autocomplete="name" autofocus
                                   :value="todoName"
                                   @input="$emit('update:todoName', $event.target.value)">
                        </div>
                        <div class="form-group mb-0">
                            <div class="col-md-8">
                                <a v-on:click="create()" class="btn btn-primary">
                                    Create
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body" v-for="(todoItem, index) in todoList" :key="index">
                        <div class="row offset-md-2 pt-2">
                            <div class="col-md-3">
                                todoItem.name
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-danger" v-if="todoItem.status">Delete</a>
                                <div v-else>
                                    <a class="btn btn-success">Complete</a>
                                    <a class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        todoName: "",
    },
    data: function () {
        return {
            todo: {
                name: ""
            },
            todoList: []
        }
    },
    emits: ['update:todoName'],
    methods: {
        create : function () {
            console.log('asdasdasdasdasdasdasdasda')
            if (this.$emit('update:todoName', '') === '') {
                return;
            }

            axios.post('/create-todo', {
                name: this.todo.name
            }).then(response => {
                console.log(response)
                if (response.status === 201) {
                    this.todo.name = "";
                    this.$emit('update:todoName', '')
                }
            }).catch(error => {
                console.log(error);
            })
        },
        getList() {
            axios.get('/todo-list').then(response => {
                this.todoList = response.data
                console.log(this.todoList)
            }).catch(error => {
                console.log(error);
            })
        }
    },
    created() {
        this.getList();
    }
}
</script>
