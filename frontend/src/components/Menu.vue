<template>

    <div class="menu">
            <div class="menu-burger"></div>

            <div class="logo-site"><img class="" :src="require(`../assets/images/logo.png`)" alt=""></div>

            <div class="menu-content">
                <router-link class="menu-content-lien"  to="/dashboard">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="22" height="22"
                        class="bi bi-house-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                        <path fill-rule="evenodd"
                            d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                    </svg>
                    Dashboard
                </router-link>

                <router-link class="menu-content-lien"  to="/taches">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                        class="bi bi-list-ul" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                    </svg>
                    Devoirs
                </router-link>

                <router-link class="menu-content-lien"  to="/cours">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="22" height="22"
                        class="bi bi-collection-fill" viewBox="0 0 16 16">
                        <path
                            d="M0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z" />
                    </svg>
                    Cours
                </router-link>

                <router-link class="menu-content-lien"  to="/notes">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-file-text-fill" width="22"
                        height="22" viewBox="0 0 16 16">
                        <path
                            d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z" />
                    </svg>
                    Notes
                </router-link>

                <router-link class="menu-content-lien logout"  to="/">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                        <path fill-rule="evenodd"
                            d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                    </svg>
                    Déconnexion
                </router-link>
            </div>
      </div>


</template>

<script>

export default {
  name: 'Menu',
  props: {

  },
  methods: {
  
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

.logo-site {
    text-align: center;
    margin-top: 2em;
    margin-bottom: 2em;

    img {
        width: 70%;
    }
}
    .menu {
        position: fixed;
        z-index: 10000;
        height: 100vh;
        width: 220px;
        background: $color-contrast;
        border-radius: 0 10px 10px 0;  

        &-logo {
            text-align: center;
            color: $color-white;
            font-family: $font-secondaire;
            font-size: 1.5em;
            margin: 1.5em 0;
            
        }

        &-content {
            display: flex;
            flex-direction: column;
            margin-left: 2.5em;

            &-lien {
                display: flex;
                align-items: flex-end;
                color: $color-light;
                margin-top: 2em;

                &:hover {
                    color: $color-dark;
                }
                &.active {
                    color: $color-dark;
                }

                svg {
                    margin-right: 1.2em;
                }

                &.logout {
                    color: $color-white;
                    position: absolute;
                    bottom: 3em;
                    font-size: .9em;
                }
            }
        }
    }

    .router-link-active {
	color: $color-second-contrast ;
	
}

</style>
