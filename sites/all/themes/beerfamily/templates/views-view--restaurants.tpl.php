<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>
<div class="container-lighten container-content-pad">
  <div class="row">
      <?php if ($rows):?>
          
		  <?php 
		  $rows = str_replace("<h2>","",$rows); 
		  $rows = str_replace("</h2>","",$rows); 
		  print $rows;
		  ?>
    <?endif?>
  </div>
</div>
<?php

$str = $_SERVER["REQUEST_URI"];

if ( (strpos($str, "cn") != false) ){
	$lang = "cn";
}

if ( (strpos($str, "en") != false) ){
	$lang = "en";
}

?>

<?php if ( ($lang != "cn") && ($lang != "en") ){?>

<div class="text-wrap"></div>

<div class="row">
	<div class="text-pered-footer">

		<p>Загляните в один из наших пивных ресторанов в центре Санкт-Петербурга! Обещаем, там вы не только отлично проведёте время в приятной атмосфере веселья, но и сможете попробовать традиционные блюда и напитки — свои для каждого заведения.</p>
		
		
		
		
		
		
		
		<ul>
			<li>Отправляйтесь в гастропаб <a href="http://beerfamily.ru/restaurants/ivandamaria">«Иван да Марья»</a>, если тяготеете к русской кухне. Здесь вас ждёт всё самое вкусное и любимое: традиционные блюда нашей страны в новой авторской подаче. А ещё тут собрано огромное количество сортов крафтового пива с независимых пивоварен со всей страны. Отличный ресторан в центре Петербурга, где покормят вкусно и недорого.</li>
			<li>Традиционная чешская господа <a href="http://beerfamily.ru/restaurants/karlovy-pivovary">«Карловы Пивовары»</a> ждёт всех любителей чешской культуры, истории и кухни. Блюда, приготовленные по старинным рецептам, отличная атмосфера, приятная музыка и отменное пиво — всё это делает господу такой особенной.</li>
			<li>На часок-другой оказаться на территории Октоберфеста можно, придя в <a href="http://beerfamily.ru/restaurants/jager-haus">рестопаб Jager</a>. Это один из самых необычных пивных пабов СПб: здесь всё оформлено в духе традиций самой пивной страны мира, подают традиционные блюда и предлагают на выбор десятки сортов пива, от классических до современных.</li>
			<li>Получите шанс познакомиться с такой далёкой от нас Бельгией, заглянув в <a href="http://beerfamily.ru/restaurants/kriek">брассерию Kriek</a>. По дизайну заведение полностью повторяет традиционное бельгийское питейное заведение. Позиции в меню не отстают. Только здесь вы сможете попробовать настоящее вишнёвое пиво Kriek, в честь которого и назван пивной ресторан.</li>
			<li>Если вы хотите охватить все пивные культуры разом, приезжайте во флагманский ресторан-бар <a href="http://beerfamily.ru/restaurants/beer-family-restaurant">Beer Family Restaurant</a> в центре СПб. Здесь вас ждут более 400 видов пива, практически столько же блюд, потрясающая атмосфера и удобное расположение.</li>
		</ul>
		
		<p>Сети пивных ресторанов от Beer Family Project в Санкт-Петербурге ждут вас. Забронируйте столик в любом из понравившихся ресторанов прямо сейчас!</p>

	</div>
</div>

<?php }?>