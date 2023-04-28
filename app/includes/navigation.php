<header class="header">
  <nav>
    <!-- left navigation -->
    <a class="toggle-lg" role="button" onclick="dashbC.toggleMenu()">
      <i class="fas fa-bars"></i>
    </a>
    <a class="" href="<?php echo URLROOT; ?>home">Home</a>
    <!-- <a class="" href="#">Menu1</a> -->
  </nav>
  <!-- center navigation -->
  <!-- <nav> 
        Search..
      </nav>   -->
  <nav>
    <!-- right navigation -->
    <a class="" href="#">Notifications</a>
    <div class="drop">
      <a class="" onclick="showDrop(this);">
        <img src="<?php echo URLROOT; ?>public/img/user_avatar.png" alt="User_Photo">
        User
        <!-- User_Name -->
      </a>
      <div class="drop-content">
        <a href="#">Profile</a>
        <a href="#">Logout</a>
      </div>
    </div>
  </nav>
</header>

<div class="aside-overlay"></div>

<aside class="aside">
  <div>
    <a class="aside-logo" href="#">
      <!-- link to the website -->

      <span>
        <p><b>DUMMY</b></p>
        <p><small>Application</small></p>
      </span>
    </a>
    <a class="toggle-sm" role="button" onclick="dashbC.toggleMenu()">
      <i class="fas fa-bars"></i>
    </a>
  </div>
  <div class="aside-menu-wrap" id="aside_menu_wrap">
    <nav class="aside-menu">
      <a class="<?php echo ((strpos($data['title'], 'dashboard') !== false) ? 'active' : ''); ?>" href="<?php echo URLROOT; ?>home">
        <i class="fas fa-home"></i> <!-- fa-th -->
        <span>Dashboard</span>
      </a>

        <a class="<?php echo ((strpos($data['title'], 'songs') !== false) ? 'active' : ''); ?>" href="<?php echo URLROOT; ?>songs">
          <i class=" fas fa-music"></i> <!-- fa-list-alt -->
          <span>Songs</span>
        </a>

        <a class="<?php echo ((strpos($data['title'], 'universities') !== false) ? 'active' : ''); ?>" href="<?php echo URLROOT; ?>universities">
          <i class="fas fa-university"></i> <!-- fa-layer-plus -->
          <span>Universities</span>
        </a>


        <a class="" href="#">
          <i class="fas fa-box"></i> <!-- fa-cubes-->
          <span>Component</span>
        </a>


    </nav>
    <div class="scroll-menu hide">
      <a class="" onclick="scrollH.scrollMax();">
        <i class="fas fa-caret-up"></i>
        <!-- <span>Top</span> -->
      </a>
      <a class="" onclick="scrollH.scrollMin();">
        <i class="fas fa-caret-down"></i>
      </a>
    </div>
  </div>

</aside>