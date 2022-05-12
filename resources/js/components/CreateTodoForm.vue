<template>

</template>

<script>
export default {
    data: function () {
        return {
            todo: {
                name: ""
            }
        }
    },
    methods: {
        createTodo() {
            if (this.todo.name === '') {
                return;
            }

            axios.post('/create-todo', {
                todo: this.todo
            }).then(response => {
                if (response.status === 201) {
                    this.todo.name = "";
                }
            }).catch(error => {
                console.log(error);
            })
        }
    }
}
</script>

<style scoped>

</style>
