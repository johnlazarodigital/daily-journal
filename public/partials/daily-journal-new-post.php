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

<form method="post">

	<input type="hidden" name="daijou_form_action" value="daijou_form_new_post">
	<input type="text" name="title" placeholder="Title" required><br><br>
	<textarea name="content" placeholder="Content" required></textarea><br>
	
	<button type="submit">Post</button>
	
</form>