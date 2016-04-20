<?php
/**
 *  Select
 */
function select($input,$head = true)
{
    global $wp_cats;
    $bd_option = unserialize(get_option('bdayh_setting'));
    if($head == true)
    {
        //echo '<div class="bd_item postbox"><h3 class="hndle">'. $input['name'] .'</h3>' ."\n";
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
        echo '<p class="bd-exp">'. $input['exp'] .'</p>' ."\n";
    }
    $class_name = (isset($input['class'])) ? $input['class'] : "";
    echo '<select  class="'. $class_name .'" name="'. $input['id'] .'" >';

    if(is_array($input['list']))
    {
        foreach($input['list'] as $r)
        {
            ?>
            <option value="<?php echo $r;?>" <?php if($bd_option['bd_setting'][$input['id']] == $r){echo 'selected="selected"';}?> ><?php echo $r;?></option>
        <?php
        }
    }
    elseif($input['list'] == 'cats' and is_array($wp_cats))
    {
        ?>
        <option value="" <?php if($bd_option['bd_setting'][$input['id']] == ''){echo 'selected="selected"';}?> >Select Category ..</option>
        <?php
        foreach($wp_cats as $c_id => $c_name )
        {
            ?>
            <option value="<?php echo $c_id;?>" <?php if($bd_option['bd_setting'][$input['id']] == $c_id){echo 'selected="selected"';}?> ><?php echo $c_name;?></option>
        <?php
        }
    }
    echo '</select> </div>'."\n";
    if($head == true)
    {
        //echo '</div>'."\n";
    }
}
?>