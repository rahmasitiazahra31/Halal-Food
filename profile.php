<?php require_once 'auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile | Halal Food</title>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  <!-- AdminLTE -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <style>

    .content-wrapper{
      background-color: #f4f6f9;
      min-height: 100vh;
    }

    .profile-card {
      border: none;
      border-radius: 20px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.15);
      background-color: #ffffff;
      overflow: hidden;
    }

    .profile-header-bg {
      background: linear-gradient(135deg, #117a8b 0%, #17a2b8 100%);
      padding: 40px 20px;
      text-align: center;
      color: white;
    }

    .profile-avatar {
      width: 110px;
      height: 110px;
      border-radius: 50%;
      border: 5px solid rgba(255,255,255,0.3);
      object-fit: cover;
      margin-bottom: 15px;
    }

    .badge-plus {
      background-color: #ffc107;
      color: #212529;
      font-weight: bold;
      padding: 5px 15px;
      border-radius: 50px;
      font-size: 0.75rem;
      letter-spacing: 1px;
    }

    .menu-item {
      border: none;
      padding: 18px 20px;
      display: flex;
      align-items: center;
      color: #444;
      transition: all 0.3s;
      text-decoration: none;
    }

    .menu-item:hover {
      background-color: #f8f9fa;
      color: #117a8b;
      text-decoration: none;
    }

    .menu-icon {
      width: 35px;
      height: 35px;
      background-color: #f0f7f8;
      color: #117a8b;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 15px;
    }

  </style>

</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">

  <?php include 'sidebar.php'; ?>

  <div class="content-wrapper">

    <div class="container pt-4">

      <div class="row justify-content-center">

        <div class="col-md-5">

          <div class="profile-card">

            <!-- PROFILE HEADER -->
            <div class="profile-header-bg">

              <img src="image/user.jpg"
              class="profile-avatar shadow"
              alt="User">

              <h3 class="font-weight-bold mb-1">
                <?= $_SESSION['username']; ?>
              </h3>

              <div class="mb-2">

                <span class="badge-plus text-uppercase">
                  Halalify Plus Member
                </span>

              </div>

              <p class="mb-0 opacity-75">
                Good food, pure soul, peaceful journey ✨
              </p>

            </div>

            <!-- BODY -->
            <div class="p-4">

              <!-- EDIT PROFILE -->
              <a href="edit_profile.php"
              class="btn btn-success btn-block rounded-pill font-weight-bold shadow-sm py-2 mb-4">

                <i class="fas fa-edit mr-2"></i>
                Edit Profile

              </a>

              <!-- ACCOUNT -->
              <h6 class="text-muted font-weight-bold mb-3 small"
              style="letter-spacing:1px;">

                ACCOUNT ACTIVITY

              </h6>

              <div class="list-group mb-4">

                <a href="saved.php"
                class="menu-item border-bottom">

                  <div class="menu-icon">
                    <i class="fas fa-bookmark"></i>
                  </div>

                  <span>Bookmarks</span>

                  <i class="fas fa-chevron-right ml-auto text-muted small"></i>

                </a>

                <a href="#"
                class="menu-item">

                  <div class="menu-icon">
                    <i class="fas fa-globe"></i>
                  </div>

                  <span>Language (English)</span>

                  <i class="fas fa-chevron-right ml-auto text-muted small"></i>

                </a>

              </div>

              <!-- SUPPORT -->
              <h6 class="text-muted font-weight-bold mb-3 small"
              style="letter-spacing:1px;">

                SUPPORT

              </h6>

              <div class="list-group">

                <a href="#"
                class="menu-item border-bottom">

                  <div class="menu-icon">
                    <i class="fas fa-headset"></i>
                  </div>

                  <span>Help & Support</span>

                  <i class="fas fa-chevron-right ml-auto text-muted small"></i>

                </a>

                <a href="#"
                class="menu-item">

                  <div class="menu-icon">
                    <i class="fas fa-info-circle"></i>
                  </div>

                  <span>About Halal Food</span>

                  <i class="fas fa-chevron-right ml-auto text-muted small"></i>

                </a>

              </div>

              <!-- LOGOUT -->
              <div class="text-center mt-5">

                <a href="logout.php"
                class="btn btn-link text-danger font-weight-bold">

                  <i class="fas fa-sign-out-alt mr-2"></i>
                  Log Out

                </a>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>

<!-- JS -->
<script src="plugins/jquery/jquery.min.js"></script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="dist/js/adminlte.min.js"></script>

</body>
</html>