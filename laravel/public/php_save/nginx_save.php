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


$nginx_path = './'.$serverName.'.conf';


    if (file_put_contents($nginx_path, $nginxConfig)) {
      echo "Configuration saved successfully!\n";
      
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
            } else {
                echo "Error uploading files\n";
            }
        }
        
    }
} else {
    echo "Invalid request method!";
}
?>
