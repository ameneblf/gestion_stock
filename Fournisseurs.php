<?php
session_start();
include_once('db/connexion.php');
if (!isset($_SESSION['loggedin'])) {
  header('refresh:0;url=404.php'); //2 s
  exit();
}
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Fournisseurs</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="assets/img/favicon/Asset 1.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>


  <!-- Core CSS -->
  <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="assets/js/config.js"></script>
</head>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="dashboard.php" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Welcome</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item ">
            <a href="dashboard.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>
          <!-- Cards -->
          <li class="menu-item">
            <a href="client.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user"></i>
              <div data-i18n="Basic">Client</div>
            </a>
          </li>
          <li class="menu-item active">
            <a href="Fournisseurs.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-buildings"></i>
              <div data-i18n="Fournisseurs">Fournisseurs</div>
            </a>
          </li>
          <!-- Forms & Tables -->
          <li class="menu-header small text-uppercase"><span class="menu-header-text">Tables (Achat & vente)</span></li>
          <!-- Tables -->
          <li class="menu-item">
            <a href="vente.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-grid-alt"></i>
              <div data-i18n="Tables">Vente</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="achat.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-table"></i>
              <div data-i18n="Tables">Achat</div>
            </a>
          </li>
          <!-- Misc -->
          <li class="menu-header small text-uppercase"><span class="menu-header-text">Produits</span></li>
          <li class="menu-item">
            <a href="prod.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-package"></i>
              <div data-i18n="Produits">Produits</div>
            </a>
          </li>
        </ul>
      </aside>
      <!-- / Menu -->
      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search 
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
               /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Place this tag where you want the button to render. -->
              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="assets/img/avatars/55.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="assets/img/avatars/55.png" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block"><?php echo $_SESSION['username']; ?></span>
                          <small class="text-muted"><?php echo $_COOKIE['type_user']; ?></small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="setting.php">
                      <i class="bx bx-cog me-2"></i>
                      <span class="align-middle">Settings</span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="logout.php">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
              <div class="row">

                <div class="col-md-6">
                  <h5 class="card-header"> <strong>Table</strong> Fournisseurs</h5>
                </div>
                <div class="col-md-4 " style="margin-left: auto;text-align-last: right; align-self: center; padding-right: calc(var(--bs-gutter-x) * 0.9);">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary bx bx-message-square-add" data-bs-toggle="modal" data-bs-target="#modalCenter">
                  </button>
                </div>
              </div>
              <!-- Modal -->
              <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <form action="" method="POST">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Add Fournisseur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col mb-3">
                            <label for="nameWithTitle" class="form-label">Name Fournisseur</label>
                            <input type="text" name="name_Fourni" id="nameWithTitle" class="form-control" placeholder="Enter Name" required>
                          </div>
                        </div>
                        <div class="row g-2">
                          <div class="col mb-0">
                            <label for="AddresseWithTitle" class="form-label">Addresse</label>
                            <input type="text" name="Addresse_Fourni" id="AddresseWithTitle" class="form-control" placeholder="N°X xxxx xxx,xx" required>
                          </div>
                          <div class="col mb-0">
                            <label for="TelephoneWithTitle" class="form-label">Telephone</label>
                            <input type="text" pattern="(06|05|08|07)[0-9]{8}" name="tele_Fourni" id="TelephoneWithTitle" class="form-control" placeholder="06|07|05xx xxxxxx" required>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <label for="noteWithTitle" class="form-label">Note Fournisseur</label>
                            <input type="text" name="note_Fourni" id="noteWithTitle" class="form-control" placeholder="Enter note">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                          Close
                        </button>
                        <button type="submit" name="add" class="btn btn-primary">Add</button>
                      </div>
                    </div>
                  </form>
                  <?php
                  if (isset($_POST['add'])) {
                    $name = $_POST['name_Fourni'];
                    $adresse = $_POST['Addresse_Fourni'];
                    $tele = $_POST['tele_Fourni'];
                    $note = $_POST['note_Fourni'];
                    $query = "INSERT INTO `fournisseurs`(`nom_fourn`, `adresse_fourn`, `tele_fourn`, `note_fourn`) VALUES ('$name','$adresse','$tele','$note')";
                    session_start();
                    $conn->query($query);
                  }
                  ?>
                </div>
              </div>

              <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Id Fournisseur</th>
                      <th>Fournisseur</th>
                      <th>Addresse Fournisseur</th>
                      <th>Telephone Fournisseur</th>
                      <th>Note Fournisseur</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    <?php
                    $sql = "SELECT * from fournisseurs";
                    $query = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($query) > 0) {
                      while ($row = mysqli_fetch_assoc($query)) {
                        echo "<tr>
                        <td><strong>" . $row["id_fourn"] . "</strong></td>
                        <td>" . $row["nom_fourn"] . "</td>
                        <td>" . $row["adresse_fourn"] . "</td>
                        <td>" . $row["tele_fourn"] . "</td>
                        <td>";
                        if ($row["note_fourn"] == "") {
                          echo "NULL</td>";
                        } else {
                          echo $row["note_fourn"] . "</td>";
                        };
                        if ($_COOKIE['type_user'] == "admin") {
                          echo "<td>
                          <div class=\"dropdown\">
                            <button type=\"button\" class=\"btn p-0 dropdown-toggle hide-arrow\" data-bs-toggle=\"dropdown\">
                              <i class=\"bx bx-dots-vertical-rounded\"></i>
                            </button>
                            <div class=\"dropdown-menu\">
                              <a class=\"dropdown-item\" data-bs-toggle=\"modal\" data-bs-target=\"#modal" . $row["id_fourn"] . "\" href=Fournisseurs.php?id_fourn=" . $row["id_fourn"] . "><i class=\"bx bx-edit-alt me-1\"></i> Edit</a>
                              <a class=\"dropdown-item\" href=Fournisseurs.php?id_del=" . $row["id_fourn"] . "><i class=\"bx bx-trash me-1\"></i> Delete</a>
                            </div>
                          </div>
                        </td>
                      </tr>";
                        }else{
                        echo "<td>NULL</td>
                        </tr>";
                        }
                        echo "<div class=\"modal fade\" id=\"modal" . $row["id_fourn"] . "\" tabindex=\"-1\" style=\"display: none;\" aria-hidden=\"true\">
                      <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
                        <form action=\"\" method=\"GET\">
                          <div class=\"modal-content\">
                            <div class=\"modal-header\">
                              <h5 class=\"modal-title\" id=\"modalCenterTitle\">Update Fournisseur : " . $row["id_fourn"] . "</h5>
                              <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                            </div>
                            <div class=\"modal-body\">
                            <div class=\"row\" style =\"display:none; \">
                              <div class=\"col mb-3\">
                                <label for=\"nameWithTitle\" class=\"form-label\">id Fournisseur</label>
                                <input type=\"text\" name=\"id_Fourni\" value=\"" . $row["id_fourn"] . "\" id=\"nameWithTitle\" class=\"form-control\" placeholder=\"Enter Name\" required>
                              </div>
                            </div>
                              <div class=\"row\">
                                <div class=\"col mb-3\">
                                  <label for=\"nameWithTitle\" class=\"form-label\">Name Fournisseur</label>
                                  <input type=\"text\" name=\"name_Fourni\" id=\"nameWithTitle\" class=\"form-control\" placeholder=\"Enter Name\" required>
                                </div>
                              </div>
                              <div class=\"row g-2\">
                                <div class=\"col mb-0\">
                                  <label for=\"AddresseWithTitle\" class=\"form-label\">Addresse</label>
                                  <input type=\"text\" name=\"Addresse_Fourni\" id=\"AddresseWithTitle\" class=\"form-control\" placeholder=\"N°X xxxx xxx,xx\" required>
                                </div>
                                <div class=\"col mb-0\">
                                  <label for=\"TelephoneWithTitle\" class=\"form-label\">Telephone</label>
                                  <input type=\"text\" pattern=\"(06|05|08|07)[0-9]{8}\" name=\"tele_Fourni\" id=\"TelephoneWithTitle\" class=\"form-control\" placeholder=\"06|07|05xx xxxxxx\" required>
                                </div>
                              </div>
                              <div class=\"row\">
                                <div class=\"col mb-3\">
                                  <label for=\"noteWithTitle\" class=\"form-label\">Note Fournisseur</label>
                                  <input type=\"text\" name=\"note_Fourni\" id=\"noteWithTitle\" class=\"form-control\" placeholder=\"Enter note\" >
                                </div>
                              </div>
                            </div>
                            <div class=\"modal-footer\">
                              <button type=\"button\" class=\"btn btn-outline-secondary\" data-bs-dismiss=\"modal\">
                                Close
                              </button>
                              <button type=\"submit\" name=\"Update\" class=\"btn btn-primary\">Update</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>";
                      }
                    }
                    if (isset($_GET['Update'])) {
                      $id = $_GET['id_Fourni'];
                      $name = $_GET['name_Fourni'];
                      $adresse = $_GET['Addresse_Fourni'];
                      $tele = $_GET['tele_Fourni'];
                      $note = $_GET['note_Fourni'];
                      $query = "UPDATE `fournisseurs` SET `nom_fourn`='$name',`adresse_fourn`='$adresse',`tele_fourn`='$tele',`note_fourn`='$note' WHERE `id_fourn`=$id";
                      $conn->query($query);
                    }
                    if (isset($_GET['id_del'])) {
                      if ($_COOKIE['type_user'] == "admin") {
                        $query = "DELETE FROM `fournisseurs` WHERE `id_fourn`=$_GET[id_del]";
                        $conn->query($query);
                      } else {
                        echo "<script>alert(\"you can't deleted your type $_COOKIE[type_user] \")</script>";
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <script>
            var alert = document.getElementById("alert");
            setTimeout(function() {
              alert.style.display = 'none';
            }, 3000);
          </script>
        </div>
        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="assets/vendor/libs/jquery/jquery.js"></script>
        <script src="assets/vendor/libs/popper/popper.js"></script>
        <script src="assets/vendor/js/bootstrap.js"></script>
        <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

        <script src="assets/vendor/js/menu.js"></script>
        <!-- endbuild -->

        <!-- Vendors JS -->
        <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

        <!-- Main JS -->
        <script src="assets/js/main.js"></script>

        <!-- Page JS -->
        <script src="assets/js/dashboards-analytics.js"></script>

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>