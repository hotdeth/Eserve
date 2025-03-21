<?php
$domain_name = $_POST['domain_name'];
$netmask = $_POST['netmask'];
$subnet = $_POST['subnet'];
$range_start = $_POST['range_start'];
$range_end = $_POST['range_end'];
$default_router = $_POST['default_router'];
$option_subnetmask = $_POST['option_subnetmask'];
$dns1 = $_POST['dns1'];
$dns2 = $_POST['dns2'];
$lease_time = $_POST['lease_time'];

$dhcpd_conf = "
option domain-name \"$domain_name\";
option domain-name-servers ns1.$domain_name, ns2.$domain_name;
default-lease-time $lease_time;
max-lease-time 7200;

subnet $netmask netmask $subnet {
  range $range_start $range_end;
  option routers $default_router;
  option subnet-mask $option_subnetmask;
  option domain-name-servers $dns1, $dns2;
}
";

$file_path = '/etc/dhcp/dhcpd.conf';

if (file_put_contents($file_path, $dhcpd_conf)) {
  echo "Configuration saved successfully!";
  $reload = shell_exec("sudo systemctl restart isc-dhcp-server");
  $state = shell_exec("sudo systemctl is-active -q isc-dhcp-server && echo $?");
  if ($state == '0'){
    $mystat = fopen("./dhcp_state.txt" , 'w') or die("Enable");
    $dhstat = "running";
    fwrite($mystat , $dhstat);
    fclose($mystat);
  }else{
    $mystat = fopen("./dhcp_state.txt" , 'w') or die("Enable");
    $dhstat = "not-running";
    fwrite($mystat , $dhstat);
    fclose($mystat);
  }

} else {
  echo "Error saving configuration.";
}

echo '<h1><a href="/">Home</a></h1>';

?>
