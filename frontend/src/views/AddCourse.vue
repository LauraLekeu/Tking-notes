<template>
  <div>
    <Menu />
    <div class="page">
      <Header :title="title" />

      <form @submit.prevent="add" action="">
        <div class="cards-dashboard">
          <div class="cards-cours">
            <div class="section-fields">
              <input
                v-model="formData.name"
                id="field-form-title"
                class="fields-form"
                type="text"
                name="titre-note"
                placeholder="Nom du cours"
              />
            </div>
          </div>

          <div class="card-menu">
            <button class="btn-todo active">Ajouter</button>
          </div>
        </div>
      </form>
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
      title: "Nouveau cours",
      user: null,
      formData: {
        name: "",
        user: "",
      },
    };
  },
  methods: {
    add() {
      this.formData.user = this.$store.state.user.id;
      axios
        .post("http://127.0.0.1:8000/api/addCourse", this.formData, {
          headers: {
            Authorization: this.$cookies.get("token"),
          },
        })
        .then((response) => {
          // Notification si OK
          console.log(response);
          this.$store.dispatch("addCourse", response.data.course);
          this.$notify({
            title: "Merci!",
            text: "Le nouveau cours a bien été ajouté",
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
      this.$router.push("/cours");
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
  },
};
</script>

<style lang="scss">
.cards-cours {
  width: 62%;
}
</style>
