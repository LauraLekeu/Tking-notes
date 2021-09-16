<template>
  <div>
    <Menu />
    <div class="page">
      <Header :title="title" />

      <div class="cards-dashboard">
        <div class="cards-cours">
          <div class="section-fields">
            <input
              id="field-form-title"
              class="fields-form notes"
              type="text"
              name="titre-note"
              placeholder="Nom du cours"
              v-model="formData.name"
            />
          </div>
        </div>

        <div class="card-menu">
          <button @click="edit()" class="btn-todo active">Modifier</button>
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
  name: "Cours",
  components: {
    Menu,
    Header,
  },
  data() {
    return {
      title: "Modifier le cours",
      user: null,
      formData: {
        id: null,
        name: "",
        user: "",
      },
    };
  },
  methods: {
    edit() {
      this.formData.user = this.$store.state.user.id;
      console.log("form data", this.formData);
      axios
        .post("http://127.0.0.1:8000/api/editCourses", this.formData, {
          headers: {
            Authorization: this.$cookies.get("token"),
          },
        })
        .then((response) => {
          // Notification si OK
          this.$notify({
            title: "Merci !",
            text: "Le cours a bien été modifié",
            type: "success",
            speed: 600,
          });
          this.$store.dispatch("editCourse", { course: response.data.course });
        })
        .catch(() => {
          // Notification si problème durant la transaction
          this.$notify({
            title: "Oups...",
            text: "problème durant la modification",
            type: "error",
            speed: 600,
          });
        })
        .finally(() => {
          this.$router.push("/cours");
        });
    },
  },
  computed: {
    course() {
      return this.$store.getters.getCourseById(this.$route.params.id);
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
    this.formData = {
      id: this.course.id,
      name: this.course.name,
    };
  },
};
</script>

<style lang="scss">
.cards-cours {
  width: 62%;
}
</style>
