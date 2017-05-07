<?php
/*
* Custom Front Page
*/
//
//* Force full-width-content layout setting
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

//* Remove page/post title
remove_action('genesis_entry_header', 'genesis_do_post_title');

genesis();