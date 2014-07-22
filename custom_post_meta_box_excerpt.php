<?php

    function custom_field_excerpt($field_id, $word_count) {
        global $post;
        $text = get_post_meta( $post->ID, $field_id, true );
        if ( '' != $text ) {
            $text = strip_shortcodes( $text );
            $text = apply_filters('the_content', $text);
            $text = str_replace(']]>', ']]>', $text);
            $excerpt_length = $word_count;
            $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
            $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
        }
        return apply_filters('the_excerpt', $text);
    }

?>