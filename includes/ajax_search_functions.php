<?php 
function check_min_php_version(){
	if(version_compare(phpversion(),'5.2','<')){
		exit('The ajax_search plugin requires a PHP version of 5.2 or greater.');
	}
}
?>




