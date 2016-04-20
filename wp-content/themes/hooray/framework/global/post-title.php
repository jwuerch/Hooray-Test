<?php
if (has_post_format('link')){

	$bd_post_link = get_post_meta(get_the_ID(), 'bd_post_link_url', true);
	$bd_post_link_text = get_post_meta(get_the_ID(), 'bd_post_link_text', true);

	if($bd_post_link || $bd_post_link_text ){
		echo '<h2  class="entry-title"><a target="_blank" href="' . esc_url( $bd_post_link ) . '" >'. $bd_post_link_text .'</a></h2>' ;
	}
	else {
		the_title( '<h2  class="entry-title"><a href="' . esc_url( get_permalink() ) . '" >', '</a></h2>' );
	}
}
elseif (has_post_format('aside')){
	if ( is_single() ) {
		the_title( '<h1  class="entry-title">', '</h1>' );
	}
}
elseif (has_post_format('quote')){
	$bd_post_q_author = get_post_meta(get_the_ID(), 'bd_post_quote_author', true);
	$bd_post_q_text = get_post_meta(get_the_ID(), 'bd_post_quote_text', true);

	if($bd_post_q_text || $bd_post_q_author ){
		echo '<h1  class="entry-title">'. $bd_post_q_text .'</h1><div class="q-content"><p> - &nbsp; '. $bd_post_q_author .' &nbsp; - </p></div>' ;
	}
	else {
		the_title( '<h2  class="entry-title"><a href="' . esc_url( get_permalink() ) . '" >', '</a></h2>' );
	}
}
elseif ( is_single() || is_page() ) {
	the_title( '<h1  class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h1>' );
}
else {
	the_title( '<h2  class="entry-title"><a href="' . esc_url( get_permalink() ) . '" >', '</a></h2>' );
}