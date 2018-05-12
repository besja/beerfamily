<? if ($field_bantype[0]['value'] == 'slide'): ?>
  <? if (isset($field_url['und'])): ?>
    <a href="<?= $field_url['und'][0]['value'] ?>">
  <? endif ?>
  <img src="<?= file_create_url($field_image[0]['uri']) ?>"
       class="img-responsive"
       alt=""/>
  <? if (isset($field_url['und'])): ?>
    </a>
  <? endif ?>
  <div class="carousel-caption"></div>
<? elseif ($field_bantype[0]['value'] == 'vertical_card'): ?>
  <? if (isset($field_url['und'])): ?>
    <a href="<?= $field_url['und'][0]['value'] ?>">
  <? endif ?>
  <img src="<?= file_create_url($field_image[0]['uri']) ?>"
       class="img-responsive"
       alt=""/>
  <? if (isset($field_url['und'])): ?>
    </a>
  <? endif ?>
  <p><?= render($content['body']) ?></p>
<? else: ?>
  <? if (isset($field_url['und'])): ?>
    <a href="<?= $field_url['und'][0]['value'] ?>">
  <? endif ?>
  <img src="<?= file_create_url($field_image[0]['uri']) ?>"
       class="img-responsive"
       alt=""/>
  <? if (isset($field_url['und'])): ?></a><? endif ?>
<? endif ?>
