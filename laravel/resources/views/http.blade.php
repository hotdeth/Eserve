<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="30">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTTP Configuration</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/http.css">
</head>

<?php
$number_of_request = shell_exec("cat /var/log/nginx/access.log | wc -l")
?>
<body>
        <a href="/">
            <button class="back-button">
                <span class="arrow"></span>
            </button>
        </a>
    <div class="container">

        <div class="sidebar">
            <h3>Available Servers</h3>
            <ul>
                <?php
                $files = [];
                $directory = '/etc/nginx/sites-available/';
                if (is_dir($directory)) {
                    $files = array_diff(scandir($directory), array('..', '.'));
                }

                foreach ($files as $file) {
                    echo "<li>{$file}</li>";
                }
                ?>
            </ul>
        </div>

    
        

        <form action="php_save/nginx_save.php" method="POST" enctype="multipart/form-data">
        <p class="request">
    Total reqeusts:
        {{ $number_of_request }}
   </p>
            <div class="settings-card">
                <h2>HTTP Configuration Settings</h2>
                <div class="input-group">
                    <div>
                        <label>Port (80 - 1600)</label>
                        <input type="number" name="port" min="80" max="1600" placeholder="Enter port" required>
                    </div>
                    <div>
                        <label>Index</label>
                        <input type="text" name="index" placeholder="Index file" required>
                    </div>
                </div>
                <div class="input-group">
                    <div>
                        <label>Server Name</label>
                        <input type="text" name="server_name" placeholder="Server name" required>
                    </div>
                    <div>
                        <label>Directory (Root)</label>
                        <input type="text" name="root_dir" placeholder="Root directory" required>
                    </div>
                </div>
                <div class="buttons">
                    <label for="folder-upload" class="upload-btn">Upload Folder</label>
                    <input type="file" id="folder-upload" name="folder-upload[]" hidden webkitdirectory multiple>
                    <button type="submit" class="save-btn">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
