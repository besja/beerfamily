<? if ($teaser): ?>
<div class="col-md-3 col-sm-6 col-xs-12">
  <div class="pic">
    <noindex><a href="<?=(isset($field_url['und']) ? $field_url['und'][0]['value'] : '')?>"
       target="_blank"
       title="<?=$title?>" rel="nofollow"><?=render($content['field_image'])?></a></noindex>
  </div>
</div>
<? else: ?>
  <p><?=render($content['field_image'])?></p>
  <?=render($content['body'])?>
<? endif ?>
