<template>
  <div @click="open">
    <div class="badge" :id="name">
      <img class="badge-img" :src="image" />
      <h3>{{ name }}</h3>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Badge',
  props: {
    name: String,
    image: String
  },
  methods: {
    open() {
      this.$emit('open');
    },
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.badge {
    display: flex;
    flex-direction: column;
    text-align: center;
    color: #212121;
}
.badge > img {
  height: 120px;
  background: rgba(188,224,238,1);
  background: -moz-linear-gradient(-45deg, rgba(188,224,238,1) 0%, rgba(188,224,238,1) 20%, rgba(242,226,78,1) 50%, rgba(188,224,238,1) 80%, rgba(188,224,238,1) 100%);
  background: -webkit-gradient(left top, right bottom, color-stop(0%, rgba(188,224,238,1)), color-stop(20%, rgba(188,224,238,1)), color-stop(50%, rgba(242,226,78,1)), color-stop(80%, rgba(188,224,238,1)), color-stop(100%, rgba(188,224,238,1)));
  background: -webkit-linear-gradient(-45deg, rgba(188,224,238,1) 0%, rgba(188,224,238,1) 20%, rgba(242,226,78,1) 50%, rgba(188,224,238,1) 80%, rgba(188,224,238,1) 100%);
  background: -o-linear-gradient(-45deg, rgba(188,224,238,1) 0%, rgba(188,224,238,1) 20%, rgba(242,226,78,1) 50%, rgba(188,224,238,1) 80%, rgba(188,224,238,1) 100%);
  background: -ms-linear-gradient(-45deg, rgba(188,224,238,1) 0%, rgba(188,224,238,1) 20%, rgba(242,226,78,1) 50%, rgba(188,224,238,1) 80%, rgba(188,224,238,1) 100%);
  background: linear-gradient(135deg, rgba(188,224,238,1) 0%, rgba(188,224,238,1) 20%, rgba(242,226,78,1) 50%, rgba(188,224,238,1) 80%, rgba(188,224,238,1) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#bce0ee', endColorstr='#bce0ee', GradientType=1 );
}
@media only screen and (max-width: 800px) {
  .badge > img {
    height: 60px;
  }
}
.badge-img{
    border-radius: 50%;
    transition: box-shadow .3s;
    border: 4px #f6e767 solid;
}
.badge-img:hover {
  box-shadow: 0 0 11px rgba(33,33,33,.6); 
}
h3 {
  position: relative;
  text-decoration: none;
  font-size: medium;
}
h3:before {
  content: "";
  position: absolute;
  width: 100%;
  height: 2px;
  bottom: -5px;
  left: 0;
  background-color: #000;
  visibility: hidden;
  -webkit-transform: scaleX(0);
  transform: scaleX(0);
  -webkit-transition: all 0.3s ease-in-out 0s;
  transition: all 0.3s ease-in-out 0s;
}
.badge:hover > h3:before {
  visibility: visible;
  -webkit-transform: scaleX(1);
  transform: scaleX(1);
}
</style>