<template>

    <div class="header">
        
        <div class="header-titre"> <span class="bold">{{ title }}</span></div>

        <div class="header-search">
    
                <input class="search-bar" v-model="search" name="search" placeholder="Rechercher une note" @keydown.enter="searchNote" autocomplete="off">
                <svg id="icon-search" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                class="bi bi-search" viewBox="0 0 16 16">
                    <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
                <div class="search-container" v-click-outside="close">
                    <ul v-if="isOpen">
                        <li>
                            <router-link @click="clearSearch" :to="`/note-${note.id}`" v-for="note in searchedNotes" :key="note.id">{{note.title}}</router-link>
                        </li>      
                    </ul>
                </div>
           
        </div>
    </div>

</template>

<script>
import axios from 'axios'

export default {
  name: 'Header',
  props: ['title'],
  data() {
      return {
          search: '',
          searchedNotes: [],
          isOpen: false
      }
  },
  methods: {
      // Recherche d'une note
      searchNote() {
          this.searchedNotes = [];
          axios.get('http://127.0.0.1:8000/api/search', {params: {search: this.search}}).then((response) => {
              this.searchedNotes = response.data
              if(this.searchedNotes.length) {
                  this.isOpen = true
              }
          })
      },
      // Réinitialise la recherche
      clearSearch() {
          this.search = '';
          this.searchedNotes = [];
          this.isOpen = false
      },
      // Au click outside, vider la recherche
      close() {
          this.searchedNotes = [];
          this.isOpen = false;
      }
  },
  directives: {
        // Permet de detecter l'élément et de voir si on clique dedans ou non
        "click-outside": {
            created: function(el, binding) {
                const clickEventHandler = event => {
                    if (!el.contains(event.target) && el !== event.target) {
                        binding.value(event);
                    }
                };
                el.eventHandler = clickEventHandler;
                document.addEventListener("click", clickEventHandler);
            },
            unmounted: function(el) {
                document.removeEventListener("click", el.eventHandler);
            }
        }
    }
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

.search-container {
    background: $color-medium;
    position: absolute;
    right: 2em;
    transform: translate(0, 1em);
    display: flex;
    border-radius: 5px;
    z-index: 9998;
    width: 20em;
}

.search-container li {
    display: flex;
    flex-direction: column;
}

.search-container ul {
    width: 20em;
}
.search-container ul li a {
    // display: block;
    color: $color-contrast;
    // border-radius: 5px;
    list-style: none;
    text-decoration: underline $color-second-contrast;
    text-underline-offset: 3px;
    // border-bottom: 1px solid $color-second-contrast;
    margin: .5em 0;
}
.search-container ul li a:hover {
    color: $color-second-contrast;
}



</style>
