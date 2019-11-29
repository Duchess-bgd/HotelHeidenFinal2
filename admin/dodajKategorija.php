<?php
include('a_baza.php');

if (isset($_POST['snimi'])) {
  $type = htmlspecialchars($_POST['tip']);
  $description = htmlspecialchars($_POST['description']);
  $db->dodajKategoriju($type, $description);
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
          <li class="breadcrumb-item">
            <a href="opisSoba.php">Administrative area</a>
          </li>
          <li class="breadcrumb-item active">Add room category</li>
        </ol>

        <form class="col-md-10 offset-1" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
          <div class="form-group">
            <label for="katId">Room Category</label>
            <input type="text" class="form-control col-md-3" name="tip" id="tip" placeholder="Room type..." required>
          </div>
          <div class="form-group">
            <label for="description">Room description</label>
            <textarea class="form-control" id="description" name="description" rows="10" placeholder="Category descprition..." required></textarea>
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