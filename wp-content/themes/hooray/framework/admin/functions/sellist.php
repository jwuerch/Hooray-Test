<?php
/**
 *  Select Lists
 */
function sellist($input,$head = true)
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
        echo '<h3>'. $input['name'] .'</h3>'."\n";
    }
    if ( !empty($input['exp']) && $input['exp'] != ' ' )
    {
        echo '<p class="bd-exp">'. $input['exp'] .'</p>' ."\n";
    }
    ?>
    <select name="<?php echo $input['id']; ?>" id="<?php echo $input['id']; ?>">
        <?php foreach ($input['options'] as $key => $option) { ?>
            <option value="<?php echo $key ?>" <?php if ( bdayh_get_option( $input['id'] ) == $key) { echo ' selected="selected"' ; } ?>><?php echo $option; ?></option>
        <?php } ?>
    </select>
    <?php
    echo '</div>'."\n";
    if($head == true)
    {
        //echo '</div>'."\n";
    }
}
?>