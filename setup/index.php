<?php
$this_file = "";
$config_file = "../libs/config.php";

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
    include "../libs/database.php";
    $config = new Config();
    $database = new Database();
        
    switch ($config->version) {
        case 0:
            echo "<p>\n";
            h(0);
            e("Making sure database connection is viable...");
            if ($database->connect($config)) {
                e("Connection successfull!");
            } else {
                e("Could not establish connection, please remove the config file and redo this again");
                return;
            }   
            echo "</p>\n";
        case 0.1:
            echo "<p>\n";
            h("0.1");
            e("Checking database as defined in config");
            $sql = "SHOW DATABASES like \"$config->database_db\";";
            $result = $database->query($sql);
            if (!mysqli_num_rows($result)) {
                e("Database not found, creating database...");
                $sql = "CREATE DATABASE $config->database_db";
                $database->query($sql);
                e("Database created!");
            } else {
                e("Database exists!");
            }

            e("Checking tables!");
            $databases = array("data","users");
            $i = 1;
            $c = count($databases);
            foreach ($databases as $db_file) {
                e("Table $i/$c");
                $i++;
                $sql = "SHOW TABLES FROM $config->database_db LIKE \"$db_file\"";
                $result = $database->query($sql);               
                if (mysqli_num_rows($result)) {
                    e("Already exists");
                } else {
                    e("Creating...");
                    sql($db_file,$database);
                    e("Created.");
                }
              
            }
            echo "</p>\n";
            
        case "0.2":
            h("0.2");


            e("Done!");
        break;

        default:
            e("Illegal version number v$version. Something is strange!");
            return;
    }
    
    $config->version = "0.2";
        
    $config_file_data = <<<PHP
    <?php
    class Config {
        public \$version = "$config->version";
        public \$database_server = "$config->database_server";
        public \$database_user = "$config->database_user";
        public \$database_password = "$config->database_password";
        public \$database_db = "$config->database_db";
    }
    ?>
PHP;

    writeToFile($config_file,$config_file_data,__LINE__);

    return;

}

function e($string) {
    echo "$string<br />\n";
}

function h($string) {
    echo "<b>Version $string</b><br />\n";    
}

function sql($file,$database) {
    $file_full = $file . ".sql";
    $fp = fopen($file_full, "r") or die("Unable to load database file");
    $sql = fread($fp,filesize($file_full));
    fclose($fp);

    $sql = explode(";",$sql);
    for ($i = 0; $i < count($sql); $i++) {
        $query = trim($sql[$i]);
        if (strlen($query) < 5)
            continue;
        $database->query($query);
    }
    

    

}
?>