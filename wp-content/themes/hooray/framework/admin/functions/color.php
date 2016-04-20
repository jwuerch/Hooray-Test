<?php
/**
 *  Color
 */
function color($input,$head = true)
{
    $bd_option = unserialize(get_option('bdayh_setting'));
    {
        //echo '<div class="bd_item postbox"><h3 class="hndle">'. $input['name'] .'</h3>' ."\n";
    }
    $class_name = (isset($input['class'])) ? $input['class'] : "";
    echo "\n".'<div id="'. $input['id'].'" class="bd_option_item '.$class_name.'">' ."\n";
    if ( !empty($input['tip']) && $input['tip'] != ' ' )
    {
        echo '<a class="bd_help" title="'. $input['tip'] .'"></a>'."\n";
    }
    if ( !empty($input['name']) && $input['name'] != ' ' )
    {
        echo '<h3 class="label-color">'. $input['name'] .'</h3>'."\n";
    }
    if ( !empty($input['exp']) && $input['exp'] != ' ' )
    {
        echo '<p class="bd-exp">'. $input['exp'] .'</p>' ."\n";
    }

    ?>
    <div class="color-area">
        <div class="colorSelector">
            <div class="color-see" <?php if( $bd_option['bd_setting'][$input['id']] ) { ?> style="background-color:<?php echo $bd_option['bd_setting'][$input['id']];?>;" <?php } ?> ></div>
        </div>
        <input id="<?php echo $input['id']; ?>_input" class="input_numb color_input " type="text" name="<?php echo $input['id']; ?>" value="<?php echo $bd_option['bd_setting'][$input['id']]; ?>" />
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function()
        {
            jQuery('#<?php echo $input['id']; ?> .color-area').ColorPicker
            ({
                color: '#FFFFFF',
                onShow: function (colpkr)
                {
                    jQuery(colpkr).stop().fadeIn();
                    return false;
                },
                onHide: function (colpkr)
                {
                    jQuery(colpkr).hide();
                    return false;
                },
                onChange: function (hsb, hex, rgb)
                {
                    jQuery('#<?php echo $input['id']; ?> .color-see').css('backgroundColor', '#' + hex);
                    jQuery('#<?php echo $input['id']; ?>'+'_input').val('#' + hex);
                }
            });
        });
    </script>
    <?php
    echo '</div>'."\n";
    if($head == true)
    {
        //echo '</div>'."\n";
    }
}
?>