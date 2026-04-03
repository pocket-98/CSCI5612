<!DOCTYPE html>
<html>
<?php
$homedir = "../../";
include("${homedir}database.php");
log_visitor();
?>
<head>
  <title>csci5612 methods - arm</title>
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
        <h2>Association Rule Mining</h2>
      </div>
    </div>

    <div class="row">
      <div class="span12">
        <h3>Overview</h3>
        <p>Association Rule Mining (ARM) is a technique that find association rules between events in transactional data. A common example of this is looking at baskets of foods as transactions and seeing the associations between common food items, impying that if one item is in a basket, it is likely that another item is also in the basket. This technique uses sets and probability to find associations of interest with metrics like support, confidence, and lift. Support is, for a given rule, just the probability of finding all the events of that rule in a single transaction. For A, B &#8834; Basket, and the rule A &#x2192; B, support = &#x2119; (A &#8746; B). Confidence is the conditional probability of B given A, confidence = &#x2119; (B | A) = &#x2119; (A &#8746; B) / &#x2119; (A). Finally, the lift is a measure of the correlation where lift = &#x2119; (A &#8746; B) / (&#x2119; (A) * &#x2119; (B)). A lift of 1.0 means the events are independent and a lift higher than 1 indicates correlation and this a good association rule. The apriori algorithm first measures the support of a bunch of subsets by counting the occurrences and assuming that a superset will be less probable than a smaller set. Then after a table of events and supports is made, the association rules can be found by calculating the various metrics.
        </p>
      </div>
    </div>

    <div class="row">
      <div class="span12">
        <h3>Data</h3>
        <p>The <b>HaveWorkedWith</b> column in the original dataset contains transactions where each event is a possible language or skill separated by semicolons. This can be removed and separately processed to create association rules.</p>
        <a href="code_transactions.py"><p>code_transactions.py</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_transactions.py", "r");
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
        <a href="code_transactions.txt"><p>code_transactions.py output</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_transactions.txt", "r");
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
        <p>The prepared transaction data of all listed stackoverflow skills can be found here: <a href="stackoverflow_skills.csv">stackoverflow_skills.csv</a>.</p>
      </div>
    </div>

    <div class="row">
      <div class="span12">
        <h3>Code</h3>
        <a href="code_arm.py"><p>code_arm.py</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_arm.py", "r");
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
        <a href="code_arm.txt"><p>code_arm.py output</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_arm.txt", "r");
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
      <div class="span4"></div>
      <div class="span4">
        <br/>
        <a target="_blank" href="lift_heatmap.png">
          <img src="lift_heatmap.png"></img>
        </a>
      </div>
      <div class="span4"></div>
    </div>

    <div class="row">
      <div class="span12">
        <h3>Results</h3>
        <p>Javascript was the highest supported skill with 67% of all survey results containing that skill. Therefore it makes sense that All of the top 15 confidence rules all had Javascript as the right-hand-side or skill predicted if other skills were present. Intuitively, one would hope that knowing Node.js or React.js or jQuery would mean having Javascript as a skill, so this fits the narrative. The lift normalizes according to the support of the right-hand-side and is a better metric for if an association rule has value. The highest lift was 1.77 that knowing Node.js implied knowing both Typescript and Javascript. Because of the symmetry of the formula for lift, the arrow direction can be swapped and have the same lift for 2 events. In looking at the lift heatmap, it is interesting to see that there was a rule almost across all of the top skills where one side of the association rule was HTML/CSS+Javascript, the foundational web technologies and this had little to know correlation with things like knowing AWS, Docker, and Git, but did have a high correlation with SQL, and diferent JS technologies.
        </p>
      </div>
    </div>

  </div>

<?php include("${homedir}footer.php"); ?>

</body>
</html>
