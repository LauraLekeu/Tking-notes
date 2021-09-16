<template>
  <div>
    <Menu />

    <div class="page">
      <Header :title="title" />

      <div class="cards-dashboard">
        <div class="cards-devoirs">
          <CardTodos />
        </div>

        <div class="card-menu">
          <router-link to="nouvelle-tache" class="bouton-add">
            <div class="test-new-btn">
              Nouvelle tâche
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                fill="currentColor"
                class="bi bi-plus"
                viewBox="0 0 16 16"
              >
                <path
                  d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"
                />
              </svg>
            </div>
          </router-link>

          <div class="section-total">
            <div class="total-container">
              <svg
                width="22"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                class="bi bi-collection-fill"
                viewBox="0 0 16 16"
              >
                <path
                  d="M0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"
                />
              </svg>
              <span> {{ nbTodos }} </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
// @ is an alias to /src
import Menu from "@/components/Menu.vue";
import Header from "@/components/Header.vue";
import CardTodos from "../components/CardTodos.vue";

export default {
  name: "Todos",
  components: {
    Menu,
    Header,
    CardTodos,
  },
  data() {
    return {
      title: "Mes tâches",
      user: null,
    };
  },
  computed: {
    nbTodos() {
      return this.$store.getters.getTodosCompleted.length;
    },
  },
  async created() {
    // Si l'id de l'utilisateur se trouve dans les cookies
    if (this.$cookies.get("user_id")) {
      // Récupération des données de l'utilisateur
      const response = await axios.get(
        "http://127.0.0.1:8000/api/user",
        { params: { id: this.$cookies.get("user_id") } },
        {
          headers: {
            Authorization: this.$cookies.get("token"),
          },
        }
      );
      // Stockage de l'utilisateur dans le store
      this.$store.dispatch("setUser", response.data.user);
    }
    this.$store.dispatch("setTodos", {
      cookie: this.$cookies.get("token"),
      user_id: this.$store.state.user.id,
    });
  },
};
</script>

<style lang="scss">
.cards-devoirs {
  width: 62%;
}

.card-menu {
  background: white;
  border-radius: 10px;
  padding: 1em;
  width: 35%;
  height: fit-content;
}

.card-add {
  display: flex;
  padding: 5px 5px;
  border-radius: 10px;
  justify-content: space-between;
  margin-bottom: 1em;
  background: $color-contrast;

  &.edit-cours {
    margin: 1em 0;

    .field-add {
      border: solid 1px $color-light;
      background-color: $color-light;
      color: $color-contrast;
      font-family: $font-primaire;
      font-size: 14px;
    }
  }

  &:hover {
    background-color: $color-dark;
  }

  .icon-plus {
    cursor: pointer;
    background: none;
    border: none;
    text-decoration: none;
    font-size: 16px;
    color: white;

    svg {
      width: 30px;
    }
  }

  .field-add {
    border-radius: 10px;
    color: $color-white;
    padding: 20px 30px;

    font-size: 16px;
    letter-spacing: 1px;

    cursor: pointer;

    &::placeholder {
      color: $color-white;
      font-family: $font-primaire;
      font-size: 16px;
    }
  }
}
</style>
