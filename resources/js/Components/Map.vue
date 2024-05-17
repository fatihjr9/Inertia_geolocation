<template>
    <div ref="map" class="h-96 rounded-xl w-full"></div>
  </template>
  
  <script>
  import L from 'leaflet';
  import 'leaflet/dist/leaflet.css';
  
  export default {
    mounted() {
      this.map = L.map(this.$refs.map).setView([-7.515242,110.5838954], 14);
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(this.map);
    },
    beforeDestroy() {
      this.map.remove();
    }
  };
  </script>
  