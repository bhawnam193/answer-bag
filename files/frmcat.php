<?php
session_start();
include_once '../buslogic.php';
if (isset($_POST["btnupd"]))
{
    echo "hellow";
   $obj= new clscat(); 
   $obj->catcod=$_SESSION["ccod"];
   $obj->catnam=$_POST["txtcat"];
   $obj->Update_cat();
   unset($_SESSION["ccod"]); 
}

if (isset($_POST["btnsub"]))
{
   $obj= new clscat(); 
   $obj->catnam=$_POST["txtcat"];
   $obj->save_cat();
    
}
if (isset($_REQUEST["ccod"]) && isset($_REQUEST["mod"]))
{
    
    if ($_REQUEST["mod"]=='D')
        {
        $obj=new clscat();
        $obj->catcod=$_REQUEST["ccod"];
        $obj->Delete_cat();
    }    
     if ($_REQUEST["mod"]=='E')
        {
        $obj=new clscat();
        $obj->catcod=$_REQUEST["ccod"];
        $obj->Find_cat($obj->catcod);
        $catnam=$obj->catnam;
        $_SESSION["ccod"]=$_REQUEST["ccod"];
    }    
}
?>
<?php

include_once'hedder.php';
?>

      <h2>CATEGORIES</h2>
      <table border="2">
          <tr>
              <td>category</td>
              <td>
                  <input type="text" name="txtcat" value="<?php if (isset($catnam)) echo $catnam; ?>"></input>
              </td>
          </tr>
          <tr><td colspan="2">
                  <?php
                  if (isset($_SESSION["ccod"])) 
                  {
              echo "<input type=submit name=btnupd value=update ></input> &nbsp;&nbsp";
                  }
 else {
     echo "<input type=submit name=btnsub value=submit ></input> &nbsp;&nbsp";
 }
              ?>
                  <input type="reset" name="btncan" value="cancel"></input>
                  </td>
              
          </tr>
      </table>
      <?php
      $obj=new clscat();
      $arr=$obj->Disp_cat();
      echo '<table border="2">';
      for($i=0;$i<count($arr);$i++)
      {
          echo "<tr>";
          echo"<td width=100px>".$arr[$i][1]."</td>";
          echo"<td><a href=frmcat.php?ccod=".$arr[$i][0]."&mod=E>edit</a>";
          echo '&nbsp;&nbsp;';
          echo"<a href=frmcat.php?ccod=".$arr[$i][0]."&mod=D>delete</a>";
          echo '</td></tr>';
      }
      echo '</table>';
      ?>

   <?php
      include_once 'footer.php';
   ?>

