<?php

$username = "root";
$password = "";
$server = 'localhost';
$db = 'signin';

 $con =mysqli_connect($server,$username,$password ,$db);

 if($con){
    ?>
     <script>
     alert("Connection succuessful")
     
     </script>
     <?php
 }else{
     echo "no connection";
 }

?>