<script setup>
 import { ref } from "vue";

//import router
import { useRouter } from 'vue-router';

//import api
import api from "../../api";

//init router
const router = useRouter();

//define state
const nama_ruang = ref("");
const keterangan = ref("");
const errors = ref([]);

//method for handle file changes
// const handleFileChange = (e) => {
//     //assign file to state
//     image.value = e.target.files[0];
// };

//method "storePost"
const storeRuang = async () => {

    //init formData
    let formData = new FormData();

    //assign state value to formData
    formData.append("nama_ruang", nama_ruang.value);
    formData.append("keterangan", keterangan.value);

    //store data with API
    await api.post('http://localhost:8000/api/ruangs', formData)
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
                        <form @submit.prevent="storeRuang()">
                           
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama ruang</label>
                                <input type="text" class="form-control" v-model="nama_ruang" placeholder="Nama Ruang">
                                <div v-if="errors.nama_ruang" class="alert alert-danger mt-2">
                                    <span>{{ errors.nama_ruang[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Keterangan</label>
                                <textarea class="form-control" v-model="keterangan" rows="5" placeholder="Content Post"></textarea>
                                <div v-if="errors.keterangan" class="alert alert-danger mt-2">
                                    <span>{{ errors.keterangan[0] }}</span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-md btn-primary rounded-sm shadow border-0">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 </div>
</div>
</template>