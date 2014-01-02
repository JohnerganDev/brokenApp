<?php

/*
 * This constant is declared in index.php
* It prevents this file being called directly
*/
defined('MY_APP') or die('Restricted access');


$link_id=@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

if($link_id) {
	
    if(mysql_select_db(DB_DATABASE,$link_id)) {
            //echo "<p>Connection to database successful </p>";
           // header("/application/view/header.html");
    } else {

        echo "<p>Connection to database failed  </p>";
    }

} else {
    echo "Connection to " . DB_HOST . " unsucessful"; 
}
