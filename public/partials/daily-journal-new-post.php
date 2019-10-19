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
		<a href="?daijou_action=posts">Back to posts</a>
	</p>

	<form method="post">

		<?php echo $form_message; ?>

		<?php wp_nonce_field( 'daijou_form_action', 'daijou_form_new_post_nonce' ); ?>

		<input type="hidden" name="daijou_form_action" value="daijou_form_new_post">
		<textarea name="content" placeholder="Content" required></textarea><br>
		
		<button type="submit">Post</button>
		
	</form>

	<br>

	<p>
		<a href="?daijou_action=posts">Back to posts</a>
	</p>

</div>