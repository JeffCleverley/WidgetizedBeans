<!-- Add the widget ID string- as a class -->
<div class="uk-container uk-container-large uk-container-center <?php echo $home_widget; ?> widget-wrap">
<!-- Display the widget area using the widget area ID string-->
<!-- https://www.getbeans.io/code-reference/functions/beans_widget_area/-->
	<?php echo beans_widget_area( $home_widget ); ?>
</div>