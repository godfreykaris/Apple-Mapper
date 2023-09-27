<div class="container-fluid sticky-top" style="background-color: rgb(4, 38, 84);">
  <nav id="main_navbar" class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="">
        <img src="./images/logo.jpg" alt="Logo" width="30" height="30" class="d-inline-block align-top rounded">
        <b>Apple Mapper</b>
      </a>

      <button class="navbar-toggler" type="button" style="color: rgb(236, 132, 17)" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <span class="navbar-toggler-icon">
          <i class="fa fa-bars" style="color: #fff; font-size: 28px;"></i>
        </span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/index.php">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#about-section">About</a>
          </li>

          <?php
            if (!$isSignedIn) {
              echo '
                <ul class="navbar-nav ml-auto"> 
                  <li class="nav-item active">
                    <a class="nav-link" href="./login/login.php">Sign In</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="./register/user/register-user.php">Sign Up</a>
                  </li>
                </ul>
              ';
            } else {
              echo '
                <ul class="navbar-nav ml-auto"> 
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Profile</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Logout</a>
                  </li>
                </ul>
              ';
            }
          ?>

        </ul>
      </div>
    </div>
  </nav>
</div>
