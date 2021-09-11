<template>
    <div>
        <Menu />
        <div class="page">

            <Header :title="title" />

            <div class="cards-dashboard">

                <div class="cards-cours">
                    <!-- <MenuTags /> -->
                    <CardNotes />
                </div>

                <div class="card-menu">


                    <router-link to="nouvelle-note" class="bouton-add">
                        <div class="">
                            <div class="card-add">
                                <div type="text" name="coursname" class="field-add"> Nouvelle note </div>
                                <button class="icon-plus">
                                    <svg fill="currentColor" width="30" height="30" viewBox="0 0 448 448"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="m408 184h-136c-4.417969 0-8-3.582031-8-8v-136c0-22.089844-17.910156-40-40-40s-40 17.910156-40 40v136c0 4.417969-3.582031 8-8 8h-136c-22.089844 0-40 17.910156-40 40s17.910156 40 40 40h136c4.417969 0 8 3.582031 8 8v136c0 22.089844 17.910156 40 40 40s40-17.910156 40-40v-136c0-4.417969 3.582031-8 8-8h136c22.089844 0 40-17.910156 40-40s-17.910156-40-40-40zm0 0" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </router-link>

                    <div class="section-total">

                        <div class="total-container">
                            <svg width="22" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="bi bi-collection-fill" viewBox="0 0 16 16">
                                <path
                                    d="M0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z" />
                            </svg>
                            <span> {{ nbNotes }} </span>
                        </div>
                    </div>

                    <div class="content-separation"></div>

                    <!-- <DeleteTags /> -->
                </div>

            </div>

        </div>
    </div>
</template>


<script>
    // @ is an alias to /src
    import Menu from '@/components/Menu.vue';
    import Header from '@/components/Header.vue';
    // import MenuTags from '../components/MenuTags.vue';
    import CardNotes from '../components/CardNotes.vue';
    // import DeleteTags from '../components/DeleteTags.vue';

    export default {
        name: 'Cours',
        components: {
            Menu,
            Header,
            // MenuTags,
            CardNotes,
            // DeleteTags
        },
        data() {
            return {
                title: 'Mes notes',
                user: null,
            }
        },
        computed: {
            nbNotes() {
                return this.$store.getters.getNotes.length;
            },
        },
        created() {
            this.$store.dispatch('setNotes');
        }
    }
</script>

<style lang="scss">
    .cards-cours {
        width: 62%;
    }
</style>