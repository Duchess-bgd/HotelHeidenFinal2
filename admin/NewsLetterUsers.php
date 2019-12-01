<?php 
include('a_baza.php');
$newsusers = $db->svi_newsUser();

if(isset($_POST['btnObrisi'])) {
  $id = $_POST['id'];
  $db->obrisiNewsUser($id);
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
          <a href="index.php"> <b> Administrative area </b></a>
          </li>
          <li class="breadcrumb-item active">Newsletter users</li>
        </ol>

        <!-- Tabela -->
        <div class="card mb-3">
          <div class="card-header">
            <form action="">
              <h4>Newsletter users</h4>
            </form>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr class="text-center">
                    <th>id</th>
                    <th>email</th>
                    <th>Delete</th>
                   
                  </tr>
                </thead>
                <tfoot>
                  <tr class="text-center">
                    <th>id</th>
                    <th>email</th>
                    <th>Delete</th>
                   
                  </tr>
                </tfoot>
                <tbody>
                  <?php foreach ($newsusers as $ns) : ?>
                    <tr class="text-center">
                      <td><?= $ns['id'] ?></td>
                      <td><?= $ns['mail'] ?></td>
                   
                      <td class="text-center">
                          <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="hidden" name="id" value="<?= $ns['id'] ?>">
                            <button type="submit" class="btn btn-dark text-primary"  onclick="return confirm('Are you sure you want to delete an email?')" name="btnObrisi">Delete</button>
                          </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
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