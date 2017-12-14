<template>
  <gmap-map
    :center="center"
    :zoom="17"
    style="width: 100%; height: 300px"
  >
    <gmap-marker
      :key="index"
      v-for="(m, index) in markers"
      :position="m.position"
      :clickable="true"
      :draggable="true"
      @click="center=m.position"
    ></gmap-marker>
  </gmap-map>
</template>
 
<script>
  import * as VueGoogleMaps from 'vue2-google-maps';
  import Vue from 'vue';
 
  Vue.use(VueGoogleMaps, {
    load: {
      key: 'AIzaSyDGBZFTU63DLw8x2_gVaE_A4VfRfUV6CCw'
    }
  });
 
  export default {
    data () {
      return {
        center: {lat: 42.000645, lng: 21.413479},
        markers: [{
          position: {lat: 42.000645, lng: 21.413479}
        },]
      }
    }
  }
</script> 