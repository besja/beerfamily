<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
?>
<?php print $wrapper_prefix; ?>
<?php if (!empty($title)) : ?>
  <h3 class="view-block-title"><?php print $title; ?></h3>
<?php endif; ?>
<div class="view-block-list view-<?=$view->name?>">
  <?php foreach ($rows as $id => $row): ?>
    <div class="<?php print $classes_array[$id]; ?>"><?php print $row; ?></div>
  <?php endforeach; ?>
</div>
<?php print $wrapper_suffix; ?>
