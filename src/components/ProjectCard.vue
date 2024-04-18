<script>
export default {
    props: {project: Object}
};
</script>
<template>
    <div class="col">
      <div class="card h-100">
        <img class="card-img-top" v-if="project.image" :src="project.image">
        <div class="card-body">
          <h5 class="card-title">{{ project.title }}</h5>
          <p class="card-text">{{ project.description }}</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
</template>
<style lang="scss" scoped></style>