<? if ($teaser): ?>
<div class="col-sm-3">
  <? if ($content['field_image']):?>
    <a href="<?= $node_url ?>"><?= render($content['field_image']) ?></a>
  <? endif ?>
  <p class="text-center"><a href="<?= $node_url ?>"><?= render($title) ?></a></p>
</div>
<? else: ?>
<div class="container">
  <div class="container-darken container-content-pad">
    <div class="row">
      <div class="col-md-5 col-sm-12">
        <?=render($content['field_image'])?>
      </div>
      <div class="col-md-7 col-sm-12">
        <h2><?= render($title) ?></h2>

        <div class="beer-characteristics">
          <span><?=render($content['field_strength'])?></span>
          <span><?=render($content['field_pl'])?></span>
          <span><?=render($content['field_volume'])?></span>
        </div>
        <p class="text-lead">
          <?=render($content['body']);?>
        </p>
      </div>
    </div>
    <? if (isset($content['field_similar'])): ?>
      <?=render($content['field_similar'])?>
    <? endif ?>
  </div>
</div>
<? endif ?>
