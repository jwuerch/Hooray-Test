<?php
/**
 *  UI Slider
 */
function ui_slider($input,$head = true)
{
    $bd_option = unserialize(get_option('bdayh_setting'));
    if($head == true)
    {
        //echo '<div class="bd_item postbox"><h3 class="hndle">'. $input['name'] .'</h3>' ."\n";
    }
    $class_name = (isset($input['class'])) ? $input['class'] : "";
    echo "\n".'<div id="item-'. $input['id'] .'" class="bd_option_item '. $class_name .'">' ."\n";
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
    echo '<div class="bd-uislider"><div class="slider_num slide_num_f" id="'. $input['id'] .'" ></div>' ."\n";
    echo '<input id="'. $input['id'].'_input" class="input_num_f" type="text" name="'. $input['id'].'" value="'. (int)$bd_option['bd_setting'][$input['id']].'">' ."\n";
    echo '<span class="unitf">'. $input['unit'].'<span> </div>'."\n";
    echo '</div>'."\n";
    ?>
    <script>
        jQuery(document).ready(function() {
            jQuery("#<?php echo $input['id']; ?>").slider({
                range: "min",
                min: <?php echo $input['min']; ?>,
                max: <?php echo $input['max']; ?>,
                value: <?php if($bd_option['bd_setting'][$input['id']] != '') { echo $bd_option['bd_setting'][$input['id']]; }else{ echo 0;} ?>,
                slide: function(event, ui) {
                    jQuery('#'+jQuery(this).attr('id')+'_input').val(ui.value);

                }
            });
        });
    </script>
    <?php
    if($head == true)
    {
        //echo '</div>'."\n";
    }
}
?>