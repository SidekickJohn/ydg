<!DOCTYPE html>
<html lang="de-DE">
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <title><?php wp_title(' - ', true, 'right'); ?></title>

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
       <!--[if lt IE 9]>
         <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
       <![endif]-->

       <?php wp_enqueue_script("jquery"); ?>
       <?php wp_enqueue_script("jquery-ui-core"); ?>
       <?php wp_enqueue_script("jquery-ui-slider"); ?>
       <?php wp_head(); ?>
</head>
  <?php if( is_page( 'titel-seite' )):?>
  <body class="landing-page landing-page1">
  <nav class="navbar navbar-transparent navbar-top" role="navigation">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar bar1"></span>
              <span class="icon-bar bar2"></span>
              <span class="icon-bar bar3"></span>
              </button>
              <a href="http://www.yourdailygreen.de">
                  <div class="logo-container">
                      <div class="brand">
                          Daily Green
                      </div>
                  </div>
              </a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="example" >
              <ul class="nav navbar-nav navbar-right">
                <li>
                  <a href="http://localhost/yourdailygreen/">Home</a>
                </li>
                <li>
                  <a href="http://localhost/yourdailygreen/erstelle-deinen-mix/">Erstelle deinen Mix</a>
                </li>
                <li>
                  <a href="http://localhost/yourdailygreen/superfoods/">Superfoods</a>
                </li>
                <li>
                  <a href=" http://localhost/yourdailygreen/fundgrube/">Fundgrube</a>
                </li>
                <li>
                  <a href="http://localhost/yourdailygreen/team-dailygreen">Team Daily Green</a>
                </li>
                <li>
                  <a href="http://localhost/yourdailygreen/mein-konto/">Mein Konto</a>
                </li>
              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </div>
  </nav>
  <?php else:?>
    <body class="landing-page landing-page1 awesomeBody">
    <nav class="navbar navbar-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
                </button>
                <a href="http://www.yourdailygreen.de">
                    <div class="logo-container">
                        <div class="logo">
                            <img src="http://localhost/yourdailygreen/wp-content/uploads/2016/04/new_logo.png" alt="Creative Tim Logo">
                        </div>
                        <div class="brand">
                            Daily Green
                        </div>
                    </div>
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="example" >
                <ul class="nav navbar-nav navbar-right">
                  <li>
                    <a href="http://localhost/yourdailygreen/">Home</a>
                  </li>
                  <li>
                    <a href="http://localhost/yourdailygreen/erstelle-deinen-mix/">Erstelle deinen Mix</a>
                  </li>
                  <li>
                    <a href="http://localhost/yourdailygreen/superfoods/">Superfoods</a>
                  </li>
                  <li>
                    <a href=" http://localhost/yourdailygreen/fundgrube/">Fundgrube</a>
                  </li>
                  <li>
                    <a href="http://localhost/yourdailygreen/team-dailygreen">Team Daily Green</a>
                  </li>
                  <li>
                    <a href="http://localhost/yourdailygreen/mein-konto/">Mein Konto</a>
                  </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>
    <?php endif; ?>
<div class="wrapper">
