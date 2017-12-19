<?php 

  include 'konekcija.php';
  $sql_upit = "SELECT id, username, email FROM users";
  $rezultat = $konekcija->query($sql_upit);

  
?>
<?php include 'side_top_menu_template.php'; ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Tables</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Static table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped table-hover table-responsive">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Funkcions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if ($rezultat->num_rows > 0)
                  {
                      // output data of each row
                      while($red = $rezultat->fetch_assoc())
                      {
                          echo "<tr>
                                <td>" . $red["id"]. "</td>".
                                "<td>" . $red["username"]. "</td>".
                                "<td>" . $red["email"]. "</td>".
                                "<td>
                                  <a href='#' class='btn btn-primary btn-mini' data-toggle='modal' data-target='#izmena_podataka_u_redu'>Edit</a> 
                                  <a class='btn btn-danger btn-mini' data-toggle='modal' data-target='#potvrda_brisanja_podataka'>Delete</a>
                                </td>
                              </tr>";
                      }
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal izmena podataka -->
  <div id="izmena_podataka_u_redu" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Popiniti polja</h4>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="get" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span3" placeholder="First name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span3" placeholder="Last name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Company info :</label>
              <div class="controls">
                <input type="text" class="span3" placeholder="Company name" />
              </div>
            </div>
          </form>
        </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="potvrdaUnosa" class="btn btn-success">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- Modal brisanje podataka-->
  <div id="potvrda_brisanja_podataka" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Da li ste sigurni da zelite da brisete polje</h4>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="get" class="form-horizontal">
            <div class="form-actions">
              <button <?php echo " href='delete_function.php?id=".$red["id"]."'"; ?> type="submit" name="potvrdaUnosa" class="btn btn-danger" data-dismiss="modal">Brisi</button>
              <button type="submit" name="potvrdaUnosa" class="btn btn-primary" style="float: right;" data-dismiss="modal">Odustati</button>
            </div>
          </form>
        </div>
        </div>
      </div>
    </div>
  </div>
<?php include 'footer_template.php'; ?>
