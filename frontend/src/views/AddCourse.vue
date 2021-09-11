<template>
    <div>
        <Menu />
        <div class="page">

            <Header :title="title" />

            <form @submit.prevent="add" action="">

                <div class="cards-dashboard">
                    <div class="cards-cours">
                        <div class="section-fields">
                            <input v-model="formData.name" id="field-form-title" class="fields-form" type="text"
                                name="titre-note" placeholder="Nom du cours">
                        </div>
                    </div>

                    <div class="card-menu">
                        <button class="btn-todo active">Ajouter</button>
                    </div>
                </div>

            </form>


        </div>
    </div>
</template>


<script>
    import axios from 'axios';

    // @ is an alias to /src
    import Menu from '@/components/Menu.vue';
    import Header from '@/components/Header.vue';

    export default {
        name: 'Cours',
        components: {
            Menu,
            Header,
        },
        data() {
            return {
                title: 'Nouveau cours',
                user: null,
                formData: {
                    name: '',
                    user: ''
                }
            }
        },
        methods: {
            add() {
                this.formData.user = 1;
                axios.post('http://127.0.0.1:8000/api/addCourse', this.formData)
                    .then(response => {
                        // Notification si OK
                        console.log(response)
                        this.$store.dispatch('addCourse', response.data.course)
                        this.$notify({
                            title: 'Thank you !',
                            text: 'The resource has been added!',
                            type: 'success',
                            speed: 600
                        })
                    })
                    .catch(() => {
                        // Notification si problème durant la transaction
                        this.$notify({
                            title: 'Oups...',
                            text: 'There is a problem with adding',
                            type: 'error',
                            speed: 600
                        })
                        this.email = ''
                    })
                this.$router.push("/cours")
            }
        }
    }
</script>

<style lang="scss">
    .cards-cours {
        width: 62%;
    }
</style>