<?php
/**
 * User Rating
 * ----------------------------------------------------------------------------- *
 */
if (!class_exists('user_rating'))
{
    class user_rating
    {
        public $current_rating;
        public $current_position;
        public $count;

        function __construct()
        {
            if (is_single())
            {
                $this->retrieve_values();
            }
            add_action('wp_ajax_bd_rating', array(&$this, 'sync_rating'));
            add_action('wp_ajax_nopriv_bd_rating', array(&$this, 'sync_rating'));
            add_action('wp_enqueue_scripts', array(&$this, 'load_scripts'));
        }

        public function load_scripts()
        {
            global $post;
            if ($post)
            {
                if (is_singular()) {
                    wp_localize_script('jquery', 'bd_script', array(
                            'post_id' => $post->ID,
                            'ajaxurl' => admin_url('admin-ajax.php')
                        )
                    );
                }
            }
        }

        private function retrieve_values()
        {
            $current_rating = get_post_meta(get_the_ID(), 'current_rating', true);

            if (!$current_rating)
            {
                $current_rating = '0';
            }

            $this->current_rating = $current_rating;
            $current_position = get_post_meta(get_the_ID(), 'current_position', true);

            if (!$current_position)
            {
                $current_position = 0;
            }

            $this->current_position = $current_position;
            $count = get_post_meta(get_the_ID(), 'ratings_count', true);

            if (!$count)
            {
                $count = 0;
            }
            $this->count = $count;
        }

        public function sync_rating()
        {
            $position = (int)$_POST['rating_position'];
            $post_id = (int)$_POST['post_id'];
            $current_position = (int)get_post_meta($post_id, 'current_position', true);

            if (!$current_position)
            {
                $current_position = 0;
            }

            $current_rating = (int)get_post_meta($post_id, 'current_rating', true);

            if (!$current_rating)
            {
                $current_rating = 0;
            }

            $count = (int)get_post_meta($post_id, 'ratings_count', true);

            if (!$count)
            {
                $count = 0;
            }

            $new_position = ($current_position * $count + $position) / ($count + 1);
            $new_count = $count + 1;
            $new_rating = floor(($new_position / 10) * 5) / 10;

            update_post_meta($post_id, 'current_position', $new_position, get_post_meta($post_id, 'current_position', true));
            update_post_meta($post_id, 'current_rating', $new_rating, get_post_meta($post_id, 'current_rating', true));
            update_post_meta($post_id, 'ratings_count', $new_count, get_post_meta($post_id, 'ratings_count', true));
            exit;
        }
    }
}
new user_rating();



/**
 * Final Rate
 * ----------------------------------------------------------------------------- *
 */
function bd_wp_post_rate()
{
    $bd_brief_summary     = get_post_meta(get_the_ID(), 'bd_brief_summary', true);
    $bd_review_enable     = get_post_meta(get_the_ID(), 'bd_review_enable', true);
    $bd_final_score       = get_post_meta(get_the_ID(), 'bd_final_score', true);
    $bd_final_percentage  = $bd_final_score * 20 + 2;

    if( $bd_review_enable && $bd_final_percentage ){
        ?>
        <div class="star-rating">
            <span title="<?php echo $bd_final_percentage ?>%" style="width: <?php echo $bd_final_percentage ?>%"></span>
        </div>
    <?php
    }
}
?>