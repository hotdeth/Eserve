<!DOCTYPE html><html>
<head>

    <meta charset="UTF-8">
    <title>Eserve</title>
    <meta name="Discription" content="A service website serve servers">
    <meta name="author" content="Eredin">



</head>
<body>
    <h1>Hello</h1>
</body>


<<<<<<< HEAD

=======
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

<h1 style="color:black;">
{{$dhcp_state}}
</h1>
>>>>>>> 09f79d7a5c1a60916f1aa6c92d02f4fda93cbc23

</html>