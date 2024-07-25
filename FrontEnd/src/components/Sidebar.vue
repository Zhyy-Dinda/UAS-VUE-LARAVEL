<script></script>

<template>
  <div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <div class="user">
          <div class="avatar-sm float-left mr-2">
            <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle" />
          </div>
          <div class="info">
            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
              <span>
                Hizrian
                <span class="user-level">Administrator</span>
                <span class="caret"></span>
              </span>
            </a>
            <div class="clearfix"></div>

            <div class="collapse in" id="collapseExample">
              <ul class="nav">
                <li>
                  <a href="#profile">
                    <span class="link-collapse">My Profile</span>
                  </a>
                </li>
                <li>
                  <a href="#edit">
                    <span class="link-collapse">Edit Profile</span>
                  </a>
                </li>
                <li>
                  <a href="#settings">
                    <span class="link-collapse">Settings</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav nav-primary">
          <li class="nav-item active">
            <router-link :to="{ name: 'home' }" class="navbar-brand"><i class="fa fa-dashboard" aria-hidden="true"></i>
              <p>Dashboard</p>
            </router-link>
          </li>
          <li class="nav-item ">
            <router-link :to="{ name: 'ruangs.index' }" class="navbar-brand"><i class="fas fa-home"></i>
              <p>Ruang</p>
            </router-link>
          </li>
          <li class="nav-item ">
            <router-link :to="{ name: 'user.index' }" class="navbar-brand"><i class="fas fa-user"></i>
              <p>User</p>
            </router-link>
          </li>
          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Components</h4>
          </li>
          <li class="nav-item">
            <a data-toggle="collapse" href="#base">
              <i class="fas fa-layer-group"></i>
              <p>Base</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="base">
              <ul class="nav nav-collapse">
                <li>
                  <a href="components/typography.html">
                    <span class="sub-item">Typography</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a data-toggle="collapse" href="#sidebarLayouts">
              <i class="fas fa-th-list"></i>
              <p>Sidebar Layouts</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="sidebarLayouts">
              <ul class="nav nav-collapse">
                <li>
                  <a href="icon-menu.html">
                    <span class="sub-item">Icon Menu</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <!-- <router-link :to="{ name: 'tests.index' }" class="navbar-brand">HOME</router-link> -->
          </li>
          <li class="nav-item">
            <a href="#">
            
              <i class="fas fa-desktop"></i>
              <p>Widgets</p>
              <span class="badge badge-success">4</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
