<div class="theme-bg" <?=$theme_bg_style?>>
  <? if ($messages): ?>
    <div id="messages">
      <div class="section clearfix">
        <?= $messages; ?>
      </div>
    </div> <!-- /.section, /#messages -->
  <? endif; ?>
  <div class="content">
    <div class="container">
      <?= render($page['content']) ?>
  </div>
</div>
<div class="footer container">
  <div class="row">
    <div class="col-sm-12 col-md-6 col-md-push-1">
      <div class="contacts">
        <?php echo render($region['contacts']); ?>
      </div>
    </div>
    <div class="col-sm-12 col-md-5 col-md-push-1">
      <?php echo render($region['social']); ?>
    </div>
  </div>
</div>
<script type="text/javascript">
jQuery(function(){
  jQuery('#agegate_btn_yes').on('click', function(){
	jQuery('#agegate_over18').val('1');
  });
  jQuery('#agegate_btn_no').on('click', function(){
	jQuery('#agegate_over18').val('');
	alert('Доступ на сайт разрешен только лицам от 18 лет и старше');
  });
});
</script>
