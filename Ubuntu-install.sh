#!/bin/bash

  sudo apt update && upgrade -y
  sudo apt install isc-dhcp-server
  sudo systemctl enable isc-dhcp-server
  sudo cp ./dhcpd.conf /etc/dhcp/dhcpd.conf
  sudo systemctl start isc-dhcp-server
  sudo systemctl status isc-dhcp-server 1>./null 2>./null
  if [ $? -eq 0]
  then
    echo "The DHCP server is running" > ./dhcp_state.txt
  else
    echo "Something went wrong with DHCP server , check your ethernet ip address"  > dhcp_state.txt
  fi 
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
    echo "FTP server running" > ./ftp_state.txt
  else
    echo "FTP server exit with code $?" > ./ftp_state.txt
  fi


