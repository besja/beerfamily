<div id="index-carousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?
    $i = 0;
    foreach (array()/*$rows */as $id => $row):
      $i++;
      ?>
      <li data-target="#index-carousel" data-slide-to="<?= $i ?>"
          <? if ($i == 1) { ?>class="active" <? }?> ></li>
    <? endforeach ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?
    $i = 0;
    foreach ($rows as $id => $row):
      $i++;
      ?>
      <div class="item <? if ($i == 1) { ?>active<? }?>">
        <?=$row?>
      </div>
    <? endforeach ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#index-carousel"
     role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Пред</span>
  </a>
  <a class="right carousel-control" href="#index-carousel"
     role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">След</span>
  </a>
</div>