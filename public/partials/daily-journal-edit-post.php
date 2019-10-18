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

	<?php 

	global $wpdb;

	$table_name = $wpdb->prefix . 'daijou_journal_items';
	$post_id = sanitize_text_field( $_GET['post_id'] );

	$result = $wpdb->get_results(
		"
		SELECT *
		FROM $table_name
		WHERE id = $post_id
		",
		OBJECT
	);

	?>

	<?php if( $result ) : ?>

		<?php $item = reset( $result ); ?>

		<form method="post">

			<?php

			if( $form_message['is_success'] )
				$form_message_class = 'daijou-form-message-success';
			else
				$form_message_class = 'daijou-form-message-error';
			
			?>

			<p class="daijou-form-message <?php echo $form_message_class; ?>">
				<?php echo $form_message['message']; ?>
			</p>

			<input type="hidden" name="daijou_form_action" value="daijou_form_edit_post">
			<input type="hidden" name="post_id" value="<?php echo $item->id; ?>">
			<textarea name="content" placeholder="Content" required><?php echo $item->content; ?></textarea><br>
			
			<button type="submit">Update</button>
			
		</form>

	<?php endif; ?>

	<br>

	<p>
		<a href="?daijou_action=posts">Back to posts</a>
	</p>

</div>