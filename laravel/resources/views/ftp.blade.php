<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ftp.css">
    <title>FTP Configuration</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
    body{
      background-image: url('plugins/FTP.jpg');
      background-size: cover;
      background-attachment: fixed;
    }
    .message {
        padding: 15px;
        margin: 20px 0;
        border-radius: 5px;
        text-align: center;
    }
    .success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    .error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
  </style>
</head>
<body>
    <a href="/">
        <button class="back-button">
            <span class="arrow"></span>
        </button>
    </a>
    <?php
    if (isset($_GET['message'])) {
        $type = $_GET['type'] ?? 'info';
        echo '<div class="message '.htmlspecialchars($type).'">'.htmlspecialchars($_GET['message']).'</div>';
    }
    ?>

    

    <div class="container">
        <header class="header">
            <h2>FTP Configuration Settings</h2>
        </header>

        <form action="php_save/ftp_save.php" method="POST">
            <div class="form-section">
                <div class="form-group">
                    <label for="anonymous">Anonymous Access</label>
                    <select id="anonymous" name="anonymous_enable">
                        <option value="NO">Select an option</option>
                        <option value="YES">Yes</option>
                        <option value="NO">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="local_enable">Local Enable</label>
                    <select id="local_enable" name="local_enable">
                        <option value="NO">Select an option</option>
                        <option value="YES">Yes</option>
                        <option value="NO">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="write_enable">Write Enable</label>
                    <select id="write_enable" name="write_enable">
                        <option value="NO">Select an option</option>
                        <option value="YES">Yes</option>
                        <option value="NO">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="local_umask">Local Umask</label>
                    <select id="local_umask" name="local_umask">
                        <option value="022">Select an option</option>
                        <option value="022">022</option>
                        <option value="077">077</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="dirmessage_enable">Directory Message Enable</label>
                    <select id="dirmessage_enable" name="dirmessage_enable">
                        <option value="NO">Select an option</option>
                        <option value="YES">Yes</option>
                        <option value="NO">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="xferlog_enable">Xferlog Enable</label>
                    <select id="xferlog_enable" name="xferlog_enable">
                        <option value="NO">Select an option</option>
                        <option value="YES">Yes</option>
                        <option value="NO">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="connect_from_port_20">Connect from Port 20</label>
                    <select id="connect_from_port_20" name="connect_from_port_20">
                        <option value="NO">Select an option</option>
                        <option value="YES">Yes</option>
                        <option value="NO">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="xferlog_std_format">Xferlog Standard Format</label>
                    <select id="xferlog_std_format" name="xferlog_std_format">
                        <option value="NO">Select an option</option>
                        <option value="YES">Yes</option>
                        <option value="NO">No</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="listen">listen</label>
                    <select id="listen" name="listen">
                        <option value="NO">Select an option</option>
                        <option value="YES">Yes</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="listen_ipv6">Listen IPv6</label>
                    <select id="listen_ipv6" name="listen_ipv6">
                        <option value="NO">Select an option</option>
                        <option value="YES">Yes</option>
                        <option value="NO">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="userlist_enable">Userlist Enable</label>
                    <select id="userlist_enable" name="userlist_enable">
                        <option value="NO">Select an option</option>
                        <option value="YES">Yes</option>
                        <option value="NO">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="pam_service_name">PAM Service Name</label>
                    <input type="text" id="pam_service_name" name="pam_service_name" 
                           placeholder="Enter service name"
                           value="<?= isset($_POST['pam_service_name']) ? htmlspecialchars($_POST['pam_service_name']) : '' ?>">
                </div>
            </div>

            <div class="form-footer">
                <button type="submit" class="save-button">Save Changes</button>
            </div>
        </form>
    </div>
</body>
</html>