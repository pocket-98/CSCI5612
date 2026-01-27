<!DOCTYPE html>
<html>
<?php
$homedir = "../";
include("${homedir}database.php");
log_visitor();
?>
<head>
  <title>csci5612 notes</title>
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
      <h2>Notes</h2>
      <br/>
      <pre>
## infrastructure
* proxmox hypervisor on a cloud provider vps
* opnsense firewall/router vm on server as gateway
* archlinux vm on server with apache and php and sqlite3
* cloudflare zerotrust tls tunnel for ddos protection and reverse proxy to provide ssl
* website code duplicated on <a href="https://github.com/pocket-98/CSCI5612">github</a>

## web technologies
* raw html, css, and js
* inspired by geocities 90's themed websites
* modern bootstrap css layout with <a href="https://code.divshot.com/geo-bootstrap/">this awesome theme</a>
* php to provide visitor logging to a sqlite file for website counter
* php to make common navbar theme, tabs, and to load code snippets and tables
      </pre>
    </div>
  </div>

<?php include("${homedir}footer.php"); ?>

</body>
</html>
