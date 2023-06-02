<navbar class="navbar navbar-fixed-top">
  <div class="navbar-container">
    <a class="navbar-title" href="index.php"><img src="img/logo_no_text.png"> <span>Jadwal KRL Online</span></a>
      <div class="navbar-nav">
        <?php if (isset($_SESSION['id_user'])): ?>
          <a class="button" href="jadwal.php">Jadwal</a>
          <a class="button" href="stasiun.php">Stasiun</a>
          <a class="button" href="profile.php">Profile</a>
          <a class="button" href="logout.php">Logout</a>
        <?php else: ?>
          <a class="button" href="login.php">Login</a>
        <?php endif ?>
      </div>
  </div>
</navbar>
