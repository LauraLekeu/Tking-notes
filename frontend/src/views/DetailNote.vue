<template>
  <div>
    <Menu />

    <div class="page">
      <Header :title="note.title" />

      <div class="cards-dashboard">
        <div class="cards-devoirs">
          <div class="section-fields">
            <div class="note-container">
              <!-- <div class="titre"> {{ note.title }} </div> -->
              {{ note.content }}
            </div>
          </div>
        </div>

        <div class="card-menu">
          <div class="icons">
            <div class="card-icons">
              <div class="icons-container">
                <router-link :to="`/edit/note-${note.id}`" class="icon-edit">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="currentColor"
                    class="bi bi-pencil-fill"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"
                    />
                  </svg>
                </router-link>
              </div>
              <div class="card-icons icons-container">
                <a href="#" class="card-icons">
                  <svg
                    @click="supprimer(note.id)"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="currentColor"
                    class="bi bi-trash-fill"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"
                    />
                  </svg>
                </a>
              </div>
            </div>
          </div>

          <div class="content-separation"></div>

          <div class="double-titre">
            <div class="card-titre">{{ course(note).name }}</div>
            <div class="card-date" style="margin-top: 1em">
              {{ formatDate(note.created_at) }}
            </div>
          </div>

          <!-- <div class="tags" style="margin-top: 1em;">
                        <div class="tag-note">CSS</div>
                        <div class="tag-note">HTML</div>
                    </div> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import moment from "moment";
// @ is an alias to /src
import Menu from "@/components/Menu.vue";
import Header from "@/components/Header.vue";

export default {
  name: "DetailTodo",
  components: {
    Menu,
    Header,
  },
  data() {
    return {};
  },
  methods: {
    formatDate(value) {
      if (value) {
        return moment(String(value)).format("DD MMM YYYY ");
      }
    },

    supprimer(id) {
      console.log(id);
      axios
        .post(
          "http://127.0.0.1:8000/api/deleteNotes",
          { id },
          {
            headers: {
              Authorization: this.$cookies.get("token"),
            },
          }
        )
        .then((response) => {
          console.log(response.data);
          // Notification si OK
          this.$store.dispatch("deleteNote", { note: response.data });
          console.log("note supprimée", response);
          this.$notify({
            title: "Thank you !",
            text: "The resource has been deleted!",
            type: "success",
            speed: 600,
          });
        })
        .catch(() => {
          // Notification si problème durant la transaction
          this.$notify({
            title: "Oups...",
            text: "There is a problem during deletion",
            type: "error",
            speed: 600,
          });
        });
      this.$router.push("/notes");
    },
  },
  computed: {
    note() {
      return this.$store.getters.getNoteById(this.$route.params.id);
    },
    course() {
      return (note) => {
        return this.$store.getters.getCoursesByNotesId(note);
      };
    },
    tags() {
      return (note) => {
        return this.$store.getters.getTagsById(note);
      };
    },
  },
  created() {
    this.$store.dispatch("setNotes", {
      cookie: this.$cookies.get("token"),
      user_id: this.$store.state.user.id,
    });
    this.$store.dispatch("setCourses", {
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
</style>
