<template>
    <div>

        <Menu />

        <div class="page">

            <Header />

            <div class="cards-dashboard">

                <div class="cards-devoirs">
                    <CardTodos />
                </div>

                <div class="card-menu">
                    <CardMenu />
                </div>

            </div>     

        </div>

    </div>

</template>


<script>
    // @ is an alias to /src
    import Menu from '@/components/Menu.vue';
    import Header from '@/components/Header.vue';
    import CardTodos from '../components/CardTodos.vue';
    import CardMenu from '../components/CardMenu.vue';

    export default {
        name: 'Todos',
        components: {
            Menu,
            Header,
                CardTodos,
                CardMenu,
        },
        data() {
            return {
                user: null
            }
        },
        methods: {}
    }
</script>

<style lang="scss">



.cards-devoirs  {
    width: 62%;
}
   

</style>