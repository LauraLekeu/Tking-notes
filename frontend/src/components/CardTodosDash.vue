<template>

    <div class="dashboard-card">

        <div class="card-add-dash">
            <router-link class="bouton-add" to="nouvelle-tache">
                <div class="test-new-btn">Ajouter une nouvelle tâche
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-plus" viewBox="0 0 16 16">
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                </div>
            </router-link>
            <div class="section-total">
                <div class="total-container">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-file-text-fill" width="22"
                        height="22" viewBox="0 0 16 16">
                        <path
                            d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z" />
                    </svg>
                    <span> {{ nbTodos }} </span>
                </div>
            </div>
        </div>

        <div class="content-separation"
            style=" font-size:1em; opacity: 70%;border-bottom: 1px solid #d1d1d1;margin-top: 1.5em;">
            Dernières tâches
        </div>

        <div v-for="todo in todos" :key="todo.id" class=" card-small cards-hover">
            <router-link to="/taches" class="card-link">
                <div v-if="todo.completed === 0">
                    <div class="double-titre">
                        <div class="card-titre"> {{ todo.content }} </div>
                    </div>
                    <div class="card-soustitre"> {{ formatDate(todo.deadline) }} </div>
                </div>
                <div v-else  class="completed">
                    <div class="double-titre">
                        <div class="card-titre"> {{ todo.content }} </div>
                    </div>
                    <div class="card-soustitre"> {{ formatDate(todo.deadline) }} </div>
                </div>
            </router-link>

        </div>

        <router-link to="/taches">
            <div class="voir-plus">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
            </div>
        </router-link>

    </div>

</template>

<script>
    import moment from 'moment'

    export default {
        name: 'CardNotesDash',
        data() {
            return {
                params: {
                    start: 0,
                    end: 2,
                }
            }
        },
        methods: {
            formatDate(value) {
                if (value) {
                    return moment(String(value)).format("DD MMM YYYY ")
                }
            },
        },
        computed: {
            todos() {
                return this.$store.getters.getNbTodos(this.params);
            },
            nbTodos() {
                return this.$store.getters.getTodosCompleted.length;
            }
        },
        created() {
            this.$store.dispatch('setTodos', {
                cookie: this.$cookies.get('token'),
                user_id: this.$store.state.user.id
            });
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped  lang="scss">
    


    .completed {
        .card-titre {
            color: $color-medium;
            text-decoration: line-through;
        }
        
    }
</style>