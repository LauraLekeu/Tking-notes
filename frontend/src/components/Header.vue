<template>

    <div class="header">
        
        <div class="header-titre"> <span class="bold">{{ title }}</span></div>

        <div class="header-search">
    
                <input class="search-bar" type="text" name="search" placeholder="Rechercher">
                <svg id="icon-search" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                class="bi bi-search" viewBox="0 0 16 16">
                    <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
           
        </div>
    </div>

</template>

<script>
export default {
  name: 'Header',
  props: ['title']
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

.header {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin-bottom: 1em;

    &-titre{
        font-weight: 200;
        font-size: 1.8em;
        color: $color-contrast;
        font-family: $font-primaire;
        margin: 1em ;
       
        .bold {
            font-weight: 500;
        }
    } 

    &-search {

        .search-bar {   
            width: 15em;
            color: $color-contrast;
            font-size: 16px;
            height: 2em;
            padding-left: 1.5em;
            border:solid 1px $color-white;
            border-radius: 20px;
            background-color:#FFF;
            box-shadow: 1px 1px 20px $color-shadow;
        }

        svg {
            position: relative !important;
            left: -2em;
            top: .3em;
            color: $color-contrast;
        }
    }
        
}



</style>
