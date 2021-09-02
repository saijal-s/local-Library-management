<!DOCTYPE html>
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
if(isset($_POST['edit']))
{
    $id =$_POST['id'];
	$row=$id;
	 $sql1="SELECT * FROM books WHERE id=$id";
      $result1=mysqli_query($conn,$sql1); 
}

else
	  if (isset($_POST['update'])) 
	  {
	  	$id =$_POST['id'];
	  	$row=$id;
	  	$bn=$_POST['BookName'];
	  	$an=$_POST['AuthorName'];
	  	$isbn=$_POST['ISBN'];
	  	$p=$_POST['Price'];
	  	$c=$_POST['Category'];
	  	

	  	$sql="UPDATE `books` SET `BookName`='$bn',`Category`='$c',`AuthorName`='$an',`ISBN`='$isbn',`Price`='$p' WHERE id=$id ";
	  	$result2=mysqli_query($conn,$sql);
	  	if($result2)
	  	{
	  	    echo "<script>alert('Book Updated Successfully');</script>";
                echo "<script>document.location ='manage-books.php';</script>";
	  	}

	  }
	  else
	  {
	      echo "<script>alert('You are not allowed to open this page directly');</script>";
                echo "<script>document.location ='manage-books.php';</script>";
	  }
	  ;?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Book Store Management | Dashboard</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include 'includes/header.php' ;?>
        
        <div id="layoutSidenav">
            
            <?php include 'includes/sidebar.php' ;?>
            
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Add Books</h3></div>
                                            <div class="card-body">
                                               <?php
		while($row= mysqli_fetch_assoc($result1))
          {
          	?>
          	<form method="POST">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Book Name</label>
                                                        <input class="form-control py-4" id="BookName" type="text" placeholder="Enter Book's Name" value="<?php echo $row['BookName'];?>" name="BookName" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Category</label>
                                                        <input class="form-control py-4" id="category" type="text" placeholder="Enter Book's Category" value="<?php echo $row['Category'];?>" name="Category" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Author's Name</label>
                                                <input class="form-control py-4" id="AuthorName" type="text" aria-describedby="AuthorName" placeholder="Enter Author's Name" value="<?php echo $row['AuthorName'];?>" name="AuthorName" />
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="ISBN">Enter ISBN</label>
                                                        <input class="form-control py-4" id="ISBN" type="text" placeholder="Enter ISBN" value="<?php echo $row['ISBN'];?>" name="ISBN"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="price">Enter Price</label>
                                                        <input class="form-control py-4" id="price" type="number" placeholder="Enter Price" value="<?php echo $row['Price'];?>" name="Price"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button data-v-06c1e12c="" data-v-e1a7d39c="" type="submit" class="btn btn-success btn-md" name="update">Update Book</button>
                                            </div>
                                        </form>
                                        <?php
	}
	?>
                                    </div>
                                </div>
                       
                    </div>
                </main>
                <?php include 'includes/footer.php' ;?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>