<!DOCTYPE html>
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['username']!='')
{
    $_SESSION['username']='';
}

if(isset($_POST['login']))
{
 //code for captach verification
    if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  
    {
        echo "<script>alert('Incorrect verification code');</script>" ;
    }
    else
    {
        $username = $_POST['username']; //$username can either be username or email
        $password = MD5($_POST['password']);//user prepared statement instead of this

        //error handling: check if username exits in database
        $sql = "SELECT * FROM admin WHERE UserName='$username' OR AdminEmail='$username';";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck < 1) 
        { //if no such record in database
            echo "<script>alert('User not found');</script>";
            echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
        } 
        else 
        {
            // check for correct password
            if($row = mysqli_fetch_assoc($result)) 
            {
                // DE-HASHING the password
                if($password == $row['Password'] ) 
                {
                    // login the user here
                    //session variables
                    $_SESSION['username'] = $row['UserName'];
                    echo "<script>alert('Correct username and password');</script>";
                    echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
                
                }
                else
                {
                    echo "<script>alert('Wrong Password');</script>";
                    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                    exit();
                } 
                
            }
        }
    }
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Book Store Management | Login </title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Book Store Admin Login</h3></div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Username</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="text" name="username" placeholder="Enter Username" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group">
<label>Verification code : </label>
<input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;<img src="captcha.php">
</div>
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button data-v-06c1e12c="" data-v-e1a7d39c="" type="submit" class="btn btn-success btn-md" name="login">Log In</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="#">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <?php include 'includes/footer.php' ;?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
