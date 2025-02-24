<!DOCTYPE html><html>
<head>
    <meta charset="UTF-8">
    <title>Eserve</title>
    <meta name="Discription" content="A service website serve servers">
    <meta name="author" content="Eredin">
    <style>
    body{
            background-image: url('/plugins/home.jpg');
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
    <link rel="stylesheet" href="css/style.css">
</head>

<!---What is this Ridha---->

<?php 
$myfile = fopen("dhcp_state.txt", "r") or die("Unable to open file!");
$dhcp_state = fread($myfile,filesize("dhcp_state.txt"));
if ($dhcp_state == "Running"){
    $dhcp_state = "🟢 $dhcp_state";
}
else {
    $dhcp_state = "🔴 $dhcp_state";
}
fclose($myfile);
 ?>
<!----------------->
<body>
        <h2 id="Eserve">Eserve</h2>

        <p id="p1">your best open source destination,
            choose your service and get
            started with your easiest configuration setup.</p>

        

        


        <img id="img1" src="{{ url('/plugins/1.png') }}">
    
    
            <a href="/dhcp" class="rectangle" id="rect1">DHCP</a>
            <a href="/ftp" class="rectangle" id="rect2">FTP</a>
            <a href="/dns" class="rectangle" id="rect3">DNS</a>
            <a href="/http" class="rectangle" id="rect4">HTTP</a>
        

        

</body>
</html>