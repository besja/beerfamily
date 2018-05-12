<? if ($teaser): ?>

  <div class="col-md-2 col-md-push-1">
    <? if ($field_image):?>
    <a href="<?= $node_url ?>"><?= render($content['field_image']) ?></a>
    <? endif ?>
  </div>
  <div class="col-md-8 col-md-push-1">
    <? if ($field_date_from): ?>
      <h2 class="yellow"><?=beerfamily_date_range($field_date_from) ?></h2>
    <? endif ?>

    <p><a href="<?= $node_url ?>"><?= render($title) ?></a></p>
    <p><?=render($body)?></p>
    <? if ($field_url): ?>
      <?
      $url = $field_url[0]['value'];
      $domain = parse_url($url, PHP_URL_HOST);
      ?>
      <p class="more"> подробнее на <a href="<?= $url ?>"><?= $domain ?></a>
      </p>
    <? endif ?>
  </div>
<? else: ?>
  
  <?= render($content['body']) ?>
  <p></p>
  <? if ($field_image): ?>
    <p><img width="400" src="<?=file_create_url($field_image[0]['uri'])?>"
            alt=""></p>
  <? endif ?>
<? endif ?>
