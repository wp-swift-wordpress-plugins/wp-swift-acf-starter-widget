<?php $widget_id = "widget_" . $args["widget_id"]; ?>
<article class="row widget widget_meta wp-swift-widget <?php echo $widget_id; ?>">
	<?php if ( get_field('title', $widget_id) ) : ?>
		<h3><?php echo get_field('title', $widget_id); ?></h3>
	<?php endif; ?>
</article>