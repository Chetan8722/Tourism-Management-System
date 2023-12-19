<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit1']))
{
$fname=$_POST['fname'];
$email=$_POST['email'];	
$mobile=$_POST['mobileno'];
$subject=$_POST['subject'];	
$description=$_POST['description'];
$sql="INSERT INTO  tblenquiry(FullName,EmailId,MobileNumber,Subject,Description) VALUES(:fname,:email,:mobile,:subject,:description)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':subject',$subject,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Enquiry  Successfully submited";
}
else 
{
$error="Something went wrong. Please try again";
}

}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>TMS | Tourism Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tourism Management System In PHP" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>
<body>
<!-- top-header -->
<div class="top-header">
<?php include('includes/header.php');?>
<div class="banner-1 ">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">TMS-Tourism Management System</h1>
	</div>
</div>
<!--- /banner-1 ---->
<!--- privacy ---->
<div class="privacy">
	<div class="container">
										<?php 
$pagetype=$_GET['type'];
$sql = "SELECT type,detail from tblpages where type=:pagetype";
$query = $dbh -> prepare($sql);
$query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{		

?>


		<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;"><?php 	echo $_GET['type'] ?></h3>
		
		
	<p>
	<?php 	echo $result->detail; ?>


	</p> 
<?php } }?>
<!--- View details ---->
<!-- <div class="view details">
   <div class="table-responsive">
	<center><h3>Tickets</h3></center>
 <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Full Name</th>
      <th scope="col">Email ID</th>
      <th scope="col">MobileNumber</th>
	  <th scope="col">Booking Id</th>
	  <th scope="col">Package Price</th>
	  <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
	   $con=mysqli_connect("localhost","root","","tms");
	   if(mysqli_connect_error())
		   echo "error";
	   $query1=mysqli_query($con,"select a.fullname,a.mobilenumber,a.emailid,b.bookingid,c.packageprice,
	  b.status  from tblusers a,tblbooking b,tbltourpackages c where a.emailid=b.useremail AND b.packageid=c.packageid
	   LIMIT 0, 25");
	   while($row=mysqli_fetch_array($query1))
	   {
			$Sl++;
	   ?>
	   <tr>
	   <td><?php echo $Sl;?> </td>
	   <td><?php echo $row['fullname']; ?></td>
	   <td><?php echo $row['emailid']; ?></td>
	   <td><?php echo $row['mobilenumber']; ?></td>
	   <td><?php echo $row['bookingid']; ?></td>
	   <td><?php echo $row['packageprice']; ?></td>
	   <td>
	   <?php
	   if ($row['status'] == 1)
		   echo "<h5 style='color:green'>Confirm</h5>";
		   else if ($row['status'] == 0) echo "<h5 style='color:yellow'>Pending</h5>";
	   else
		   echo "<h5 style='color:red'>Cancel</h5>"; ?></td>
	   </tr>
	   <?php } ?>
  </tbody>
	</table>
</div>
	

<!--- /privacy ---->
<!--- footer-top ---->
<!--- /footer-top ---->
<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/signup.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/signin.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>
</body>
</html>