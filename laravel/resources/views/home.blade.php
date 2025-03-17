<!DOCTYPE html><html>
<head>
    <meta charset="UTF-8">
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



$dns_state = "running";



 ?>
<!----------------->
<body>

        
        <h2 id="Eserve">Eserve</h2>

        <p id="p1">your best open source destination,
            choose your service and get
            started with your easiest configuration setup.</p>

        
            <img id="img1" src="{{ url('/plugins/1.png') }}" style="width: fit-content;">

<a href="/dhcp" class="rectangle" id="rect1">
    <div class="dhcp-container">
        DHCP
        <div class="blink_me status-text {{ $dhcp_state === 'running' ? 'running' : 'not-running ' }}">
            {{ $dhcp_state }}
        </div>
    </div>
</a>

<a href="/ftp" class="rectangle" id="rect2">
    <div class="dhcp-container">
        FTP
        <div class="blink_me status-text {{ $ftp_state === 'running' ? 'running' : 'not-running' }}">
            {{ $ftp_state }}
        </div>
    </div>
</a>

<a href="/dns" class="rectangle" id="rect3">
    <div class="dhcp-container">
        DNS
        <div class="blink_me status-text {{ $dns_state === 'running' ? 'running' : 'not-running' }}">
            {{ $dns_state }}
        </div>
    </div>
</a>

<a href="/http" class="rectangle" id="rect4">
    <div class="dhcp-container">
        HTTP
        <div class="blink_me status-text {{ $nginx_state === 'running' ? 'running' : 'not-running' }}">
            {{ $nginx_state }}
        </div>
    </div>
</a>

        


</body>
</html>