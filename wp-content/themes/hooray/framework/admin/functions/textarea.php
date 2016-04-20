<?php
/**
 *  textarea
 */
function textarea($input,$head = true)
{
    $bd_option = unserialize(get_option('bdayh_setting'));
    if($head == true)
    {
        //echo '<div class="bd_item postbox"><h3 class="hndle">'. $input['name'] .'</h3>' ."\n";
    }
    $class_name = (isset($input['class'])) ? $input['class'] : "";
    echo "\n".'<div id="textareA'.$input['id'].'"><div class="bd_option_item '.$class_name.'">' ."\n";
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
        echo '<p class="bd-exp">'. $input['exp'] .'</p>' ."\n";
    }
    $class_name = (isset($input['class'])) ? $input['class'] : "";
    if($input['id'] != 'advanced_export')
    {
        $text_code = stripslashes($bd_option['bd_setting'][$input['id']]);
    }
    else
    {
        ## base64_encode
        $text_code = base64_encode(get_option('bdayh_setting'));
    }

    if($input['id'] == 'advanced_export')
    {
        echo '<div id="'.$input['id'].'" class="'.$class_name.'"  style="border-radius: 2px;background: #FFF;border: 1px solid #ebecf2;min-width: 220px;width: 90%;padding: 10px;color: #757575;font-family: tahoma;font-size: 12px;box-shadow: none !important;resize: none;overflow-y: scroll;width: 444px;">'.$text_code.'</div>' ."\n";
    }
    else
    {
        echo '<textarea id="'.$input['id'].'" class="'.$class_name.'" name="'.$input['id'].'" rows="7">'.$text_code.'</textarea>' ."\n";
    }

    if($input['id'] != 'advanced_export')
    {

    }
    else
    {
        ?><div class="clear"></div><button type="button" class="go btn" onclick="window.location='admin.php?page=mypanel&do=download';">Download</button><?php
    }
    echo '</div></div>'."\n";
    if($head == true)
    {
        //echo '</div>'."\n";
    }
}
?>