<?php
/**
 *  Sub title Two
 */
function subtitleTwo( $input, $head = true ){

    $bd_option = unserialize(get_option('bdayh_setting'));

    if($head == true){}
    if ( !empty($input['name']) && $input['name'] != ' ' ) {

        $class_name = (isset($input['class'])) ? $input['class'] : "";
        echo '<div class="bd-subtitle-two '.$class_name.'">'. $input['name'] .'</div>' ."\n";
    }
    if($head == true){}
}
?>