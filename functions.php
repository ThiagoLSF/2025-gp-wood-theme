<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // exit if accessed directly.
}

// acf //
include __DIR__ . '/inc/functions/acf.php';

// custom //
include __DIR__ . '/inc/functions/custom.php';

// elementor //
include __DIR__ . '/inc/functions/elementor.php';

// enqueue //
include __DIR__ . '/inc/functions/enqueue.php';

// media //
include __DIR__ . '/inc/functions/media.php';

// panel //
include __DIR__ . '/inc/functions/panel.php';

// post //
include __DIR__ . '/inc/functions/post.php';

// remove //
include __DIR__ . '/inc/functions/remove.php';