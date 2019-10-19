<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       johnlazaro.com
 * @since      1.0.0
 *
 * @package    Daily_Journal
 * @subpackage Daily_Journal/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="daijou-wrapper">

	<p>
		<a href="?daijou_action=new_post">Post New Journal</a>
	</p>

	<?php

	echo $form_message;

	global $wpdb;

	$table_name = $wpdb->prefix . 'daijou_journal_items';

	$results = $wpdb->get_results(
		"
		SELECT *
		FROM $table_name
		ORDER BY date_posted DESC
		",
		OBJECT
	);

	?>

	<?php if( $results ) : ?>

		<?php foreach( $results as $item ): ?>

			<?php

			$unix_date_posted = strtotime($item->date_posted);

			$date_posted = date( 'F m, Y h:i a', $unix_date_posted );

			?>

			<div class="daijou-item">
				<div class="daijou-item-datetime"><?php echo $date_posted; ?></div>
				<p class="daijou-item-content"><?php echo $item->content; ?></p>
				<ul class="daijou-actions">
					<li>
						<a href="?daijou_action=edit_post&post_id=<?php echo $item->id; ?>">Edit post</a>
					</li>
					<li>
						<a href="?daijou_action=delete_post&post_id=<?php echo $item->id; ?>" onclick="return confirm('Are you sure you want to delete this post?');">Delete post</a>
					</li>
				</ul>
			</div>

		<?php endforeach; ?>

	<?php endif; ?>

</div>