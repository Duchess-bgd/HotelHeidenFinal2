<?php
include('a_baza.php');
$opisi = $db->sviOpisi();

if (isset($_POST['btnObrisi'])) {
  $id = $_POST['slID'];
  $db->obrisiKategoriju($id);
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
            <a href="index.php">Administrative area</a>
          </li>
          <li class="breadcrumb-item active font-weight-bold">Room Category</li>
        </ol>

        <!-- Tabela -->
        <div class="card mb-3">
          <div class="card-header">
            <form action="">
              <h4>Dodaj sobu</h4>
            </form>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr class="text-center">
                    <th>Id</th>
                    <th>Room Type</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr class="text-center">
                    <th>Id</th>
                    <th>Room Type</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php foreach ($opisi as $opis) : ?>
                    <tr class="text-center">
                      <td><?= $opis['id'] ?></td>
                      <td><?= $opis['type'] ?></td>
                      <td><?= $opis['description'] ?></td>
                      <td class="text-center"><a href="editKategorija.php?id=<?= $opis['id'] ?>" class="btn btn-primary" name="btnIzmeni">Edit</a>
                      </td>
                      <td class="text-center">
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                          <input type="hidden" name="slID" value="<?= $opis['id'] ?>">
                          <button type="submit" class="btn btn-dark text-primary"  onclick="return confirm('Are you sure you want to delete a room?')" name="btnObrisi">Delete</button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <a href="dodajKategorija.php" class="btn btn-primary text-white" name="dodaj" style="cursor:pointer;">Add new room category</a>
            </div>
          </div>
          
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Footer -->
      <?php include('footer.php'); ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->



 
</body>

</html>