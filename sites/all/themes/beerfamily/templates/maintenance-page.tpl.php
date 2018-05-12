<?php

/**
 * @file
 * Implementation to display a single Drupal page while offline.
 *
 * All the available variables are mirrored in page.tpl.php.
 *
 * @see template_preprocess()
 * @see template_preprocess_maintenance_page()
 * @see bartik_process_maintenance_page()
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>BEER FAMILY</title>
        <meta charset='utf-8' />

        <link rel="stylesheet" href="/sites/all/themes/beerfamily/css/bootstrap.css" media="screen" />
        <link rel="stylesheet" href="/sites/all/themes/beerfamily/css/style.css" media="screen" />
        <link rel="stylesheet" href="/sites/all/themes/beerfamily/css/ubuntu-font.css" media="screen" />
    </head>
    <body>
	<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-50922559-1', 'beerfamily.ru');
ga('send', 'pageview');

</script>
        <div id="content">
		  <?php print $content; ?>
			<div class="container">
              <div class="row">
                <div class="col-md-4 text-center">
			    <a href="http://www.jagerhaus.ru/"><img src="/img/btn_02.png"
                                                        class="img-fluid"/></a>
                </div>
                <div class="col-md-4 text-center">
                  <a href="http://www.kriek.ru/"><img src="/img/btn_03.png"
                                                     class="img-fluid"/></a>

                </div>
                <div class="col-md-4 text-center">
                  <a href="http://www.karlovypivovary.ru/"><img src="/img/btn_04.png"
                                                                class="img-fluid"/></a>

                </div>
              </div>
			</div>
        </div>
    </body>
</html>
<!--DRUPAL-->