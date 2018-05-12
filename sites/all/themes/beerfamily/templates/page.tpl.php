<?
drupal_add_js(drupal_get_path('theme', 'beerfamily') .'/js/main.js');
drupal_add_js(drupal_get_path('theme', 'beerfamily') .'/js/jquery.cookie.js');
drupal_add_js(drupal_get_path('theme', 'beerfamily') .'/js/jquery.bpopup.min.js');

/**
 * @file
 * Bartik's theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system directory.
 */
?>
<?
$theme_bg_style = '';
if(isset($page_bg_custom)){
  $theme_bg_style = "style=\"background-image:url('$page_bg_custom')\"";
}
?>
<!-- splash screen -->  
<script>
	jQuery(document).ready(function(){
		if (!jQuery.cookie('was1')) {

			jQuery('#form-welcome').bPopup({
				closeClass: 'close'
			});

			setTimeout(function(){ jQuery('#form-welcome').bPopup().close();}, 10000);

			jQuery.cookie('was1', true, {
				expires: 30,
				path: '/'
			});
			
		}
	});
</script>
<div id="form-welcome" class="modal welcome-popup" style="display: none;">
<div class="box-modal_close arcticmodal-close">Закрыть</div>
<div>
	<a href="http://beerfamily.ru/news/sezon-letnih-otkryt" target="_blank" class="announce_link">
	</a>
</div>
</div>
<div class="theme-bg" <?=$theme_bg_style?>>
  <div class="header">
    <div class="header-top container">
      <div class="row">        
		<div class="col-md-4 col-sm-12">
          <a class="logo" href="/"></a>
          <img class="reka-logo" src="/<?php print path_to_theme(); ?>/images/reka-logo-white.png">
        </div>
        <div class="col-md-6 col-md-push-2 col-sm-12">
          <div class="head-right-corner">
            <form role="search" method="get" id="searchform"
                  class="searchform clearfix" action="/search">
              <input type="submit" id="searchsubmit" class="search-btn"
                     value=""/>
              <input type="text" value="" name="keys" />
            </form>
        <span class="socials">
          <?php echo render($region['socialtop']); ?>
        </span>
          </div>
        </div>
      </div>
      <?php 
	  echo "<div class='lang-h2'>Языки</div>";
	  echo render($region['header-after']); ?>
    </div>
    <div class="header-bottom container">
      <div class="row menu-row">
        <div class="col-sm-12">
          <div class="menu-main-container-wrap">
            <div class="menu-main-container">
              <?
              $mt=menu_tree('main-menu');
              print drupal_render($mt)
              ?>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <? if ($messages): ?>
    <div id="messages">
      <div class="section clearfix">
        <?= $messages; ?>
      </div>
    </div> <!-- /.section, /#messages -->
  <? endif; ?>
  <div class="content">
    <div class="container">
		<?

		$current_uri = $_SERVER['REDIRECT_URL'];

		switch ($current_uri) {
			case "/restaurants":
				$h1 = "Рестораны в центре Санкт-Петербурга";
				break;
			case "/restaurants/jager-haus":
				$h1 = "Немецкий пивной ресторан Jager";
				break;
			case "/restaurants/karlovy-pivovary":
				$h1 = "Чешский пивной ресторан Karlovy Pivovary";
				break;
			case "/restaurants/kriek":
				$h1 = "Бельгийский пивной ресторан Kriek";
				break;
			case "/restaurants/ivandamaria":
				$h1 = "Ресторан русской кухни Иван да Марья";
				break;
			case "/restaurants/beer-family-restaurant":
				$h1 = "Ресторан Beer Family";
				break;
			case "/about":
				$h1 = "BF Project";
				break;
			case '/beers':
				$h1 = "Каталог пива в Санкт-Петербурге";
				break;
			case "/distribution":
				$h1 = "Дистрибуция пива";
				break;
			case "/franchise":
				$h1 = "Франшиза пивного ресторана";
				break;
			case "/restaurants":
				$h1 = "Рестораны";
				break;
			case "/news":
				$h1 = "Новости";
				break;
			case "/jobs":
				$h1 = "Вакансии";
				break;
			case "/partners":
				$h1 = "Партнеры";
				break;
			case "/taxonomy/term/6":
				$h1 = "Чешское пиво";
				break;
			case "/taxonomy/term/11":
				$h1 = "Ирландское пиво";
				break;
			case "/taxonomy/term/7":
				$h1 = "Английское пиво";
				break;
			case "/taxonomy/term/8":
				$h1 = "Шотландское пиво";
				break;
			case "/germany":
				$h1 = "Немецкое пиво";
				break;
			case "/taxonomy/term/4":
				$h1 = "Бельгийское пиво";
				break;
			case "/taxonomy/term/12":
				$h1 = "Купить крафтовое пиво";
				break;
			case "/taxonomy/term/13":
				$h1 = "Сидры";
				break;
			case "/taxonomy/term/9":
				$h1 = "Австрийское пиво";
				break;
			case "/taxonomy/term/10":
				$h1 = "Итальянское пиво";
				break;
			default:
				$h1 = $title;
		}

		if ( ($node->type == "beer") && ( $lang != 'en') && ($lang != 'cn') ){
			$h1 = "Пиво ".$node->title;
		}
		
		?>

	  <h1 class="title" id="page-title">
		<?

			$str = $_SERVER["REQUEST_URI"];
			
			if ( (strpos($str, "cn/") != false) ){
				$lang = "cn";
			}

			if ( (strpos($str, "en/") != false) ){
				$lang = "en";
			}

			if ($h1 == "Дистрибуция")	{

				if ($lang == 'cn'){
					$h1 = "啤酒分配";
				}
				
				if ($lang == 'en'){
					$h1 = "Distribution";
				}
				
			}
			
			if ($h1 == "Партнеры") {
				
				if (($lang == 'cn')) {
					$h1 = "我們的伙伴";
				}
				
				if (($lang == 'en')) {
					$h1 = "Partners";
				}
				
			}
			
			if ($h1 == "Вакансии")	{
				if (($lang == 'cn')){
					$h1 = "喬布斯";
				}
				if (($lang == 'en')){
					$h1 = "Jobs";
				}
			}

			if ($h1 == "Рестораны")	{
				if (($lang == 'cn')){
					$h1 = "餐館";
				}
				if (($lang == 'en')){
					$h1 = "Restaurants";
				}
			}
			
		?>
		
		<?= $h1; ?>
	  
	  
	  </h1>
      <?= render($page['before-content']) ?>
      <?= render($page['content']) ?>
      <?= render($page['after-content']) ?>
  </div>
</div>
<div class="footer container">
  <div class="row">
    <div class="col-sm-12 col-md-6 col-md-push-1">
      <div class="contacts">
        <?php echo render($region['contacts']); ?>
      </div>
    </div>
    <div class="col-sm-12 col-md-5 col-md-push-1">
      <?php echo render($region['social']); ?>
    </div>
  </div>
</div>
<div class="cookie-modal">
	<div class="cookie-modal-text">Данный сайт использует cookie-файлы, а также собирает данные об IP-адресе и местоположении с целью предоставления наиболее корректной информации по Вашему запросу. Продолжая использовать данный ресурс, Вы автоматически соглашаетесь с использованием данных технологий.</div>
	<div class="cookie-modal-btn">с правилами ознакомлен, закрыть</div>
</div>