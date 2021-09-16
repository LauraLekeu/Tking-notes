<template>
  <div>
    <Menu />
    <div class="page">
      <Header :title="title" />

      <div class="cards-dashboard">
        <div class="cards-cours">
          <div class="section-fields">
            <input
              v-model="formData.title"
              id="field-form-title"
              class="fields-form"
              type="text"
              name="titre-note"
              placeholder="Titre*"
            />
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
          <select v-model="formData.course" name="cours" id="menu-options">
            <option disabled value="">-- Sélectionner un cours --</option>
            <option
              v-for="course in courses"
              :key="course.id"
              :value="course.id"
            >
              {{ course.name }}
            </option>
          </select>
          <div class="content-separation"></div>

          <button @click="add" class="btn-todo active">Ajouter</button>

          <!-- <div>
                        <form action="">
                            <input class="" name="newtag" type="text" id="newtag" placeholder="Ajouter un nouveau tag">
                        </form>
                        <label for="cours" id="fleche-menu-options">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                <path
                                    d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg>
                        </label>
                    </div>
                    <div class="tags">
                        <div class="tag-note hover">HTML</div>
                        <div class="tag-note selected">Illustrator</div>
                        <div class="tag-note hover">XD</div>
                        <div class="tag-note hover">Photoshop</div>
                        <div class="tag-note hover">tag</div>
                        <div class="tag-note hover">CSS</div>
                    </div> -->
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
      title: "Nouvelle note",
      user: null,
      formData: {
        title: "",
        content: "",
        course: "",
        user: "",
      },
    };
  },
  methods: {
    add() {
      this.formData.user = this.$store.state.user.id;
      axios
        .post("http://127.0.0.1:8000/api/addNotes", this.formData, {
          headers: {
            Authorization: this.$cookies.get("token"),
          },
        })
        .then((response) => {
          // Notification si OK
          console.log(response);
          this.$store.dispatch("addNote", response.data.note);
          this.$notify({
            title: "Thank you !",
            text: "The resource has been added!",
            type: "success",
            speed: 600,
          });
        })
        .catch(() => {
          // Notification si problème durant la transaction
          this.$notify({
            title: "Oups...",
            text: "There is a problem with adding",
            type: "error",
            speed: 600,
          });
          this.email = "";
        });
      this.$router.push("/notes");
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
.formulaire-add {
  width: 100%;
  margin: 0;

  .cards-cours {
    width: 62%;
  }
}
</style>
