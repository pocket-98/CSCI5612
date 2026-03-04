<!DOCTYPE html>
<html>
<?php
$homedir = "../../";
include("${homedir}database.php");
log_visitor();
?>
<head>
  <title>csci5612 methods - pca</title>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="<?php echo("$homedir"); ?>css/bootstrap.min.css"/>
  <link rel="stylesheet" href="<?php echo("$homedir"); ?>css/bootstrap-responsive.css"/>
  <link rel="stylesheet" href="<?php echo("$homedir"); ?>css/line-num.css"/>
  <meta name="author" content="pocket"/>
</head>
<body class="preview" data-spy="scroll" data-target=".subnav" data-offset="80">

<?php include("${homedir}navbar.php"); ?>

<br/><br/><br/>

  <div class="container">
    <div class="row">
      <div class="span12">
        <h2>Principal Component Analysis</h2>
      </div>
    </div>

    <div class="row">
      <div class="span12">
        <h3>Overview</h3>
        <p>PCA is a technique that uses quantitative record data to determine which variables of that data contain the most variation and in turn can be used to transform the record data into new columns called principal components that are decorrelated and independent from each other. These components capture all of the variance of the data in decreasing order of importance and can thus be used to reduce the dimensionality of the data into fewer columns than what was started out with while preserving most of the important features.
        </p>
      </div>
    </div>

    <div class="row">
      <div class="span12">
        <h3>Data</h3>
        <p>First, the stackoverflow data is prepared for PCA by only keeping the quantitative columns. Then sklearn StandardScaler() was used to normalize all the columns.</p>
        <a href="code_quant.py"><p>code_quant.py</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_quant.py", "r");
echo("<details><summary>\n");
$line_no = 0;
while (false !== ($line = fgets($f))) {
    $line = rtrim($line);
    echo("<code>${line}\n</code>");
    $line_no += 1;
    if ($line_no > 3) {
        echo("</summary>");
    }
}
echo("</details>\n");
fclose($f);
?></pre>
        <br/>
        <a href="code_quant.txt"><p>code_quant.py output</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_quant.txt", "r");
echo("<details><summary>\n");
$line_no = 0;
while (false !== ($line = fgets($f))) {
    $line = rtrim($line);
    echo("<code>${line}\n</code>");
    $line_no += 1;
    if ($line_no > 3) {
        echo("</summary>");
    }
}
echo("</details>\n");
fclose($f);
?></pre>
        <p>The prepared quantitative data can be found here: <a href="stackoverflow_quant.csv">stackoverflow_quant.csv</a>.</p>
      </div>
    </div>

    <div class="row">
      <div class="span12">
        <h3>Code</h3>
        <pre>
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </pre>
        </p>
      </div>
    </div>

    <div class="row">
      <div class="span12">
        <h3>Results</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>
    </div>

  </div>

<?php include("${homedir}footer.php"); ?>

</body>
</html>
