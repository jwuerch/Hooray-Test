<?php
/**
 * ----------------------------------------------------------------------------- *
 * Admin Theme
 * ----------------------------------------------------------------------------- *
 */
function bdayh_admin_theme()
{
    global $themename, $shortname, $bd_options,$wp_cats;
    $i=0;
    ?>

    <div id="message_success" style="display:none;" class="notification fade">
        <span class="notification_icon"></span>
        <i class="fa fa-check"></i>
    </div>

    <div id="message_wait" style="display:none;" class="notification fade">
        <span class="notification_icon"></span>
        <i class="fa fa-spinner fa-spin"></i>
    </div>

    <div id="message_error" style="display:none;" class="notification bd_alert fade">
        <span class="notification_icon"></span>
        <i class="fa fa-times"></i>
    </div>

    <form name="setting_form" id="setting_form" action="/" method="get">
        <div id="bd-panel">
            <div id="bd-header">
                <div id="bd-logo"></div><!-- #logo -->
                <div id="bd-inputs">
                    <input name="save" class="butn bd-save" type="submit" value="Save All Changes" />
                </div>
                <div class="clear"></div>
            </div><!-- header/-->
            <div class="bd-header-divider"></div><!-- divider -->
            <div id="bd-main" class="bd-main">
                <div class="clear"></div>
                <div id="bd-panel-tabs">
                    <ul>
                        <?php
                        if(is_array($bd_options)){
                            foreach($bd_options as $k => $v){
                                echo '<li class="'. $k .'"><a href="#'. $k .'" >'. ucfirst(str_replace("_"," ",$k)) .'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div><!-- tabs/-->
                <div class="bd-panel-tabs-bg"></div><!-- tabs bg -->
                <div id="bd-panel-container">
                    <?php
                    if( is_array( $bd_options ) ){
                        $list_sum = array();
                        foreach( $bd_options as $k => $v ){
                            $sub_item = 0; ?>
                            <div class="box_tabs_container" id="<?php echo $k; ?>">
                                <h1 id="bd-top-title"><?php echo ucfirst(str_replace("_"," ",$k)); ?></h1>
                                <div class="tab_content">
                                    <?php
                                    if(is_array($v)){
                                        foreach($v as $key => $input){
                                            if(isset($input['name']) and $input['name'] != ''){
                                                get_admin_tab($input);
                                            } else { ?>
                                                <div class="bd_item" id="elm_<?php echo $key; ?>">
                                                    <?php
                                                    foreach($input as $sub) {
                                                        get_admin_tab($sub,false);
                                                    }
                                                    ?>
                                                </div>
                                            <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                <?php unset($sub_item); ?>
                            </div>
                        <?php
                        }
                    }
                    ?>
                </div><!-- container/-->
                <div class="clear"></div>
            </div><!-- main/-->
            <div class="bd-footer-divider"></div>
            <div id="bd-footer" class="bd_footer">
                <input name="save" class="butn bd-save" type="submit" value="Save All Changes" />
                <script type="text/javascript">
                    function is_confirm(){
                        if(confirm('Are you sure ?')){
                            window.location='admin.php?page=mypanel&do=reset';
                        } else {
                            return false;
                        }
                    }
                </script>
                <input name="reset" class="butn bd-rest" type="button" onclick="return(is_confirm());" value="Options Reset" />
            </div><!-- footer/-->
        </div><!-- panel/-->
    </form>
<?php
}
?>