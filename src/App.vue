<script >
export default {
  data() {
    return {
      title: "Boolfolio Frontend"
    }
  },

  created() {
    axios.get('http://127.0.0.1:8000/api/projects').then((response) => {
      this.projects = response.data.data;
      })
  }
};
</script>

<template>
  <div class="container mt-5">
    <h1>{{ title }}</h1>
    <div v-for="project in projects">
      <ul>
      <li>Title: {{ project.title }}</li>
      <li>Description: {{ project.description }}</li>
    </ul>
    </div>
    
  </div>

</template>

<style lang="scss" scoped>
@use '/src/scss/general.scss';
</style>



