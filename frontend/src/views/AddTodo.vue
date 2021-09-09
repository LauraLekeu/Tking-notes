<template>
    <div>

        <Menu />

        <div class="page">

            <Header />

            <div class="cards-dashboard">
                <div class="cards-devoirs">

                    <div class="section-fields">
                        <select id="field-form-title" class=" fields-form" type="text" name="cours" placeholder="Titre"
                            style="appearance: none;">
                            <option selected> Sélectionner un cours *</option>
                            <option value="a">Valeur 2</option>
                            <option value="b">Valeur 3</option>
                        </select>

                        <textarea id="field-form-text" class="fields-form" name=" content-note"
                            placeholder="Texte *"></textarea>
                    </div>

                </div>

                <div class="card-menu">

             
                    <div class="options-add-form">
                        <label for="date" style="margin: 1em 0;margin-left: .5em;">À terminer pour le *
                        </label>
                        <input name="date" type="date" id="date-todo" value="2021-06-01">
                    </div>
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
        name: 'AddTodo',
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
   
.section-fields {
    width: 100%;

    &.responsive-tab {
        display: none;
    }
    
    .fields-form {
        background: $color-white;
        color: $color-contrast;
        padding: 20px 30px;
        border-radius: 10px;
        border:solid 1px $color-white;
        box-shadow: 1px 1px 20px $color-light;
        width: 100%;
        font-family: $font-primaire;   
        font-weight: 500;
        cursor: pointer;
        font-size: 18px;
    
        &::placeholder {
            color: $color-dark;
            letter-spacing: 4px;
            font-size: 18px;
        }
        &:hover {
            opacity: 70%;
        }
    }
    #field-form-title {
        margin-bottom: 1rem;
    }
    #field-form-text {
        min-height: 150px;
        height: auto;
        
    }
}

.btn-todo {
    padding: auto;
    margin: 1em auto; 
    font-weight: 400;
    font-size: 1em;
    letter-spacing: 1.2px;
    width: 40%;
    height: 2.5em;
    border:solid 1px $color-light;
    border-radius: 10px;
    background-color:$color-light;
    color: $color-medium;

    &.active {
        color: $color-white;
        background-color:$color-second-contrast;
        box-shadow: 1px 1px 20px $color-light;

        &:hover {
            color: $color-white;
            background-color:$color-dark
        }
    }
}
</style>