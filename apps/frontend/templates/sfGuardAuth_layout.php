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

  </body>
</html>
