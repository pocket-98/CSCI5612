<!DOCTYPE html>
<html>
<?php
$homedir = "../";
include("${homedir}database.php");
log_visitor();
?>
<head>
  <title>csci5612 intro</title>
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
        <h2>Intro</h2>
      </div>
    </div>
    <div class="row">
      <div class="span4"></div>
      <div class="span4">
        <img src="<?php echo("$homedir"); ?>img/jobs.png"></img>
        <br/>
        <h1 style="text-align: center">Jobs</h1>
        <br/>
      </div>
      <div class="span4"></div>
    </div>
    <div class="row">
      <div class="span12">
        <p>The job market is constantly changing as trends come and go. Salary ranges change, the desired level of experience required fluctuates, and the availability of entry-level vs senior roles varies. In recent years, <a href="https://web.archive.org/web/20251118131916/https://www.forbes.com/sites/carolinecastrillon/2025/11/18/youre-not-bad-at-job-hunting-30-of-job-postings-are-fake/">it has been reported that between 30-40% of job postings are for "ghost jobs"</a> that distorts the view of the labor market and perpetuates a false sense of growth. The use of LLMs has and job applicant HR tracking systems has increased and automation for filtering candidates has become the norm. This has lead to changes in the job applicants and how people portray themselves and apply.
        </p>
      </div>
    </div>

    <div class="row">
      <div class="span12">
        <br/>
        <br/>
        <h3>Research Questions</h3>
        <ul>
          <li>What is your name?</li>
          <li>What is your quest?</li>
        </ul>
      </div>
    </div>
  </div>

<?php include("${homedir}footer.php"); ?>

</body>
</html>
