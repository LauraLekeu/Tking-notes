<template>
  <div id="app">
    <router-view />
    <notifications />
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "App",
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

<style lang="scss"></style>
