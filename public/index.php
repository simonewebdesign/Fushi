<?php
include_once '../library/bootstrap.php';
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="<?=$settings['site']['language']?>">


<?=CREDITS?>


  <head>
    <meta charset="utf-8">
    <title><?=empty($template['title']) ? '' : $template['title'] . ' | '?><?=$settings['site']['name']?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$template['metaDescription']?>">
    <meta name="author" content="<?=$template['metaKeywords']?>">
    <meta name="robots" content="<?=$template_name == 'backoffice' ? 'noindex, nofollow' : 'index, follow'?>">
	
    <!-- Le styles -->
    <link href="<?=ROOT?>css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
    /*
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    */
    </style>
    <link href="<?=ROOT?>css/bootstrap-responsive.css" rel="stylesheet">
    <?=$css?>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?=ROOT?>img/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=ROOT?>img/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=ROOT?>img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=ROOT?>img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?=ROOT?>img/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <?php include_once INC . 'navbar.php' ?>
    </div>

    <div class="container-fluid">    
      <!-- template content -->
      <?php include_once APP . "templates/{$template['name']}.php" ?>
      <!--/template content -->     
      <hr>
      <footer>
        <p>Copyleft &copy; <?=YEAR?> <?=$settings['site']['name']?>. All rights reversed.</p>
      </footer>
    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>

    <!-- Twitter Bootstrap -->
    <script src="<?=ROOT?>js/bootstrap/bootstrap.min.js"></script>    
    <script src="<?=ROOT?>js/bootstrap/bootstrap-transition.js"></script>
    <script src="<?=ROOT?>js/bootstrap/bootstrap-alert.js"></script>
    <script src="<?=ROOT?>js/bootstrap/bootstrap-modal.js"></script>
    <script src="<?=ROOT?>js/bootstrap/bootstrap-dropdown.js"></script>
    <script src="<?=ROOT?>js/bootstrap/bootstrap-scrollspy.js"></script>
    <script src="<?=ROOT?>js/bootstrap/bootstrap-tab.js"></script>
    <script src="<?=ROOT?>js/bootstrap/bootstrap-tooltip.js"></script>
    <script src="<?=ROOT?>js/bootstrap/bootstrap-popover.js"></script>
    <script src="<?=ROOT?>js/bootstrap/bootstrap-button.js"></script>
    <script src="<?=ROOT?>js/bootstrap/bootstrap-collapse.js"></script>
    <script src="<?=ROOT?>js/bootstrap/bootstrap-carousel.js"></script>
    <script src="<?=ROOT?>js/bootstrap/bootstrap-typeahead.js"></script>
    <!--/ Twitter Bootstrap -->    
    
    <script>
    var ROOT = '<?=ROOT?>';
    var ABSOLUTE_ROOT = '<?=ABSOLUTE_ROOT?>';
    </script>

    <!-- <script src="<?=ROOT?>js/script.js"></script> -->

    <?php if ($template_name == 'backoffice') { ?>
    <script src="<?=ROOT?>js/ajax.js"></script>
    <script src="<?=ROOT?>js/backoffice.js"></script>
    <?php } ?>
    
    <?php if ($settings['countdown']['is_active']) { ?>
    <!-- Countdown -->
    <script src="<?=ROOT?>js/countdown.js"></script>
    <script>
      $(function(){
        $('#countdown').countDown({
          targetDate: {
            'day': 		<?=$settings['countdown']['day']?>,
            'month': 	<?=$settings['countdown']['month']?>,
            'year': 	<?=$settings['countdown']['year']?>,
            'hour': 	<?=$settings['countdown']['hours']?>,
            'min': 		<?=$settings['countdown']['minutes']?>,
            'sec': 		<?=$settings['countdown']['seconds']?>
          }
        });
      });
    </script>
    <!--/ Countdown -->
    <?php } ?>
    
    <!-- Google Analytics -->
    <script>
      var _gaq=[['_setAccount','<?=ANALYTICS_CODE?>'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>   
    <!--/ Google Analytics -->
    
  </body>
</html>