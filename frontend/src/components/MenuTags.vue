<template>

<div>
    <div v-for="tag in tags" :key="tag.id" class="menu-tag tags">
        <div class="tag-note"> {{ tag.name }} </div>
    </div>
</div>
  
        
</template>

<script>
export default {
  name: 'MenuTags',
  props: {

  },
  computed: {
    tags() {
        return this.$store.getters.getTags;
    },
  },
  created() {
      this.$store.dispatch('setTags');
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">


</style>
