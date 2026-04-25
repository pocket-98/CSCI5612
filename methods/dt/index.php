<!DOCTYPE html>
<html>
<?php
$homedir = "../../";
include("${homedir}database.php");
log_visitor();
?>
<head>
  <title>csci5612 methods - dt</title>
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
        <h2>Decision Trees</h2>
      </div>
    </div>

    <div class="row">
      <div class="span12">
        <h3>Overview</h3>
        <p>Decision Trees are a supervised machine learning method that can work with both categorical and quantitative features. Despite being made up of a compination of linear separations, decision trees are capable of classifying even when the high dimensional vectors are not linearly separable.
        </p>
      </div>
    </div>

    <div class="row">
      <div class="span4"></div>
      <div class="span4">
        <img src="dt_boundaries.png" title="src: Prof. Ami Gates exam question" alt="src: Prof. Ami Gates exam question"/>
      </div>
      <div class="span4"></div>
    </div>

    <div class="row">
      <div class="span12">
        <p>In the above diagram, you can see that the <b><i>x</i></b> and <b><i>o</i></b> points cannot be separated using a single line, but by using a combination of simple divisions, it is possible to separate the 2 classes. The tree on the right side provides a sequence of decisions made up of simple true/false questions that provide a path through the tree ending with a final classification.
        </p>
      </div>
    </div>

    <div class="row">
      <div class="span4"></div>
      <div class="span4">
        <img src="lower_entropy.png" title="src: Stathis Kamperis" alt="src: Stathis Kamperis"/>
      </div>
      <div class="span4"></div>
    </div>

    <div class="row">
      <div class="span12">
        <p>The way the tree and the corresponding decisions are constructed is using the idea of entropy. You may recall that the laws of thermodynamics state that the universe is a hot mess. The mess part is the thing to focus on: that the macrostates with the most corresponding microstates are the most likely states to occur. Things that are organized have low entropy and things that are all mixed together and random-looking have high entropy. The mathematical definition of this is entropy, <i>S = k<sub>B</sub> log &#x03A9;</i>, where <i>&#x03A9;</i> is the number of combinations possible for a state. It is defined this way because when you combine 2 arrangements of things, the number of combinations multiply but in the world of entropy, we want combining 2 systems to result in addition: <i>S = S<sub>1</sub> + S<sub>2</sub></i> and <i>&#x03A9; = &#x03A9;<sub>1</sub> * &#x03A9;<sub>2</sub></i>. Naively, if you think of the number of ways to arrange <i>n</i> books on a shelf, <i>&#x03A9; = n!</i>. Then using Sterling's approximation you get <i>S = k<sub>B</sub> log &#x03A9; = k<sub>B</sub> log(n!) &#x2248; k<sub>B</sub> n log n</i>.
        </p>
        <p>This is roughly where the Shannon entropy of <i>S = - &#x2211;<sub>j</sub> p<sub>j</sub> log p<sub>j</sub></i> comes from when you have probabilities <i>p<sub>j</sub></i> instead of counts. With the book analogy, this is like saying if you have 10 of the same book laid out on a shelf, all arrangements are identical and, you have a very low entropy of <i>S = - 1 log(1) = 0</i>. If instead you have 10 different books, there are 10! arrangements and the Shannon entropy ends up becoming <i>S = -10 * 1/10 * log(1/10) = log(10)</i> which is larger than <i>0</i>.
        </p>
        <p>In the diagram above, you can see that the decision tree splits the blue dots and orange stars almost perfectly into 2 separate classes in the children. Therefore, the total entropy of the child nodes is much lower than the entropy of the root node. This is formalized using the <i>Information Gain</i> by comparing the entropy of the root to the children. The decision tree algorithm works by essentially trying out a bunch of rules and decisions and seeing which one leads to the largest information gain-which is related to the decision that lowers the entropy the most. Because the decision can occur for any possible real number for a quantitative variable, that means there are an infinite number of possible decision trees. There is also a variation that is much more commonly used where instead of using the Shannon entropy, GINI is used instead with <i>S = 1 - &#x2211;<sub>j</sub> p<sub>j</sub> * p<sub>j</sub></i>.
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
        <a href="code_dt.py"><p>code_dt.py</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_dt.py", "r");
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
        <a href="code_dt.txt"><p>code_dt.py output</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_dt.txt", "r");
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
      <div class="span6">
        <img src="dt.png"/>
      </div>
      <div class="span6">
        <img src="dt_conf.png"/>
      </div>
    </div>

  </div>

<?php include("${homedir}footer.php"); ?>

</body>
</html>
