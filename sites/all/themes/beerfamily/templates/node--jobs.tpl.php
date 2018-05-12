<? if ($teaser): ?>
  <h2 class="yellow"><?= render($title) ?></h2>
  <?=render($body)?>
  <? if ($field_duties): ?>
	
	<?php
	
	$str = $_SERVER["REQUEST_URI"];
	
	if ( (strpos($str, "cn/") != false) ){
		$lang = "cn";
	}

	if ( (strpos($str, "en/") != false) ){
		$lang = "en";
	}
	
	?>
	
	<?php if ($lang == "cn") {?>
	<h3>Responsibilities:</h3>
	<?php }?>

	<?php if ($lang == "en") {?>
	<h3>Responsibilities:</h3>
	<?php }?>

	<?php if (($lang != "en") && ($lang != "cn")) {?>
	<h3>Обязанности:</h3>
	<?php }?>
    
	<ul>
      <? foreach ($field_duties as $duty): ?>
        <li><?=$duty['value']?></li>
      <? endforeach ?>
    </ul>
  <? endif ?>
  <? if ($field_conditions): ?>
    
	<?php if ($lang == "cn") {?>
	<h3>条件:</h3>
	<?php }?>

	<?php if ($lang == "en") {?>
	<h3>Conditions:</h3>
	<?php }?>

	<?php if (($lang != "en") && ($lang != "cn")) {?>
	<h3>Условия:</h3>
	<?php }?>
    
	<ul>
      <? foreach ($field_conditions as $cond): ?>
        <li><?=$cond['value']?></li>
      <? endforeach ?>
    </ul>
  <? endif ?>

	<?php if ($lang == "cn") {?>
	<div class="buttons"><a href="#" class="button">我要回应</a></div>
	<?php }?>

	<?php if ($lang == "en") {?>
	<div class="buttons"><a href="#" class="button">Response</a></div>
	<?php }?>

	<?php if (($lang != "en") && ($lang != "cn")) {?>
	<div class="buttons"><a href="#" class="button">Откликнуться</a></div>
	<?php }?>
  
  
  <div class="col-md-2 col-md-push-1">
    <? if ($field_image):?>
      <?= render($content['field_image']) ?>
    <? endif ?>
  </div>
<? endif ?>
