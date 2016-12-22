<?php
session_start();
include_once '../buslogic.php';
if(isset($_REQUEST["scod"]))
{
    $obj=new clsseldoc();
     $obj->seldoccod=$_REQUEST["scod"];
    $obj->find_rec();
    $fn="../seldoc/".$obj->seldoccod.$obj->seldocfil;
    if(file_exists($fn))
    {
  header("Content-Disposition:attachment;filename=$fn");
  header("Content-type:application/octet-stream");
  readfile($fn);
  exit();
    }
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
   <form name="frmmypur" action="frmmypur.php" method="POST">
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
       <li><a href="frmmypur.php">Documents Purchased</a></li>
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

         <h1 class="heading">My Purchased Documents</h1>
         <?php
         $obj=new clspur();
          $arr=$obj->disp_rec($_SESSION["cod"]);
         echo "<table>";
         for($i=0;$i<count($arr);$i++)
         {
             echo "<tr><td><b>".$arr[$i][1]."</b></br>";
             echo "<i>".$arr[$i][5]."</i></br>";
             echo "cost:$".$arr[$i][4]."<br>";
             echo $arr[$i][2]."<br>";
             echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
             echo "<a href=frmmypur.php?scod=".$arr[$i][0].">Download</a></td></tr>";
         }
         echo "</table>";
         ?>
        
           
            
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
