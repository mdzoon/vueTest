<template>
  <div class="info" :id="name">
    <h5>{{ name }}</h5>
    <p>{{ hero_information }}</p>
    <ul :id="hero_basic_details">
        <li>{{ hero_basic_details }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'InfoPanel',
  props: {
    name: String,
    hero_information: Object,
    hero_basic_details: Object
  },

}
</script>