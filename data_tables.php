<?php 

  include 'konekcija.php';
  $sql_upit = "SELECT * FROM `tbl_employee` ORDER BY id";
  $rezultat = $konekcija->query($sql_upit);
?>
<?php include 'side_top_menu_template.php'; ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">DataTables</a> </div>
  </div>
  <div class="container-fluid">
  	<table id="example" class="display" cellspacing="0" width="80%">
        <thead>
            <tr>
            	<th>Id</th>
              	<th>Name</th>
              	<th>Adress</th>
              	<th>Gender</th>
              	<th>Age</th>
              	<th>Functions</th>
            </tr>
        </thead>
        <tbody>
                <?php
                  if ($rezultat->num_rows > 0)
                  {
                      // output data of each row
                      // while($red = $rezultat->fetch_assoc())
                      while($red = mysqli_fetch_array($rezultat))
                      {?>
                          <tr>
                            <td class="kolona_id"><?php echo($red["id"]) ?></td>
                            <td class="kolona_name"><?php echo($red["name"]) ?></td>
                            <td class="kolona_address"><?php echo($red["address"]) ?></td>
                            <td class="kolona_gender"><?php echo($red["gender"]) ?></td>
                            <td class="kolona_age"><?php echo($red["age"]) ?></td>
                            <td>
                              <div class="btn-group">
                                <a type="button" class="btn btn-info btn-mini prikaz_detalja" id="<?php echo $red["id"]; ?>" value="view" >
                                  <i class="fa fa-eye" aria-hidden="true"> View</i> 
                                </a>

                                <a type="button" href='#' class='btn btn-primary btn-mini' data-toggle='modal' data-target='#izmena_podataka_u_redu'>
                                  <i class="fa fa-pencil" aria-hidden="true"> Edit</i>
                                </a>

                                <a type="button" class='btn btn-danger btn-mini' id="<?php echo $red["id"] ?>" data-toggle='modal' data-target='#potvrda_brisanja_podataka'  onclick="postaviti_vrednost_btn_modal(this)">
                                  <i class="fa fa-trash-o" aria-hidden="true"> Del</i>
                                </a>
                              </div>
                            </td>
                          </tr>
                <?php }
                  }
                ?>
              </tbody>
    </table>
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
          <h4 class="modal-title">Da li ste sigurni da zelite da obrisete polje</h4>
        </div>
        <div class="widget-content nopadding">
          <div class="form-actions">
            <a id="potvrda_brisanja_podataka_btn" href=""><button type="submit" name="potvrdaUnosa" class="btn btn-danger">Brisi</button></a>
            <button type="submit" name="potvrdaUnosa" class="btn btn-primary" style="float: right;" data-dismiss="modal">Odustani</button>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>

  <div id="modal_prikaz_detalja_reda" class="modal fade">
   <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Employee Details</h4>
     </div>
     <div class="modal-body" id="zaposleni_detalji">
      
     </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     </div>
    </div>
   </div>
  </div>
<?php include 'footer_template.php'; ?>