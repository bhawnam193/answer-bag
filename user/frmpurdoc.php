<?php
session_start();
include_once '../buslogic.php';
if(isset($_REQUEST["ccod"]))
{
    $_SESSION["ccod"]=$_REQUEST["ccod"];
}
if(isset($_REQUEST["scod"]))
{
    $obj=new clsseldoc();
    $obj->seldoccod=$_REQUEST["scod"];
    $obj->find_rec($obj->seldoccod);
    $_SESSION["scod"]=$obj->seldoccod;
    $_SESSION["amt"]=$obj->seldocprc;
    header("location:frmpay.php");
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
<script>
function abc(e)
        {
        window.location="frmpurdoc.php?ccod="+e;
        }
        </script>
</head>
<body>
   <form name="frmpurdoc" action="frmpurdoc.php" method="POST">
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

         <h1 class="heading">Purchase Documents</h1>
<!--        <form action="frmdoc.php" method="post" enctype="multipart/form-data">-->
           
            <table>
                <tr>
                    <td>Select Category</td>
                    <td>
                        <select name="drpcat" onchange="abc(this.value)" />
                        <?php 
                        $obj=new clscat();
                        $arr=$obj->disp_rec();
                        for($i=0;$i<count($arr);$i++)
                        {
                            if(isset($_SESSION["ccod"]) && $_SESSION["ccod"]==$arr[$i][0])
                            
                            echo "<option value=".$arr[$i][0]." selected />".$arr[$i][1];
                            
                            else
                            
                            echo "<option value=".$arr[$i][0]." />".$arr[$i][1];
                            
                            }
                            
                        ?>
                    </select>
                    </td>
                </tr>
            </table>
<?php 
if(isset($_SESSION["ccod"]))
{
    $obj=new clsseldoc();
    $arr=$obj->dspseldocs($_SESSION["ccod"]);
    echo "<table>";
    for($i=0;$i<count($arr);$i++)
    {
        echo "<tr><td><b>".$arr[$i][1]."<b><br>";
        echo $arr[$i][2]."<br>";
        echo "cost:$".$arr[$i][3]."<br>";
        echo "Already purchased by ".$arr[$i][4]."users";
        echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
        echo "<a href=frmpurdoc.php?scod=".$arr[$i][0].">Purchase</a></td></tr>"; 
    }
    echo "</table>";
}
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
