<? if ($items): ?>
  <div class="table-prices-wrap">
  <table class='menu-prices'>
    <?php foreach ($items as $delta => $item): ?>
      <?php print render($item); ?>
    <?php endforeach; ?>
  </table>
  </div>
<? endif ?>
