<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTTP Configuration Settings</title>
    <link rel="stylesheet" href="css/http.css">

</head>
<body>
    <a href="/">
        <button class="back-btn">
        <span class="arrow"></span>
        </button>
    </a>
    
    <div class="settings-box">
        <h2>HTTP Configuration Settings</h2>
        
        <div class="form-row">
            <div class="form-group">
                <label for="port">Port (80 - 1600)</label>
                <input type="number" id="port" min="80" max="1600" oninput="validatePort(this)">
            </div>
            <div class="form-group">
                <label for="index">Index</label>
                <input type="text" id="index">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="server">Server Name</label>
                <input type="text" id="server">
            </div>
            <div class="form-group">
                <label for="directory">Directory (Root)</label>
                <input type="text" id="directory">
            </div>
        </div>

        <div class="buttons">
            <label for="file-upload" class="upload-btn">
            Upload File 
            <img src="/plugins/image1.png" ></label>
            <input type="file" id="file-upload" hidden>
            
            <button class="save-btn">Save Changes</button>
        </div>
    </div>

    <script>
        function validatePort(input) {
            if (input.value < 80) input.value = 80;
            if (input.value > 1600) input.value = 1600;
        }
    </script>
</body>
</html>
