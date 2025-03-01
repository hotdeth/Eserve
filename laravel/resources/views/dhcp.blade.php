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
    <button type="submit">Save Changes</button>
  </div>

  <a href="/">
  <button class="back-button">
    <span class="arrow"></span>
  </button>
</a>
  <form action="">
    
    <div class="header-form">
      <h2 class="config">Configuration Settings</h2>

    </div>
    <div class="domin-name">
      <label for="name">Domin name</label>
      <input type="text" required>
    </div>

  <div class="network-subnet">
    <div class="network">
      <label for="name">
        Netmask
      </label>
      <input type="text" required>
      
    </div>

    <div class="subnet">
      <label for="name">
        Subnet
      </label>
      <input type="text" required>
    </div>
  </div>
  
  
  <div class="s-e-range">
    <div class="srange">
      <label>
        Range Start
      </label>
      <input type="text" required>
    </div>

    <div class="erange">
      <label>
        Range End
      </label>
      <input type="text" required=" ">
    </div>

  </div>

  
  
  <div class="def-router-op-subnetmask">
    
    <div class="def-router">
      <label>
        Defualt Router
      </label>
      <input type="text" required>
    </div>
    <div class="op-subnetmask">
      <label>
        Option Subnet Mask
      </label>
      <input type="text" required>
    </div>
    
  </div>
  <label class="label-DNS">
    DNS Server Option
  </label>
    <div class="DNS">

      <div class="inp1" >
        <input type="text" required>
      </div>
        
      <div class="inp2">
        <input type="text" required>
      </div>
      
    </div>

  <div class="leasetime">

    <label>Lease Time</label>
    <input type="text" required=" ">

  </div>
  

</form>



  <script src="DHCP.js"></script>
</body>
</html>