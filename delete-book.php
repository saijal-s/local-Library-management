<?php include 'includes/config.php' ;?>
<?php
session_start();
error_reporting(0);
include('includes/config.php');
$user = $_SESSION['username'];
if(strlen($_SESSION['username'])==0)
  { 
      
      echo "<script> alert('Session Expired, Please Login Again!');</script>" ;
      echo "<script type='text/javascript'> document.location ='index.php'; </script>";
}
else
if(isset($_POST['delete']))
{
    
	  	$id =$_POST['id'];
	  	$row=$id;

	  	$sql="DELETE FROM `books` WHERE id=$id ";
	  	$result1=mysqli_query($conn,$sql);
	  	if($result1)
	  	{
	  	
	  	    echo "<script>alert('Campaign Deleted Successfully');</script>";
                echo "<script>document.location ='manage-books.php';</script>";
	  	}

	  
}

	  else
	  {
	      echo "<script>alert('You are not allowed to open this page directly');</script>";
                echo "<script>document.location ='manage-books.php';</script>";
	  }
	  ;?>