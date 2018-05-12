  <div class="container-darken container-content-pad <?=$class; ?>" <?=$attributes; ?>>
    <?php foreach ($rows as $row_number => $columns): ?>
    <div class="row partners-item">
        <?php foreach ($columns as $column_number => $item): ?>
            <?=$item; ?>
        <?php endforeach; ?>
    </div>
    <?php endforeach; ?>
  </div>