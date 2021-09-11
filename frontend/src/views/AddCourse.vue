<template>
    <div>
        <Menu />
        <div class="page">

            <Header :title="title" />

            <div class="cards-dashboard">
                <div class="cards-cours">
                    <div class="section-fields">
                        <input id="field-form-title" class="fields-form" type="text" name="titre-note"
                            placeholder="Nom du cours">
                    </div>
                </div>

                <div class="card-menu">
                    <button class="btn-todo active">Ajouter</button>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
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
                user: null
            }
        },
        methods: {}
    }
</script>

<style lang="scss">
    .cards-cours {
        width: 62%;
    }
</style>