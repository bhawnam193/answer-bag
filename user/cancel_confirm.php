<?php
session_start();
include_once '../buslogic.php';
if(isset($_SESSION["amt"]))
{
   
    unset($_SESSION["scod"]);
    unset($_SESSION["amt"]);
   
}

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
    </head>
     <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>File Share</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
</head>
<body>
   <form name="cancel_confirm" action="cancel_confirm.php" method="POST">
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
    <img src="../images/logo.gif" alt="appleweb" width="205" height="65" title="appleweb" />
    <ul class="navi">
       <li><a href="frmdoc.php">My Documents</a></li>
      <li><a href="frmdocshr.php">Shared Documents</a></li>
      <li><a href="frmseldoc.php">Sell Documents</a></li>
      <li><a href="frmpurdoc.php">Purchase Documents</a></li>
       <li><a href="frmgrp.php">Groups</a></li>
    
    </ul>
  </div>
</div>
        <div id="main_body">
  <div id="body">
 <br class="balnk" />
  </div>
</div>
  </div>
</div>
               <h4 class="heading">Payment Process not Successful.Try Later.</h4>

               
            <div id="main_footer">
  <div id="footer">
    <ul>
      <li><a href="frmdoc.php">My Document</a>|</li>
      <li><a href="frmgrp.php">Groups</a>|</li>
      <li><a href="frmpur.php">Purchase</a>|</li>
      <li><a href="frmshrdoc.php">Shared Documents</a>|</li>
     
    </ul>
   
        </form>
    </body>
</html>
