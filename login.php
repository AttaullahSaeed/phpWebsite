<?php

session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <?php include 'links.php' ?>
    <style>
   <?php include 'css/main.css' ?>
    </style>
</head>


<body>
<?php

include 'connection.php';
if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password =$_POST['password'];

    $email_search = " select * from userdata where email='$email' ";

    $query = mysqli_query($con,$email_search);

    $email_count = mysqli_num_rows($query);

    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);

        $db_pass=$email_pass['password'];

        $_SESSION['name'] = $email_pass['name'];

        $pass_dcode =  password_verify($password,$db_pass);

        if($pass_dcode){

         if(isset($_POST['rememberme'])){

              setcookie('emailcookie',$email,time()+86400);
              setcookie('passwordcookie',$password,time()+86400);
             header('location:home.php');
         }else{
            header('location:home.php');
         }

            

        }else{

            ?>
            <script>
            alert("Password Incorrect");
            </script>
            <?php
          }

        }else{

            ?>
            <script>
            alert("Invalid Email");
            </script>
            <?php
        
    }   
}
?>



<div id="logreg-forms">
        <form class="form-signin" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            <h1 class="h3 mb-3 font-weight-normal text-secondary text-center" style="text-align: center">Log in Here</h1>
            <div class="social-login">
                <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign in with Facebook</span> </button>
                <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign in with Google+</span> </button>
            </div>
            <p style="text-align:center"> OR  </p>
            
           
            <div class="input-group">
              <input type="email" id="inputEmail" class="form-control my-2" 
             name="email" placeholder="Your Email" required="" value="<?php if(isset($_COOKIE['emailcookie'])){echo $_COOKIE['emailcookie'];} ?>">
            </div>

           

            <div class="input-group">
              <input type="password" id="inputPassword" class="form-control my-2" 
             name="password" placeholder="Your Password" value="<?php if(isset($_COOKIE['passwordcookie'])){echo $_COOKIE['passwordcookie'];} ?>">
            </div>

            
            <div class="text-primary">
           <input type="checkbox"   name="rememberme" >   remember me
        
            </div>
           
            <div class="input-group">
              <button class="btn btn-md btn-rounded btn-block form-control submit" name="submit" type="submit"><i class="fas fa-sign-in-alt"></i> Login Here</button>
            </div>
            <div class="d-flex font-weight-bold">
                <p class="py-2 text-danger font-italic">Dont't have an Account?</p>
                <a class="text-dark px-3 " href="signup.php">Sign Up</a>
                </div>
            </form>
            <br>

    </div>
</body>
</html>
