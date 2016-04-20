<?php
/**
 *  Msg Info
 */
function msg_info( $input, $head = true ){
    $bd_option = unserialize( get_option( 'bdayh_setting' ) );
    if( $head == true ){}

    $class_name = (isset($input['class'])) ? $input['class'] : "";
    if ( !empty( $input['name'] ) && $input['name'] != ' ' ){
        echo '<p class="msg-info '.$class_name.'">'. $input['name'] .'</p>' ."\n";
    }
    if( $head == true ){}
}
?>