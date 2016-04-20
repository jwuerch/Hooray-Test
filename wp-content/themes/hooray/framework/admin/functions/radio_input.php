<?php
/**
 *  Radio
 */
function radio_input($input,$head = true)
{
    $bd_option = unserialize( get_option( 'bdayh_setting' ) );
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
        echo '<p class="bd-exp">'. $input['exp'] .'</p>' ."\n";
    }

    echo '<div class="check_radio_content">';

    foreach ($input['options'] as $key => $option)
    {
        ?>
        <div class="clear"></div>
        <div class="check_radio">
            <input class="on-of r_<?php echo $input['id'];?> <?php $class_name = (isset($input['class'])) ? $input['class'] : ""; echo $class_name; ?>" name="<?php echo $input['id']; ?>" id="<?php echo $input['id']; ?>" type="radio" value="<?php echo $key ?>" <?php if($bd_option['bd_setting'][$input['id']] == $key){echo 'checked="checked"';}?>>
            <div class="lab"><?php echo $option; ?></div>
        </div>

    <?php
    }

    if(isset($input['js']))
    {
        echo $input['js'];
    }

    echo '</div> </div>'."\n";
    if($head == true)
    {
        //echo '</div>'."\n";
    }
}
?>