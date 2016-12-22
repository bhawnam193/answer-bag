<?php
session_start();
include_once '../buslogic.php';
if(isset($_POST["logout"]))
{
    header("location:../login.php?sts=S");
}
if(isset($_REQUEST["dccod"]))
{
    $obj=new clsfil();
    $obj->filcod=$_REQUEST["dccod"];
    $obj->find_rec();
    $fn="../files/".$obj->filcod.$obj->fildwnfil;
    //echo $fn;
    if(file_exists($fn))
    {
  header("Content-Disposition:attachment;filename=$fn");
  header("Content-type:application/octet-stream");
  readfile($fn);
  exit();
    }
}

if(isset($_REQUEST["dcod"]))
{
    $obj=new clsfil();
    $obj->filcod=$_REQUEST["dcod"];
    $obj->delete_rec();
}
if(isset($_POST["btnsub"]))
{
    $obj=new clsfil();
    $obj->filnam=$_POST["txtdoctit"];
    $obj->filupldat= date('y-m-d');
    $obj->filfolcod=$_POST["drpfol"];
   
if(isset($_POST["chk"]))
{
     $obj->filhidsts=$_POST["chk"];
    $obj->filhidsts='T';
}
 else
     {
 $obj->filhidsts='F';
     }
 $s=$_FILES["fileupl"]["name"];
 $s= substr($s,strpos($s,'.'));
 $obj->fildwnfil=$s;
 $a=$obj->save_rec();
 if($s!="")
     move_uploaded_file ($_FILES["fileupl"]["tmp_name"],"../files/".$a.$s);

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
<!--    <form name="f1" action="frmdoc.php" method="POST">-->
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
       <form method="POST">
        <input type="Submit" name="logout" class="login-btn" value="Logout"></input>
        </form>
    
    </ul>
  </div>
<!--     <div class="user_right">
        <form method="POST">
        <input type="Submit" name="logout" class="login-btn" value="Logout"></input>
        </form>
    </div>-->

</div>
        <div id="main_body">
  <div id="body">
 <br class="balnk" />
  </div>
</div>
  </div>
</div>

         <h1 class="heading">My Documents</h1>
        <form action="frmdoc.php" method="post" enctype="multipart/form-data">
           
            <table>
                <tr>
                    <th><h2>Upload new document</h2></th>
                </tr>
                <tr>
                    <td><b>Document Title</b></td>
                    <td><input type="text" name="txtdoctit"/></td>
                </tr>
                <tr>
                    <td><b>select folder</b></td>
                    <td><select name="drpfol">
                    <?php 
                   //$obj=new clscon();
                    $obj=new clsfol();
                    $arr=$obj->disp_rec($_SESSION["cod"]);
                            for($i=0;$i<count($arr);$i++)
                            {
                                echo "<option value=".$arr[$i][0]." />".$arr[$i][1];
                            }
                    ?>
                    <td><a href="frmfol.php">Add New Folder</a></td>
                    </select>
                    </td>
                </tr>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                
                <tr>
                    <td>Browse Document</td>
                    <td><input type="file" name="fileupl"/></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="checkbox" value="T" name="chk[]"/>
                        Do you wish to make this document hidden?
                    </td>
                </tr>
                <tr>
                    <td>
                <input type="submit" name="btnsub" value="submit"/>
                    </td>
                    <td><input type="Reset" name="btncan" value="cancel"/></td>
                </tr>
            </table>
            <?php
            $obj=new clsfil();
            $arr=$obj->disp_rec($_SESSION["cod"]);
            if (count($arr)>0)
            {
        echo "<table>";
        echo "<tr>";
        echo "<th>Filename</th>";
        echo "<th>Uploaded Date</th>";
        echo "<th>Size</th>";
        echo "</tr>";
        }
            for($i=0;$i<count($arr);$i++)
            {
                echo "<tr>";
                echo "<td>".$arr[$i][1]."</td>";
                echo "<td>".$arr[$i][2]."</td>";
                echo "<td>";
                $obj1=new clsfil();
                $obj1->find_rec($arr[$i][0]);
                $fn="../files/".$obj1->filcod.$obj1->fildwnfil;
                echo filesize($fn)."bytes";
                echo "</td>";
                echo "<td><a href=frmshrdoc.php?dcod=".$arr[$i][0].">Share Documents</a>";
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=frmdoc.php?dccod=".$arr[$i][0].">Download</a>";
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=frmdoc.php?dcod=".$arr[$i][0].">Delete Documents</a></td>";
                echo "<td>"."</td>";
                echo "</tr>";
            }
            if (count($arr)>0)
            {
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
