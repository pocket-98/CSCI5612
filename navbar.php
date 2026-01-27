<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse" aria-controls="nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="<?php echo("$homedir"); ?>">Home</a>
      <div class="collapse nav-collapse">
        <ul class="nav">
          <li><a href="<?php echo("$homedir"); ?>intro/"><img src="<?php echo("$homedir"); ?>img/new.gif"/>Intro</a></li>
          <li><a href="<?php echo("$homedir"); ?>dataprep/">Data Prep</a></li>
          <li class="dropdown">
            <a href="<?php echo("$homedir"); ?>methods/" class="dropdown-toggle" data-toggle="dropdown">Models/Methods <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo("$homedir"); ?>methods/pca/">Principal Component Analysis</a></li>
              <li><a href="<?php echo("$homedir"); ?>methods/clustering/">Clustering</a></li>
              <li><a href="<?php echo("$homedir"); ?>methods/arm/">Association Rule Mining</a></li>
              <li><a href="<?php echo("$homedir"); ?>methods/dt/">Decision Tree</a></li>
              <li><a href="<?php echo("$homedir"); ?>methods/nb/">Naive Bayes</a></li>
              <li><a href="<?php echo("$homedir"); ?>methods/svm/">Support Vector Machine</a></li>
              <li><a href="<?php echo("$homedir"); ?>methods/regression/">Regression</a></li>
            </ul>
          </li>
          <li><a href="<?php echo("$homedir"); ?>conclusion/">Conclusion</a></li>
          <li><a href="<?php echo("$homedir"); ?>notes/">Notes</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
