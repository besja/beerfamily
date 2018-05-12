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
?>
<?php foreach ($rows as $row_number => $columns): ?>
  <div class="row">
    <?php foreach ($columns as $column_number => $item): ?>
    <div class="col-md-6">
      <div class="jobs-item">
		<?php
		
		$str = $_SERVER["REQUEST_URI"];
		
		if ( (strpos($str, "cn/") != false) ){
			$lang = "cn";
		}

		if ( (strpos($str, "en/") != false) ){
			$lang = "en";
		}
		
		?>
		
		<?php if ($lang == "cn") {
			$item = str_replace("Обязанности", "Responsibilities", $item);
			$item = str_replace("Условия", "条件", $item);
			$item = str_replace("Откликнуться", "我要回应", $item);
			$item = str_replace("Ваше имя", "你的名字", $item);
			$item = str_replace("Электронная почта", "電子郵件", $item);
			$item = str_replace("Комментарий", "評論", $item);
			$item = str_replace("Отправить", "送", $item);
			$item = str_replace("Отмена", "消除", $item);
		}?>

		<?php if ($lang == "en") {
			$item = str_replace("Обязанности", "Responsibilities", $item);
			$item = str_replace("Условия", "Conditions", $item);
			$item = str_replace("Откликнуться", "Response", $item);
			$item = str_replace("Ваше имя", "Name", $item);
			$item = str_replace("Электронная почта", "Email", $item);
			$item = str_replace("Комментарий", "Comment", $item);
			$item = str_replace("Отправить", "Send", $item);
			$item = str_replace("Отмена", "Abort", $item);
		}?>



		<?php print $item; ?>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
<?php endforeach; ?>
