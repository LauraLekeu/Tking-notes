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
              class="fields-form"
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
            title: "Thank you !",
            text: "The resource has been modified!",
            type: "success",
            speed: 600,
          });
          this.$store.dispatch("editCourse", { course: response.data.course });
        })
        .catch(() => {
          // Notification si problème durant la transaction
          this.$notify({
            title: "Oups...",
            text: "There is a problem during modification",
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
  created() {
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
