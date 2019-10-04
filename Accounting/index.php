<!DOCTYPE html>
<html>
<head>
	<title>Accounting Page</title>
	<link rel="icon" type="image" href="../assets/upnext.png">
	<link rel="stylesheet" type="text/css" href="../assets/css/Dtables.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/font-awesome-4.1.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/font-awesome-4.1.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="../sweetalertjs/sweetalert.js"></script>
  <script src="../upnext_admin/jquery-3.4.1.min.js"></script>
  <script src="Dtables.js"></script>
	<script src="../sweetalertjs/sweetalert.js"></script>
	<script src="jquery-1.9.1.min.js"></script>
	<script src="Dtables.js"></script>
</head>
<body style="background: url('white.jpg');background-repeat: no-repeat; background-size: cover;">
  <?php include'accounting_navbar.php';?>
	<div class="container">
		<div class="alert alert-info" style="font-size: 20px; margin-top: 90px;"><i class="fa fa-thumbs-up "></i> Approve Agent</div>
		<div class="well">
	
			 <table id="example" class="table table-striped table-bordered ss" style="width:100%; background-color: white">
        <thead>
            <tr>
                <th>Agent Full Name</th>
                <th>View Full Details</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
          	include '../dbcon.php';
          	$link = connect_db();
            $sql = "SELECT * FROM agent_list_tb";
            $result = mysqli_query($link,$sql) or die(mysqli_error($link));
          ?>
          <?php 
              $n = 1;
                while ($row = mysqli_fetch_array($result)) {
                          $id = $row['id'];
                          $lname = $row['lastname'];
                          $fname = $row['firstname'];
                          $mname = $row['middlename_suffix'];
                          $acct = $row['acct_approval'];
           ?>
            <tr>
                <td><center><?php echo $lname?>, <?php echo $fname?> <?php echo $mname?></center></td>
                <td><center><a href='agency_form.php?id=<?php echo "$id" ?>'> View </a></center></td>
                <?php if($acct == "Pending"){
                  echo"<td><center><a href='approved.php?id=".$id."'><button class='btn btn-success'><span class='fa fa-thumbs-up' ></span> For Approval</button></a></center></td>";
                }else{
                  echo'<td><center><button class="btn btn-success" disabled><span class="fa fa-check" ></span> Done</button></center></td>';
                }?>
                
            </tr>
                  <?php 
                $n++;
                }
             ?>
        </tbody>
    </table>
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