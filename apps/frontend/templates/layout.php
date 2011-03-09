<!-- apps/frontend/templates/layout.php -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Rafael Report System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="shortcut icon" href="/favicon.ico" />

    <style type="text/css" media="screen">

    .slide-out-div {
       padding: 20px;
        width: 250px;
        border: #29216d 2px solid;
    }

.tab{
	top:280px;
}
.tab .handle{
background:url(<?php echo image_path('reporty.png') ?>) no-repeat;
}
.tab2{
top:150px;
}
.tab2 .handle{
background:url(<?php echo image_path('crontab.png') ?>) no-repeat;
}
.tab3{
top:410px;
}
.tab3 .handle{
background:url(<?php echo image_path('auta.png') ?>) no-repeat;
}




        </style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js" ></script>

    <?php use_javascript('search.js') ?>
    <?php use_javascript('tabs.js') ?>

    <?php use_javascript('jquery.tabSlideOut.v1.3-test.js') ?>
 

    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
  </head>
  <body>

    <div id="container">

      <div id="header">
        <div class="content">
          <h1>
	     <a href="<?php echo url_for('report/index') ?>">
              <img src="/images/logo.png"/>
             </a>
	 </h1>
 
          <div id="sub_header">
            <div class="post">
              <h2>Ask for people</h2>
              <div>
                <a href="<?php echo url_for('report/new') ?>">Post a Job</a>
              </div>
            </div>
 
            <div class="search">
              <h2>Ask for a job</h2>
 <form action="<?php echo url_for('report_search') ?>" method="get">
    <input type="text" autocomplete="off" name="query" value="<?php echo $sf_request->getParameter('query') ?>" id="search_keywords" />
    <input type="submit" value="search" />
    <img id="loader" src="<?php echo image_path('loader.gif') ?>" style="vertical-align: middle; display: none" />
    <div class="help">
	Vložte část názvu reportu...
    </div>
  </form>

            </div>
          </div>
        </div>
      </div>
 
      <div id="content">
        <?php if ($sf_user->hasFlash('notice')): ?>
          <div class="flash_notice">
            <?php echo $sf_user->getFlash('notice') ?>
          </div>
        <?php endif ?>
 
        <?php if ($sf_user->hasFlash('error')): ?>
          <div class="flash_error">
            <?php echo $sf_user->getFlash('error') ?>
          </div>
        <?php endif ?>
 
        <div class="content">
          <?php echo $sf_content ?>
        </div>
      </div>
 
      <div id="footer">
        <div class="content">
        </div>
      </div>
    </div>
<div class="slide-out-div tab">
            <a class="handle" href="">Content</a>
        <a href="<?php echo url_for('report/index') ?>">Přehled reportů</a><br/><br/>
	<a href="<?php echo url_for('report/new') ?>">Přidat report</a><p></p>
        </div>     

<div class="slide-out-div tab2">
            <a class="handle" href="">Content</a>
        <a href="<?php echo url_for('crontab/index') ?>">Editovat Crontab</a><br/><br/>
        </div>     

<div class="slide-out-div tab3">
            <a class="handle" href="">Content</a>
        <a href="<?php echo url_for('cars/index') ?>">Vozový park</a><br/><br/>
        <a href="<?php echo url_for('cars/new') ?>">Přidat auto</a><p><p>
        </div>     

  </body>
</html>
