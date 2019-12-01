<?php
include('a_baza.php');

$id = (isset($_GET['id'])) ? $_GET['id'] : die("Nije unet id sobe!");
$soba = $db->edit_sobe($id);

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
            <a href="rooms.php">Administrative area</a>
          </li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>

        <form class="col-md-10 offset-1" action="inc/izmeniSobu.php?id=<?= $id ?>" method="POST">
          <div class="form-row">
            <div class="form-group col-md-2">
              <label for="roomNo">Room Number</label>
              <input type="number" class="form-control" name="roomNo" id="roomNo" value="<?= $soba['rid'] ?>" required>
            </div>
            <div class="form-group col-md-4">
              <label for="roomtype">Room type</label>
              <select id="roomtype" name="roomtype" class="form-control">
              <?php foreach($db->sveKategorije() as $kategorija) :?>
                <?= $kategorija['id'] ?>
                  <option name="standard" value="<?= $kategorija['id']?>" <?= $kategorija['id'] == $soba['room_rid'] ? 'selected' : ''; ?>><?= $kategorija['type']?></option>
              <?php endforeach; ?> 
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="view">View</label>
              <input type="text" class="form-control" id="view" name="view" value="<?= $soba['view'] ?>" required>
            </div>
          </div>
          
          <div class="form-group">
            <label for="roomsPrice">Price ($)</label>
            <input type="number" class="form-control col-md-2" name="roomsPrice" id="roomsPrice" step=".01" value="<?= $soba['price'] ?>" required>
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