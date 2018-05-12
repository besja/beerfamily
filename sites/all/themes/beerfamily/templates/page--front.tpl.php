<?
drupal_add_js(drupal_get_path('theme', 'beerfamily') . '/css/bootstrap/js/carousel.js');
drupal_add_js(drupal_get_path('theme', 'beerfamily') . '/css/bootstrap/js/transition.js');
drupal_add_js(drupal_get_path('theme', 'beerfamily') .'/js/jquery.cookie.js');
drupal_add_js(drupal_get_path('theme', 'beerfamily') .'/js/jquery.bpopup.min.js');
$str = $_SERVER["REQUEST_URI"];
if ( (strpos($str, "/en") !== false) || (strpos($str, "/ru") !== false) ){
	$flag = 1;
}
	
if ($flag == 1){
drupal_add_js(drupal_get_path('theme', 'beerfamily') .'/js/main.js');
}
/**
 * @file
 * Bartik's theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system directory.
 */
?>
<!-- splash screen -->  
<script>
	jQuery(document).ready(function(){
		if (!jQuery.cookie('was1')) {

			jQuery('#form-welcome').bPopup({
				closeClass: 'close',
				zIndex: 999999999999999999999999
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
<!-- <a title="Close" class="fancybox-item fancybox-close close" href="#"></a> -->
<div>
	<a href="http://bfrest.ru/banqueting-hall/" target="_blank" class="announce_link">
	</a>
</div>
</div>

<div class="theme-bg">
  
  <div class="header">
    <div class="header-top container">
      <div class="row">		
		<div class="col-md-4 col-sm-12">
          <div class="logo"></div>
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
            <?php echo render($region['socialtop']); ?>
          </div>
        </div>
      </div>
	  <?php
	  echo "<div class='lang-h2'>Языки</div>";
      echo render($region['header-after']); 
	  ?>
    </div>
    <div class="header-bottom container">
      <div class="row menu-row">
        <div class="col-sm-12">
          <div class="menu-main-container-wrap">
            <div class="menu-main-container">
              <?= theme('links', array(
                'links' => $main_menu,
                'attributes' => array(
                  'class' => array('menu-main'),
                ),
              )); ?></div>
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
      <div class="row row-intro">
        <div class="col-sm-12 col-lg-10 col-lg-push-1">
        <?php echo render($region['intro-text']); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="banner-main">
            <?php echo render($region['banner-main-1']); ?>
          </div>
        </div>
      </div>
	  <div class="row row-stoppers">
	  <div class="col-lg-5ths col-md-5ths col-sm-5ths col-xs-5ths">
	    <a href="/restaurants/beer-family-restaurant/">
		 <img src="http://www.beerfamily.ru/sites/default/files/styles/large/public/%D0%BA%D0%BD%D0%BE%D0%BF%D0%BA%D0%B0%20%D1%81%D0%B0%D0%B9%D1%82.jpg"
		  class="img-responsive" alt="Ресторан Иван да Марья" />
	    </a>
	  </div>
	  <div class="col-lg-5ths col-md-5ths col-sm-5ths col-xs-5ths">
          <a href="/restaurants/ivandamaria/">
            <img src="/images/ivandamaria.png"
              class="img-responsive" alt="Ресторан Иван да Марья"/>
          </a>
        </div>
        <div class="col-lg-5ths col-md-5ths col-sm-5ths col-xs-5ths">
          <a href="/restaurants/karlovy-pivovary/">
            <img src="/images/banner-md-3.jpg"
              class="img-responsive" alt=""/>
          </a>
        </div>
        <div class="col-lg-5ths col-md-5ths col-sm-5ths col-xs-5ths">
          <a href="/restaurants/jager-haus/">
            <img src="/images/banner-md-1.jpg" class="img-responsive" alt=""/>
          </a>
        </div>
        <div class="col-lg-5ths col-md-5ths col-sm-5ths col-xs-5ths">
          <a href="/restaurants/kriek/">
            <img src="/images/banner-md-2.jpg"
              class="img-responsive" alt=""/>
          </a>
        </div>
      </div>
      <div class="container-darken">
        <div class="row row-stoppers-vertical">
          <div class="col-md-6 col-sm-12">
            <div class="stopper-left">
            <?php echo render($region['banner-main-4']); ?>
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="stopper-right">
              <div class="banner-yellow">
              <?php echo render($region['banner-main-5']); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="footer container">
  
  <div class="row">	
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
		
		<div class="text-pered-footer">

			<h1>Ресторанная группа Beer Family Project </h1>

			<p>Ресторанная группа Beer Family Project – один из крупнейших современных петербургских пивных проектов. В состав холдинга входит четыре сети заведения с уклоном на традиционную культуру стран с развитой пивной культурой и один флагманский ресторан, объединяющий концепты всех четырех сетей в одном месте и предлагающий посетителям попробовать более 450 сортов пива со всего света.</p>

			<p>Ресторанный холдинг ReCa («РеКа Менеджмент») ставит своей целью повысить уровень культуры потребления пенного в Санкт-Петербурге и познакомить людей с историей, традицией и пивной культурой других стран. </p>

			<p>Среди ярчайших достижений Beer Family Project:</p>

			<ul>
				<li>участие в Независимой ассоциации операторов пивного рынка;</li>
				<li>преодоление отметки в 1 миллион посетителей в год;</li>
				<li>открытие 17-го по счёту ресторана;</li>
				<li>тренированная команда специалистов, каждый из которых знает всё о крафтовом и классическом пиве со всех уголков мира;</li>
				<li>самая богатая в Санкт-Петербурге коллекция пенного, включающая в себя редкие сорта.</li>
			</ul>
			
			<p>Присоединяйтесь к нам и становитесь частью нашей Beer Family, частью крупнейшего ресторанного холдинга СПб!</p>

		</div>
			
		<?php }?>

  </div>
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
