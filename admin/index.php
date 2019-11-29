<?php
include('a_baza.php');
$korisnici = $db->svi_korisnici();
if(isset($_POST['btnObrisi'])) {
  $id = $_POST['slID'];
  $db->obrisiKorisnika($id);
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>

<body id="page-top">

  <?php include('navbar.php'); ?>

  <div id="wrapper">

    <?php include('sidebar.php'); ?>


    <div id="content-wrapper">
      <div class="container-fluid">

        <!-- Naslov-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item font-weight-bold">
            <a href="#">Administrative area</a>
          </li>
          <li class="breadcrumb-item active font-weight-bold">Home page</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white border border-primary o-hidden h-100 bckg-dark">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-bars"></i>
                </div>
                <div class="mr-5 font-weight-bold">Room list</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="rooms.php">
                <span class="float-left font-weight-bold">More...</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white border border-primary o-hidden h-100 bckg-dark">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-star"></i>
                </div>
                <div class="mr-5 font-weight-bold">Categories</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="opisSoba.php">
                <span class="float-left font-weight-bold">More...</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white border border-primary o-hidden h-100 bckg-dark">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-book"></i>
                </div>
                <div class="mr-5 font-weight-bold">All reservations</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="reservations.php">
                <span class="float-left font-weight-bold">More...</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white border border-primary o-hidden h-100 bckg-dark">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-users"></i>
                </div>
                <div class="mr-5 font-weight-bold">Mailing list</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="newsLetterUsers.php">
                <span class="float-left font-weight-bold">More...</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <!-- Tabela -->
        <div class="card mb-3">
          <div class="card-header">
            <br>            
              <h3 class=" text-center font-weight-bold" > ♦♦♦♦♦♦♦♦♦ List of all users ♦♦♦♦♦♦♦♦♦ </h3>
           
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr class="text-center">
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Personal ID</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>User Type</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr class="text-center">
                  <th>Name</th>
                    <th>Surname</th>
                    <th>Personal ID</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>User Type</th>
                    <th>Delete</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php foreach ($korisnici as $k) : ?>
                    <tr class='text-center'>
                      <td><?= $k['name'] ?></td>
                      <td><?= $k['surname'] ?></td>
                      <td><?= $k['personal_id'] ?></td>
                      <td><?= $k['address'] ?></td>
                      <td><?= $k['city'] ?></td>
                      <td><?= $k['country'] ?></td>
                      <td><?= $k['email'] ?></td>
                      <td><?= $k['tel'] ?></td>
                      <td><?= ($k['user_type'] == 1) ? 'Admin' : 'Korisnik' ?></td>
                      
                      <td class='text-center'>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                          <input type="hidden" name="slID" value="<?= $k['id'] ?>">
                          <button type="submit" class="btn btn-dark text-primary" onclick="return confirm('Da li ste sigurni da želite da obrišete korisnika?')" name="btnObrisi">Delete</button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer text-muted">Copyright © Hotel Heiden 2019</div>
        </div>

      </div>
  
      <?php include('footer.php'); ?>

    </div>


  </div>




  
</body>

</html>