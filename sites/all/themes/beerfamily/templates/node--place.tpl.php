<? if ($teaser): ?>
  <h2><a href="<?= $node_url ?>"
         title="<?= render($title) ?>"><?= render($content['field_logo_btn']) ?></a>
  </h2>
<? else: ?>
  <div class="container-lighten container-content-pad">
    <div class="row">
      <div class="col-md-7">
        <div class="restaurant-logo">
          <?= render($content['field_logo']) ?>
        </div>
        <ul class="menu-page">
          <? if ($content['field_menu_url']['#items'][0]['value']): ?>
            <li><a target="_blank"
                   href="<?= $content['field_menu_url']['#items'][0]['value'] ?>">
                <?=t('Menu on restaurant\'s site')?></a>
            </li>
          <? endif ?>
          <li><a href="#interiors"><?=t('Interiors')?></a></li>
          <? if (isset($content['field_addresses'])): ?>
            <li><a href="#address-map"><?=t('Restaurants on map')?></a></li>
          <? endif ?>
        </ul>
        <div class="restaurant-description">
          <p class="text-medium"><?= render($content['body']); ?></p>
        </div>
        <div class="content-chain-item" id="interiors">
          <div class="tab-target-wrapped">
            <h3><?=t('Interiors')?></h3>
            <?= render($content['field_interiors']) ?>
          </div>
        </div>
        <!--<div class="content-chain-item" id="prices">
          <div class="tab-target-wrapped">
            <h3>Меню</h3>
            <?/*= render($content['field_prices']) */?>
          </div>
        </div>-->
        <div class="address-map content-chain-item" id="address-map">
          <div class="tab-target-wrapped">
            <?
            if ($content['field_addresses']['#items']) {
              drupal_add_js('http://api-maps.yandex.ru/2.1/?lang=ru-RU', 'external');
              $js = "\n";
              foreach ($content['field_addresses']['#items'] as $nItem) {
                $addrNode = node_load($nItem['nid']);
                print render($addrNode->field_coords);
                $coords = $addrNode->field_coords['und'][0]['placemarks'];
				//print_r($addrNode->field_coords['und'][0]); 
                $js .= "placemarks.push(" . $coords . "[0]);\n";
              }
              if (isset($content['field_placemark']['#items'][0])) {
                $placemarkSrc = file_create_url(
                  $content['field_placemark']['#items'][0]['uri']
                );
                $js .= "\n var field_placemark_src = '" . $placemarkSrc . "';";
              }
              ?>
              <script type="text/javascript">
                ymaps.ready(initRestoMap);
                var placemarks = [];
                <?=$js?>;
                function initRestoMap() {
                  var yMap = new ymaps.Map('ymap-places', {
                    center: [59.9320541, 30.360469],
                    zoom: 10
                  });
                  var placemarkOptions = {
                    preset: 'islands#darkOrangeStretchyIcon'
                  };
                  if (typeof field_placemark_src != 'undefined') {
                    placemarkOptions.iconImageHref = field_placemark_src;
                    placemarkOptions.iconLayout = 'default#image';
                  }
                  for (var p in placemarks) {
                    var options = placemarks[p].params;
                    var placemark = new ymaps.Placemark(
                      placemarks[p].coords,
                      options,
                      placemarkOptions
                    );
                    yMap.geoObjects.add(placemark);
                  }
                  yMap.setBounds(yMap.geoObjects.getBounds());
                }
              </script>
              <?
              print "<div id='ymap-places' class='ymap-places'></div>";
            }
            ?></div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="address-list">
          <h4><?=t('Our addresses')?>:</h4>
          <?= render($content['field_addresses']) ?>
        </div>
      </div>
    </div>

    <div class="nav-pager">

      <?

     
      $result= db_query("SELECT * FROM dr_node n WHERE n.type = 'place' and n.status = 1 ORDER BY n.created DESC");
      $mynodes = array();
      $i = 0;
      while ($row=$result->fetchObject()) { 
          $mynodes[] = $row->nid;
          if ($row->nid == $node->nid) {
            $current = $i; 
          }
          $i++;
      }
      if ($current==0) {
        $prev = count($mynodes)-1; 
        $next = 1; 
      } elseif ($current == (count($mynodes) - 1)) {
        $prev = count($mynodes) - 2 ;
        $next = 0;
      } else{
        $prev = $current -1; 
        $next = $current +1; 
      }
      ?>
        <a href="<?php print url('node/'.$mynodes[$prev]);?>" class="left"></a>
        <a href="<?php print url('node/'.$mynodes[$next]);?>" class="right"></a>
    </div>
  </div>
<? endif ?>
