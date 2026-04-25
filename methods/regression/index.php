<!DOCTYPE html>
<html>
<?php
$homedir = "../../";
include("${homedir}database.php");
log_visitor();
?>
<head>
  <title>csci5612 methods - regression</title>
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
        <h2>Regression</h2>
      </div>
    </div>

    <div class="row">
      <div class="span12">
        <h3>Overview</h3>
        <p>Logistic Regression is a supervised learning method for binary classification. This means that training requires labeled data in one of 2 categories and it performs best when trying to categorize between high and low values of a dependent variable. Examples might include determining between high and low price, high and low risk, or high and low salary. The technique relies on using linear regression and splitting the output between high and low values using the sigmoid activation function. Linear regression, in simple terms, is trying to find the best-fit-line through a bunch of points. It relies on using data with set of independent variables, [x<sub>1</sub>, x<sub>2</sub>, ..., x<sub>n</sub>], and a dependent variable, y.
        </p>
      </div>
    </div>

    <div class="row">
      <div class="span4"></div>
      <div class="span4">
        <img src="house_price.png" title="src: amybergquist.com" alt="src: amybergquist.com"/>
      </div>
      <div class="span4"></div>
    </div>

    <div class="row">
      <div class="span12">
        <p>Linear Regression, like in the example above with home prices vs area, makes the assumption that y can be expressed as a linear combination of the different x<sub>j</sub> using different weights and bias: <i>&#x177;(x<sub>1</sub>,...,x<sub>n</sub>) = w<sub>1</sub> x<sub>1</sub> + w<sub>2</sub> x<sub>2</sub> + ... + w<sub>n</sub> x<sub>n</sub> + b</i>. This is a parameterized model using the parameters <i>w<sub>1</sub>, ..., w<sub>n</sub></i> and <i>b</i>. It uses linear least squares to minimize the Mean Square Error. That MSE captures how far away each data point is from the line and is used as the loss function to optimize:
        </p>
        <p><i>L = <sup>1</sup>/<sub>N</sub> [(y<sup>(1)</sup> - &#x177;(x<sub>1</sub><sup>(1)</sup>, ..., x<sub>n</sub><sup>(1)</sup>))<sup>2</sup> + (y<sup>(2)</sup> - &#x177;<sup>(2)</sup>)<sup>2</sup> + ... + (y<sup>(N)</sup> - &#x177;<sup>(N)</sup>)<sup>2</sup>]</i>
        </p>
        <p>Taking derivatives with respect to the weights and bias allow for gradient descent to be used for this convex optimization problem to minimize this loss function. For the dependent variable matrix with all the points as rows X and the column vector for all the points y and the column vector for all the predictions &#x177;, and for column j in X as X<sub>j</sub>,
        </p>
        <p><i><sup>&#x2202;L</sup>/<sub>&#x2202;wj</sub> = <sup>-2</sup>/<sub>N</sub> * X<sub>j</sub><sup>T</sup> * (y - &#x177;)
        = <sup>-2</sup>/<sub>N</sub> * &#x2211;<sub>k</sub> x<sub>j</sub><sup>(k)</sup> (y<sup>(k)</sup> - &#x177;<sup>(k)</sup>)</i>
        </p>
        <p><i><sup>&#x2202;L</sup>/<sub>&#x2202;b</sub> = <sup>-2</sup>/<sub>N</sub> * &#x2211;<sub>k</sub> (y<sup>(k)</sup> - &#x177;<sup>(k)</sup>)</i>
        </p>
        <p>After optimizing the parametric model, you can then make predictions. In the house example, you can use the model to estimate the house price given the square footage. Suppose we then want to classify based on the price of the home now. High value homes could be where the price is over $1,000,000 and low value homes would be when the price is below $1,000,000.
        </p>
        <p>This is where logistic regression comes in. We can take the linear model, normalize it around the critical value, and then check if the output is positive or negative to determine which class it belongs in. The sigmoid function is commonly used as an activation, defined by:
        </p>
        <p>Sigmoid(x) = (1 + exp(-x))<sup>-1</sup>
        </p>
        <p>When very low, negative values are put into the sigmoid function, the output is close to 0. When high positive values are inputed, the output is close to 1. Putting in 0 gives a result right in the middle at 0.5.
        </p>
      </div>
    </div>

    <div class="row">
      <div class="span4"></div>
      <div class="span4">
        <img src="sigmoid.png" title="src: stackoverflow.com" alt="src: stackoverflow.com"/>
      </div>
      <div class="span4"></div>
    </div>

    <div class="row">
      <div class="span12">
        <p>The effect is the final logistic regression model is p(x) = Sigmoid(&#x177;(x)). Which outputs values between 0 and 1 and can then be compared to the binary classes of high and low in the labeled data. When the output of the model is interpretted as a probability, a new function can be defined called the log-likeliheed, <i>log L = &#x2211;<sub>k</sub> y<sup>(k)</sup> log p<sup>(k)</sup> + (1 - y<sup>(k)</sup>) log(1-p<sup>(k)</sup>) </i>. Maximizing this function is called maximum log-likelihood and the end result is optimizing the weights for the same MSE in the earlier linear regression.
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
        <a href="code_logistic.py"><p>code_logistic.py</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_logistic.py", "r");
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
        <a href="code_logistic.txt"><p>code_logistic.py output</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_logistic.txt", "r");
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
        <img src="logistic_conf.png"/>
      </div>
      <div class="span3"></div>
    </div>

  </div>

<?php include("${homedir}footer.php"); ?>

</body>
</html>
