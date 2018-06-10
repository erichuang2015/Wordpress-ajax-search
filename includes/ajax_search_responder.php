<?php 

require_once( realpath('../../../../').'/wp-config.php' );

if(empty($_GET['s'])){
	exit;
}

$max_posts = 3;

$WP_Query_object = new WP_Query();
$WP_Query_object->query(array('s' => $_GET['s'], 'showposts' => $max_posts));

/*
foreach($WP_Query_object->posts as $result)
{
 print_r($result);
}
*/

print(json_encode($WP_Query_object->posts));












?>