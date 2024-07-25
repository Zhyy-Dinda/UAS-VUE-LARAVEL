<script setup>
//import ref
import { ref, onMounted } from "vue";

//import router
import { useRouter, useRoute } from "vue-router";

//import api
import api from "../../api";

//init router
const router = useRouter();

//init route
const route = useRoute();

//define state
const nama_ruang = ref("");
const keterangan = ref("");
const errors = ref([]);
//onMounted
onMounted(async () => {
  //fetch detail data ruang by ID
  await api.get(`/api/ruangs/${route.params.ruang_id}`).then((response) => {
    //set response data to state
    nama_ruang.value = response.data.data.nama_ruang;
    keterangan.value = response.data.data.keterangan;
  });
});


//method "updateRuang"
const updateRuang = async () => {
  //init formData
  let formData = new FormData();

  //assign state value to formData
  formData.append("nama_ruang", nama_ruang.value);
  formData.append("keterangan", keterangan.value);
  formData.append("_method", "PATCH");

  //store data with API
  await api
    .ruang(`/api/ruangs/${route.params.ruang_id}`, formData)
    .then(() => {
      //redirect
      router.push({ path: "/ruangs" });
    })
    .catch((error) => {
      //assign response error data to state "errors"
      errors.value = error.response.data;
    });
};
</script>

<template>
  <div class="main-panel p-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card border-0 rounded shadow">
            <div class="card-body">
              <form @submit.prevent="updateRuang()">
               
                <div class="mb-3">
                  <label class="form-label fw-bold">Nama ruang</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="nama_ruang"
                    placeholder="nama_ruang "
                  />
                  <div v-if="errors.nama_ruang" class="alert alert-danger mt-2">
                    <span>{{ errors.nama_ruang[0] }}</span>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bold">Keterangan</label>
                  <textarea
                    class="form-control"
                    v-model="keterangan"
                    rows="5"
                    placeholder="Keterangan"
                  ></textarea>
                  <div v-if="errors.keterangan" class="alert alert-danger mt-2">
                    <span>{{ errors.keterangan[0] }}</span>
                  </div>
                </div>
                <button
                  type="submit"
                  class="btn btn-md btn-primary rounded-sm shadow border-0"
                >
                  Update
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
