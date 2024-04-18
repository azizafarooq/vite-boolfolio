<script >
import axios from 'axios';
import { store } from '../store';
import ProjectCard from './components/ProjectCard.vue';
export default {
  data() {
    return {
      store,
    }
  },

  created() {
    axios.get(store.api.baseUrl + 'projects').then((response) => {
      store.projects = response.data.data;
      })
  },

  components: { ProjectCard },
};
</script>

<template>
  <div class="row row-cols-4 g-3">
    <ProjectCard v-for="project in store.projects" :project="project"></ProjectCard>
  </div>
</template>

<style lang="scss" scoped>
@use '/src/scss/general.scss';
</style>
