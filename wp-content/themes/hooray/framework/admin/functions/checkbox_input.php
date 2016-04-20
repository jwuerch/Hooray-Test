<?php
/**
 *  checkbox
 */
function checkbox_input($input,$head = true)
{
    $bd_option = unserialize(get_option('bdayh_setting'));

    if ( ! empty( $input['cc'] ) && $input['cc'] != ' ' ) {
        $cc = $input['cc'];
    }

    $class_name = (isset($input['class'])) ? $input['class'] : "";
    echo "\n".'<div id="item-'. $input['id'] .'" class="bd_option_item '. $class_name .'">' ."\n";
    if ( !empty($input['tip']) && $input['tip'] != ' ' )
    {
        echo '<a class="bd_help" title="'. $input['tip'] .'"></a>'."\n";
    }
    ?>
    <table class="bd-on-of">
        <tbody>
        <tr>
            <th style="width: 335px; display: block; ">
                <?php
                if ( !empty($input['name']) && $input['name'] != ' ' )
                {
                    echo '<h3>'. $input['name'] .'</h3>'."\n";
                }
                ?>
                <?php
                if ( !empty($input['exp']) && $input['exp'] != ' ' )
                {
                    echo '<div class="bd-exp">'. $input['exp'] .'</div>'."\n";
                }
                ?>
            </th>
            <td>
                <input class="on-of" type="checkbox" id="<?php echo $input['id']; ?>" <?php if(isset($bd_option['bd_setting'][$input['id']]) and $bd_option['bd_setting'][$input['id']] == 1){echo ' checked="checked"';}?> class="<?php $class_name = (isset($input['class'])) ? $input['class'] : ""; echo $class_name; ?>" name="<?php echo $input['id']; ?>"  value="1" />

            </td>
        </tr>
        </tbody>
    </table>


    </div>
    <?php
    if($head == true)
    {
        //echo '</div>'."\n";
    }
}
?>