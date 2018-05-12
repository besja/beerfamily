<? if ($teaser): ?>
  <h2 class="yellow"><?= render($title) ?></h2>
  <?=render($content['body'])?>
  <? if ($field_duties): ?>
    <h3>Обязанности:</h3>
    <ul>
      <? foreach ($field_duties as $duty): ?>
        <li><?=$duty['value']?></li>
      <? endforeach ?>
    </ul>
  <? endif ?>
  <? if ($field_conditions): ?>
    <h3>Условия:</h3>
    <ul>
      <? foreach ($field_conditions as $cond): ?>
        <li><?=$cond['value']?></li>
      <? endforeach ?>
    </ul>
  <? endif ?>
  <?
  $form  = drupal_get_form('vacancy_form_'.$node->nid, 'vacancy_form', $node);
  $opened = isset($form['validated']);
  ?>
  <div class="buttons <?=($opened ? 'hide' : '')?> form-trigger">
    <a href="#" class="button">Откликнуться</a>
  </div>
  <div class="form-vacancy <?=($opened ? '' : 'hide')?>">
    <?
    print render($form);
    ?>
  </div>
<? endif ?>
