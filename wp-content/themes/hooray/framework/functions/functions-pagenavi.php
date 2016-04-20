<?php
/**
 * Pagenavi
 * ----------------------------------------------------------------------------- *
 */
if(!function_exists('bd_pagenavi')) {
    function bd_pagenavi($pages = '', $range = 2)
    {
        $showitems = ($range * 2) + 1;
        global $paged;

        if (empty($paged)) $paged = 1;
        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if (!$pages) {
                $pages = 1;
            }
        }
        if (1 != $pages) {
            echo "<div class='pagenavi clear'>\n";
            if ($paged > 1) echo "<a class='pagenavi-prev' href='" . get_pagenum_link($paged - 1) . "'> " . __('Previous ', LANG) . "</a>\n";
            for ($i = 1; $i <= $pages; $i++) {
                if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                    echo ($paged == $i) ? "<span class='pagenavi-current'>" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "' class='pagenavi-inactive' >" . $i . "</a>\n";
                }
            }
            if ($paged < $pages) echo "<a class='pagenavi-next' href='" . get_pagenum_link($paged + 1) . "'>" . __('Next', LANG) . " </a>\n";
            echo "</div><!-- .pagenavi/-->\n";
        }
    }
}
?>