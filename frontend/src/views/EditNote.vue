<template>
    <div>
        <Menu />
        <div class="page">

            <Header />

            <div class="cards-dashboard">
                <div class="cards-cours">


                        <div class="section-fields">
                            <input id="field-form-title" class="fields-form" type="text" name="titre-note"
                                placeholder="Titre*">
                           <textarea id="field-form-text" class="fields-form" name=" content-note"
                            placeholder="Texte *"></textarea>
                        </div>
                   

                </div>

                <div class="card-menu">

                    <select name="cours" id="menu-options">
                        <option selected> Sélectionner un cours *</option>
                        <option value="a">Valeur 2</option>
                        <option value="b">Valeur 3</option>
                    </select>
                    <div class="content-separation"></div>
                    <div>
                        <form action="">
                            <input class="" name="newtag" type="text" id="newtag" placeholder="Ajouter un nouveau tag">
                        </form>
                        <label for="cours" id="fleche-menu-options">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                <path
                                    d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg>
                        </label>
                    </div>
                    <div class="tags">
                        <div class="tag-note hover">HTML</div>
                        <div class="tag-note selected">Illustrator</div>
                        <div class="tag-note hover">XD</div>
                        <div class="tag-note hover">Photoshop</div>
                        <div class="tag-note hover">tag</div>
                        <div class="tag-note hover">CSS</div>
                    </div>
                    <button class="btn-todo active">Modifier</button>

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
                user: null
            }
        },
        methods: {}
    }
</script>

<style lang="scss">

</style>