<?php 
session_start();
include_once 'buslogic.php';
if(isset($_POST["btnsub"]))
{
    $obj=new clsreg();
    $obj->regname=$_POST["txtname"];
    $obj->regeml=$_POST["txteml"];
    $obj->regpwd=$_POST["txtpwd"];
    $obj->regdat=  date('y-m-d');
    if($_POST["txtpwd"]==$_POST["txtconpwd"])
    {
        $obj->save_rec();
        $msg="Registration Successfull";
        
    }
 else {
       $msg="Password &Confirm Password donot match"; 
    }
}

?>
<html>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <body>
<title>File Share</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

    <form name="register" action="reg1.php" method="POST">
<div id="main_header">
  <div id="header">
    <ul>
      <li><a href="http://www.free-css.com/" class="home">home</a></li>
      <li><a href="http://www.free-css.com/" class="user" title="user">user</a></li>
      <li><a href="http://www.free-css.com/" class="contact">contact</a></li>
    </ul>
<!--    <ul class="free">
      <li><a class="call">800-121-4545 759-121-5454</a></li>
    </ul>-->
    <img src="images/logo.gif" alt="appleweb" width="205" height="65" title="appleweb" />
    <ul class="navi">
<!--      <li><a href="#">Category</a></li>-->
      <li><a href="login.php"><h2>Login</h2></a></li>
<!--      <li><a href="reg1.php">Register</a></li>-->
<!--      <li><a href="frmcat.php">Category</a></li>
      <li class="li1"><a href="#">Testimonials</a></li>-->
    </ul>
  </div>
</div>
        <div id="main_body">
  <div id="body">
 <br class="balnk" />
  </div>
</div>
<!--    <form name="frmreg" action="reg1.php" method="post">-->
       
        
        <h3>Register here</h3>
     <table>
         <tr>
             <td>Name</td>
                 <td>
                     <input type="text" name="txtname"/>
             </td>
         
         </tr>
         <tr>
             <td>Email</td>
             <td>
                 <input type="text" name="txteml"/>
             </td>
         </tr>
         <tr>
             <td>Password</td>
             <td>
                 <input type="Password" name="txtpwd"/>
             </td>
         </tr>
         <tr>
             <td>Confirm Password</td>
             <td>
                 <input type="Password" name="txtconpwd"/>
             </td>
         </tr>
         <tr>
             <td></td>
             <td>
                 <input type="submit" name="btnsub" value="Submit"/>
                 <input type="Reset" name="btncan" value="Cancel"/>
             </td>
         </tr>
         <tr>
             <td colspan="2">
                 <?php
                 if (isset($msg))
                     echo $msg;
                 ?>
             </td>
         </tr>
         
     </table>
 
    </form>
</body>
</html>