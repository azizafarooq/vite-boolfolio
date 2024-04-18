<script >
import ProjectList from './components/ProjectList.vue';
export default {
  data() {
    return {
      title: "Boolfolio Frontend"
    }
  },

  components:{ProjectList},

};
</script>

<template>
  <h1>{{ title }}</h1>
  <div class="container mt-5">
    <ProjectCard></ProjectCard>
  </div>

</template>

<style lang="scss" scoped>
@use '/src/scss/general.scss';
</style>



