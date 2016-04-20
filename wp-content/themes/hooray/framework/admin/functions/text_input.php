<?php
function text_input($input,$head = true)
{
    $bd_option = unserialize(get_option('bdayh_setting'));
    if($head == true)
    {
        echo '<div class="bd_item postbox"><h3 class="hndle">'. $input['name'] .'</h3>' ."\n";
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
    $class_name = (isset($input["class"])) ? $input["class"] : '';
    echo "<input id='".$input['id']."' class='". $class_name ."' type='text' value='". stripslashes($bd_option["bd_setting"][$input["id"]]) ."' name='". $input["id"]."' /> </div>"."\n";
    if($head == true)
    {
        echo '</div>'."\n";
    }
}
?>