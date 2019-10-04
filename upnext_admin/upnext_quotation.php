<?php include'header.php';?>
<!DOCTYPE html>
<html>
<head>
  <title>Quotation List</title>
  <link rel="icon" type="image" href="../assets/upnext.png">
  <link rel="stylesheet" type="text/css" href="../assets/css/index.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/Dtables.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../assets/font-awesome-4.1.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="../sweetalertjs/sweetalert.js"></script>
  <script src="../upnext_admin/jquery-3.4.1.min.js"></script>
  <script src="Dtables.js"></script>
</head>
<body style="background-image: url('../xypher_admin/white.jpg');background-repeat: no-repeat; background-size: cover; ">
<?php include'upnext_navbar.php';?>
  <div class="container">
    <div class="alert alert-info" style="font-size: 20px; margin-top: 90px;"><i class="fa fa-edit "></i> Quotation List</div>
      <style>
        th {
          background: #000;
          color: #FDC30F;
          }
      </style>
      <div class="well">
       <table id="example" class="table table-striped table-bordered ss" style="width:100%; background-color: white">
        <thead>
            <tr>
                <th><span class="fa fa-book"></span> Refference No.</th>
                <th><span class="fa fa-car"></span> Client Car Unit</th>
                <th><span class="fa fa-user"></span> Agent Name</th>
                <th><span class="fa fa-user"></span> Agent Type</th>
                <th><span class="fa fa-calendar"></span> Date Created</th>
            </tr>
        </thead>
        <tbody>
          <?php
            include '../dbcon.php';
            $link = connect_db();
            $sql = "SELECT * from user_quotes t1 INNER JOIN agent_list_tb t2
                ON t1.a_id= t2.id INNER JOIN afmv t3
                ON t1.fmv_id= t3.fmv_id";
            $result = mysqli_query($link,$sql) or die(mysqli_error($link));
          ?>
          <?php 

              $n = 1;
                while ($row = mysqli_fetch_array($result)) {
                          $id = $row['id'];
                          $track = $row['tracking_no'];
                          $fmv_id = $row['fmv_id'];
                          $date = $row['date_created'];
                          $aid = $row['a_id'];
                          $aog = $row['aog'];
                          $gross = $row['gross'];
                          $rbi = $row['rbi'];
                          $rpd = $row['rpd'];
                          $client_name = $row['client_name'];
                          $markup = $row['markup'];
                          $datecreated = $row['date_created'];
                          $usage = $row['car_usage'];
                          $MAKE = $row['MAKE'];
                          $MODEL = $row['MODEL'];
                          $VARIANT = $row['VARIANT'];
                          $lname = $row['lastname'];
                          $fname = $row['firstname'];
                          $mname = $row['middlename_suffix'];
                          $type = $row['agent_type'];
           ?>
            <tr>
                <td><center><a href="#" data-toggle="modal" data-target="#myModal<?php echo $id?>"><?php echo $track;?></a></center></td>
                <td><center><span class="label label-success"><?php echo $MAKE;?>, <?php echo $MODEL;?> <?php echo $VARIANT;?></span></center></td>
                <td><center><?php echo $lname;?>, <?php echo $fname;?> <?php echo $mname;?></center></td>
                <td><center><?php echo $type;?></center></td>
                <td><center><?php echo $date;?></center></td>
          </tr>
          <!-- Modal -->
<div id="myModal<?php echo $id;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span class="fa fa-book"></span> Quotation Details</h4>
      </div>
      <div class="modal-body">
        <div class="well">          
       <b>Refference No. :</b> <?php echo $track;?><br>
       <b>Gross :</b> <?php echo $gross;?><br>
       <b>Unit :</b> <?php echo $MAKE;?>, <?php echo $MODEL;?> <?php echo $VARIANT;?><br>
       <b>RBI :</b> <?php echo $rbi;?><br>
       <b>RPD :</b> <?php echo $rpd;?><br>
       <b>Client Name :</b> <?php echo $client_name;?><br>
       <?php 
        if ($type == 'upnext') {
          echo "<b>Rate :</b>".$markup."<br>";
        }else{
           echo "<b>Mark Up :</b>".$markup."<br>";
        }
       ?>
       <b>Date Created :</b> <?php echo $datecreated;?><br>
       <b>Agent Name :</b> <?php echo $lname;?>, <?php echo $fname;?> <?php echo $mname;?><br>
       <b>Car Usage Type :</b> <?php echo $usage;?><br>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
          <?php 
                $n++;
                }
             ?>
        </tbody>
    </table>
    
</div>
</div>
</div>
</body>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
</html>

