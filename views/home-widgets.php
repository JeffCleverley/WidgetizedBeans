<!-- Add the widget ID string- as a class -->
<div class="uk-container uk-container-large uk-container-center <?php echo $home_widget; ?> widget-wrap">
<!-- Display the widget area using the widget area ID string-->
	<?php echo beans_get_widget_area_output( $home_widget ); ?>
</div>