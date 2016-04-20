<?php
/**
 *  tybo
 */
function tybo($input,$head = true)
{
    global $options_fonts;
    $bd_option = unserialize(get_option('bdayh_setting'));
    $current_value = bdayh_get_option($input['id']);
    if($head == true)
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
        echo '<h3>'. $input['name'] .'</h3>'."\n";
    }
    if ( !empty($input['exp']) && $input['exp'] != ' ' )
    {
        echo '<p class="bd-exp">'. $input['exp'] .'</p>' ."\n";
    }
    ?>

    <div class="tybo-field">
        <label>Font Color</label>
        <div class="color-area">
            <div id="<?php echo $input['id']; ?>colorselect" class="colorSelector">
                <div class="color-see" <?php if( $current_value['color'] ) { ?> style="background-color:<?php echo $current_value['color'] ; ?>;" <?php } ?> ></div>
            </div>
            <input id="<?php echo $input['id']; ?>_color" class="input_numb color_input " type="text" name="<?php echo $input['id']; ?>[color]" value="<?php echo $current_value['color'] ; ?>" />
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function()
            {
                jQuery('#<?php echo $input['id']; ?>colorselect').ColorPicker
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
                        jQuery('#<?php echo $input['id']; ?>colorselect .color-see').css('backgroundColor', '#' + hex);
                        jQuery('.gfont_preview').css('color', '#' + hex);
                        jQuery('#<?php echo $input['id']; ?>'+'_color').val('#' + hex);
                    }
                });
            });
        </script>
    </div><!-- tybo-field -->

    <div class="tybo-field">
        <label>Font Size</label>
        <select class="tybo-size" name="<?php echo $input['id']; ?>[size]" id="<?php echo $input['id']; ?>[size]">
            <option value="" <?php if (!$current_value['size'] ) { echo ' selected="selected"' ; } ?>></option>
            <?php for( $i=1 ; $i<101 ; $i++){ ?>
                <option value="<?php echo $i ?>" <?php if (( $current_value['size']  == $i ) ) { echo ' selected="selected"' ; } ?>><?php echo $i ?></option>
            <?php } ?>
        </select>
    </div><!-- tybo-field -->

    <div class="tybo-field">
        <label>Lineheight</label>
        <select class="tybo-size" name="<?php echo $input['id']; ?>[lineheight]" id="<?php echo $input['id']; ?>[lineheight]">
            <option value="" <?php if (!$current_value['lineheight'] ) { echo ' selected="selected"' ; } ?>></option>
            <?php for( $i=1 ; $i<101 ; $i++){ ?>
                <option value="<?php echo $i ?>" <?php if (( $current_value['lineheight']  == $i ) ) { echo ' selected="selected"' ; } ?>><?php echo $i ?></option>
            <?php } ?>
        </select>
    </div><!-- tybo-field -->

    <div class="tybo-field">
        <label>Font weight</label>
        <select class="tybo-weight" name="<?php echo $input['id']; ?>[weight]" id="<?php echo $input['id']; ?>[weight]">
            <option value="" <?php if ( !$current_value['weight'] ) { echo ' selected="selected"' ; } ?>></option>
            <option value="normal" <?php if ( $current_value['weight']  == 'normal' ) { echo ' selected="selected"' ; } ?>>Normal</option>
            <option value="bold" <?php if ( $current_value['weight']  == 'bold') { echo ' selected="selected"' ; } ?>>Bold</option>
            <option value="lighter" <?php if ( $current_value['weight'] == 'lighter') { echo ' selected="selected"' ; } ?>>Lighter</option>
            <option value="bolder" <?php if ( $current_value['weight'] == 'bolder') { echo ' selected="selected"' ; } ?>>Bolder</option>
            <option value="100" <?php if ( $current_value['weight'] == '100') { echo ' selected="selected"' ; } ?>>100</option>
            <option value="200" <?php if ( $current_value['weight'] == '200') { echo ' selected="selected"' ; } ?>>200</option>
            <option value="300" <?php if ( $current_value['weight'] == '300') { echo ' selected="selected"' ; } ?>>300</option>
            <option value="400" <?php if ( $current_value['weight'] == '400') { echo ' selected="selected"' ; } ?>>400</option>
            <option value="500" <?php if ( $current_value['weight'] == '500') { echo ' selected="selected"' ; } ?>>500</option>
            <option value="600" <?php if ( $current_value['weight'] == '600') { echo ' selected="selected"' ; } ?>>600</option>
            <option value="700" <?php if ( $current_value['weight'] == '700') { echo ' selected="selected"' ; } ?>>700</option>
            <option value="800" <?php if ( $current_value['weight'] == '800') { echo ' selected="selected"' ; } ?>>800</option>
            <option value="900" <?php if ( $current_value['weight'] == '900') { echo ' selected="selected"' ; } ?>>900</option>
        </select>
    </div><!-- tybo-field -->

    <div class="tybo-field">
        <label>Font style</label>
        <select class="tybo-style" name="<?php echo $input['id']; ?>[style]" id="<?php echo $input['id']; ?>[style]" >
            <option value="" <?php if ( !$current_value['style'] ) { echo ' selected="selected"' ; } ?>></option>
            <option value="normal" <?php if ( $current_value['style']  == 'normal' ) { echo ' selected="selected"' ; } ?>>Normal</option>
            <option value="italic" <?php if ( $current_value['style'] == 'italic') { echo ' selected="selected"' ; } ?>>Italic</option>
            <option value="oblique" <?php if ( $current_value['style']  == 'oblique') { echo ' selected="selected"' ; } ?>>oblique</option>
        </select>
    </div><!-- tybo-field -->

    <div class="tybo-field">
        <label>Text Transform</label>
        <select class="tybo-weight" name="<?php echo $input['id']; ?>[texttransform]" id="<?php echo $input['id']; ?>[texttransform]" >
            <option value="" <?php if ( !$current_value['texttransform'] ) { echo ' selected="selected"' ; } ?>></option>
            <option value="none" <?php if ( $current_value['texttransform']  == 'none' ) { echo ' selected="selected"' ; } ?>>None</option>
            <option value="inherit" <?php if ( $current_value['texttransform'] == 'inherit') { echo ' selected="selected"' ; } ?>>Inherit</option>
            <option value="uppercase" <?php if ( $current_value['texttransform']  == 'uppercase') { echo ' selected="selected"' ; } ?>>Uppercase</option>
            <option value="lowercase" <?php if ( $current_value['texttransform']  == 'lowercase' ) { echo ' selected="selected"' ; } ?>>Lowercase</option>
            <option value="capitalize" <?php if ( $current_value['texttransform']  == 'capitalize' ) { echo ' selected="selected"' ; } ?>>Capitalize</option>
            <option value="full-size-kana" <?php if ( $current_value['texttransform']  == 'full-size-kana' ) { echo ' selected="selected"' ; } ?>>Full-size-kana</option>
            <option value="full-width" <?php if ( $current_value['texttransform']  == 'full-width' ) { echo ' selected="selected"' ; } ?>>Full-width</option>
        </select>
    </div><!-- tybo-field -->

    <div class="tybo-field">
        <label>Font Face</label>
        <select class="tybo-font" name="<?php echo $input['id']; ?>[font]" id="<?php echo $input['id']; ?>[font]">
            <?php foreach( $options_fonts as $font => $font_name ){ ?>
                <option value="<?php echo $font ?>" <?php if ( $current_value['font']  == $font ) { echo ' selected="selected"' ; } ?>><?php echo $font_name ?></option>
            <?php } ?>
        </select>
    </div><!-- tybo-field -->

    <?php
    echo '</div>'."\n";
    if($head == true)
    {
        //echo '</div>'."\n";
    }
}
?>