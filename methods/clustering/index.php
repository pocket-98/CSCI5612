<!DOCTYPE html>
<html>
<?php
$homedir = "../../";
include("${homedir}database.php");
log_visitor();
?>
<head>
  <title>csci5612 methods - clustering</title>
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
        <h2>Clustering</h2>
      </div>
    </div>

    <div class="row">
      <div class="span12">
        <h3>Overview</h3>
        <p>Clustering is an unsupervised method so that data must be quantitative and unlabeled to utilize any of these techniques. There is also a need to select a distance metric so that the distance between points in a group can be optimized for. The most well known clustering method is k-means which groups the vectors into groups using k different centroids. The centroids represent the mean value of the group of points which are nearest to that centroid. Hierarchical clustering uses pairwise distance comparisons to form compositions of clusters and either combines them or divides/refines them to form dendograms. DBSCAN is a density based technique that divides a cluster into core samples and nearby samples where the cluster has in common that points are relatively close to some other points in the cluster.
        </p>
      </div>
    </div>

    <div class="row">
      <div class="span12">
        <h3>Data</h3>
        <p>After PCA was performed on the data, over 95% of the variance was retained in the first 3 components, so clustering can be performed on this reduced dimensionality data. Clusters can then be transformed back into original variables using the eigenvectors. The transformed pca data can be found here: <a href="stackoverflow_pca.csv">stackoverflow_pca.csv</a>.</p>
        <a href="code_showcols.py"><p>code_showcols.py</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_showcols.py", "r");
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
        <a href="code_showcols.txt"><p>code_showcols.py output</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_showcols.txt", "r");
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
        <h3>Code</h3>
        <p>First K-Means was performed on the data and the silhouette method was used to compare different values of k.
        </p>
        <a href="code_kmeans.py"><p>code_kmeans.py</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_kmeans.py", "r");
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
        <a href="code_kmeans.txt"><p>code_kmeans.py output</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_kmeans.txt", "r");
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
        <a target="_blank" href="kmeans-k2.png">
          <img src="kmeans-k2.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="kmeans-k3.png">
          <img src="kmeans-k3.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="kmeans-k4.png">
          <img src="kmeans-k4.png"></img>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="span2"></div>
      <div class="span4">
        <br/>
        <a target="_blank" href="kmeans-k5.png">
          <img src="kmeans-k5.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="kmeans-silhouette.png">
          <img src="kmeans-silhouette.png"></img>
        </a>
      </div>
      <div class="span2"></div>
    </div>

    <div class="row">
      <div class="span12">
        <br/>
        <p>Agglomerative Clustering was used to perform a type of hierarchical clustering. The clusters and dendograms can be viewed below. To run on all 67000 rows would have required computing a n^2 distance matrix taking 16GB of memory, so a random sample of 1/20 of the data was used.
        </p>
        <a href="code_hierarchy.py"><p>code_hierarchy.py</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_hierarchy.py", "r");
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
        <a href="code_hierarchy.txt"><p>code_hierarchy.py output</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_hierarchy.txt", "r");
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
        <a target="_blank" href="agglomerative-k2.png">
          <img src="agglomerative-k2.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="agglomerative-k3.png">
          <img src="agglomerative-k3.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="agglomerative-k4.png">
          <img src="agglomerative-k4.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="agglomerative-k5.png">
          <img src="agglomerative-k5.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="agglomerative-dend-k2.png">
          <img src="agglomerative-dend-k2.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="agglomerative-dend-k3.png">
          <img src="agglomerative-dend-k2.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="agglomerative-dend-k4.png">
          <img src="agglomerative-dend-k2.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="agglomerative-dend-k5.png">
          <img src="agglomerative-dend-k5.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="agglomerative-silhouette.png">
          <img src="agglomerative-silhouette.png"></img>
        </a>
      </div>
    </div>


    <div class="row">
      <div class="span12">
        <br/>
        <p>DBSCAN was performed on the 3D PCA data using a random sample of 1/20 of the rows as well.
        </p>
        <a href="code_dbscan.py"><p>code_dbscan.py</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_dbscan.py", "r");
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
        <a href="code_dbscan.txt"><p>code_dbscan.py output</p></a>
<pre class="line-numbers">
<?php
$f = @fopen("code_dbscan.txt", "r");
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
        <a target="_blank" href="dbscan-eps0.600.png">
          <img src="dbscan-eps0.600.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="dbscan-eps0.500.png">
          <img src="dbscan-eps0.500.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="dbscan-eps0.400.png">
          <img src="dbscan-eps0.400.png"></img>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="span2"></div>
      <div class="span4">
        <br/>
        <a target="_blank" href="dbscan-eps0.300.png">
          <img src="dbscan-eps0.300.png"></img>
        </a>
      </div>
      <div class="span4">
        <br/>
        <a target="_blank" href="dbscan-silhouette.png">
          <img src="dbscan-silhouette.png"></img>
        </a>
      </div>
      <div class="span2"></div>
    </div>

    <div class="row">
      <div class="span12">
        <h3>Results</h3>
        <p>KMeans was ineffective where upon repeated runs, the centroids would appear to just randomly divide the mass of points into separate divisions inconsistently. Similarly for the agglomerative clustering, with different random samples of points, entirely different clusters would form. The dendogram is consistently generated so any number of labels or clusters can be chosen once the algorithm is run. It also had the limitation of not being able to be run on the entire dataset but only on a smaller subset. The plots for DBSCAN show that varying epsilon is ineffective at finding different clusters and majority of the points always seem to end up in the same label due to the high concentration and relatively convex shape of the point cloud.
        </p>
      </div>
    </div>

  </div>

<?php include("${homedir}footer.php"); ?>

</body>
</html>
