<!DOCTYPE html>
<html>
<?php
$homedir = "../";
include("${homedir}database.php");
log_visitor();
?>
<head>
  <title>csci5612 intro</title>
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
    <div class="row">
      <h2>Intro</h2>
    </div>
  </div>

<?php include("${homedir}footer.php"); ?>

</body>
</html>
