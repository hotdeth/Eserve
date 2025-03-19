<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $port = $_POST['port'] ?? '';
    $index = $_POST['index'] ?? '';
    $serverName = $_POST['server_name'] ?? '';
    $rootDir = $_POST['root_dir'] ?? '';

    if (empty($port) || empty($index) || empty($serverName) || empty($rootDir)) {
        echo "All fields are required!";
        exit;
    }

    $nginxConfig = "
server {
listen $port;
root $rootDir/$serverName;
index $index;
server_name $serverName;
}
";


$nginx_path = '/etc/nginx/sites-available/'.$serverName.'';


    if (file_put_contents($nginx_path, $nginxConfig)) {
      echo "Configuration saved successfully!\n";
      $hey = shell_exec("ln -s /etc/nginx/sites-available/$serverName /etc/nginx/sites-enabled/");
      $reload = shell_exec("sudo systemctl reload -q  nginx.service   &&  echo $?");
      echo $reload;
   
      if ($reload == '0'){
        $mystat = fopen("./nginx_state.txt" , 'w') or die("Enable");
        $dhstat = "running";
        fwrite($mystat , $dhstat);
        fclose($mystat);
    }else{
        $mystat = fopen("./nginx_state.txt" , 'w') or die("Enable");
        $dhstat = "not-running";
        fwrite($mystat , $dhstat);
        fclose($mystat);
    }
}

   

    if (isset($_FILES['folder-upload'])) {
        $uploadDir = './'.$serverName.'/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $uploadedFiles = $_FILES['folder-upload'];

        foreach ($uploadedFiles['name'] as $index => $fileName) {
            $fileTmpPath = $uploadedFiles['tmp_name'][$index];
            $filePath = $uploadDir . basename($fileName);

            if (move_uploaded_file($fileTmpPath, $filePath)) {
                echo "Files uploaded successfully\n";
               $stat_var = 1;
            } else {
                echo "Error uploading files\n";
            }
    
        }
        
    if($stat_var == 1){
        $mvF = shell_exec("cp -r ./$serverName /var/www/");
        $reload = shell_exec("sudo systemctl reload -q  nginx.service   &&  echo $?");
        if ($reload == '0'){
            $mystat = fopen("./nginx_state.txt" , 'w') or die("Enable");
            $dhstat = "running";
            fwrite($mystat , $dhstat);
            fclose($mystat);
        }else{
            $mystat = fopen("./nginx_state.txt" , 'w') or die("Enable");
            $dhstat = "not-running";
            fwrite($mystat , $dhstat);
            fclose($mystat);
        }
    
    }
    }
} else {
    echo "Invalid request method!";
}
?>