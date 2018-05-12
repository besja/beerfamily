<?php

/**
 * @file
 * Default simple view template to display a rows in a grid.
 *
 * - $rows contains a nested array of rows. Each row contains an array of
 *   columns.
 *
 * @ingroup views_templates
 */
//$get_defined_vars = get_defined_vars();
//var_dump(array_keys($get_defined_vars));
?>
<?php if (!empty($title)) : ?>
  <h3><?php print $title; /*print '<code>';print_r($rows[0]);print'</code>'*/?></h3>
<?php endif; ?>
<div class="container"<?php print $attributes; ?>>
  <?php if (!empty($caption)) :?>
    <h4><?php print $caption; ?></h4>
  <?php endif; ?>
  <?php foreach ($rows as $row_number => $columns): ?>
    <div class="row">
      <?php foreach ($columns as $column_number => $item): ?>
        <div class="col-sm-3">
          <?php print $item; ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</div>
