<?php
/**
 *  Text
 */
function txt($input,$head = true)
{
    $bd_option = unserialize(get_option('bdayh_setting'));
    $currentValue = bdayh_get_option( $input['id'] );
    if($head == true)
    {
        //echo '<div class="bd_item postbox"><h3 class="hndle">'. $input['name'] .'</h3>' ."\n";
    }
    $class_name = (isset($input['class'])) ? $input['class'] : "";
    echo "\n".'<div class="bd_option_item '.$class_name.'">' ."\n";
    if ( !empty($input['tip']) && $input['tip'] != ' ' )
    {
        echo '<a class="bd_help" title="'. $input['tip'] .'"></a>'."\n";
    }
    if ( !empty($input['name']) && $input['name'] != ' ' )
    {
        echo '<h3>'. $input['name'] .'</h3>'."\n";
    }
    if ( !empty($input['exp']) && $input['exp'] != ' ' )
    {
        echo '<p class="bd-exp">'. $input['exp'] .'</p>'."\n";
    }
    echo '<input name="'. $input['id'] .']['. $input['key'] .'" id="'. $input['id'] .'['. $input['key'] .']" type="text" value="'. $currentValue[$input['key']] .'" /> </div>'."\n";
    if($head == true)
    {
        //echo '</div>'."\n";
    }
}
?>