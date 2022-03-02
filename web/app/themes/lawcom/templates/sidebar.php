<div class="quick-links side-item">
  <ul>
    <li class="ql1"><a href="<?= home_url('/project/'); ?>">Find a Project</a></li>
    <li class="ql2"><a href="<?= home_url('/document/?document-type=consultations-related-documents&consultation-status=open'); ?>">Find Open Consultations</a></li>
    <li class="ql3"><a href="<?= home_url('/document/'); ?>">Find a Publication</a></li>
  </ul>
</div>
<?php
	if (is_front_page()){
		dynamic_sidebar('sidebar-homepage');
		}
	else {
	dynamic_sidebar('sidebar-primary'); 
	}

?>

