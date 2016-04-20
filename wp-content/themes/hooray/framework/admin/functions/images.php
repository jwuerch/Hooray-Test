<?php
/**
 *  Radio Images
 */
function images($input,$head = true)
{
    $bd_option = unserialize(get_option('bdayh_setting'));
    $current_value = bdayh_get_option($input['id']);
    if($head == true)
    {
        //echo '<div class="bd_item postbox"><h3 class="hndle">'. $input['name'] .'</h3>' ."\n";
    }

    echo '<input name="'. $input['id'] .']['. $input['key'] .'" id="'. $input['id'] .'['. $input['key'] .']" type="radio" value="'. $currentValue[$input['key']] .'" /> '."\n";
    //echo '<img src="'. get_template_directory_uri() .'/framework/admin/images/header-1.png" />';

    if($head == true)
    {
        //echo '</div>'."\n";
    }
}
?>