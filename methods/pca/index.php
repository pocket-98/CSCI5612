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
        <a href="code_pca.py"><p>code_pca.py</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_pca.py", "r");
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
        <a href="code_pca.txt"><p>code_pca.py output</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_pca.txt", "r");
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
      <div class="span4">
        <br/>
        <a target="_blank" href="pca_feature_importance.png">
          <img src="pca_feature_importance.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="pca_2.png">
          <img src="pca_2.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="pca_3.png">
          <img src="pca_3.png"></img>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="span12">
        <h3>Results</h3>
        <p>Looking at PC1, which accounts for 54% of the variance in the data in the feature importance plot, it is interesting that it weighs the features <b>YearsCode</b> and <b>YearsCodePro</b> almost equally. This is actually true if you look at every single eigenvector, where the first 2 columns appear approximately equal all throughout. This makes sense because the 2 should be highly correllated and not much additional information is gained by knowing both over one since if someone has been coding professionally for a longer amount of time, then they have been coding overall for much longer as well. The data shows that the covariance between these variables is 90%. This brings up the question of whether the difference between when someone started coding professionally and when they started coding in general is a useful derived feature.</p>
        <p>Once the 2nd principal component is added, which mainly comprises of the variable of the number of listed <b>ComputerSkills</b>, then 79.3% of the variance is explained. Adding the 3rd component brings the total explained variance up to 97.6%. Only 3 dimensions is necessary to capture over 95% of the data which makes sense because the first 2 features are very highly correlated.</p>
      </div>
    </div>

  </div>

<?php include("${homedir}footer.php"); ?>

</body>
</html>
