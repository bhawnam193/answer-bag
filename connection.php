<?php
define("SERVER","localhost");
define("UNAME","root");
define("PWD","");
define("PORT","8081");
define("DNAME","dbfileshare");
class clscon
{
    function __construct() 
    {
        mysql_connect(SERVER,UNAME,PWD,PORT) or die('Unable connect to the server'.  mysql_error());
        mysql_select_db(DNAME) or die('Unabel connect to the database'.mysql_error());
    }
}

?>
