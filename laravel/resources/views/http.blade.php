<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTTP Configuration</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/http.css">
</head>
<body>
    <div class="container">
        <a href="/" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            <span class="arrow"></span>
        </a>
        <form action="php_save/nginx_save.php" method="POST" enctype="multipart/form-data">
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
