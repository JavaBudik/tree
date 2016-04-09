<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<div class="clear-footer"></div>
</div>

<footer>
	<div class="footer-in">
		<nav class="menu-bottom-box">
			<?php $args = array(
				'theme_location' => 'header_menu',
				'container' => '',
				'menu_class' => 'menu-bottom',
			);
			//wp_nav_menu($args);
			?>
		</nav>
		<div class="site-name-bottom">  &copy; 2012 - 2015 Типография Colorit</div>
		<div class="address-bottom"><p style="margin-left:303px;"><span class="bphone">8 (495) 602-01-93</span> <br/>Адрес: Москва, ул. Клары
				Цеткин, дом 18, корп. 5<br/>E-mail: <a href="mailto:info@icolorit.ru">info@icolorit.ru</a></p>
				<p>Обращаем ваше внимание на то, что данный интернет-сайт носит исключительно информационный характер и ни при каких условиях не является публичной офертой, определяемой положениями ч. 2 ст. 437 Гражданского кодекса Российской Федерации. Для получения подробной информации о стоимости продукции, пожалуйста, обращайтесь к менеджерам офисов.</p></div>
		<div class="site-counters">
		</div>
		<div class="site-copyright">
			<div>Интернет-реклама <a href="http://pridemarketing.ru" target="_blank">pridemarketing.ru</a></div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>


<!--<script type="text/javascript">clbId="icoloritru@yandex.ru";clbProjectId="5538d2c64f4faa272718dbcd";</script>
<script type="text/javascript" src="http://callmaker.ru/witget/witget.min.js" charset="UTF-8"></script>-->
<!-- Код тега ремаркетинга Google -->
<!--------------------------------------------------
С помощью тега ремаркетинга запрещается собирать информацию, по которой можно идентифицировать личность пользователя. Также запрещается размещать тег на страницах с контентом деликатного характера. Подробнее об этих требованиях и о настройке тега читайте на странице http://google.com/ads/remarketingsetup.
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 956231555;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/956231555/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
</body>
</html>
