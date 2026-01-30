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
  <meta name="author" content="pocket"/>
</head>
<body class="preview" data-spy="scroll" data-target=".subnav" data-offset="80">

<?php include("${homedir}navbar.php"); ?>

<br/><br/><br/>

  <div class="container">
    <div class="row">
      <div class="span12">
        <h2>Data Prep</h2>
      </div>
    </div>
    <div class="row">
      <div class="span12">
        <a href="https://www.kaggle.com/datasets/arshkon/linkedin-job-postings"><p>https://www.kaggle.com/datasets/arshkon/linkedin-job-postings</p></a>
        <ul>
          <li>500mb, 100k rows</li>
          <li>scraped job postings from linkedin from 2023-2024</li>
          <li>columns: company_name, title, description, max_salary, location, views</li>
        </ul>
        <a href="https://www.kaggle.com/datasets/ayushtankha/70k-job-applicants-data-human-resource"><p>https://www.kaggle.com/datasets/ayushtankha/70k-job-applicants-data-human-resource</p></a>
        <ul>
          <li>13mb, 70k rows</li>
          <li>stackoverflow survey results from developer job applicants from 2023</li>
          <li>columns: age, gender, ed_level, years_code_pro, prev_salary, employed</li>
        </ul>
      </div>
    </div>
  </div>

<?php include("${homedir}footer.php"); ?>

</body>
</html>
