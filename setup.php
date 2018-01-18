<?php
$this_file = "setup.php";
$config_file = "config.php";
$version = 0;
if (!file_exists($config_file)) {
if (isset($_POST["server"])) {
    $server = $_POST['server'];
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $db = $_POST['database'];

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
    print <<<HTML
<form method="POST" action="#">
    <p>Server<br>
    <input type="text" name="server" value="localhost"/></p>
    <p>Username<br>
    <input type="text" name="username" value=""/></p>
    <p>Password<br>
    <input type="password" name="password" value=""/></p>
    <p>Database<br>
    <input type="text" name="database"/></p>
    <p><input type="submit" value="Save" /></p>
</form>
HTML;
}

    
} else {
    upgrade($config_file);
}

function writeToFile($file, $data,$row) {
    $fp = fopen($file, "w") or die("Unable to save config file, see row $row");
    fwrite($fp, $data);
    fclose($fp);

}

function createNewConfig($file) {

}

function upgrade($config_file) {
    include $config_file;
    include "libs/database.php";
    $config = new Config();
    $database = new Database();
        
    switch ($config->version) {
        case 0:
            e("Making sure database connection is viable...");
            if ($database->connect($config)) {
                e("Connection successfull!");
            } else {
                e("Could not establish connection, please remove the config file and redo this again");
                return;
            }   
        case 0.1:
            
            e("Done!");
        break;
        default:
        e("Illegal version number v$version. Something is strange!");
    }
    

}

function e($string) {
    echo "<p>$string</p>\n";
}
?>