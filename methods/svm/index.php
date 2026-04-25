<!DOCTYPE html>
<html>
<?php
$homedir = "../../";
include("${homedir}database.php");
log_visitor();
?>
<head>
  <title>csci5612 methods - svm</title>
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
        <h2>Support Vector Machines</h2>
      </div>
    </div>

    <div class="row">
      <div class="span12">
        <h3>Overview</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>
    </div>

    <div class="row">
      <div class="span12">
        <h3>Data</h3>
        <p>The cleaned dataset from the dataprep section was used as a starting point. Then, since YearsCode and YearsCodePro were highly correlated, the difference between the 2 variables was calculated as YearsCodeBeforePro and then YearsCode was dropped as a feature. Then out of the 68000 rows remaining from the cleaned set, another 4500 rows were dropped for when professional years of coding experience was higher than years coding in general. The label of employment status was selected with roughly 55% of the sample being true and 45% being false. The final labeled data used for decision tree classification can be found here: <a href="stackoverflow_labeled.csv">stackoverflow_labeled.csv</a>.</p>
        <a href="code_prep.py"><p>code_prep.py</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_prep.py", "r");
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
        <a href="code_prep.txt"><p>code_prep.py output</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_prep.txt", "r");
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
      </div>
    </div>

    <div class="row">
      <div class="span3"></div>
      <div class="span6">
        <img src="clean_data.png"/>
      </div>
      <div class="span3"></div>
    </div>

    <div class="row">
      <div class="span12">
        <h3>Code</h3>
        <a href="code_svm.py"><p>code_svm.py</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_svm.py", "r");
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
        <a href="code_svm.txt"><p>code_svm.py output</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_svm.txt", "r");
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
      </div>
    </div>

    <div class="row">
      <div class="span12">
        <h3>Results</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>
    </div>

    <div class="row">
      <div class="span3"></div>
      <div class="span6">
        <img src="svm_conf.png"/>
      </div>
      <div class="span3"></div>
    </div>

  </div>

<?php include("${homedir}footer.php"); ?>

</body>
</html>
