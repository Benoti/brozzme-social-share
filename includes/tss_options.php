<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 13/01/15
 * Time: 18:25
 */

add_action( 'admin_menu', 'tss_add_admin_menu' );

function tss_add_admin_menu(  ) {

    add_options_page( 'Brozzme social share', 'Brozzme social share', 'manage_options', 'brozzme_social_share', 'tss_options_page' );

}

add_action( 'admin_init', 'tss_settings_init' );

function tss_settings_init(  ) {

    register_setting( 'brozzmeSocialShare', 'tss_settings' );

    add_settings_section(
        'tss_brozzmeSocialShare_section',
        __( 'Your social share settings', 'brozzme-social-share' ),
        'tss_settings_section_callback',
        'brozzmeSocialShare'
    );

    add_settings_field(
        'tss_display_title',
        __( 'Display Social Share Title', 'brozzme-social-share' ),
        'tss_display_title_render',
        'brozzmeSocialShare',
        'tss_brozzmeSocialShare_section'
    );

    add_settings_field(
        'tss_title_effect',
        __( 'Title effect', 'brozzme-social-share' ),
        'tss_box_title_effect_render',
        'brozzmeSocialShare',
        'tss_brozzmeSocialShare_section'
    );
    add_settings_field(
        'tss_title',
        __( 'Social Share Title', 'brozzme-social-share' ),
        'tss_text_title_render',
        'brozzmeSocialShare',
        'tss_brozzmeSocialShare_section'
    );
    add_settings_section(
        'tss_brozzmeSocialShare_section_2',
        __( 'Check social you want', 'brozzme-social-share' ),
        'tss_settings_section_callback_2',
        'brozzmeSocialShare'
    );
    add_settings_field(
        'tss_checkbox_facebook',
        __( '<i class="fa fa-facebook-square"></i> Facebook', 'brozzme-social-share' ),
        'tss_checkbox_facebook_render',
        'brozzmeSocialShare',
        'tss_brozzmeSocialShare_section_2'
    );

    add_settings_field(
        'tss_checkbox_twitter',
        __( '<i class="fa fa-twitter-square"> Twitter', 'brozzme-social-share' ),
        'tss_checkbox_twitter_render',
        'brozzmeSocialShare',
        'tss_brozzmeSocialShare_section_2'
    );

    add_settings_field(
        'tss_checkbox_google',
        __( '<i class="fa fa-google-plus-square"></i> Google+', 'brozzme-social-share' ),
        'tss_checkbox_google_render',
        'brozzmeSocialShare',
        'tss_brozzmeSocialShare_section_2'
    );

    add_settings_field(
        'tss_checkbox_linkedin',
        __( '<i class="fa fa-linkedin-square"></i> Linkedin', 'brozzme-social-share' ),
        'tss_checkbox_linkedin_render',
        'brozzmeSocialShare',
        'tss_brozzmeSocialShare_section_2'
    );

    add_settings_field(
        'tss_checkbox_pinterest',
        __( '<i class="fa fa-pinterest-square"></i> Pinterest', 'brozzme-social-share' ),
        'tss_checkbox_pinterest_render',
        'brozzmeSocialShare',
        'tss_brozzmeSocialShare_section_2'
    );

    add_settings_field(
        'tss_checkbox_email',
        __( '<i class="fa fa-envelope"></i> Email', 'brozzme-social-share' ),
        'tss_checkbox_email_render',
        'brozzmeSocialShare',
        'tss_brozzmeSocialShare_section_2'
    );
    add_settings_field(
        'tss_email_title',
        __( 'Type your email box text', 'brozzme-social-share' ),
        'tss_email_title_render',
        'brozzmeSocialShare',
        'tss_brozzmeSocialShare_section_2'
    );
    add_settings_field(
        'tss_checkbox_print',
        __( '<i class="fa fa-print"></i> Print', 'brozzme-social-share' ),
        'tss_checkbox_print_render',
        'brozzmeSocialShare',
        'tss_brozzmeSocialShare_section_2'
    );
    add_settings_field(
        'tss_print_title',
        __( 'Type your print box text', 'brozzme-social-share' ),
        'tss_print_title_render',
        'brozzmeSocialShare',
        'tss_brozzmeSocialShare_section_2'
    );

    add_settings_field(
        'tss_select_icon',
        __( 'Display icon with text', 'brozzme-social-share' ),
        'tss_select_icon_render',
        'brozzmeSocialShare',
        'tss_brozzmeSocialShare_section'
    );
    add_settings_field(
        'tss_round_share',
        __( 'Display round buttons', 'brozzme-social-share' ),
        'tss_round_share_render',
        'brozzmeSocialShare',
        'tss_brozzmeSocialShare_section'
    );
    add_settings_field(
        'tss_box_effect',
        __( 'Social box hover style', 'brozzme-social-share' ),
        'tss_enable_box_effect_render',
        'brozzmeSocialShare',
        'tss_brozzmeSocialShare_section'
    );
    add_settings_field(
        'tss_effect_name',
        __( 'Social box style', 'brozzme-social-share' ),
        'tss_box_effect_render',
        'brozzmeSocialShare',
        'tss_brozzmeSocialShare_section'
    );
    add_settings_field(
        'tss_on_posts',
        __( 'Enable Social on posts', 'brozzme-social-share' ),
        'tss_embed_on_posts_render',
        'brozzmeSocialShare',
        'tss_brozzmeSocialShare_section'
    );
}

// form rendering

function tss_display_title_render(  ) {

    $options = get_option( 'tss_settings' );
    ?>
    <select name='tss_settings[tss_display_title]'>
        <option value='1' <?php selected( $options['tss_display_title'], 1 ); ?>><?php _e('Yes (default mode)','brozzme-social-share');?></option>
        <option value='2' <?php selected( $options['tss_display_title'], 2 ); ?>><?php _e('No','brozzme-social-share');?></option>
        <option value='3' <?php selected( $options['tss_display_title'], 3 ); ?>><?php _e('Animate Hover.css title','brozzme-social-share');?></option>
    </select>

<?php

}
function tss_round_share_render(  ) {

    $options = get_option( 'tss_settings' );
    ?>
    <select name='tss_settings[tss_round_share]'>
        <option value='1' <?php selected( $options['tss_round_share'], 1 ); ?>><?php _e('Yes','brozzme-social-share');?></option>
        <option value='2' <?php selected( $options['tss_round_share'], 2 ); ?>><?php _e('No','brozzme-social-share');?></option>
    </select>

<?php

}

function tss_text_title_render(  ) {

    $options = get_option( 'tss_settings' );
    ?>
    <input type='text' name='tss_settings[tss_title]' value='<?php echo $options['tss_title']; ?>'>
<?php

}


function tss_checkbox_facebook_render(  ) {

    $options = get_option( 'tss_settings' );
    ?>
    <input type='checkbox' name='tss_settings[tss_checkbox_facebook]' <?php checked( $options['tss_checkbox_facebook'], 1 ); ?> value='1'>
<?php

}

function tss_checkbox_twitter_render(  ) {

    $options = get_option( 'tss_settings' );
    ?>
    <input type='checkbox' name='tss_settings[tss_checkbox_twitter]' <?php checked( $options['tss_checkbox_twitter'], 1 ); ?> value='1'>
<?php

}

function tss_checkbox_google_render(  ) {

    $options = get_option( 'tss_settings' );
    ?>
    <input type='checkbox' name='tss_settings[tss_checkbox_google]' <?php checked( $options['tss_checkbox_google'], 1 ); ?> value='1'>
<?php

}


function tss_checkbox_linkedin_render(  ) {

    $options = get_option( 'tss_settings' );
    ?>
    <input type='checkbox' name='tss_settings[tss_checkbox_linkedin]' <?php checked( $options['tss_checkbox_linkedin'], 1 ); ?> value='1'>
<?php

}


function tss_checkbox_pinterest_render(  ) {

    $options = get_option( 'tss_settings' );
    ?>
    <input type='checkbox' name='tss_settings[tss_checkbox_pinterest]' <?php checked( $options['tss_checkbox_pinterest'], 1 ); ?> value='1'>
<?php

}


function tss_checkbox_email_render(  ) {

    $options = get_option( 'tss_settings' );
    ?>
    <input type='checkbox' name='tss_settings[tss_checkbox_email]' <?php checked( $options['tss_checkbox_email'], 1 ); ?> value='1'>
<?php

}

function tss_email_title_render(  ) {

    $options = get_option( 'tss_settings' );
    ?>
    <input type='text' name='tss_settings[tss_email_title]' value='<?php echo $options['tss_email_title']; ?>'>
<?php

}
function tss_checkbox_print_render(  ) {

    $options = get_option( 'tss_settings' );
    ?>
    <input type='checkbox' name='tss_settings[tss_checkbox_print]' <?php checked( $options['tss_checkbox_print'], 1 ); ?> value='1'>
<?php

}
function tss_print_title_render(  ) {

    $options = get_option( 'tss_settings' );
    ?>
    <input type='text' name='tss_settings[tss_print_title]' value='<?php echo $options['tss_print_title']; ?>'>
<?php

}
// style options
function tss_select_icon_render(  ) {

    $options = get_option( 'tss_settings' );
    ?>
    <select name='tss_settings[tss_select_icon]'>
        <option value='1' <?php selected( $options['tss_select_icon'], 1 ); ?>><?php _e('Yes','brozzme-social-share');?></option>
        <option value='2' <?php selected( $options['tss_select_icon'], 2 ); ?>><?php _e('No','brozzme-social-share');?></option>
    </select>
<?php

}

function tss_social_box_style_render(  ) {

    $options = get_option( 'tss_settings' );
    ?>
    <select name='tss_settings[tss_social_box_style]'>
        <option value='1' <?php selected( $options['tss_social_box_style'], 1 ); ?>><?php _e('Default (link hover)','brozzme-social-share');?>Default (link hover)</option>
        <option value='2' <?php selected( $options['tss_social_box_style'], 2 ); ?>><?php _e('No link hover','brozzme-social-share');?>No link hover</option>
    </select>
<?php

}
function tss_enable_box_effect_render(  ){

    $options = get_option( 'tss_settings' );
    ?>
    <select name='tss_settings[tss_box_effect]'>
        <option value='1' <?php selected( $options['tss_box_effect'], 1 ); ?>><?php _e('Default (No effect on hover)','brozzme-social-share');?></option>
        <option value='2' <?php selected( $options['tss_box_effect'], 2 ); ?>><?php _e('Effect on hover','brozzme-social-share');?></option>
    </select>
<?php

}
function tss_box_effect_render(  ){
    global $hover_class_array;
    $options = get_option( 'tss_settings' );

    $select_name = 'tss_settings[tss_effect_name]';
    $select_id = 'json-tss-one-effect';
    $prefix = $hover_class_array['prefix'];
    if($options['tss_effect_name']!=''){
        echo '<select name="brozzme_dropdown" id="'.$select_id.'">';
        echo '<option selected value="base">'.__('Please Select another type','brozzme-social-share').'</option>';
        foreach($hover_class_array as $key=>$value){
            if($key == 'hoverclass'){
                foreach($value as $subkey=>$subvalue){
                    $friendly_name = $hover_class_array['hovertypes'][$subkey];
                    echo  '<option value="'.$subkey.'" >'.$friendly_name.'</option>';
                }
            }
        }
        echo '</select>';
        echo '<select name="'.$select_name.'" id="json-tss-two-effect">
                <option value="'.$options['tss_effect_name'].'" selected>'.$options['tss_effect_name'].'</option>
            </select>';
        echo '<div style="clear:left;padding-top:20px;">
            <div class="test-effect '.$options['tss_effect_name'].'"><a href="#">'.get_bloginfo('name').'</a></div>
        </div>';
    }
    else{
        echo '<select name="brozzme_dropdown" id="'.$select_id.'">';
        echo '<option selected value="base">'.__('Please Select a type','brozzme-social-share').'</option>';
        foreach($hover_class_array as $key=>$value){
            if($key == 'hoverclass'){
                foreach($value as $subkey=>$subvalue){
                    $friendly_name = $hover_class_array['hovertypes'][$subkey];
                    echo  '<option value="'.$subkey.'" >'.$friendly_name.'</option>';
                }
            }
        }
        echo '</select>';
        echo '<select name="'.$select_name.'" id="json-tss-two-effect">
                <option>'.__('Select a type above','brozzme-hover').'</option>
            </select>';

        echo '<div style="clear:left;padding-top:20px;">
            <div class="test-effect hvr-buzz"><a href="">'.get_bloginfo('name').'</a></div>
        </div>';
    }

//var_dump($options);
}

function tss_box_title_effect_render(  ){
    global $hover_class_array;
    $options = get_option( 'tss_settings' );
    $select_name = 'tss_settings[tss_title_effect]';


    $select_id = 'json-tss-one-title';
    $prefix = $hover_class_array['prefix'];
    if($options['tss_title_effect']!=''){
        echo '<select name="brozzme_dropdown" id="'.$select_id.'">';
        echo '<option selected value="base">'.__('Please Select another type','brozzme-social-share').'</option>';
        foreach($hover_class_array as $key=>$value){
            if($key == 'hoverclass'){
                foreach($value as $subkey=>$subvalue){
                    $friendly_name = $hover_class_array['hovertypes'][$subkey];
                    echo  '<option value="'.$subkey.'" >'.$friendly_name.'</option>';
                }
            }
        }
        echo '</select>';
        echo '<select name="'.$select_name.'" id="json-tss-two-title">
                <option value="'.$options['tss_title_effect'].'" selected>'.$options['tss_effect_name'].'</option>
            </select>';
        echo '<div style="clear:left;padding-top:20px;">
            <div class="test-title '.$options['tss_title_effect'].'"><a href="#">'.get_bloginfo('name').'</a></div>
        </div>';
    }
    else{
        echo '<select name="brozzme_dropdown" id="'.$select_id.'">';
        echo '<option selected value="base">'.__('Please Select a type','brozzme-social-share').'</option>';
        foreach($hover_class_array as $key=>$value){
            if($key == 'hoverclass'){
                foreach($value as $subkey=>$subvalue){
                    $friendly_name = $hover_class_array['hovertypes'][$subkey];
                    echo  '<option value="'.$subkey.'" >'.$friendly_name.'</option>';
                }
            }
        }
        echo '</select>';
        echo '<select name="'.$select_name.'" id="json-tss-two-title">
                <option>'.__('Select a type above','brozzme-social-share').'</option>
            </select>';

        echo '<div style="clear:left;padding-top:20px;">
            <div class="test-title hvr-buzz"><a href="">'.get_bloginfo('name').'</a></div>
        </div>';
    }

}
    function tss_embed_on_posts_render(  ){

        $options = get_option( 'tss_settings' );
        ?>
        <select name='tss_settings[tss_on_posts]'>
            <option value='1' <?php selected( $options['tss_on_posts'], 1 ); ?>><?php _e('Default (just shortcode)','brozzme-social-share');?></option>
            <option value='2' <?php selected( $options['tss_on_posts'], 2 ); ?>><?php _e('Embed on every posts/pages','brozzme-social-share');?></option>
        </select>
    <?php

    }

function tss_settings_section_callback(  ) {

    echo __( 'Manage your Brozzme Social share settings', 'brozzme-social-share' );

}
function tss_settings_section_callback_2(  ) {

    echo __( 'Add the social network you want', 'brozzme-social-share' );

}

function tss_options_page(  ) {

    ?>
    <form action='options.php' method='post'>

        <h2>Brozzme Social Share</h2>
            <p>your social share shortcode is <b>[brozzme-social-share]</b></p>
        <?php
        settings_fields( 'brozzmeSocialShare' );
        do_settings_sections( 'brozzmeSocialShare' );
        submit_button();
        ?>

    </form>
<?php

}

?>