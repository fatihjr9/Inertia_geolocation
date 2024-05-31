<template>
  <div id="map" style="height: 500px;"></div>
</template>

<script>
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

export default {
  props: {
    wilayah: {
      type: Array,
      required: true
    }
  },
  mounted() {
    this.initMap();
  },
  methods: {
    initMap() {
      const map = L.map('map').setView([-7.51729100,110.59344100], 13);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      var points = [];

      // Loop melalui setiap lokasi di wilayah
      this.wilayah.forEach(location => {
          // Tambahkan koordinat lokasi ke dalam array points
          points.push([location.latitude, location.longitude]);

          // Tambahkan marker di lokasi
          L.marker([location.latitude, location.longitude])
              .bindPopup(location.kelurahan)
              .addTo(map);
      });

      // Membuat polyline yang menghubungkan titik-titik marker
      var polyline = L.polyline(points, {
          color: 'red',
          weight: 3,
          opacity: 0.5,
          smoothFactor: 0.5,
          dashArray: '10, 5'
      }).addTo(map);}}};
</script>

<style>
#map {
  width: 100%;
  height: 500px;
}
</style>