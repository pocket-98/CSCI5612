<!DOCTYPE html>
<html>
<?php
$homedir = "../";
include("${homedir}database.php");
log_visitor();
?>
<head>
  <title>csci5612 data prep</title>
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
        <h2>Data Preparation and Exploratory Data Analysis</h2>
      </div>
    </div>
    <div class="row">
      <div class="span12">
        <br/>
        <h3>Data Sets</h3>
        <br/>
        <a href="https://www.kaggle.com/datasets/arshkon/linkedin-job-postings"><p>https://www.kaggle.com/datasets/arshkon/linkedin-job-postings</p></a>
        <ul>
          <li>500mb, 100k rows</li>
          <li>scraped job postings from linkedin from 2023-2024</li>
          <li>columns: company_name, company_employee_count, company_follower_count, title, description, max_salary, location, views</li>
        </ul>
        <br/>
        <a href="https://www.kaggle.com/datasets/ayushtankha/70k-job-applicants-data-human-resource"><p>https://www.kaggle.com/datasets/ayushtankha/70k-job-applicants-data-human-resource</p></a>
        <ul>
          <li>13mb, 70k rows</li>
          <li>stackoverflow survey results from developer job applicants from 2023</li>
          <li>columns: age, gender, ed_level, years_code_pro, prev_salary, employed</li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="span12">
        <br/>
        <h3>Obtaining the Data</h3>
        <br/>
        <a href="code_get.py"><p>code_get.py</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_get.py", "r");
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
        <a href="code_get.txt"><p>code_get.py output</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_get.txt", "r");
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
        <br/>
        <a target="_blank" href="raw_data.png">
          <img src="raw_data.png"></img>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="span12">
        <br/>
        <h3>Exploring the Data</h3>
        <br/>
        <a href="code_raw_vis.py"><p>code_raw_vis.py</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_raw_vis.py", "r");
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
        <a target="_blank" href="raw_bar_age.png">
          <img src="raw_bar_age.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="raw_bar_gender.png">
          <img src="raw_bar_gender.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="raw_bar_dev.png">
          <img src="raw_bar_dev.png"></img>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="span4">
        <br/>
        <a target="_blank" href="raw_hist_years_coding.png">
          <img src="raw_hist_years_coding.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="raw_hist_years_coding_pro.png">
          <img src="raw_hist_years_coding_pro.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="raw_hist_skills.png">
          <img src="raw_hist_skills.png"></img>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="span4">
        <br/>
        <a target="_blank" href="raw_hist_salary.png">
          <img src="raw_hist_salary.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="raw_scatter_experience_salary.png">
          <img src="raw_scatter_experience_salary.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="raw_scatter_skill_salary.png">
          <img src="raw_scatter_skill_salary.png"></img>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="span4"></div>
      <div class="span4">
        <br/>
        <a target="_blank" href="raw_plot_experience_median_salary.png">
          <img src="raw_plot_experience_median_salary.png"></img>
        </a>
      </div>
      <div class="span4"></div>
    </div>

    <div class="row">
      <div class="span12">
        <br/>
        <h4>Comments:</h4>
        <br/>
        <p>The age of participants is well balanced between the 2 categories of younger and older than 35. The ratio of men vs other genders present in the survey is vast. Majority (92%)  of the respondents considered themselves professional developers. There is a clear visible shift in the distributions when looking at the general years of experience coding vs professional years of experience indicating most people started coding before they became professional. There seems to be a wide range in the number of computer skills a person may list but the salary ranges are completely spanned from the low end to the very top end regardless of whether no or very few computer skills were listed or not. The scatter plot of pro years experience show that above 40 years is very rare which is further indicated by the drop in the plot of median salaries after 40 years of experience.</p>
      </div>
    </div>

    <div class="row">
      <div class="span12">
        <br/>
        <h3>Cleaning the Data</h3>
        <br/>
        <a href="code_clean.py"><p>code_clean.py</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_clean.py", "r");
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
        <a href="code_clean.txt"><p>code_clean.py output</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_clean.txt", "r");
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
        <br/>
        <a target="_blank" href="clean_data.png">
          <img src="clean_data.png"></img>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="span12">
        <br/>
        <h3>Visuals of the Cleaned Data</h3>
        <br/>
        <a href="code_new_vis.py"><p>code_new_vis.py</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_new_vis.py", "r");
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
        <a target="_blank" href="new_bar_age.png">
          <img src="new_bar_age.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="new_bar_gender.png">
          <img src="new_bar_gender.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="new_bar_dev.png">
          <img src="new_bar_dev.png"></img>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="span4">
        <br/>
        <a target="_blank" href="new_hist_years_coding.png">
          <img src="new_hist_years_coding.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="new_hist_years_coding_pro.png">
          <img src="new_hist_years_coding_pro.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="new_hist_skills.png">
          <img src="new_hist_skills.png"></img>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="span4">
        <br/>
        <a target="_blank" href="new_hist_salary.png">
          <img src="new_hist_salary.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="new_scatter_experience_salary.png">
          <img src="new_scatter_experience_salary.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="new_scatter_skill_salary.png">
          <img src="new_scatter_skill_salary.png"></img>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="span4"></div>
      <div class="span4">
        <br/>
        <a target="_blank" href="new_plot_experience_median_salary.png">
          <img src="new_plot_experience_median_salary.png"></img>
        </a>
      </div>
      <div class="span4"></div>
    </div>

  </div>

<?php include("${homedir}footer.php"); ?>

</body>
</html>
