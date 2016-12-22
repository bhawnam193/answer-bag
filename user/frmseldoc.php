<?php
session_start();
include_once '../buslogic.php';
if(isset($_POST["btnsub"]))
{
    $obj=new clsseldoc();
    $obj->seldoccatcod=$_POST["drpcat"];
    $obj->seldocdsc=$_POST["txtdsc"];
    $obj->seldocprc=$_POST["txtprc"];
    $obj->seldocregcod=$_SESSION["cod"];
    $obj->seldoctit=$_POST["txtdoctit"];
    $s=$_FILES["fileupl"]["name"];
    $s= substr($s,strpos($s,'.'));
    $obj->seldocfil=$s;
    $a=$obj->save_rec();
    if($s!="")
        move_uploaded_file ($_FILES["fileupl"]["tmp_name"],"../seldoc/".$a.$s);


}
if(isset($_REQUEST["dcod"]))
{
    $obj= new clsseldoc();
    $obj->seldoccod=$_REQUEST["dcod"];
    $obj->delete_rec();
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
   <form action="frmseldoc.php" method="post" enctype="multipart/form-data">
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

         <h1 class="heading">Sell Documents</h1>
           
            <table>
                <tr>
                    <th>Upload new document</th>
                </tr>
                <tr>
                    <td>Select Category</td>
                    <td><select name="drpcat">
                    <?php
                    $obj=new clscat();
                    $arr=$obj->disp_rec();
                    for($i=0;$i<count($arr);$i++)
                    {
                        echo "<option value=".$arr[$i][0]."/>".$arr[$i][1];
                    }
                    ?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Document Title</td>
                    <td><input type="text" name="txtdoctit"/></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <textarea name="txtdsc" rows="7" cols="50"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Set Price</td>
                    <td><input type="text" name="txtprc"</td>
                </tr>
                
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                
                <tr>
                    <td>Browse Document</td>
                    <td><input type="file" name="fileupl"/></td>
                </tr>
                <tr>          
              <td><input type="submit" name="btnsub" value="submit"/></td>
                    <td><input type="Reset" name="btncan" value="cancel"/></td>
                </tr>
            </table>
            <?php
            $obj=new clsseldoc();
            $arr=$obj->disp_rec($_SESSION["cod"]);
            if (count($arr)>0)
            {
        echo "<table>";
        echo "<tr>";
        echo "<th>Filename</th>";
//        echo "<th>Uploaded Date</th>";
//        echo "<th>Size</th>";
        echo "</tr>";
        }
            for($i=0;$i<count($arr);$i++)
            {
                echo "<tr>";
              //  echo "<td>".$arr[$i][]."</td>";
                echo "<td>".$arr[$i][2]."</td>";
                echo "<td>";
              //  $obj1=new clsfil();
               // $obj->find_rec($arr[$i][0]);
              //  $fn="../files/".$obj1->filcod.$obj1->fildwnfil;
             //   echo filesize($fn)."bytes";
                echo "</td><td>";
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=frmseldoc.php?dcod=".$arr[$i][0].">Delete Documents</a></td>";
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
