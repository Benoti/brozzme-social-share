<?php
/**
 * Plugin Name: brozzme Social Share
 * Plugin URL: http://taengo.com/brozzme-social-share/
 * Description: Social share
 * Version: 0.1
 * Author: Benoît Faure
 * Author URI: http://brozzme.com
 */

defined( 'ABSPATH' ) OR exit;

require_once __DIR__ .'/includes/tss_options.php';
require_once __DIR__ .'/includes/brozzme_hover_array.php';

register_activation_hook(   __FILE__, 'tss_plugin_activation' );
register_deactivation_hook( __FILE__, 'tss_plugin_deactivation' );
register_uninstall_hook(    __DIR__ .'/uninstall.php', 'tss_plugin_uninstall' );

function tss_plugin_deactivation(){
    $option_name = 'tss_settings';

    //delete_option($option_name);
}

/**
 * Creates the options
 */
function tss_plugin_activation() {
    //check if tss option setting is already present

    if(!get_option('tss_settings')) {
        //not present, so add
        $options = array(
            'tss_display_title' => '1',
            'tss_title' => '// Share //',
            'tss_title_effect' => 'hvr-bubble-float-bottom',
            'tss_select_icon' => '1',
            'tss_round_share'=>'2',
            'tss_box_effect' => '1',
            'tss_effect_name' => 'hvr-buzz',
            'tss_on_posts' => '1',
            'tss_checkbox_facebook' => '1',
            'tss_checkbox_twitter' => '1',
            'tss_checkbox_google' => '1',
            'tss_checkbox_linkedin' => '1',
            'tss_checkbox_pinterest' => '1',
            'tss_checkbox_email' => '1',
            'tss_email_title' => 'Send by email',
            'tss_checkbox_print' => '1',
            'tss_print_title' => 'Print',
        );
        add_option('tss_settings', $options);
    }
}

// load css style for tss
// todo:change awesome fonts to 4.3
function tss_frontend_style() {
    wp_enqueue_style( 'tss-frontend-style', plugin_dir_url( __FILE__ )  . 'css/style_tss.css', 'style' );
    wp_enqueue_style( 'tss-hover-style', plugin_dir_url( __FILE__ )  . 'css/hover.css', 'style' );
    wp_enqueue_style( 'tss-font-awesome', 'http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', 'style', '4.1.0' );

}

function load_brozzme_social_share_wp_admin_style() {
    wp_register_style( 'awesome_wp_admin_css', 'http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', array(), '4.1.0' );
    wp_enqueue_style( 'awesome_wp_admin_css' );
    wp_enqueue_style( 'tss-hover-style', plugin_dir_url( __FILE__ )  . 'css/hover.css', 'style' );
    wp_enqueue_style( 'brozzme_hover-frontend-style', plugin_dir_url( __FILE__ )  . 'css/style_tss.css', 'style' );
    //wp_register_style( 'bootstrap_wp_admin_css', 'http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css', array(), '3.1.1' );
    // wp_enqueue_style( 'bootstrap_wp_admin_css' );
    wp_register_script( 'js_admin_tss_hover', plugin_dir_url( __FILE__ )  . 'js/get_json-tss.js', array(), '1.0.0', true);
    wp_enqueue_script( 'js_admin_tss_hover' );
}
add_action( 'admin_enqueue_scripts', 'load_brozzme_social_share_wp_admin_style' );
add_action( 'wp_enqueue_scripts', 'tss_frontend_style', 12);


function brozzme_social_share(){
    $options = get_option( 'tss_settings' );
    //var_dump($options);
    if(is_single()){
    $share = '<div class="share-brozzme">';
    if($options['tss_display_title']==1 || $options['tss_display_title']==3) {
        if($options['tss_title_effect']!=''){
            $title_effect = $options['tss_title_effect'];
        }

        $share .= ' <div class="tss-title '.$title_effect.'" style="clear:left;" >'.$options['tss_title'].'</div>';
    }
    $share .= ' <ul class="social-share">';
    if($options['tss_social_box_style']!=1){
        $share .= '<style type="text/css" media="all">
                .social-share li.facebook a {
                    background:#3b5998;
                }

                .social-share li.twitter a {
                    background:#69b5d9;
                }

                .social-share li.google-plus a {
                    background:#d54432;
                }

                .social-share li.linkedin a {
                    background:#0073ad;
                }

                .social-share li.pinterest a{
                    background:#cf2027;
                }

                .social-share li.email-share a {
                    background:#d46f15;
                }
                .social-share li.print-share{

                }
                .social-share li.print-share a{
                    background:#07526c;
                }
            </style>';
    }
    if($options['tss_select_icon']==2){
        $share .= '<style type="text/css" media="all">
                ul.social-share li i {
                    display:none;
                }
            </style>';
    }
    if($options['tss_enable_box_effect']!= 1){
        if($options['tss_effect_name']!= ''){
            $hover_effect = $options['tss_effect_name'];
        }
        else{
            $hover_effect = 'hvr-wobble-vertical';
        }

    }
    if($options['tss_checkbox_facebook']==1){
        $share .= '<li class="facebook luvsocial '.$hover_effect.'">
                <!--fb-->
                <a target="_blank" href="http://www.facebook.com/sharer.php?u='.get_permalink().'&t='.get_the_title().'" title="Partagez cet article sur facebook"><i class="fa fa-facebook-square"></i> <span>Facebook</span></a>
            </li>';
    }
    if($options['tss_checkbox_twitter']==1){
        $share .= '<li class="twitter luvsocial '.$hover_effect.'">
                <!--twitter-->
                <a target="_blank" href="http://twitter.com/home?status='.urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')).': '.get_permalink().'" title="Partagez cet article sur Twitter"><i class="fa fa-twitter-square"></i> <span>Twitter</span></a>
            </li>';
    }
    if($options['tss_checkbox_google']==1){
        $share .='<li class="google-plus luvsocial '.$hover_effect.'">
                <!--g+-->
                <a target="_blank" href="https://plus.google.com/share?url='.get_permalink().'" title="Partagez cet article sur Google +"><i class="fa fa-google-plus-square"></i> <span>Google +</span></a>
            </li>';
    }
    if($options['tss_checkbox_linkedin']==1){
        $share .='<li class="linkedin luvsocial '.$hover_effect.'">
                <!--linkedin-->
                <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url='.get_permalink().'&title='.urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')).'&source=LinkedIn" title="Partagez cet article sur LinkedIn"><i class="fa fa-linkedin-square"></i> <span>Linkedin</span></a>
            </li>';
    }
    if($options['tss_checkbox_pinterest']==1){
        global $post;

        $share .= '<li class="pinterest luvsocial '.$hover_effect.'">
               <!--Pinterest-->
               <a target="_blank" href="http://pinterest.com/pin/create/button/?url='.get_permalink().'&media='.wp_get_attachment_url( get_post_thumbnail_id($post->ID) ).'&description='.get_the_title().' on '.get_bloginfo('name').' '.site_url().'" class="pin-it-button" count-layout="horizontal" title="Partagez sur Pinterest"><i class="fa fa-pinterest-square"></i> <span>Pinterest</span></a>
            </li>';

            }
    if($options['tss_checkbox_email']==1){
        if($options['tss_email_title']!='') {
            $email_text_title = $options['tss_email_title'];
        }
        else{ $email_text_title = 'Send by email';}
        $share .= '<li class="email-share luvsocial '.$hover_effect.'">
                <!--Email-->
                <a title="Envoyer par email" href="mailto:?subject=Check this post - '.get_the_title().' &body= '.get_permalink().'&title='.get_the_title().'" email=""><i class="fa fa-envelope"></i> <span>'.$email_text_title.'</span></a>
            </li>';
    }
    if($options['tss_checkbox_print']==1){
        if($options['tss_print_title']!=''){
            $email_print_title = $options['tss_print_title'];
        }
        else{
            $email_print_title = 'Print';
        }
        $share .= '<li class="print-share  '.$hover_effect.'">
                <!--Email-->
                <a href="javascript:window.print()" rel="nofollow"><i class="fa fa-print"></i> <span>'.$email_print_title.'</span></a>
            </li>';
            }
      $share .='</ul>
        </div>';
        $share .="<script>
        jQuery(document).ready(function($) {
            jQuery('.luvsocial a').live('click', function(){
                newwindow=window.open($(this).attr('href'),'','height=450,width=700');
                if (window.focus) {newwindow.focus()}
                return false;
            });
        });
    </script>";

    }
    return $share;
}

add_shortcode( 'brozzme-social-share', 'brozzme_social_share');

function brozzme_social_round_share(){
    $options = get_option( 'tss_settings' );
    //var_dump($options);

    $share = '<div class="share-brozzme">';
    if($options['tss_social_box_style']!=1){
        $share .= '<style type="text/css" media="all">
                .social-round-share li.facebook a {
                    background:#3b5998;
                }

                .social-round-share li.twitter a {
                    background:#69b5d9;
                }

                .social-round-share li.google-plus a {
                    background:#d54432;
                }

                .social-round-share li.linkedin a {
                    background:#0073ad;
                }

                .social-round-share li.pinterest a{
                    background:#cf2027;
                }

                .social-round-share li.email-share a {
                    background:#d46f15;
                }
                .social-round-share li.print-share{

                }
                .social-round-share li.print-share a{
                    background:#07526c;
                }
            </style>';
    }
    if($options['tss_select_icon']==2){
        $share .= '<style type="text/css" media="all">
                ul.social-share li i {
                    display:none;
                }
            </style>';
    }
    if($options['tss_display_title']==1 || $options['tss_display_title']==3) {
        if($options['tss_title_effect']!=''){
            $title_effect = $options['tss_title_effect'];
        }

        $share .= ' <div class="tss-round-title '.$title_effect.'" style="clear:left;" >'.$options['tss_title'].'</div>';
    }
    $share .= ' <ul class="social-round-share">';


    if($options['tss_enable_box_effect']!= 1){
        if($options['tss_effect_name']!= ''){
            $hover_effect = $options['tss_effect_name'];
        }
        else{
            $hover_effect = 'hvr-wobble-vertical';
        }

    }
    if($options['tss_checkbox_facebook']==1){
        $share .= '<li class="facebook luvsocial '.$hover_effect.'">
                <!--fb-->
                <a target="_blank" href="http://www.facebook.com/sharer.php?u='.get_permalink().'&t='.get_the_title().'" title="Partagez cet article sur facebook"><i class="fa fa-facebook-square"></i></a>
            </li>';
    }
    if($options['tss_checkbox_twitter']==1){
        $share .= '<li class="twitter luvsocial '.$hover_effect.'">
                <!--twitter-->
                <a target="_blank" href="http://twitter.com/home?status='.urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')).': '.get_permalink().'" title="Partagez cet article sur Twitter"><i class="fa fa-twitter-square"></i></a>
            </li>';
    }
    if($options['tss_checkbox_google']==1){
        $share .='<li class="google-plus luvsocial '.$hover_effect.'">
                <!--g+-->
                <a target="_blank" href="https://plus.google.com/share?url='.get_permalink().'" title="Partagez cet article sur Google +"><i class="fa fa-google-plus-square"></i></a>
            </li>';
    }
    if($options['tss_checkbox_linkedin']==1){
        $share .='<li class="linkedin luvsocial '.$hover_effect.'">
                <!--linkedin-->
                <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url='.get_permalink().'&title='.urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')).'&source=LinkedIn" title="Partagez cet article sur LinkedIn"><i class="fa fa-linkedin-square"></i></a>
            </li>';
    }
    if($options['tss_checkbox_pinterest']==1){
        global $post;

        $share .= '<li class="pinterest luvsocial '.$hover_effect.'">
               <!--Pinterest-->
               <a target="_blank" href="http://pinterest.com/pin/create/button/?url='.get_permalink().'&media='.wp_get_attachment_url( get_post_thumbnail_id($post->ID) ).'&description='.get_the_title().' on '.get_bloginfo('name').' '.site_url().'" class="pin-it-button" count-layout="horizontal" title="Partagez sur Pinterest"><i class="fa fa-pinterest-square"></i></a>
            </li>';

    }
    if($options['tss_checkbox_email']==1){
        if($options['tss_email_title']!='') {
            $email_text_title = $options['tss_email_title'];
        }
        else{ $email_text_title = 'Send by email';}
        $share .= '<li class="email-share luvsocial '.$hover_effect.'">
                <!--Email-->
                <a title="'.$email_text_title.'" href="mailto:?subject=Check this post - '.get_the_title().' &body= '.get_permalink().'&title="'.get_the_title().'" email"=""><i class="fa fa-envelope"></i></a>
            </li>';
    }
    if($options['tss_checkbox_print']==1){
        if($options['tss_print_title']!=''){
            $email_print_title = $options['tss_print_title'];
        }
        else{
            $email_print_title = 'Print';
        }
        $share .= '<li class="print-share  '.$hover_effect.'">
                <!--Email-->
                <a href="javascript:window.print()" rel="nofollow"><i class="fa fa-print"></i></a>
            </li>';
    }
    $share .='</ul>
        </div>';
    $share .="<script>
        jQuery(document).ready(function($) {
            jQuery('.luvsocial a').live('click', function(){
                newwindow=window.open($(this).attr('href'),'','height=450,width=700');
                if (window.focus) {newwindow.focus()}
                return false;
            });
        });
    </script>";


    return $share;
}

add_shortcode( 'brozzme-social-round-share', 'brozzme_social_round_share');
// sharing social
function brozzme_social_share_echo(){
    ?>
    <div class="share-Brozzme">
        <div style="clear:left;" >// PARTAGER //</div>
        <ul class="social-share" style="padding-top:3px;">
            <li class="facebook luvsocial">
                <!--fb-->
                <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();  ?>&t=<?php the_title(); ?>" title="<?php _e('Share this post on Facebook!', 'divi')?>"><i class="fa fa-facebook-square"></i> <span>Facebook</span></a>
            </li>
            <li class="twitter luvsocial">
                <!--twitter-->
                <a target="_blank" href="http://twitter.com/home?status=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>: <?php the_permalink(); ?>" title="<?php _e('Share this post on Twitter!', 'divi')?>"><i class="fa fa-twitter-square"></i> <span>Twitter</span></a>
            </li>
            <li class="google-plus luvsocial">
                <!--g+-->
                <a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="<?php _e('Share this post on Google Plus!', 'divi')?>"><i class="fa fa-google-plus-square"></i> <span>Google +</span></a>
            </li>
            <li class="linkedin luvsocial">
                <!--linkedin-->
                <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>&source=LinkedIn" title="<?php _e('Share this post on Linkedin!', 'divi')?>"><i class="fa fa-linkedin-square"></i> <span>Linkedin</span></a>
            </li>
            <li class="pinterest luvsocial">
                <!--Pinterest-->
                <a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&media=<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );?>&description=<?php the_title();?> on <?php bloginfo('name'); ?> <?php echo site_url()?>" class="pin-it-button" count-layout="horizontal" title="<?php _e('Share on Pinterest','cryst4l') ?>"><i class="fa fa-pinterest-square"></i> <span>Pinterest</span></a>
            </li>
            <li class="email-share">
                <!--Email-->
                <a title="<?php _e('Envoyer par mail ','divi') ?>" href="mailto:?subject=Check this post - <?php the_title();?> &body= <?php the_permalink()?>&title="<?php the_title()?>" email"=""><i class="fa fa-envelope"></i> <span><?php _e('Envoyer par mail ', 'divi')?></span></a>
            </li>
            <li class="print-share">
                <!--Email-->
                <a href="javascript:window.print()" rel="nofollow"><i class="fa fa-print"></i> <span><?php _e('Imprimer', 'divi')?></span></a>
            </li>
        </ul>
    </div>
    <script>
        jQuery(document).ready(function($) {
            jQuery('.luvsocial a').live('click', function(){
                newwindow=window.open($(this).attr('href'),'','height=450,width=700');
                if (window.focus) {newwindow.focus()}
                return false;
            });
        });
    </script>
<?php
}

add_shortcode( 'brozzme-social-sharing-echo', 'brozzme_social_share_echo');

//add_action( 'taengo-social-sharing-echo', 'taengo_social_share_echo');

// Check for social share post embeding
// if shortcode is find in a post or a page code will remove it from the content and add the shortcode at the end of it
$options = get_option( 'tss_settings' );

if ($options['tss_on_posts'] == 2){
    add_action('the_content', 'tss_add_on_Posts');

}

function tss_add_on_Posts($content){
    global $options;



    if(has_shortcode( $content, 'brozzme-social-share' ) ){
       // $content = strip_shortcodes( $content );
        $content = strip_shortcode('brozzme-social-share', $content);
    }
    if(has_shortcode( $content, 'brozzme-social-round-share' ) ){
        // $content = strip_shortcodes( $content );
        $content = strip_shortcode('brozzme-social-round-share', $content);
    }
    if($options['tss_round_share'] == 1){
        $content .= do_shortcode('[brozzme-social-round-share]');
    }
    else{
        $content .= do_shortcode('[brozzme-social-share]');
    }

    return $content;
}
/**
 * @param string $code name of the shortcode
 * @param string $content
 * @return string content with shortcode striped
 */
function strip_shortcode($code, $content)
{
    global $shortcode_tags;

    $stack = $shortcode_tags;
    $shortcode_tags = array($code => 1);

    $content = strip_shortcodes($content);

    $shortcode_tags = $stack;
    return $content;
}

add_action( 'plugins_loaded', 'bss_load_textdomain' );

/**
 * Load plugin textdomain.
 */
function bss_load_textdomain() {
    load_plugin_textdomain( 'brozzme-social-share', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
?>