<script setup>
import Navbar from "./components/navbar.vue";
import Sidebar from "./components/Sidebar.vue";
import Home from "./views/dashboard.vue"
</script>

<template>
  <div>
  <!-- <h1>zaini</h1> -->
    <!-- <ButtonCounter /> -->
    <Navbar />
    <Sidebar />
    <!-- <Home /> -->
    <router-view></router-view>
  </div>
 
</template>


