<?php

/*
 * This constant is declared in index.php
* It prevents this file being called directly
*/
defined('MY_APP') or die('Restricted access');


function validateproduct($product) {
	

	return true;
	
	
}

function saveProduct($product) {
	
	$sqlQuery = "INSERT INTO products (title, mf_id, price, taste, country) values ('{$product['title']}','{$product['mf_id']}', '{$product['price']}','{$product['taste']}','{$product['country']}')";
	
	$result = mysql_query($sqlQuery);
	
	

	
	if (!$result) {

		echo $sqlQuery;
	}  
        
    return mysql_insert_id();

	
}

function updateMf($mf) {
	
        $sqlQuery = "INSERT INTO mfs (mf_id, mf_title) values ('{$mf['mf_id']}','{$mf['mf_title']}')";
	
	$result = mysql_query($sqlQuery);
	
	

	
	if (!$result) {

		echo $sqlQuery;
	}  
        
    return mysql_insert_id();

	
}
/* 
 * Realistically, you would pass function $_FILES array, but here we are assuming it's available
 * UPLOAD_PATH is defined in config.inc.php
 */
function uploadFiles($product_id) {
	//echo UPLOAD_PATH;
	//echo $_FILES['uploadedfile']['tmp_name'];
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], UPLOAD_PATH)) {
		
		saveImageRecord($product_id, basename( $_FILES['uploadedfile']['name']));
		
	
	} else{
		echo "<p>There was an error uploading the file, please try again!";
	}
	
	
}


function saveImageRecord($product_id, $imageName) {
	
	
	$sqlQuery = "UPDATE productts SET imagefile = '$imageName' where movie_id = $product_id"; 
	$result = mysql_query($sqlQuery);
	
	
	
	
	
	
	
	
}

/*
 * Typical things that go wrong with next script
 * You must update the insert.php file to capture any new fields
 * You must ensure there are commas on any new lines you create
 * To resolve issues, uncomment the lines which echo the $sqlQuery  and die();
 */


function updateMovie($product) {
    $productID = (int) $product['movie_id'];
    echo $productID;
    $sqlQuery = "UPDATE products SET ";
     $sqlQuery .= " taste = '" . $product['taste'] . "',";
     $sqlQuery .= " country = '" . $product['country'] . "',";
     $sqlQuery .= " price = '". $product['price'] . "',";
     $sqlQuery .= " title = '". $product['title'] . "',";
     $sqlQuery .= " description = '". $product['description'] . "', ";
     $sqlQuery .= " mf_id = '". $product['mf_id'] . "'";
    
    $sqlQuery .= " WHERE product_id = $productID";
    
  //  echo $sqlQuery;
 //  die("...");
    
    $result = mysql_query($sqlQuery);
	
    
    
	if (!$result) {
		die("error" . mysql_error());
        }
	
    
}


function deleteMovie($id) {
    $productID = (int) $id;
    $sqlQuery = "DELETE FROM products where product_id = $productID";
    
    $result = mysql_query($sqlQuery);
    if (!$result) {
		die("error" . mysql_error());
        }
}


function deleteMF($id) {
    $MFid = (int) $id;
    $sqlQuery = "DELETE FROM mfs where mf_id = $MFid";
    
    $result = mysql_query($sqlQuery);
    if (!$result) {
		die("error" . mysql_error());
        }
}


function retrieveMovie($id) {

	$sqlQuery = "SELECT * from products  WHERE product_id = $id";

	$result = mysql_query($sqlQuery);
	
	if(!$result) die("error" . mysql_error());
	
	


        $output = mysql_fetch_assoc($result);


	return $output;
	
}




function output_edit_link($id) {
	
	return "<a href='edit.php?id=$id'>Edit</a>";
	
	
}
function output_delete_link($id) {

	return "<a href='delete.php?id=$id'>Delete</a>";


}

function mf_edit_link($id) {
	
	return "<a href='editMF.php?id=$id'>Edit</a>";
	
	
}

function mf_delete_link($id) {
	
	return "<a href='deleteMF.php?id=$id'>Delete</a>";
	
	
}

function output_selected($currentValue, $valueToMatch) {
	
	
	if ($currentValue == $valueToMatch) {
		
		return "selected ='selected'";
		
	}
	
}

function authenticate($username, $password) {   
    $boolAuthenticated = false;
    
    $sqlQuery = "SELECT * from adminusers WHERE ";
    $sqlQuery .= "username = '" . $username . "'";
    $sqlQuery .= " AND ";
    $sqlQuery .= "password = '" .$password . "'";
    
    $result = mysql_query($sqlQuery);
    
    if (!$result)  die("Error: " . $sqlQuery . mysql_error());
    
    if (mysql_num_rows($result)==1) {
        $boolAuthenticated = true;
    }
    
    return $boolAuthenticated;
}