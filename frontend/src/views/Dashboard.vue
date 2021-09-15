<template>
  <div>
    <Menu />

    <div class="page">
      <Header :title="title" />

      <div class="cards-dashboard">
        <CardCoursesDash />
        <CardNotesDash />
        <CardTodosDash />
      </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import Menu from "@/components/Menu.vue";
import Header from "@/components/Header.vue";
import CardCoursesDash from "@/components/CardCoursesDash.vue";
import CardNotesDash from "@/components/CardNotesDash.vue";
import CardTodosDash from "@/components/CardTodosDash.vue";

export default {
  name: "Dashboard",
  components: {
    Menu,
    Header,
    CardCoursesDash,
    CardNotesDash,
    CardTodosDash,
  },
  data() {
    return {
      title: "Dashboard",
      user: null,
    };
  },
  methods: {},
};
</script>

<style lang="scss">
.page {
  position: absolute;
  left: 220px;
  padding: 2em;
  width: calc(100% - 220px);
  display: flex;
  flex-direction: column;
}

.cards-dashboard {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}
</style>
