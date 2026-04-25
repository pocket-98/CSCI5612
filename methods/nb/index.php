<!DOCTYPE html>
<html>
<?php
$homedir = "../../";
include("${homedir}database.php");
log_visitor();
?>
<head>
  <title>csci5612 methods - nb</title>
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
        <h2>Naive Bayes</h2>
      </div>
    </div>

    <div class="row">
      <div class="span12">
        <h3>Overview</h3>
        <p>Naive Bayes is a supervised method for classification. Depending on if the features are binary, counts, categories, or quantitative variables, different styles of Naive Bayes classifiers are used, but they all rely on the same idea of directly estimating probabilities. The idea is that given a test vector and the data set labeled into categories, you should be able to calculate the probability that the test vector belongs to each of the possible categories. This relies on conditional probability, bayes rule for inverting the condition, and the naive assumption that all the variables are non-correlated, hence the name Naive Bayes Classifier.
        </p>
      </div>
    </div>

    <div class="row">
      <div class="span4"></div>
      <div class="span4">
        <img src="bugs.png" title="src: devopedia.org" alt="src: devopedia.org"/>
      </div>
      <div class="span4"></div>
    </div>

    <div class="row">
      <div class="span12">
        <p>In the above diagram, suppose there was a test vector at x = [4,4]. We want to know the probabilities: p<sub>r</sub> = P(red | x) and p<sub>b</sub> = P(blue | x). Intuitively, This point is really close to all the blue points, so we would hope that p<sub>b</sub> > p<sub>r</sub>. Now,
        </p>
        <p>p<sub>b</sub> = P(blue | x) = P(x | blue) * P(blue) / P(x)
        = r * P(x<sub>1</sub>=4, x<sub>2</sub>=4 | blue) * P(blue), for r = 1/P(x)
        </p>
        <p>p<sub>r</sub> = P(red | x) = P(x | red) * P(red) / P(x)
        = r * P(x<sub>1</sub>=4, x<sub>2</sub>=4 | red) * P(red)
        </p>
        <p>Then, using the naive assumption that variables are independent, we can split the joint probability involving x<sub>1</sub> and x<sub>2</sub> into a product of separate probabilites.
        </p>
        <p>p<sub>b</sub> = r * P(x<sub>1</sub>=4, x<sub>2</sub>=4 | blue) * P(blue)
        = r * P(x<sub>1</sub>=4 | blue) * P(x<sub>2</sub>=4 | blue) * P(blue)
        </p>
        <p>p<sub>r</sub> = r * P(x<sub>1</sub>=4, x<sub>2</sub>=4 | red) * P(red)
        = r * P(x<sub>1</sub>=4 | red) * P(x<sub>2</sub>=4 | red) * P(red)
        </p>
        <p>Looking specifically at P(blue), that is just the number of blue points divided by the total number of points, so P(blue) = 28/54.
        </p>
        <p>For P(x<sub>2</sub>=4 | blue), take a look at the histograms on the right of the image and find where the height is 4. That is almost at the center of the blue histogram so the value will be pretty high. This is calculated exactly by using the pdf for a gaussian with mean and standard deviation that is fit to all of the blue points. Compare this to P(x<sub>2</sub>=4 | red). When you look at the height 4 compared to the red histogram, you see it is well into the tail, so the value of the pdf will be very close to 0.
        </p>
        <p>If you imagine histograms at the top of the picture for the blue and red points, you can see that P(x<sub>1</sub>=4 | blue) will be larger than P(x<sub>1</sub>=4 | red), just like in the case with x<sub>2</sub>. Therefore, after multiplying all the probabilities together, you would see that the probability of being blue p<sub>b</sub> > p<sub>r</sub>, as was expected.
        </p>
        <p>This example used quantitative variables and constructing a gaussian probability distribution, so the technique is called Gaussian Naive Bayes Classification. When you instead have categories, you use counts and discrete values for probabilities instead of fitting distributions. This is called Categorical Naive Bayes. To mitigate having 0 occurrences of a condition for small training sets, Laplace smoothing is used by adding 1 to every count and renormalizing the denominator by adding a constant for each probability, guaranteeing every conditional probability is strictly positive. When the features are counts of occurrences such as counting the number of key words in text data, Multinomial Naive Bayes is used. Laplace smoothing is used in this as well. Finally, if the features are just binary values, the Bernoulli Naive Bayes Classifier is used which is a simple case of the Multinomial Naive Bayes Classifier.
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
        <a href="code_nb.py"><p>code_nb.py</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_nb.py", "r");
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
        <a href="code_nb.txt"><p>code_nb.py output</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_nb.txt", "r");
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
        <img src="gnb_conf.png"/>
      </div>
      <div class="span3"></div>
    </div>


  </div>

<?php include("${homedir}footer.php"); ?>

</body>
</html>
