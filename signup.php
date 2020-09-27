<?php

session_start();

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
       $name = mysqli_real_escape_string ($con,$_POST['user']);
       $email = mysqli_real_escape_string ($con,$_POST['email']);
       $mobile = mysqli_real_escape_string ($con,$_POST['mobile']);
       $password =mysqli_real_escape_string($con,$_POST['password']);
       $cpassword = mysqli_real_escape_string ($con,$_POST['cpassword']);

        //user password convert in algorithm
        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);
 
        //if email already exist that email not useable again
        $emailquery = "select * from userdata where email='$email' ";
        $query = mysqli_query($con,$emailquery);
    
        //1 jesi email check krny k ly ke knsi row me ha 
        $emailcount = mysqli_num_rows($query);

        if($emailcount>0){
            ?>
            <script>
            alert ("Email already exist");
            </script>
            <?php
        }else{
            if($password===$cpassword){
                $insertquery = "insert into  userdata(name,email,mobile,password,cpassword) values('$name','$email','$mobile','$pass','$cpass')";

                $iquery = mysqli_query($con,$insertquery);

                if($iquery){
                    ?>
                    <script>
                    alert("Data inserted successfuly");
                    </script>
                    <?php
                }else{
                    ?>
                    <script>
                    alert("Data Not inserted");
                    </script>
                    <?php
                }


        }else{
            ?>
            <script>
            alert("Password are Not matching");
            </script>
            <?php
        }
}
}
?>


    <div id="logreg-forms">
        <form class="form-signin" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            <h1 class="h3 mb-3 font-weight-normal text-secondary text-center" style="text-align: center"> Create Account</h1>
            <div class="social-login">
                <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign in with Facebook</span> </button>
                <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign in with Google+</span> </button>
            </div>
            <p style="text-align:center"> OR  </p>
            
            <div class="input-group">
              <input type="text" id="" class="form-control my-2" 
             name="user" placeholder="Full Name" required="" autofocus="">
            </div>
            <div class="input-group">
              <input type="email" id="inputEmail" class="form-control my-2" 
             name="email" placeholder="Email address" required="" autofocus="">
            </div>

            <div class="input-group">
              <input type="text" id="" class="form-control my-2" 
             name="mobile" placeholder="Mobile Num" required="" autofocus="">
            </div>

            <div class="input-group">
              <input type="password" id="inputPassword" class="form-control my-2" 
             name="password" placeholder="Password" required="">
            </div>
                 
            <div class="input-group">
              <input type="password" id="inputPassword" class="form-control my-2" 
             name="cpassword" placeholder="Repeat Password" required="">
            </div>
            <div class="input-group">
              <button class="btn btn-md btn-rounded btn-block form-control submit"name="submit" type="submit"><i class="fas fa-sign-in-alt"></i> Create Account</button>
            </div>
            <div class="d-flex font-weight-bold">
                <p class="py-2 text-danger font-italic">Have Already an Account?</p>
                <a class="text-dark px-3 " href="login.php">Log in</a>
                </div>
            </form>
            <br>

    </div>
</body>
</html>

