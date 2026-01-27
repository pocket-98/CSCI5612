<?php
$visitor_file = "${homedir}visitors.sqlite.db";

function check_db_setup() {
    global $visitor_file;
    $db = new SQLite3($visitor_file);
    $res = $db->query("select name from sqlite_master where type='table' and name='visitors';");
    $row = $res->fetchArray(SQLITE3_ASSOC);
    if (!$row) {
        $db->exec("create table visitors(id integer primary key, time integer, ip text, useragent text);");
    }
    $db->close();
}

function log_visitor() {
    # get client ip address
    global $_SERVER;
    $ip = "0.0.0.0";
    if (isset($_SERVER['HTTP_CF_CONNECTING_IP']) && $_SERVER['HTTP_CF_CONNECTING_IP'] != '') {
	    $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != '') {
	    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] != '') {
	    $ip = $_SERVER['REMOTE_ADDR'];
    }
    if (($CommaPos = strpos($ip, ',')) > 0) {
	    $ip = substr($ip, 0, ($CommaPos - 1));
    }

    $ua = $_SERVER['HTTP_USER_AGENT'];
    $ua = filter_var($ua, FILTER_SANITIZE_STRING);
    $ua = preg_replace('/[\'";]/', '', $ua);

    # insert visitor to visitors db
    global $visitor_file;
    check_db_setup();
    $db = new SQLite3($visitor_file);
    $db->exec("insert into visitors(time, ip, useragent) values (unixepoch(), '$ip', '$ua');");
    $db->close();
}

function get_visitor_count() {
    global $visitor_file;
    check_db_setup();
    $db = new SQLite3($visitor_file);
    $res = $db->query("select count(id) from visitors;");
    $row = $res->fetchArray(SQLITE3_ASSOC);
    $count = $row["count(id)"];
    $db->close();
    return $count;
}
?>
