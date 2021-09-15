<template>
    <div>

        <Menu />

        <div class="page">

            <Header :title="title" />

            <div class="cards-dashboard">

                <div class="cards-cours">
                    <CardCours />
                </div>

                <div class="card-menu">


                    <router-link to="nouveau-cours" class="bouton-add">
                        <div class="test-new-btn">Ajouter un nouveau cours
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </div>
                    </router-link>

                    <div class="section-total">

                        <div class="total-container">
                            <svg width="22" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="bi bi-collection-fill" viewBox="0 0 16 16">
                                <path
                                    d="M0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z" />
                            </svg>
                            <span> {{ nbCourses }} </span>
                        </div>
                    </div>


                </div>



            </div>

        </div>

    </div>

</template>


<script>
    // @ is an alias to /src
    import Menu from '@/components/Menu.vue';
    import Header from '@/components/Header.vue';
    import CardCours from '../components/CardCours.vue';

    export default {
        name: 'Cours',
        components: {
            Menu,
            Header,
            CardCours,
        },
        data() {
            return {
                title: 'Mes cours',
                user: null,
                // courses: [],
                // notes: [],
            }
        },

        computed: {
            nbCourses() {
                return this.$store.getters.getCourses.length;
            },

        },
        created() {
            this.$store.dispatch('setCourses', {
                cookie: this.$cookies.get('token'),
                user_id: this.$store.state.user.id
            });
        }
    }
</script>

<style lang="scss">
    .cards-cours {
        width: 62%;
    }
</style>