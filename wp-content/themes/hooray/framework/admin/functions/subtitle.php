<?php
/**
 *  Sub title
 */
function subtitle($input,$head = true)
{
    $bd_option = unserialize(get_option('bdayh_setting'));
    if($head == true){}
    $class_name = (isset($input['class'])) ? $input['class'] : "";
    if ( !empty($input['name']) && $input['name'] != ' ' )
    {
        echo '<h2 class="bd-subtitle '. $class_name .'">'. $input['name'] .'</h2>' ."\n";
    }
    if($head == true){}
}
?>