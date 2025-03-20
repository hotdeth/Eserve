<!DOCTYPE html><html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="30">
    <title>Eserve</title>
    <meta name="Discription" content="A service website serve servers">
    <meta name="author" content="Eredin">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="plugins/logo1616.png">
    <link rel="stylesheet" href="css/home.css">
</head>

<!---What is this Ridha---->
<!--- for the test state on home page ---->

<?php 
//rewrite the status 

//check the dhcp
$state = shell_exec("sudo systemctl is-active -q isc-dhcp-server && echo $?");
if ($state == '0'){
  $mystat = fopen("php_save/dhcp_state.txt" , 'w') or die("Enable");
  $dhstat = "running";
  fwrite($mystat , $dhstat);
  fclose($mystat);
}else{
  $mystat = fopen("php_save/dhcp_state.txt" , 'w') or die("Enable");
  $dhstat = "not-running";
  fwrite($mystat , $dhstat);
  fclose($mystat);
}

//check the nginx 

$reload = shell_exec("sudo systemctl is-active -q  nginx.service   &&  echo $?");
      if ($reload == '0'){
        $mystat = fopen("php_save/nginx_state.txt" , 'w') or die("Enable");
        $dhstat = "running";
        fwrite($mystat , $dhstat);
        fclose($mystat);
    }else{
        $mystat = fopen("php_save/nginx_state.txt" , 'w') or die("Enable");
        $dhstat = "not-running";
        fwrite($mystat , $dhstat);
        fclose($mystat);
    }

//check vsftp
$reload = shell_exec("sudo systemctl is-active -q  vsftpd.service   &&  echo $?");
      if ($reload == '0'){
        $mystat = fopen("php_save/ftp_state.txt" , 'w') or die("Enable");
        $dhstat = "running";
        fwrite($mystat , $dhstat);
        fclose($mystat);
    }else{
        $mystat = fopen("php_save/ftp_state.txt" , 'w') or die("Enable");
        $dhstat = "not-running";
        fwrite($mystat , $dhstat);
        fclose($mystat);
    }





$myfile = fopen("php_save/dhcp_state.txt", "r") or die("Unable to open file!");
$dhcp_state = fread($myfile,filesize("php_save/dhcp_state.txt"));
$dhcp_state = "$dhcp_state";
fclose($myfile);
//ftp state
$myfile2 = fopen("php_save/ftp_state.txt", "r") or die("Unable to open file!");
$ftp_state = fread($myfile2,filesize("php_save/ftp_state.txt"));
$ftp_state = "$ftp_state";
fclose($myfile2);
//nginx state

$myfile3 = fopen("php_save/nginx_state.txt", "r") or die("Unable to open file!");
$nginx_state = fread($myfile3,filesize("php_save/nginx_state.txt"));
$nginx_state = "$nginx_state";
fclose($myfile3);



//this is to show the uptime of the servers just use the variable 

$nginx_uptime = shell_exec('systemctl status nginx | grep -Po ".*; \K(.*)(?= ago)"');
$dhcp_uptime = shell_exec('systemctl status isc-dhcp-server | grep -Po ".*; \K(.*)(?= ago)"');
$ftp_uptime = shell_exec('systemctl status vsftpd.service | grep -Po ".*; \K(.*)(?= ago)"');








 ?>
<!----------------->
<body>

        
        <h2 id="Eserve">Eserve</h2>

        <p id="p1">The open-source project to manage your
            servers <br>
            choice your server and get started 
        </p>

        
            <img id="img1" src="{{ url('/plugins/1.png') }}" style="width: fit-content;">

<a href="/dhcp" class="rectangle" id="rect1">
    <div class="dhcp-container">
        DHCP
        <div class="blink_me status-text {{ $dhcp_state === 'running' ? 'running' : 'not-running ' }}">
            {{ $dhcp_state }}
        </div>
        <div class='uptime'>
        {{ $dhcp_uptime }}</div>
    </div>
</a>

<a href="/ftp" class="rectangle" id="rect2">
    <div class="dhcp-container">
        FTP
        <div class="blink_me status-text {{ $ftp_state === 'running' ? 'running' : 'not-running' }}">
            {{ $ftp_state }}
        </div>
        <div class='uptime'>
        {{ $ftp_uptime }}</div>
    </div>
</a>

<a href="/dns" class="rectangle" id="rect3">
    <div class="dhcp-container">
        DNS
        <div class=" status-text comming-soon">
            comming soon
            
        </div>
    </div>
</a>

<a href="/http" class="rectangle" id="rect4">
    <div class="dhcp-container">
        HTTP
        <div class="blink_me status-text {{ $nginx_state === 'running' ? 'running' : 'not-running' }}">
            {{ $nginx_state }}
        </div>
        <div class='uptime'>
        {{ $nginx_uptime }}</div>
    </div>
</a>

        


</body>
</html>