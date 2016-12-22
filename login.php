<?php 
session_start();
include_once 'buslogic.php';
if(isset($_POST["btnsub"]))
{
    $obj=new clsreg();
    $r=$obj->logincheck($_POST["txteml"],$_POST["txtpwd"]);
    if($r==-1)
        $msg="Email Password Incorrect";
    else 
    {
     $_SESSION["cod"]=$r;
        header("location:user/frmdoc.php");
    }
}

?>
<html>
       <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>File Share</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <form name="login" action="login.php" method="POST">
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
<!--      <li><a href="login.php">Login</a></li>-->
      <li><a href="reg1.php"><h2>SignUp</h2></a></li>
<!--      <li><a href="../frmgrp.php">Groups</a></li>
      <li><a href="../frmgrpmem.php">GroupMembers</a></li>-->
    </ul>
  </div>
</div>
        <div id="main_body">
  <div id="body">
 <br class="balnk" />
  </div>
</div>
<form name="login" action="login.php" method="post">
  

<h3>LogIn</h3>
     <table>
         
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
             <td></td>
             <td>
                 <input type="submit" name="btnsub" value="Login"/>
             </td>
                 
         </tr>
         <tr>
             <td colspan="2">
                 <?php
                 if(isset($msg))
                     echo $msg;
                 ?>
             </td>
         </tr>
          <div id="main_footer">
<!--  <div id="footer">
    <ul>
      <li><a href="frmdoc.php">My Document</a>|</li>
      <li><a href="frmgrp.php">Groups</a>|</li>
      <li><a href="frmpur.php">Purchase</a>|</li>
      <li><a href="frmshrdoc.php">Shared Documents</a>|</li>
     
    </ul>
   -->
                    
     </table>
</form>
</body>
</html>