<?php

require('../../../wp-load.php');
$ajax_nonce = wp_create_nonce("post_background-" . $_GET['post']);

switch ($_POST['action']) {
    case 'add_post_background':
        if (!update_post_meta($_POST['post_id'], '_background_id', $_POST['attachment_id'])) {
            add_post_meta($_POST['post_id'], '_background_id', $_POST['attachment_id'], true);
        }
        ?>
        <p class="hide-if-no-js"><a class="thickbox" href="media-upload.php?post_id=<?php echo $_POST['post_id']; ?>&amp;type=image&amp;tab=type&amp;TB_iframe=1&amp;width=640&amp;height=310" id="set-post-background"><?php echo wp_get_attachment_image($_POST['attachment_id']); ?></a></p>
        <p class="hide-if-no-js"><a onclick="WPRemoveBackground(<?php echo $_POST['post_id']; ?>,'<?php echo $ajax_nonce; ?>');return false;" id="remove-post-background" href="#"><?php _e('Remove the background','postbackground'); ?></a></p>
        <?php
        break;
    case 'remove_post_background':
        delete_post_meta($_POST['post_id'], '_background_id');
        ?>
        <p class="hide-if-no-js"><a class="thickbox" href="media-upload.php?post_id=<?php echo $_POST['post_id']; ?>&amp;type=image&amp;tab=type&amp;TB_iframe=1&amp;width=640&amp;height=310" id="set-post-background"><?php _e('Set background image', 'postbackground'); ?></a></p>
        <?php
        break;
}

?>