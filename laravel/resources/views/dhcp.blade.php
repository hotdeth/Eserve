<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" real="stylesheet">
  <title>Eserve</title>
  <link rel="stylesheet" href="css/dhcp.css">
  <style>
    body{
      background-image: url('plugins/home.jpg');
      background-size: cover;
      background-attachment: fixed;
    }
  </style>
</head>
<body>
  <div class="name-server-saved-button">
    <h2>DHCP Server Dashboard</h2>
    <button type="button" id="saveChangesBtn">Save Changes</button>
  </div>

  <a href="/">
    <button class="back-button">
      <span class="arrow"></span>
    </button>
  </a>
  
  <form action="php_save/dhcp_save.php" method="POST" id="dhcpForm">


    <div class="header-form">
      <h2 class="config">Configuration Settings</h2>
    </div>

    <div class="domin-name">
      <label for="name">Domain name</label>
      <input type="text" name="domain_name" required>
    </div>

    <div class="network-subnet">
      <div class="network">
        <label for="netmask">Netmask</label>
        <input type="text" name="netmask" required>
      </div>

      <div class="subnet">
        <label for="subnet">Subnet</label>
        <input type="text" name="subnet" required>
      </div>
    </div>

    <div class="s-e-range">
      <div class="srange">
        <label for="range_start">Range Start</label>
        <input type="text" name="range_start" required>
      </div>

      <div class="erange">
        <label for="range_end">Range End</label>
        <input type="text" name="range_end" required>
      </div>
    </div>

    <div class="def-router-op-subnetmask">
      <div class="def-router">
        <label for="default_router">Default Router</label>
        <input type="text" name="default_router" required>
      </div>
      <div class="op-subnetmask">
        <label for="option_subnetmask">Option Subnet Mask</label>
        <input type="text" name="option_subnetmask" required>
      </div>
    </div>

    <label class="label-DNS">DNS Server Option</label>
    <div class="DNS">
      <div class="inp1">
        <input type="text" name="dns1" required>
      </div>
      <div class="inp2">
        <input type="text" name="dns2" required>
      </div>
    </div>

    <div class="leasetime">
      <label for="lease_time">Lease Time</label>
      <input type="text" name="lease_time" required>
    </div>
  </form>

  <script src="js/DHCP.js"></script>
  
  <h5 class="tail">@EserveTeam v1.0</h5>

  <script>
    document.getElementById("saveChangesBtn").addEventListener("click", function() {
      document.getElementById("dhcpForm").submit();
    });
  </script>
</body>
</html>
