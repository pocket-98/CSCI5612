<!DOCTYPE html>
<html>
<?php
$homedir = "../";
include("${homedir}database.php");
log_visitor();
?>
<head>
  <title>csci5612 models/methods</title>
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
      <div class="span12">
        <h2>Models/Methods</h2>
      </div>
    </div>
    <div class="row">
      <div class="span12">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>
    </div>

    <div class="row">
      <div class="span12">
        <br/>
        <br/>
        <ul>
          <li><a href="pca/">Principal Component Analysis</a></li>
          <li><a href="clustering/">Clustering</a></li>
          <li><a href="arm/">Association Rule Mining</a></li>
          <li><a href="dt/">Decision Trees</a></li>
          <li><a href="nb/">Naive Bayes</a></li>
          <li><a href="regression/">Regression</a></li>
          <li><a href="svm/">Support Vector Machines</a></li>
          <li><a href="ensemble/">Ensembles</a></li>
        </ul>
      </div>
    </div>
  </div>

<?php include("${homedir}footer.php"); ?>

</body>
</html>
