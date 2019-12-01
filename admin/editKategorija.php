<?php
include('a_baza.php');
$id = (isset($_GET['id'])) ? $_GET['id'] : die("Nije unet id sobe!");
$kategorija = $db->izmeniKategoriju($id);


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
            <a href="opisSoba.php">Administrative area</a>
          </li>
          <li class="breadcrumb-item active">Change room category</li>
        </ol>

        <form class="col-md-10 offset-1" action="inc/izmeniKategoriju.php?id=<?= $id ?>" method="POST">
        <div class="form-row">
            <div class="form-group col-md-2">
              <label for="katId">Room category</label>
              <input type="number" class="form-control" name="katId" id="katId" value="<?= $kategorija['id'] ?>" disabled>
            </div>
            <div class="form-group col-md-4">
              <label for="type">Tip sobe</label>
              <select id="type" name="type" class="form-control" disabled>
                <option name="standard" value="1" <?= $kategorija['type'] == 'standard' ? 'selected' : ''; ?>>Standard</option>
                <option name="deluxe" value="2" <?= $kategorija['type'] == 'deluxe' ? 'selected' : ''; ?>>Deluxe</option>
                <option name="apartment" value="3" <?= $kategorija['type'] == 'apartment' ? 'selected' : ''; ?>>Apartment</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="description">Room descriprion</label>
            <textarea class="form-control" id="description" name="description" rows="10" required><?= $kategorija['description'] ?></textarea>
          </div>
          <button type="submit" name="snimi" class="btn btn-primary">Save</button>
        </form>

        <!-- Footer -->
        <?php include('footer.php'); ?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->



  
</body>

</html>