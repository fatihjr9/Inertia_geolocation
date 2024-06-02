<template>
  <div id="map" style="height: 500px;"></div>
</template>

<script>
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import jsPDF from 'jspdf';
import 'jspdf-autotable';
import html2canvas from 'html2canvas';
import axios from 'axios';

export default {
  props: {
    wilayah: {
      type: Array,
      required: true
    }
  },
  mounted() {
    this.initMap();
    window.vueInstance = this; // Store Vue instance globally
  },
  methods: {
    initMap() {
      const map = L.map('map').setView([-7.51729100, 110.59344100], 13);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      this.wilayah.forEach((location) => {
        const popupContent = document.createElement('div');
        const kelurahanText = document.createElement('p');
        kelurahanText.textContent = location.kelurahan;

        const downloadButton = document.createElement('button');
        downloadButton.textContent = 'Download PDF';
        downloadButton.className = 'bg-emerald-500 text-white p-2 rounded-lg w-full';
        downloadButton.addEventListener('click', () => {
          this.downloadPDF(location.kelurahan, map);
        });

        popupContent.appendChild(kelurahanText);
        popupContent.appendChild(downloadButton);

        L.marker([location.latitude, location.longitude])
          .bindPopup(popupContent)
          .addTo(map);
      });
    },
    async downloadPDF(kelurahan, map) {
      try {
        const response = await axios.get(`/api/kriteria/${kelurahan}`);
        const { wilayah, kriteria } = response.data;

        // Pan to the target location and wait for it to render
        map.setView([wilayah.latitude, wilayah.longitude], 13);

        await new Promise(resolve => setTimeout(resolve, 2000)); // Wait for the map to fully render

        const canvas = await html2canvas(document.getElementById('map'), {
          useCORS: true // Ensure cross-origin images are rendered correctly
        });
        const imgData = canvas.toDataURL('image/png');

        const pdf = new jsPDF();
        pdf.text(20, 20, `Kelurahan: ${wilayah.kelurahan}`);
        pdf.text(20, 30, `Latitude: ${wilayah.latitude}`);
        pdf.text(20, 40, `Longitude: ${wilayah.longitude}`);
        pdf.text(20, 50, 'Kriteria:');

        // Create the table for criteria
        const tableColumn = ["C1", "C2", "C3"];
        const tableRows = [];

        kriteria.forEach((k) => {
          const kriteriaData = [k.c1, k.c2, k.c3];
          tableRows.push(kriteriaData);
        });

        pdf.autoTable({
          head: [tableColumn],
          body: tableRows,
          startY: 60,
          theme: 'grid'
        });

        const imgWidth = 180;
        const imgHeight = (canvas.height * imgWidth) / canvas.width;
        pdf.addImage(imgData, 'PNG', 15, pdf.autoTable.previous.finalY + 10, imgWidth, imgHeight);
        pdf.save(`${wilayah.kelurahan}.pdf`);
      } catch (error) {
        console.error('Error generating PDF', error);
      }
    }
  }
};
</script>

<style>
#map {
  width: 100%;
  height: 500px;
}
</style>