<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta name='wmail-verification' content='a7144ff36a7decadf2b294f5c44c9c48' />
    <link rel="icon" href="http://icolorit.ru/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="http://icolorit.ru/favicon.ico" type="image/x-icon"/>
    <meta charset="utf-8">
    <title><?php the_title(); ?></title>
    <link rel="stylesheet" type="text/css"
          href="<?php echo esc_url(get_template_directory_uri()); ?>/files/styles.css"/>
    <!--[if lt IE 10]>
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/files/style_ie_7_8_9.css" rel="stylesheet"
          type="text/css">
    <![endif]-->

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<style>
.highslide img {
    max-width: 158px;
    max-height: 158px;
    width: auto;
    height: auto;
}
</style>
    <link rel='stylesheet' type='text/css'
          href='<?php echo esc_url(get_template_directory_uri()); ?>/files/highslide.min.css'/>
    <!--[if IE 6]>
    <link rel='stylesheet' type='text/css'
          href='<?php echo esc_url( get_template_directory_uri() ); ?>/files/highslide-ie6.css'/>
    <![endif]-->
    <!--[if lte IE 7 ]>
    <link rel='stylesheet' type='text/css'
          href='<?php echo esc_url( get_template_directory_uri() ); ?>/files/style1_ie.css'/>
    <![endif]-->

            
<script type="text/javascript">
(function($){
$(function(){
  $('.highslide').attr('rel', 'gallery');
  //$('.highslide').fancybox();

  });
})(jQuery)
</script>

    <script type='text/javascript' src='/shared/flowplayer/flowplayer-3.2.9.min.js'></script>
    <!-- 46b9544ffa2e5e73c3c971fe2ede35a5 -->
    <!--link rel='stylesheet' type='text/css' href='files/calendar.css'/-->
    <script type='text/javascript' src='<?php echo esc_url(get_template_directory_uri()); ?>/files/ru.js'></script>
    <link rel='stylesheet' type='text/css' href='<?php echo esc_url(get_template_directory_uri()); ?>/css/bootstrap.css'/>
    <script type='text/javascript' src='<?php echo esc_url(get_template_directory_uri()); ?>/js/bootstrap-hover-dropdown.min.js'></script>
    <script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script>
    <script type='text/javascript' src='<?php echo esc_url(get_template_directory_uri()); ?>/js/bootstrap-hover-dropdown.min.js'></script>
    <!--script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script-->

    <script type='text/javascript' src='http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU'></script>

    <script type='text/javascript' src='<?php echo esc_url(get_template_directory_uri()); ?>/files/cookie.js'></script>
    <script type='text/javascript'
            src='<?php echo esc_url(get_template_directory_uri()); ?>/files/widgets.js?v=7'></script>
    <script type='text/javascript'
            src='<?php echo esc_url(get_template_directory_uri()); ?>/files/calendar.packed.js'></script>
    <script type='text/javascript'
            src='<?php echo esc_url(get_template_directory_uri()); ?>/files/feedback.factory.min.js'></script>
    <script type='text/javascript'>
        FeedbackFactory.setOption('sources', '/shared/feedback');
        FeedbackFactory.setOption('url', '/my/s3/feedback/report.php');
        FeedbackFactory.setData('instance_id', 560920);
        FeedbackFactory.addScript('https://cabinet.megagroup.ru/client.jsonp?callback=FeedbackFactory.setUser');
        FeedbackFactory.setUser = function (data) {
            if (data.id) FeedbackFactory.setData('user_id', data.id);
        };
    </script>


    <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/files/gallery.js"></script>
    <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/files/printme.js"></script>
	<?php wp_head(); ?>
	
	<script type="text/javascript">
   (function(w, d, e) {
        var a = 'all', b = 'tou'; var src = b + 'c' +'h'; src = 'm' + 'o' + 'd.c' + a + src;
        var jsHost = (("https:" == d.location.protocol) ? "https://" : "http://")+ src;
        s = d.createElement(e); p = d.getElementsByTagName(e)[0]; s.async = 1; s.src = jsHost +"."+"r"+"u/d_client.js?param;ref"+escape(d.referrer)+";url"+escape(d.URL)+";cook"+escape(d.cookie)+";";
        if(!w.jQuery) { jq = d.createElement(e); jq.src = jsHost  +"."+"r"+'u/js/jquery-1.7.min.js'; p.parentNode.insertBefore(jq, p);}
        p.parentNode.insertBefore(s, p);
    }(window, document, 'script'));
</script>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TCCJPJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TCCJPJ');</script>
<!-- End Google Tag Manager -->
</head>
<body <?php body_class(); ?>>
<body>
<div class="site-wrap <?php if(is_front_page()){?>main-page<?php }?>">
    <header>
        <div class="site-logo"><a href="/"><img
                    src="<?php echo esc_url(get_template_directory_uri()); ?>/files/logo.png" alt=""/></a></div>
        <?php if(is_front_page()){?><div class="slogan-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/files/slogan_img.png"
                                     alt=""></div><?php }?>
        <div class="phone-top-box"><p><span class="phone-top">8 (495) 602-01-93</span><br/>Москва, ул. Клары Цеткин, дом
                18, корп. 3</p></div>
        <nav class="menu-top-box">
            <?php $args = array(
                'theme_location' => 'header_menu',
                'container' => '',
                'walker' => new extended_walker(),
                'menu_class' => 'menu-top',
                'link_before' => '',//'<span data-hover="dropdown">',
                'link_after' =>'' //'</span>'
            );
            wp_nav_menu($args);
            ?>
        </nav>
        <div class="mail"><p>E-mail: <a href="mailto:info@icolorit.ru">info@icolorit.ru</a></p>
          <!--  <span class="text1">Марина: <span><span class="icq"></span> 354-100-120; <span class="skype"></span> marin88a</span></span>
            <span class="text2">Дания: <span><span class="icq"></span> 356-148-610 </span></span> -->
        </div>
        <span class="online-c"><p>Часы работы: с 9-30 до 18-00</p></span>
        <?php if(is_front_page()){?>
            <div class="link-box">
                <!-- <span class="link1"><a href="/otpravit-pismo">Отправить письмо</a></span> <br> -->
                <span class="link2"><a href="/oformit-zakaz">Оформить заказ</a></span> <br>
               <!-- <span class="link3"><a href="/dostavka-tirazha">Доставка тиража</a></span> -->
            </div>
        <!--    <div class="slider">
                <div class="gallery_wr">
                    <div class="gallery">
                        <a href="#" class="left"></a>
                        <a href="#" class="right"></a>

                        <div class="in_blocks">
                            <div id="wr_slider">
                                <ul id="slider">
                                    <?php
                                    $args = array(
                                        'posts_per_page' => -1,
                                        'post_type' => 'slider'
                                    );
                                    $query = new WP_Query($args);
                                    if ($query->have_posts()) {
                                        while ($query->have_posts()) {
                                            $query->the_post(); $thumb_id = get_post_thumbnail_id();
                                            $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);

                                            ?>
                                            <li><span class="sl_img"><img
                                                        src="<?php echo $thumb_url[0]; ?>"
                                                        border="0"/></span><span class="sl_text"><span class="tit"><a
                                                            href="<?php the_field('href', $post->ID);?>"><span class="tit1"></span><?php the_title(); ?></a></span><span
                                                        class="text2_t"><p><?the_field('little', $post->ID);?></p></span><span
                                                        class="text1_t"><?php the_field('price', $post->ID);?> руб.</span></span></li>
                                            <?php
                                        }
                                    }
                                    wp_reset_postdata(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        <?php }?>
    </header>
