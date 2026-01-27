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
    <div class="row">
      <div class="span3"></div>
      <div class="span6">
        <marquee>
          <h2>you are visitor number <font color="#ff0000"><?php echo(get_visitor_count()); ?></h2>
        </marquee>
      </div>
      <div class="span3"></div>
    </div>
  </div>
</div>

<?php include("${homedir}footer.php"); ?>

</body>
</html>
