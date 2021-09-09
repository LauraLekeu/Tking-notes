<template>
    <div>

        <Menu />

        <div class="page">

            <Header />

            <div class="cards-dashboard">

                <CardDashboard />

            </div>

        </div>

    </div>

</template>


<script>
    // @ is an alias to /src
    import Menu from '@/components/Menu.vue';
    import Header from '@/components/Header.vue';
    import CardDashboard from '@/components/CardDashboard.vue';

    export default {
        name: 'Dashboard',
        components: {
            Menu,
            Header,
            CardDashboard
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
    .page {
        position: absolute;
        left: 220px;
        padding: 2em;
        width: calc(100% - 220px) ;
        display: flex;
        flex-direction: column;

    }

    .cards-dashboard {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

</style>