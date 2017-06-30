<?php 
	if (is_front_page()){
		dynamic_sidebar('sidebar-homepage');
		}
	else {
	dynamic_sidebar('sidebar-primary'); 
	}
?>
