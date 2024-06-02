<script setup>
import Map from '@/Components/Map.vue';
import { defineProps } from 'vue';

defineProps({
  data: {
    type: Array,
    default: () => [],
  },
  wilayah: {
    type: Array,
    default: () => [],
  }
});
</script>

<template>
  <div class="layout">
    <p class="header">Kecamatan {{ data }}</p>
    <div>
      <p class="head-cls">Klusterisasi</p>
      <table class="table">
        <thead class="thead">
          <tr>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
          </tr>
        </thead>
        <tbody class="tbody">
          <tr>
            <td>C1</td>
            <td>C2</td>
            <td>C3</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="map">
      <p class="head-cls">Lokasi</p>
      <Map :wilayah="wilayah"/>
    </div>
  </div>
</template>

<style>
.layout {
  width: 100%;
  padding: 2rem;
}
.table {
  width: 100%;
  border-top-left-radius: .25rem; 
  border-top-right-radius: .25rem;
  border-collapse: collapse;
}
.thead {
  background-color: black;
  color: white;
}
.thead tr th {
  padding: .5rem 0;
}
.tbody {
  background: #f8f9ff;
  border-bottom: 1px solid #f1f2ff;
  text-align: center;
}
.header {
  font-size: 2rem;
  font-weight: 700;
  margin-bottom: 1rem;
}
.map {
  margin-top: 1rem;
}
.head-cls {
  font-size: 1.25rem;
  font-weight: 700;
  margin-bottom: 1rem;
}
</style>