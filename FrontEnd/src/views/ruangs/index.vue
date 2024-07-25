<script setup>
import { ref, onMounted } from "vue";
import api from "../../api";
// import  RouterLink  from 'vue-router'

const ruangs = ref([]);

const fetchDataRuangs = async () => {
  try {
    const response = await api.get('http://localhost:8000/api/ruangs');
    // Pastikan struktur data sesuai dengan yang diharapkan
    ruangs.value = response.data.data.data; // Sesuaikan ini dengan struktur data dari API
    console.log(ruangs.value);
  } catch (error) {
    console.error('Error fetching data:', error);
  }
};

onMounted(() => {
  fetchDataRuangs();
});
</script>

<template>
  <div class="main-panel">
    <div class="container">
      <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
          <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
              <h2 class="text-white pb-2 fw-bold">Ruang</h2>
              <h5 class="text-white op-7 mb-2">Admin Dashboard</h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
              <router-link
              :to="{ name: 'ruangs.create' }"
              class="btn btn-sm btn-success btn-rounded shadow border-0 mx-2"
            >
              <i class="fa fa-plus"> ADD USER</i>
            </router-link>
              <a href="#" class="btn btn-secondary btn-sm btn-round">Add Customer</a>
            </div>
          </div>
        </div>
      </div>
      <div class="page-inner mt--5">
        <div class="row mt--2">
          <div class="col-md-12">
            
            <div class="card border-0 rounded shadow">
              <div class="card-body">
                <!-- Tambahkan ini untuk debug -->
                <!-- <h1>{{ ruangs.length }}</h1> -->
                <table class="table table-striped">
                  <thead class="bg-dark text-dark b-bottom">
                    <tr>
                      <th scope="col">Nama Ruang</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col" class="text-center" style="width: 15%">#Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-if="ruangs.length === 0">
                      <td colspan="4" class="text-center">
                        <div class="alert alert-danger mb-0">Data Belum Tersedia!</div>
                      </td>
                    </tr>
                    <tr v-else v-for="(ruang, index) in ruangs" :key="index">
                      <td>{{ ruang.nama_ruang }}</td>
                      <td>{{ ruang.keterangan }}</td>
                      <td class="text-center">
                        <div class="d-flex gap-3">
                            <router-link :to="{ name: 'ruangs.edit' , params:{id: ruang.id} }" class="btn btn-sm btn-primary rounded-sm shadow border-0 me-2"><i class="fa fa-edit"></i></router-link>
                            <button class="btn btn-sm btn-danger rounded-sm shadow border-0"><i class="fa fa-trash"></i></button>
                          </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

         
          <div class="col-md-12">
            <div class="card full-height">
              <div class="card-body">
                <div class="card-title">Total income & spend statistics</div>
                <div class="row py-3">
                  <div class="col-md-4 d-flex flex-column justify-content-around">
                    <div>
                      <h6 class="fw-bold text-uppercase text-success op-8">Total Income</h6>
                      <h3 class="fw-bold">$9.782</h3>
                    </div>
                    <div>
                      <h6 class="fw-bold text-uppercase text-danger op-8">Total Spend</h6>
                      <h3 class="fw-bold">$1,248</h3>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div id="chart-container">
                      <canvas id="totalIncomeChart"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class="container-fluid">
        <nav class="pull-left">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="http://www.themekita.com/">ThemeKita</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Help</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Licenses</a>
            </li>
          </ul>
        </nav>
        <div class="copyright ml-auto">
          2018, made with <i class="fa fa-heart heart text-danger"></i> by
          <a href="http://www.themekita.com/">ThemeKita</a>
        </div>
      </div>
    </footer>
  </div>
</template>
<style>
 .gap-3{
  gap: 13px;
 }
 .b-bottom{
  border-bottom: 2 solid black;
  background-color: rgb(209, 209, 209);
 }
</style>