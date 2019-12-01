<?php
include('a_baza.php');

if(isset($_POST['snimi'])) {
  $roomNo = htmlspecialchars($_POST['roomNo']);
  $roomtype = htmlspecialchars($_POST['roomtype']);
  $view = htmlspecialchars($_POST['view']);
  $roomsPrice = htmlspecialchars($_POST['roomsPrice']);
  if (trim($roomNo) != null || trim($view) != null)
    $db->dodajSobu($roomNo, $roomtype, $view, $roomsPrice);
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
            <a href="rooms.php">Adminstrative area</a>
          </li>
          <li class="breadcrumb-item active font-weight-bold">Add room</li>
        </ol>

        <form class="col-md-10 offset-1" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
          <div class="form-row">
            <div class="form-group col-md-2">
              <label for="roomNo">Room Number</label>
              <input type="number" class="form-control" name="roomNo" id="roomNo" placeholder="Room Number..."  required>
            </div>
            <div class="form-group col-md-4">
              <label for="roomtype">Room Type</label>
              <select id="roomtype" name="roomtype" class="form-control">
                <?php foreach($db->sveKategorije() as $kategorija) :?>
                  <option name="standard" value="<?= $kategorija['id']?>"><?= $kategorija['type']?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="view">View</label>
              <input type="text" class="form-control" id="view" name="view" placeholder="View"  required>
            </div>
          </div>
          <div class="form-group">
            <label for="roomsPrice">Cena ($)</label>
            <input type="number" class="form-control col-md-2" name="roomsPrice" id="roomsPrice" step=".01" placeholder="Price..."  required>
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