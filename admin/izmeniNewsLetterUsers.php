<?php
include('a_baza.php');

$id = (isset($_GET['id'])) ? $_GET['id'] : die("Nije unet id osobe!");
$newsUser = $db->selectNewsUser($id);

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
          <li class="breadcrumb-item active">Izmena news users</li>
         
        </ol>

        <form class="col-md-10 offset-1" action="inc/snimiNewsUser.php?id=<?= $id ?>" method="POST">
                 <div class="form-row">
            <div class="form-group col-md-6">
              <label for="mail">Email</label>
              <input type="text" class="form-control" name="mail" id="mail" value="<?= $newsUser['mail'] ?>" required>
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