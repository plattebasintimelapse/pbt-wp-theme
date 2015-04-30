<?php
/**
 * The main content file
 */

	echo '<h6 class="text-center font-size-ex-small"><em>Posted on ' . get_the_date( 'F j, Y' ) . '</em></h6>';

	pbt_bylines();

	the_content();

	echo '<aside class="post-meta"></aside>';
