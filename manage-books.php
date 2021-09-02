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
else{?>
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
                        <h1 class="mt-4">Manage Added Books</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Manage Added Books</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                All Added Books
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>S No.</th>
                                                <th>Book Name</th>
                                                <th>Category</th>
                                                <th>Author Name</th>
                                                <th>ISBN</th>
                                                <th>Price</th>
                                                <th>Updation Date</th>
                                                <th>Edit Book</th>
                                                <th>Delete Book</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S No.</th>
                                                <th>Book Name</th>
                                                <th>Category</th>
                                                <th>Author Name</th>
                                                <th>ISBN</th>
                                                <th>Price</th>
                                                <th>Updation Date</th>
                                                <th>Edit Book</th>
                                                <th>Delete Book</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            
                                                <?php
                                                    $sql1="SELECT * FROM books";
                                                    $result1=mysqli_query($conn,$sql1);
                                                    $num=1;
                                                    while($row= mysqli_fetch_assoc($result1))
                 	                                {
                 		                                echo "<tr>";
                 		                                echo "<td>".$num;
                 		                                echo "<td>".$row['BookName'];
                 		                                echo "<td>".$row['Category'];
                 		                                echo "<td>".$row['AuthorName'];
                 		                                echo "<td>".$row['ISBN'];
                 		                                echo "<td>".$row['Price'];
                 		                                echo "<td>".$row['UpdationDate'];
                                                ?>
                                                <td>
                                                    <form method='post' action='edit-books.php'>
                                                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                                        <button type="submit" name="edit" class="reviewButton">Edit</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form method='post' action='delete-book.php'>
                                                    <input type="hidden" name="id" value="<?php echo $row['id'];?> ">
                                                    <button type="submit" name="delete" class="reviewButton">Delete</button>
                                                </form>
                 		<?php echo "</tr>";
                        $num++;
                           		                     
                               
                           	}

                 	?>
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
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
<?php } ?>