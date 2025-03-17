#!/bin/bash
  # Dhcp install
  sudo apt update -y 1>./null 2./null
  sudo apt install isc-dhcp-server
  sudo systemctl enable isc-dhcp-server
  sudo cp dhcpd.conf /etc/dhcp/dhcpd.conf
  sudo systemctl start -q isc-dhcp-server
  sudo systemctl status isc-dhcp-server 1>./null 2>./null
  if [ $? -eq 0 ]
  then
    echo "Running" > ./laravel/public/php_save/dhcp_state.txt
  else
    echo "not-running"  > ./laravel/public/php_save/dhcp_state.txt 
  fi

  # Ftp install
  sudo apt install vsftpd -y
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
    echo "Running" > ./laravel/public/php_save/ftp_state.txt
  else
    echo "not-running" > ./laravel/public/php_save/ftp_state.txt 
  fi

  #nginx install
  sudo apt install curl gnupg2 ca-certificates lsb-release ubuntu-keyring
  curl https://nginx.org/keys/nginx_signing.key | gpg --dearmor \
| sudo tee /usr/share/keyrings/nginx-archive-keyring.gpg >/dev/null

  echo -e "Package: *\nPin: origin nginx.org\nPin: release o=nginx\nPin-Priority: 900\n" \
    | sudo tee /etc/apt/preferences.d/99nginx
  sudo apt install nginx -y
  sudo apt-get install php-sqlite3
  sudo systemctl enable -q nginx
  sudo systemctl start -q nginx 
  sudo mkdir /var/www/for_ubuntu
  sudo cp index.html  /var/www/for_ubuntu
  sudo cp ./site_ave.local /etc/nginx/sites-available
  sudo ln -s  /etc/nginx/sites-available/site_ave.local /etc/nginx/sites-enabled 
#  sudo rm -rf /etc/nginx/sites-available/s 1>>../status/null 2>>../status/null
  sudo systemctl restart -q nginx 
  if [ $? -eq 0 ]
  then
    echo "running" > ./laravel/public/php_save/nginx_state.txt
  else
    echo "not-running" > ./laravel/public/php_save/nginx_state.txt
  fi
  ./start





  





#field to start nginx for ubuntu > reseaon the s directory or file should be deleted from /etc/nginx/site-aviable















