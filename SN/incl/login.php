<?php
include "class.php";
$usr=$_POST["username"];
$password=$_POST["password"];
$sql="SELECT * FROM `sn_user` WHERE `SN_Name`='{$usr}' AND `SN_Password`='{$password}'";
try {
    $r=mysqli_query($con,$sql);
    if(mysqli_num_rows($r)>0){
        $out=mysqli_fetch_assoc($r);
    if($out['is_verfy']==0){
        echo 1;
    }else{
            $_SESSION["SN_login"]=$out['id'];
            echo 2;
        }
    }else{
        echo 0;
    }
} catch (\Throwable $th) {
    //throw $th;
}
?>