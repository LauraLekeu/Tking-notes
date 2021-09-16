<template>
  <div>
    <header>
      <div class="logo-site">
        <img class="" :src="require(`../assets/images/logo.png`)" alt="" />
      </div>
    </header>

    <div class="page-home">
      <div class="texte-page-home">
        <div class="icon-infos">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="currentColor"
            width="30"
            height="30"
            class="bi bi-house-fill"
            viewBox="0 0 16 16"
          >
            <path
              fill-rule="evenodd"
              d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"
            />
            <path
              fill-rule="evenodd"
              d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"
            />
          </svg>
        </div>
        <h3 class="sous-titre-site">
          Profitez d'un <strong>espace de travail personnel</strong>
        </h3>
      </div>
      <div class="container" style="align-items: flex-start">
        <div
          class="sections large-section site"
          style="background: none; box-shadow: none; margin-top: 3em"
        >
          <Slider />
        </div>
        <div
          class="sections small-section site"
          style="background: none; box-shadow: none"
        >
          <div class="section-container">
            <div class="section-add formulaires">
              <template v-if="loginType === 'connexion-form'">
                <div class="label-form">Connexion</div>

                <form key="connexion-form" id="formulaire-inscription">
                  <label for="" class="label-inscription">E-mail</label>
                  <input
                    v-model="dataConnexion.email"
                    type="email"
                    class="input-form inscription"
                    placeholder="E-mail"
                  />

                  <label for="" class="label-inscription">Mot de passe</label>
                  <input
                    v-model="dataConnexion.password"
                    type="password"
                    class="input-form inscription"
                    placeholder="Mot de passe"
                  />

                  <div class="inscription-connexion">
                    <button
                      @click.prevent="login"
                      type="submit"
                      class="btn-todo active"
                    >
                      Se connecter
                    </button>
                    <!-- <input type="submit" class="input-form inscription bouton"  value="Se connecter"> -->
                    <div
                      class="liens-forms"
                      @click="loginType = 'inscription-form'"
                    >
                      S'inscrire
                    </div>
                  </div>
                </form>
              </template>

              <template v-else>
                <div class="label-form">Inscription</div>

                <form key="inscription-form" id="formulaire-inscription">
                  <label class="label-inscription">Nom</label>
                  <span v-if="errors.name">{{ errors.name[0] }}</span>
                  <input
                    v-model="dataInscription.lastname"
                    type="text"
                    class="input-form inscription"
                    placeholder="Nom"
                  />

                  <label class="label-inscription">Prénom</label>
                  <input
                    v-model="dataInscription.firstname"
                    type="text"
                    class="input-form inscription"
                    placeholder="Prénom"
                  />

                  <label class="label-inscription">E-mail</label>
                  <input
                    v-model="dataInscription.email"
                    type="email"
                    class="input-form inscription"
                    placeholder="E-mail"
                  />

                  <label class="label-inscription">Mot de passe</label>
                  <input
                    v-model="dataInscription.password"
                    type="password"
                    class="input-form inscription"
                    placeholder="Mot de passe"
                  />

                  <label class="label-inscription"
                    >Confirmation du mot de passe</label
                  >
                  <input
                    v-model="dataInscription.password_confirmation"
                    type="password"
                    class="input-form inscription"
                    placeholder="Mot de passe"
                  />
                  <div
                    v-show="
                      dataInscription.password_confirmation !=
                      dataInscription.password
                    "
                    class="notif-passewords"
                  >
                    les mots de passe ne correspondent pas !
                  </div>

                  <div class="inscription-connexion">
                    <button
                      class="btn-todo active"
                      @click.prevent="register"
                      type="submit"
                    >
                      S'inscrire
                    </button>
                    <div
                      class="liens-forms"
                      @click="loginType = 'connexion-form'"
                    >
                      Se connecter
                    </div>
                  </div>
                </form>
              </template>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <div>&#169; 2021 Laura Lekeu</div>
    </footer>
  </div>
</template>

<script>
// @ is an alias to /src
import Slider from "@/components/Slider.vue";
import axios from "axios";

export default {
  name: "Home",
  components: {
    Slider,
  },
  data() {
    return {
      loginType: "connexion-form",
      dataInscription: {
        lastname: "",
        firstname: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
      dataConnexion: {
        email: "",
        password: "",
      },
      errors: [],
    };
  },
  methods: {
    register() {
      axios
        // inscription de l'utilisateur
        .post("http://127.0.0.1:8000/api/register", this.dataInscription)
        .then((response) => {
          // Stockage du token dans les cookies
          this.$cookies.set("token", `Bearer ${response.data.access_token}`);
          // Stockage de l'id de l'utilisateur dans les cookies
          this.$cookies.set("user_id", response.data.user_id);
          axios
            // Récupération des données de l'utilisateur
            .get(
              "http://127.0.0.1:8000/api/user",
              { params: { id: this.$cookies.get("user_id") } },
              {
                headers: {
                  Authorization: this.$cookies.get("token"),
                },
              }
            )
            .then((response) => {
              // Connexion au dashboard
              this.$router.push("/dashboard");
              // Sotckage des informations de l'utilisateur dans le store
              this.$store.dispatch("setUser", response.data.user);
            });
        });
    },
    login() {
      axios
        // connexion de l'utilisateur
        .post("http://127.0.0.1:8000/api/login", this.dataConnexion)
        .then((response) => {
          // Stockage du token dans les cookies
          this.$cookies.set("token", `Bearer ${response.data.access_token}`);
          // Stockage de l'id de l'utilisateur dans les cookies
          this.$cookies.set("user_id", response.data.user_id);
          axios
            // Récupération des données de l'utilisateur
            .get(
              "http://127.0.0.1:8000/api/user",
              { params: { id: this.$cookies.get("user_id") } },
              {
                headers: {
                  Authorization: this.$cookies.get("token"),
                },
              }
            )
            .then((response) => {
              // Connexion au dashboard
              this.$router.push("/dashboard");
              // Sotckage des informations de l'utilisateur dans le store
              this.$store.dispatch("setUser", response.data.user);
            });
        });
    },
  },
};
</script>

<style scoped lang="scss">
.notif-passewords {
  width: 100%;
  color: #fff;
  background: tomato;
  border-radius: 10px;
  padding: 0.5em 1em;
  font-size: 12px;
}

.logo-site {
  margin: 1em;
  img {
    width: 10%;
  }
}

.img {
  width: 70%;
}

.page-home {
  position: relative;
}

.btn-todo {
  box-shadow: 0 0 10px $color-dark;
}

.texte-page-home {
  width: 70%;
  text-align: center;
  margin: 3em 0 1em 0;
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
