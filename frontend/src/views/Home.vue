<template>
  <div>
    <header>
      <div id="logo-site">Logo du site</div>
    </header>

    <div class="main site">
      <div class="container">
        <div class="sections large-section site" style="background: none; box-shadow: none;">
          <Slider />
        </div>
        <div class="sections small-section site" style="background: none; box-shadow: none;">
          <div class="section-container">
            <div class="section-add formulaires">

              <template v-if="loginType === 'connexion-form'">
                <div class="label-form">Connexion</div>

                <form  key="connexion-form" id="formulaire-inscription" >

                  <label for="" class="label-inscription">E-mail</label>
                  <input v-model="dataConnexion.email" type="email" class="input-form inscription" placeholder="E-mail" />

                  <label for="" class="label-inscription">Mot de passe</label>
                  <input v-model="dataConnexion.password" type="password" class="input-form inscription" placeholder="Mot de passe" />

                  <div class="inscription-connexion">
                    <button @click.prevent="login" type="submit">Se connecter</button>
                    <!-- <input type="submit" class="input-form inscription bouton"  value="Se connecter"> -->
                    <div class="liens-forms" @click="loginType = 'inscription-form'"> S'inscrire </div>
                  </div>
                </form>
              </template>

              <template v-else>
                <div class="label-form">Inscription</div>

                <form  key="inscription-form" id="formulaire-inscription">

                  <label class="label-inscription">Nom</label>
                  <span v-if="errors.name">{{errors.name[0]}}</span>
                  <input v-model="dataInscription.lastname" type="text" class="input-form inscription" placeholder="Nom" />

                  <label class="label-inscription">Prénom</label>
                  <input v-model="dataInscription.firstname" type="text" class="input-form inscription" placeholder="Prénom" />

                  <label class="label-inscription">E-mail</label>
                  <input v-model="dataInscription.email" type="email" class="input-form inscription" placeholder="E-mail" />

                  <label class="label-inscription">Mot de passe</label>
                  <input v-model="dataInscription.password" type="password" class="input-form inscription" placeholder="Mot de passe" />

                  <label class="label-inscription">Confirmation du mot de passe</label>
                  <input v-model="dataInscription.password_confirmation"  type="password" class="input-form inscription" placeholder="Mot de passe" />
                  <div v-show="dataInscription.password_confirmation != dataInscription.password" class="notif-passewords">les mots de passe ne correspondent pas !</div>

                  <div class="inscription-connexion">
                    <button @click.prevent="register" type="submit">S'inscrire</button>
                    <div class="liens-forms"  @click="loginType = 'connexion-form'"> Se connecter </div>
                  </div>
                </form>
              </template>

            </div>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <div> &#169; 2021 Laura Lekeu</div>
    </footer>
  </div>
</template>

<script>
  // @ is an alias to /src
  import Slider from '@/components/Slider.vue';
  import axios from "axios";

  export default {
    name: 'Home',
    components: {
      Slider,
    },
    data() {
      return {
        loginType: 'connexion-form',
        dataInscription: {
          lastname: '',
          firstname: '',
          email: '',
          password: '',
          password_confirmation: ''
        },
        dataConnexion: {
          email: '',
          password: '',
        },
        errors: [  ]
      }
    },
    methods:{
        register() {
            axios.post('http://127.0.0.1:8000/api/register', this.dataInscription).then((response) => {
              console.log(response.data)
              this.$cookies.config('10d')
              this.$cookies.set('token', `Bearer ${response.data.access_token}`)
              this.$router.push('/dashboard')
              this.$store.dispatch('setUser', response.data.user)
            });
        },
        login() {
          axios.post('http://127.0.0.1:8000/api/login', this.dataConnexion).then((response) => {
            this.$cookies.set('token', `Bearer ${response.data.access_token}`)
            this.$router.push('/dashboard')
            this.$store.dispatch('setUser', response.data.user)
          })
        }
    }
  }
</script>

<style scoped lang="scss">
  .notif-passewords {
    width: 100%;
    color: #fff;
    background: tomato;
    border-radius: 10px;
    padding: .5em 1em;
    font-size: 12px;
  }
</style>

<!-- 
<style lang="scss">
  img {
    width: 30%;
  }
  .header-home {
    color: $color-light;
    background: $color-contrast;
    padding: 1em;
  }
</style> 
-->