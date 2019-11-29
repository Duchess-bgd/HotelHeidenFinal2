<?php 
include('a_baza.php');
$rezervacije = $db->sveRezervacije();

// var_dump($rezervacije);

if(isset($_POST['btnObrisi'])) {
  $id = $_POST['slID'];
  $db->obrisiRezervaciju($id);
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
                <li class="breadcrumb-item active font-weight-bold">Reservations</li>
              </ol>        

              <!-- Tabela -->
              <div class="card mb-3 ">
                <div class="card-header text-justify">
                <h4>List of all reservations</h4>
                </div>
                  <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr class="text-center">
                            <th>Room Number</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Personal ID</th>
                            <th>Email</th>
                            <th>State</th>
                            <th>Number of guests</th>
                            <th>Check in</th>
                            <th>Check Out</th>
                            <th>Price</th>                            
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr class="text-center">
                          <th>Room Number</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Personal ID</th>
                            <th>Email</th>
                            <th>State</th>
                            <th>Number of guests</th>
                            <th>Check in</th>
                            <th>Check Out</th>
                            <th>Price</th>                            
                            <th>Delete</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          <?php foreach($rezervacije as $r): ?>
                          <tr class="text-center">
                            <td><?= $r['br_sobe'] ?></td>
                            <td><?= $r['type'] ?></td>
                            <td><?= $r['name'] ?></td>
                            <td><?= $r['surname'] ?></td>
                            <td><?= $r['personal_id'] ?></td>
                            <td><?= $r['email'] ?></td>
                            <td><?= $r['country'] ?></td>
                            <td><?= $r['guests'] ?></td>
                            <td><?= $r['check_in'] ?></td>
                            <td><?= $r['check_out'] ?></td>
                            <td><?= $r['price'] ?></td>
                            <td class="text-center">
                            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                              <input type="hidden" name="slID" value="<?= $r['id'] ?>">
                              <button type="submit" class="btn btn-dark text-primary" onclick="return confirm('Are you sure you want to delete a reservation?')" name="btnObrisi">Delete</button>
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
            <!-- /.container-fluid -->
      
            <!-- Footer -->
            <?php include('footer.php'); ?>
      
          </div>
          <!-- /.content-wrapper -->
      
        </div>
        <!-- /#wrapper -->
      
        
        
       
      </body>
</html>