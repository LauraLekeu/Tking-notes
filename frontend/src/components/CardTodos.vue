<template>
  <!-- star card -->

  <div class="card-devoirs">
    <div v-for="todo in todos" :key="todo.id">
      <div
        v-if="todo.completed === 0"
        class="card-style-2 cards-hover"
        style="margin-bottom: 1em"
      >
        <div>
          <div class="card-container">
            <div class="icon-circle">
              <svg
                @click="edit(todo.id)"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="currentColor"
                class="bi bi-app"
                viewBox="0 0 16 16"
              >
                <path
                  d="M11 2a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V5a3 3 0 0 1 3-3h6zM5 1a4 4 0 0 0-4 4v6a4 4 0 0 0 4 4h6a4 4 0 0 0 4-4V5a4 4 0 0 0-4-4H5z"
                />
              </svg>
            </div>
            <div class="texts-content">
              <p class="text-title">
                <strong style="font-weight: 500">
                  {{ formatDate(todo.deadline) }}
                </strong>
                -
                {{ course(todo).name }}
              </p>
              <p class="text-content">{{ todo.content }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div
      class="content-separation"
      style="opacity: 70%; border-bottom: 1px solid #d1d1d1; margin-top: 2em"
      v-if="todos.length"
    >
      Tâches terminées
    </div>

    <div>
      <div v-for="todo in todos" :key="todo.id">
        <div
          v-if="todo.completed === 1"
          class="card-style-2 completed"
          style="margin-bottom: 1em"
        >
          <div class="card-container">
            <div class="icon-circle">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="30"
                height="30"
                fill="currentColor"
                class="bi bi-check"
                viewBox="0 0 16 16"
              >
                <path
                  d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"
                />
              </svg>
            </div>
            <div class="texts-content">
              <p class="text-title">
                <strong style="font-weight: 500">
                  {{ formatDate(todo.deadline) }}</strong
                >
                - {{ course(todo).name }}
              </p>
              <p class="text-content">{{ todo.content }}</p>
            </div>
          </div>
          <div class="card-icons">
            <svg
              @click="supprimer(todo.id)"
              xmlns="http://www.w3.org/2000/svg"
              width="22"
              height="22"
              fill="currentColor"
              class="bi bi-trash-fill"
              viewBox="0 0 16 16"
            >
              <path
                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"
              />
            </svg>
          </div>
        </div>
      </div>
    </div>

    <!-- end card -->
  </div>
</template>

<script>
import axios from "axios";
import moment from "moment";

export default {
  name: "CardDevoirs",
  props: {},
  data() {
    return {
      formData: {
        id: null,
        completed: "",
        user: "",
      },
    };
  },
  methods: {
    formatDate(value) {
      if (value) {
        return moment(String(value)).format("DD MMM YYYY ");
      }
    },
    edit(todo) {
      // if (data) {
      this.formData.completed = 1;
      this.formData.id = todo;
      this.formData.user = this.$store.state.user.id;
      console.log("form data", this.formData);
      axios
        .post("http://127.0.0.1:8000/api/editTodos", this.formData, {
          headers: {
            Authorization: this.$cookies.get("token"),
          },
        })
        .then((response) => {
          console.log(response);
          // Notification si OK
          this.$notify({
            title: "Bien joué !",
            text: "Tâche accomplie !",
            type: "success",
            speed: 600,
          });
          this.$store.dispatch("editTodo", { todo: response.data.todo });
        })
        .catch((e) => {
          console.log("ERROR", e);
          // Notification si problème durant la transaction
          this.$notify({
            title: "Oups...",
            text: "There is a problem during modification",
            type: "error",
            speed: 600,
          });
        })
        .finally(() => {
          // this.$router.push(`/note-${this.$route.params.id}`);
        });
    },
    supprimer(id) {
      console.log(id);
      axios
        .post(
          "http://127.0.0.1:8000/api/deleteTodos",
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
          this.$store.dispatch("deleteTodo", { todo: response.data });
          this.$notify({
            title: "Merci !",
            text: "La tâche a bien été supprimée!",
            type: "success",
            speed: 600,
          });
        })
        .catch(() => {
          // Notification si problème durant la transaction
          this.$notify({
            title: "Oups...",
            text: "Problème pendant la suppression",
            type: "error",
            speed: 600,
          });
        });
      this.$router.push("/taches");
    },
  },
  computed: {
    todos() {
      return this.$store.getters.getTodos;
    },
    course() {
      return (todo) => {
        return this.$store.getters.getCoursesByTodosId(todo);
      };
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
    this.$store.dispatch("setCourses", {
      cookie: this.$cookies.get("token"),
      user_id: this.$store.state.user.id,
    });
  },
  mounted() {},
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
.card-devoirs {
  margin-bottom: 1em;
}

.card-style-2 {
  background: #fff;
  box-shadow: 1px 1px 20px $color-light;
  color: $color-dark;
  border-radius: 10px;
  padding: 10px 20px;
  display: flex;
  justify-content: space-between;

  &.completed {
    color: $color-medium;
  }

  .card-container {
    display: flex;
    align-items: center;

    .texts-content {
      margin-left: 20px;
    }
  }

  .card-icons {
    margin-top: 1em;
    cursor: pointer;
    color: $color-medium;
    width: 24px;
    height: 24px;

    &:hover {
      color: $color-dark;
    }
  }
}
</style>
