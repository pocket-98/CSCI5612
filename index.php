<!DOCTYPE html>
<html>
<?php
$homedir = "";
include("${homedir}database.php");
log_visitor();
?>
<head>
  <title>csci5612</title>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="<?php echo("$homedir"); ?>css/bootstrap.min.css"/>
  <link rel="stylesheet" href="<?php echo("$homedir"); ?>css/bootstrap-responsive.css"/>
  <meta name="author" content="pocket"/>
<style>
.display-table {
    display: table;
    height: 10px;
    width: 100%;
}
.table-cell-content {
    display: table-cell;
    vertical-align: middle;
    float: none;
    padding: 10px;
}
</style>
</head>
<body class="preview" data-spy="scroll" data-target=".subnav" data-offset="80">

<?php include("${homedir}navbar.php"); ?>

<br/><br/><br/>

<div class="container">
  <header class="jumbotron subhead">
    <div class="row">
      <div class="span6">
        <h1>welcome to my <blink>website!!</blink></h1>
      </div>
      <div class="span3">
        <img src="img/geocities.jpg" style="margin: 10px"/>
      </div>
      <div class="span3">
        <a href="mailto:pavan.dayal@colorado.edu">
        <img src="img/emailme.gif" style="margin: 10px"/>
        pavan.dayal@colorado.edu</a>
      </div>
    </div>
  </header>

  <div class="subnav">
    <div class="row display-table">
      <div class="span1 hidden-phone"></div>
      <div class="span1 hidden-phone table-cell-content">
        <img src="img/rabbit.gif"/>
      </div>
      <div class="span1 hidden-phone table-cell-content">
        <img src="img/clippy.gif"/>
      </div>
      <div class="span6 table-cell-content">
        <marquee>
          <h2>you are visitor number <font color="#ff0000"><?php echo(get_visitor_count()); ?></h2>
        </marquee>
      </div>
      <div class="span2 hidden-phone table-cell-content">
        <img src="img/www.gif"/>
      </div>
      <div class="span1"></div>
    </div>
  </div>

  <div class="row">
    <div class="span12">
      <br/>
      <hr/>
      <br/>

      <h2>CSCI 5612 - Machine Learning for Data Scientists</h2>
      <h3>Project Website</h3>

      <br/>
    </div>
  </div>
  <div class="row">
    <div class="span12">
      <p>In this class, we use <img src="img/firework.gif" width=20/>modern<img src="img/firework.gif" width=20/> techniques for data preparation and analysis to apply both supervised and unsupervised models and methods to real and interesting problems.</p>
      <p>All of the source code for the different models can be found on <a href="https://github.com/pocket-98/CSCI5612">github</a>.</p>
      <br/><br/>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span3"></div>
    <div class="span6 embed-responsive">
      <iframe style="width: 100%; height:400px" src="https://www.youtube.com/embed/l8mMFXOmEOs">
      </iframe>
      <br/><br/>
    </div>
    <div class="span3"></div>
  </div>
</div>

<?php include("${homedir}footer.php"); ?>

</body>
</html>
