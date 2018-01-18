<?php
$this_file = "setup.php";
$config_file = "config.php";
$version = 0.1;
if (!file_exists($config_file)) {
    $server = "localhost";
    $user = "dndsek";
    $pass = "tiamat";
    $db = "dndsek";

    $config_file_data = <<<PHP
<?php
class Config {
    public \$version = "$version";
    public \$database_server = "$server";
    public \$database_user = "$user";
    public \$database_password = "$pass";
    public \$database_db = "$db";
}
?>
PHP;
    writeToFile($config_file,$config_file_data,__LINE__);

    header("Location: ./$this_file");
} else {
    include $config_file;
    $config = new Config();
    
    if ($config->version < $version) {
        $link = "./$this_file?update";
        echo "<p>Using an old config, <a href=\"$link\">update</a>?</p>\n";
        echo "<p>Config version v$config->version, newest version v$version</p>\n";
    }
}



function writeToFile($file, $data,$row) {
    $fp = fopen($file, "w") or die("Unable to save config file, see row $row");
    fwrite($fp, $data);
    fclose($fp);

}


?>