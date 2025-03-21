<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $config = [
        'anonymous_enable' => $_POST['anonymous_enable'] ?? 'NO',
        'local_enable' => $_POST['local_enable'] ?? 'NO',
        'write_enable' => $_POST['write_enable'] ?? 'NO',
        'local_umask' => isset($_POST['local_umask']) && in_array($_POST['local_umask'], ['022', '077']) ? $_POST['local_umask'] : '022',
        'dirmessage_enable' => $_POST['dirmessage_enable'] ?? 'NO',
        'xferlog_enable' => $_POST['xferlog_enable'] ?? 'NO',
        'connect_from_port_20' => $_POST['connect_from_port_20'] ?? 'NO',
        'xferlog_std_format' => $_POST['xferlog_std_format'] ?? 'NO',
        'listen' => $_POST['listen'] ?? 'NO',
        'listen_ipv6' => $_POST['listen_ipv6'] ?? 'NO',
        'userlist_enable' => $_POST['userlist_enable'] ?? 'NO',
        'pam_service_name' => filter_var($_POST['pam_service_name'] ?? 'vsftpd', FILTER_SANITIZE_STRING)
    ];

    $configContent = "# vsftpd configuration generated on " . date('Y-m-d H:i:s') . "\n\n";
    foreach ($config as $key => $value) {
        $configContent .= "$key=$value\n";
    }

    $file_path = '/etc/vsftpd.conf';

        if (file_put_contents($file_path, $configContent)) {
            echo "config save success";
            $state = shell_exec("sudo systemctl -q restart vsftpd ; echo $?");
            if ($state == '0'){
              $mystat = fopen("./ftp_state.txt" , 'w') or die("Enable");
              $dhstat = "running";
              fwrite($mystat , $dhstat);
              fclose($mystat);
            }else{
                $mystat = fopen("./ftp_state.txt" , 'w') or die("Enable");
                $dhstat = "not-running";
                fwrite($mystat , $dhstat);
                fclose($mystat);
              }
        } else {
            echo "error with save";
        }
 

  
    }
    echo '<h1><a href="/">Home</a></h1>';

?>