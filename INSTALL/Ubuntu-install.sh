#!/bin/bash
  # Dhcp install
  sudo apt update && upgrade -y
  sudo apt install isc-dhcp-server
  sudo systemctl enable isc-dhcp-server
  sudo cp ../config/dhcpd.conf /etc/dhcp/dhcpd.conf
  sudo systemctl start isc-dhcp-server
  sudo systemctl status isc-dhcp-server 1>./null 2>./null
  if [ $? -eq 0]
  then
    echo "DHCP running" > ../status/dhcp_state.txt
  else
    echo "DHCP error"  > ../status/dhcp_state.txt
  fi
  # Ftp install
  sudo apt install vsftpd
  sudo systemctl start vsftpd
  sudo systemctl enable vsftpd
  sudo cp /etc/vsftpd.conf /etc/vsftpd.conf_default 
  read -p "Enter the username of ftpuser:" ftpuser
  sudo useradd -m $ftpuser 
  sudo passwd $ftpuser
  sudo ufw allow 20/tcp
  sudo ufw allow 21/tcp
  sudo mkdir /srv/ftp/ftpuser
  sudo usermod -d /srv/ftp/ftpuser ftp
  sudo systemctl restart vsftpd.service
  if [ $? -eq 0 ] 
  then
    echo "FTP running" > ../status/ftp_state.txt
  else
    echo "FTP exit code $?" > ../status/ftp_state.txt
  fi
  #nginx install
  sudo apt install curl gnupg2 ca-certificates lsb-release ubuntu-keyring
  curl https://nginx.org/keys/nginx_signing.key | gpg --dearmor \
| sudo tee /usr/share/keyrings/nginx-archive-keyring.gpg >/dev/null

  echo -e "Package: *\nPin: origin nginx.org\nPin: release o=nginx\nPin-Priority: 900\n" \
    | sudo tee /etc/apt/preferences.d/99nginx
  sudo apt install nginx
  sudo systemctl enable nginx
  sudo systemctl start nginx 
  sudo mkdir /var/www/for_ubuntu
  sudo cp ../config/web_for_test.php  /var/www/for_ubuntu
  sudo cp ../config/site_ave.local /etc/nginx/sites-available
  sudo ln -s /s /etc/nginx/sites-available/site_ave.local /etc/nginx/sites-enabled 
  sudo rm -rf /etc/nginx/sites-available/s 1>>../status/null 2>>../status/null
  sudo systemctl restart -q nginx 
  if [ $? -eq 0 ]
  then
    echo "nginx running" > ../status/nginx_state.txt
  else
    echo "nginx error!" > ../status/nginx_state.txt
  fi





  





#field to start nginx for ubuntu > reseaon the s directory or file should be deleted from /etc/nginx/site-aviable















