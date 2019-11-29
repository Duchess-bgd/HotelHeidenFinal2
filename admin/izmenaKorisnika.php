<?php
include('a_baza.php');

$id = (isset($_GET['id'])) ? $_GET['id'] : die("Nije unet id osobe!");
$korisnik = $db->selectKorisnika($id);

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
          <li class="breadcrumb-item">
            <a href="index.php">Administracija</a>
          </li>
          <li class="breadcrumb-item active">Izmena korisnika</li>
        </ol>

        <form class="col-md-10 offset-1" action="inc/snimiKorisnika.php?id=<?= $id ?>" method="POST">
          <div class="form-group col-md-4">
            <input type="hidden" name="user_type" value="<?= $korisnik['user_type'] ? '1' : '0' ?>">
                Admin <input type="radio"  name="user_type" value="1" <?= $korisnik['user_type'] ? 'checked' : '' ?>>
                Korisnik <input type="radio" name="user_type" value="0" <?= !$korisnik['user_type'] ? 'checked' : '' ?>>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="name">Ime</label>
              <input type="text" class="form-control" name="name" id="name" value="<?= $korisnik['name'] ?>" required>
            </div>
            <div class="form-group col-md-4">
              <label for="surname">Prezime</label>
              <input type="text" class="form-control" name="surname" id="surname" value="<?= $korisnik['surname'] ?>" required>
            </div>
            <div class="form-group col-md-4">
              <label for="personal_id">Br. lične karte</label>
              <input type="text" class="form-control" name="personal_id" id="personal_id" value="<?= $korisnik['personal_id'] ?>" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="address">Adresa</label>
              <input type="text" class="form-control" name="address" id="address" value="<?= $korisnik['address'] ?>" required>
            </div>
            <div class="form-group col-md-3">
              <label for="city">Grad</label>
              <input type="text" class="form-control" name="city" id="city" value="<?= $korisnik['city'] ?>" required>
            </div>
            <div class="form-group col-md-3">
              <label for="country">Zemlja</label>
              <input type="text" class="form-control" name="country" id="country" value="<?= $korisnik['country'] ?>" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" id="email" value="<?= $korisnik['email'] ?>" required>
            </div>
            <div class="form-group col-md-3">
              <label for="tel">Telefon</label>
              <input type="text" class="form-control" name="tel" id="tel" value="<?= $korisnik['tel'] ?>" required>
            </div>
          </div>
          <button type="submit" name="snimi" class="btn btn-primary">Snimi</button>
        </form>

        <!-- Footer -->
        <?php include('footer.php'); ?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->



 
</body>

</html>