<?php
session_start();
/*
 * Set up constant to ensure include files cannot be called on their own
*/
define ( "MY_APP", 1 );
/*
 * Set up a constant to your main application path
 */
define ( "APPLICATION_PATH", "application" );
define ( "TEMPLATE_PATH", APPLICATION_PATH . "/view" );

/* Prevent unauthorised access */
include_once(APPLICATION_PATH . "/inc/session.inc.php");


/*
 * Include the config.inc.php file
 */
include (APPLICATION_PATH . "/inc/config.inc.php");
include (APPLICATION_PATH . "/inc/db.inc.php");
include (APPLICATION_PATH . "/inc/ui_helpers.inc.php");
include (APPLICATION_PATH . "/inc/functions.inc.php");
include (APPLICATION_PATH . "/inc/queries.inc.php");






if (!empty($_GET) && isset($_GET['id'])) {
	
	//echo "Page is posted";


	
  
	
	$movieID = (int) $_GET['id'];

	$movie = retrieveMovie($movieID);

        
        $product = array();
        $product['title'] = $movie['title'];
        $product['description'] = $movie['description'];
        $product['taste'] = $movie['taste'];
        $product['price'] = $movie['price'];
        $product['country'] = $movie['country'];
        $product['mf_id'] = $movie['mf_id'];
        $product['movie_id']= $movieID;

            
        print_r($movie['mf_id']);
        
        updateMovie($product);
	$button_label = "Update Movie";
	
	
	}//end post
	

?>
<?php 
$activeInsert = "active";

include (TEMPLATE_PATH . "/header.html");
include (TEMPLATE_PATH . "/form_edit.php");
include (TEMPLATE_PATH . "/footer.html");
?>