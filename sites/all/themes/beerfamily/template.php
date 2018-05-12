<?php
/**
 * Add body classes if certain regions have content.
 */

function beerfamily_html_head_alter(&$head_elements) {
    
  // текущий url 
  $current_uri = $_SERVER['REDIRECT_URL'];
  
  // цикл по meta-tags
  foreach ($head_elements as $key => $element) {

  		// если страница главная, переопределяем canonical
		if (($current_uri == '') && isset($element['#attributes']['rel']) && $element['#attributes']['rel'] == 'canonical') {
			$head_elements[$key]['#attributes']['href'] = 'http://beerfamily.ru/';
        } 
        
		// если страница главная, переопределяем shortlink
		if (($current_uri == '') && isset($element['#attributes']['rel']) && $element['#attributes']['rel'] == 'shortlink') {
			$head_elements[$key]['#attributes']['href'] = 'http://beerfamily.ru/';
        } 

		// если страница главная, переопределяем canonical
		if (($current_uri == '/') && isset($element['#attributes']['rel']) && $element['#attributes']['rel'] == 'canonical') {
			$head_elements[$key]['#attributes']['href'] = 'http://beerfamily.ru/';
        } 
        
		// если страница главная, переопределяем shortlink
		if (($current_uri == '/') && isset($element['#attributes']['rel']) && $element['#attributes']['rel'] == 'shortlink') {
			$head_elements[$key]['#attributes']['href'] = 'http://beerfamily.ru/';
        } 
     
  }

  // получаем тип ноды	 
  $node = menu_get_object();
  $node->type;

  // если нода не news то не индексируем сущность
  if ( ($current_uri != "/news") && ($node->type != "news") ) {
	  
	  $head_elements[1000]["#tag"] = 'link';
	  $head_elements[1000]['#attributes']['rel'] = 'alternate';
	  $head_elements[1000]['#attributes']['hreflang'] = 'ru';
	  $head_elements[1000]['#attributes']['href'] = 'http://beerfamily.ru'.$current_uri;
	  $head_elements[1000]['#type'] = 'html_tag';

	  $head_elements[1001]["#tag"] = 'link';
	  $head_elements[1001]['#attributes']['rel'] = 'alternate';
	  $head_elements[1001]['#attributes']['hreflang'] = 'en-us';
	  $head_elements[1001]['#attributes']['href'] = 'http://beerfamily.ru/en'.$current_uri;
	  $head_elements[1001]['#type'] = 'html_tag';

	  $head_elements[1002]["#tag"] = 'link';
	  $head_elements[1002]['#attributes']['rel'] = 'alternate';
	  $head_elements[1002]['#attributes']['hreflang'] = 'zh-cn';
	  $head_elements[1002]['#attributes']['href'] = 'http://beerfamily.ru/cn'.$current_uri;
	  $head_elements[1002]['#type'] = 'html_tag';

  }

  // получаем текущий язык
  if (strpos($current_uri,'en/') != "") $lang = 'en';
  if (strpos($current_uri,'cn/') != "") $lang = 'cn';
  
  // если нода news и язык en или cn то не индексируем сущность
  if ( ($node->type == "news") && ( ($lang == 'en') || ($lang == 'cn') )) {
	  
	  $head_elements[1003]["#tag"] = 'meta';
	  $head_elements[1003]['#attributes']['name'] = 'robots';
	  $head_elements[1003]['#attributes']['content'] = 'nofollow';
	  $head_elements[1003]['#type'] = 'html_tag';  
  
  }
  
  // переопределяем description

  // если нода beers и язык не en и не cn пишем description для страницы Пива
  
  if ( ($node->type == "beer") && ( $lang != 'en') && ($lang != 'cn') ){
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#attributes']['content'] = 'В компании Beer Family Project вы можете купить пиво '.$node->title.' оптом и в розницу. Описание, крепость, плотность пива.';
	  $head_elements[1004]['#type'] = 'html_tag';         	  
  }
  
  switch ($current_uri) {
    case '':
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#attributes']['content'] = 'Официальный сайт ресторанной группы Beer Family Project холдинга ReCa в Санкт-Петербурге. История и описание компании.';
	  $head_elements[1004]['#type'] = 'html_tag';         	  
	  break;
	  
    case '/restaurants':	  
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'Список пивных ресторанов и баров в центре Санкт-Петербурга от группы компаний Beer Family Project. Описание, меню и фотографии, расположение ресторанов на карте.';
	  break;
	  
	case '/restaurants/jager-haus':
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'Сеть немецких пивных ресторанов Jager в центре Санкт-Петербурга от группы компаний Beer Family Project. Описание, меню и фотографии, расположение ресторанов на карте.';
	  break;
	  
	case '/restaurants/karlovy-pivovary':
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'Сеть чешских пивных ресторанов Karlovy Pivovary в центре Санкт-Петербурга от группы компаний Beer Family Project. Описание, меню и фотографии, расположение ресторанов на карте.';
	  break;
	  
	case '/restaurants/kriek':
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'Сеть бельгийских пивных ресторанов Kriek в центре Санкт-Петербурга от группы компаний Beer Family Project. Описание, меню и фотографии, расположение ресторанов на карте.';
	  break;

	case '/restaurants/ivandamaria':
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'Сеть гастробаров Иван да Марья в центре Санкт-Петербурга от группы компаний Beer Family Project. Описание ресторана русской кухни, меню и фотографии, расположение ресторанов на карте.';
	  break;
	
	case '/restaurants/beer-family-restaurant':
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'Сеть ресторанов Beer Family на Невском проспекте Санкт-Петербурга от группы компаний Beer Family Project. Описание, меню и фотографии, расположение ресторана на карте.';
	  break;
	  
	case '/about':
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'История компании Beer Family Project';
	  break;
    
	case '/beers':
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'В компании Beer Family Project вы можете купить импортное пиво оптом. Большой ассортимент пива разных сортов! Звоните! ☎️ 8 (812) 337-58-95';
	  break;

    case '/distribution':

	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'Дистрибуция пива в Санкт-Петербурге. Компании-дистрибьюторы пива';
	  break;

	case '/franchise':
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'Хотите открыть пивной ресторан или пивной бар по франшизе? Станьте новым членом нашей дружной семьи Beer Family Project с франшизой наших концептов! ';
	  break;

    case '/restaurants':
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'Сеть ресторанов Beer Family Project: Kriek, Karlovy Pivovary, Jager, Иван да Марья';
	  break;

    case '/news':
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'Новости компании Beer Family Project';
	  break;

    case '/jobs':
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'Вакансии компании Beer Family Project. ';
	  break;

    case '/partners':
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'Партнеры компании Beer Family Project. ';
	  break;
    
	case '/beers/chehiya':
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'Купить настоящее чешское пиво оптом или в розницу,  кегах или бутылках в компании Beer Family Project. Звоните! ☎️ 8 (812) 337-58-95';
	  break;
   
   case '/beers/irlandiya':
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'Купить настоящее ирландское пиво оптом или в розницу,  кегах или бутылках в компании Beer Family Project. Звоните! ☎️ 8 (812) 337-58-95';
	  break;

    case '/beers/angliya': 
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'Купить настоящее английское пиво оптом или в розницу,  кегах или бутылках в компании Beer Family Project. Звоните! ☎️ 8 (812) 337-58-95';
	  break;
	
	case '/beers/shotlandiya':
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'Купить настоящее шотландское пиво оптом или в розницу,  кегах или бутылках в компании Beer Family Project. Звоните! ☎️ 8 (812) 337-58-95';
	  break;
	
	case '/beers/germaniya':
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'Купить настоящее немецкое пиво оптом или в розницу,  кегах или бутылках в компании Beer Family Project. Звоните! ☎️ 8 (812) 337-58-95';
	  break;
	
	case '/beers/belgiya':
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'Купить настоящее бельгийское пиво оптом или в розницу,  кегах или бутылках в компании Beer Family Project. Звоните! ☎️ 8 (812) 337-58-95';
	  break;
	
	case '/beers/kraftovoe-pivo': 
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'В компании Beer Family Project вы можете купить бутылочное и разливное крафтовое пиво. Звоните! ☎️ 8 (812) 337-58-95 ';
	  break;
	
	case '/beers/cidry': 
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'Купить настоящий сидр оптом или в розницу,  кегах или бутылках в компании Beer Family Project. Звоните! ☎️ 8 (812) 337-58-95';
	  break;
	
	case '/beers/avstriya': 
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'Купить настоящее австрийское пиво оптом или в розницу,  кегах или бутылках в компании Beer Family Project. Звоните! ☎️ 8 (812) 337-58-95';
	  break;
	
	case '/beers/italiya':
	  $head_elements[1004]["#tag"] = 'meta';
	  $head_elements[1004]['#attributes']['name'] = 'description';
	  $head_elements[1004]['#type'] = 'html_tag';         
	  $head_elements[1004]['#attributes']['content'] = 'Купить настоящее итальянское пиво оптом или в розницу,  кегах или бутылках в компании Beer Family Project. Звоните! ☎️ 8 (812) 337-58-95';
	  break;
	  
  }
  
  // добавляем meta для постраничных
  if ($_GET['page'] >= 1){
	  if ( ( $lang != 'en') && ($lang != 'cn') ){
		  $head_elements[1005]["#tag"] = 'meta';
		  $head_elements[1005]['#attributes']['name'] = 'robots';
		  $head_elements[1005]['#type'] = 'html_tag';         
		  $head_elements[1005]['#attributes']['content'] = 'noindex, follow';
	  }
  }
  
}

 
function beerfamily_preprocess_html(&$variables) {
  if ($node = menu_get_object()) {
    $variables['classes_array'][] = 'node-slug-' . strtr(request_path(), '/', '-');
  }
  elseif ($view = views_get_page_view()) {
    $variables['classes_array'][] = 'view-name-' . $view->name;
  }
  
  if ( ($node->type == "beer") && ( $lang != 'en') && ($lang != 'cn') ){
	  $variables['head_title'] = "Пиво ".$node->title." купить в Санкт-Петербурге оптом и в розницу — Beer Family Project";
  }
  
  // определяем текущий url  
  $current_uri = $_SERVER['REDIRECT_URL'];
  
  // переопределяем title  
  switch ($current_uri) {
    case '':
        $variables['head_title'] = "Ресторанная группа Beer Family Project в Санкт-Петербурге";
        break;
	case '/restaurants':
		$variables['head_title'] = "Сеть пивных ресторанов в Санкт-Петербурге от Beer Family Project";
		break;
	case '/restaurants/jager-haus': 
		$variables['head_title'] = "Немецкие пивные рестораны Jager в Санкт-Петербурге — Beer Family Project";
		break;
	case '/restaurants/karlovy-pivovary':
		$variables['head_title'] = "Чешские пивные рестораны Karlovy Pivovary в Санкт-Петербурге — Beer Family Project";
		break;
	case '/restaurants/kriek':
		$variables['head_title'] = "Бельгийские пивные рестораны Kriek в Санкт-Петербурге — Beer Family Project";
		break;
	case '/restaurants/ivandamaria':
		$variables['head_title'] = "Рестораны русской кухни Иван да Марья в Санкт-Петербурге — Beer Family Project";
		break;
	case '/restaurants/beer-family-restaurant':
		$variables['head_title'] = "Ресторан Beer Family в Санкт-Петербурге — Beer Family Project";
		break;
	case '/about': 
		$variables['head_title'] = "О компании Beer Family Project";
		break;
	case '/beers':
		$variables['head_title'] = "Купить пиво оптом. Импортное пиво оптом в Санкт-Петербурге";
		break;
	case '/distribution':
		$variables['head_title'] = "Дистрибьюторы пива Beer Family Project";
		break;
	case '/franchise':
		$variables['head_title'] = "Франшиза пивного ресторана от Beer Family Project";
		break;
	case '/restaurants':
		$variables['head_title'] = "Рестораны Beer Family Project";
		break;
	case '/news':
		$variables['head_title'] = "Новости компании Beer Family Project";
		break;
	case '/jobs':
		$variables['head_title'] = "Вакансии компании Beer Family Project";
		break;
	case '/partners':
		$variables['head_title'] = "Партнеры компании Beer Family Project";
		break;
	case '/beers/chehiya':
		$variables['head_title'] = "Чешское пиво оптом и в розницу";
		break;
	case '/beers/irlandiya':
		$variables['head_title'] = "Ирландское пиво оптом и в розницу";
		break;
	case '/beers/angliya': 
		$variables['head_title'] = "Английское пиво оптом и в розницу";
		break;
	case '/beers/shotlandiya':
		$variables['head_title'] = "Шотландское пиво оптом и в розницу";
		break;
	case '/beers/germaniya': 
		$variables['head_title'] = "Немецкое пиво оптом и в розницу";
		break;
	case '/beers/belgiya': 
		$variables['head_title'] = "Бельгийское пиво оптом и в розницу";
		break;
	case '/beers/kraftovoe-pivo': 
		$variables['head_title'] = "Купить крафтовое пиво в Санкт-Петербурге";
		break;
	case '/beers/cidry': 
		$variables['head_title'] = "Сидр оптом и в розницу";
		break;
	case '/beers/avstriya': 
		$variables['head_title'] = "Австрийское пиво оптом и в розницу";
		break;
	case '/beers/italiya': 
		$variables['head_title'] = "Итальянское пиво оптом и в розницу";
		break;		
  }

  // переопределяем заголовок для постраничных
  if ($_GET['page'] >= 1){
	  if ( ( $lang != 'en') && ($lang != 'cn') ){
		$variables['head_title'] = $variables['head_title'].", Страница ".($_GET["page"]+1);
	  }
  }
  
}

/**
 * Override or insert variables into the page template for HTML output.
 */
function beerfamily_process_html(&$variables) {

}

/**
 * Override or insert variables into the page template.
 */
function beerfamily_process_page(&$variables) {
  if ($node = menu_get_object()) {
    if ($node->type == 'place' && $node->field_page_bg) {
      $variables['page_bg_custom'] = file_create_url($node->field_page_bg['und'][0]['uri']);
    }
  }
}

/**
 * Override or insert variables into the node template.
 */
function beerfamily_preprocess_node(&$variables) {

}

/**
 * Override or insert variables into the block template.
 */
function beerfamily_preprocess_block(&$variables) {

}

function beerfamily_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_form') {
    $form['search_block_form']['#title'] = 'Поиск';
    $form['search_block_form']['#title_display'] = 'invisible';
    $form['search_block_form']['#default_value'] = '';
    $form['actions']['submit']['#value'] = '';
    unset($form['advanced']);
    $form['#attributes']['class'] = array('searchform searchform-full clearfix');
    $form['basic']['submit']['#attributes']['class'] = array('search-btn');
    $form['basic']['submit']['#value'] = '';
    $form['basic']['keys']['#prefix'] = '';
    $form['basic']['keys']['#suffix'] = '';
    unset($form['basic']['keys']['#title']);
    unset($form['basic']['keys']['#attributes']['size']);
  } elseif ($form_id == 'agegate_form') {
    $form['over18']['#attributes']['id'] = 'agegate_over18';
    $form['over18']['#type'] = 'hidden';
    $form['submit']['#value'] = t('Yes');
    $form['submit']['#attributes']['class'][]= 'button';
    $form['submit']['#attributes']['id'] = 'agegate_btn_yes';
    $form['submit']['#prefix'] = '<div class="buttons">';
    $form['cancel'] = array(
      '#type'=>'button',
      '#value'=>t('No'),
      '#attributes' => array('id'=>"agegate_btn_no", 'class'=>array("button")),
      '#suffix'=>"</div>"
    );
//    kpr($form);
  }
}

/**
 * Implements theme_menu_tree().
 */
function beerfamily_menu_tree($variables) {
  return '<ul class="menu clearfix">' . $variables['tree'] . '</ul>';
}

function beerfamily_preprocess_page(&$variables) {
  // Get the entire main menu tree
  $main_menu_tree = menu_tree_all_data('main-menu');
  $variables['region']['header-after'] = block_get_blocks_by_region('header-after');
  $variables['region']['intro-text'] = block_get_blocks_by_region('intro-text');
  $variables['region']['banner-main-1'] = block_get_blocks_by_region('banner-main-1');
  $variables['region']['banner-main-2'] = block_get_blocks_by_region('banner-main-2');
  $variables['region']['banner-main-3'] = block_get_blocks_by_region('banner-main-3');
  $variables['region']['banner-main-4'] = block_get_blocks_by_region('banner-main-4');
  $variables['region']['banner-main-5'] = block_get_blocks_by_region('banner-main-5');
  $variables['region']['contacts'] = block_get_blocks_by_region('contacts');
  $variables['region']['social'] = block_get_blocks_by_region('social');
  $variables['region']['socialtop'] = block_get_blocks_by_region('socialtop');


  // Add the rendered output to the $main_menu_expanded variable
  $variables['main_menu_expanded'] = menu_tree_output($main_menu_tree);
}

function beerfamily_preprocess_page_front(&$variables) {
}

function beerfamily_date_range($field) {
  $months = array(
    '01' => 'января',
    '02' => 'февраля',
    '03' => 'марта',
    '04' => 'апреля',
    '05' => 'мая',
    '06' => 'июня',
    '07' => 'июля',
    '08' => 'агуста',
    '09' => 'сентября',
    '10' => 'октября',
    '11' => 'ноября',
    '12' => 'декабря',
  );
  $tz = new DateTimeZone($field[0]['timezone']);
  $dFrom = new DateTime($field[0]['value'], $tz);
  $dTo = $field[0]['value2'] ? new DateTime($field[0]['value2'], $tz) : NULL;
  $fromSuffix = $months[$dFrom->format('m')];
  if ($dTo) {
    $toSuffix = $months[$dTo->format('m')];
    if (((int) $dTo->format('U') - (int) $dFrom->format('U')) <= (3600 * 24)) {
      return $dFrom->format('j ') . $fromSuffix;
    }
    if ($dFrom->format('Y') != $dTo->format('Y')) {
      $fromSuffix .= ' ' . $dFrom->format('Y');
      $toSuffix .= ' ' . $dTo->format('Y');
      return $dFrom->format('j ') . $fromSuffix . $dTo->format(' — j ') . $toSuffix;
    }
    if ($dFrom->format('m') == $dTo->format('m')) {
      return $dFrom->format('j — ') . $dTo->format('j ') . $fromSuffix;
    }
    else {
      return $dFrom->format('j ') . $fromSuffix . $dTo->format(' — j ') . $toSuffix;
    }
  }
  else {
    return $dFrom->format('j ') . $fromSuffix;
  }
}


function beerfamily_tablefield_view($params) {
  if ($params['field_name'] == 'field_prices') {
    $head = $params['header'];
    $rows = $params['rows'];
    if (strpos($head[0]['data'], '#') !== FALSE) {
      array_unshift($rows, $head[0]);
    }
    $html = "";
    foreach ($rows as $row) {
      if (!$row[0]['data']) {
        continue;
      }
      if (!$row[1]['data']) {
        $html .= "<tr class='divider'><td colspan='3'>{$row[0]['data']}</td></tr>";
      }
      else {
        $html .= "<tr class='item'><td>{$row[0]['data']}</td>"
          . "<td class='num'>{$row[1]['data']}</td>"
          . "<td class='num'>{$row[2]['data']}</td></tr>";
      }
    }

    return $html;
  }
}

function vd(){
  foreach (func_get_args() as $a) {
    print '<pre style="margin-top: 24px;font-size:10px;font-family:consolas;line-height: 12px;background-color: #f0f0f0;color:#333;"><code>';
    var_dump($a);
    print '</code></pre>';
  }

}
