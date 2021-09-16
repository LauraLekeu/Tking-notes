<template>
  <div>
    <Menu />

    <div class="page">
      <Header :title="title" />

      <div class="cards-dashboard">
        <div class="cards-devoirs">
          <div class="section-fields">
            <select
              v-model="formData.course"
              id="field-form-title"
              class="fields-form"
              type="text"
              name="cours"
              placeholder="Titre"
              style="appearance: none"
            >
              <option disabled value="">Sélectionner un cours *</option>
              <option
                v-for="course in courses"
                :key="course.id"
                :value="course.id"
              >
                {{ course.name }}
              </option>
            </select>

            <textarea
              v-model="formData.content"
              id="field-form-text"
              class="fields-form"
              name=" content-note"
              placeholder="Texte *"
            ></textarea>
          </div>
        </div>

        <div class="card-menu">
          <div class="options-add-form">
            <label for="date" style="margin: 1em 0; margin-left: 0.5em"
              >À terminer pour le *
            </label>
            <input
              name="date"
              type="date"
              id="date-todo"
              v-model="formData.deadline"
            />
          </div>
          <button @click="add" class="btn-todo active">Ajouter</button>
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

export default {
  name: "AddTodo",
  components: {
    Menu,
    Header,
  },
  data() {
    return {
      title: "Nouvelle tâche",
      user: null,
      formData: {
        content: "",
        deadline: "",
        course: "",
        completed: "",
        user: "",
      },
    };
  },
  methods: {
    add() {
      this.formData.completed = 0;
      this.formData.user = this.$store.state.user.id;
      axios
        .post("http://127.0.0.1:8000/api/addTodos", this.formData, {
          headers: {
            Authorization: this.$cookies.get("token"),
          },
        })
        .then((response) => {
          // Notification si OK
          this.$store.dispatch("addTodo", response.data.todo);
          this.$notify({
            title: "Merci !",
            text: "La tâche a bien été ajoutée",
            type: "success",
            speed: 600,
          });
        })
        .catch(() => {
          // Notification si problème durant la transaction
          this.$notify({
            title: "Oups...",
            text: "Problème durant l'ajout",
            type: "error",
            speed: 600,
          });
          this.email = "";
        });
      this.$router.push("/taches");
    },
  },
  computed: {
    courses() {
      return this.$store.getters.getCourses;
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
    this.$store.dispatch("setCourses", {
      cookie: this.$cookies.get("token"),
      user_id: this.$store.state.user.id,
    });
  },
};
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
    border: solid 1px $color-white;
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
    min-height: 450px;
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
  border: solid 1px $color-light;
  border-radius: 10px;
  background-color: $color-light;
  color: $color-medium;

  &.active {
    color: $color-white;
    background-color: $color-second-contrast;
    box-shadow: 1px 1px 20px $color-light;

    &:hover {
      color: $color-white;
      background-color: $color-dark;
    }
  }
}
</style>
