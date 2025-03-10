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
        <div class="settings-card">
            <h2>HTTP Configuration Settings</h2>
            <div class="input-group">
                <div>
                    <label>Port (80 - 1600)</label>
                    <input type="number" min="80" max="1600" placeholder="Enter port">
                </div>
                <div>
                    <label>Index</label>
                    <input type="text" placeholder="Index file">
                </div>
            </div>
            <div class="input-group">
                <div>
                    <label>Server Name</label>
                    <input type="text" placeholder="Server name">
                </div>
                <div>
                    <label>Directory (Root)</label>
                    <input type="text" placeholder="Root directory">
                </div>
            </div>
            <div class="buttons">
                <label for="folder-upload" class="upload-btn">Upload Folder</label>
                <input type="file" id="folder-upload" hidden webkitdirectory multiple>
                <button class="save-btn">Save Changes</button>
            </div>
        </div>
    </div>
</body>
</html>


