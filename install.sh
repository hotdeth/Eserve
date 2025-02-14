#!/bin/bash







release_file=/etc/os-release

if grep -q "Arch" $release_file
then
    sudo pacman -Syu 2>>error_log
fi

if grep -q "fedora" $release_file
then
    sudo dnf update -y  2>>error_log
    sudo dnf install dhcp-server
    sudo systemctl enable dhcpd.service
    sudo cp ./dhcpd.conf /etc/dhcp/dhcpd.conf
    sudo systemctl start -q dhcpd.service
    
    if [ $? -eq 0 ]
    then
      echo "The DHCP server is active" > dhcp_state.txt
    else
      echo "Something went wrong with DHCP server"  > dhcp_state.txt
    fi
    
    sudo dnf install vsftpd -y
    sudo systemctl start vsftpd
    sudo systemctl enable vsftpd
    sudo adduser ftpuser
    sudo passwd ftpuser
    sudo chown ftpuser:ftpuser /home/ftpuser
    sudo chmod 700 /home/ftpuser
    sudo systemctl restart  vsftpd
    sudo dnf install nginx 
    sudo systemctl enable nginx.service
    sudo cp ./nginx_test.conf /etc/nginx/conf.d/ 
    sudo cp ./php-fpm.conf /etc/nginx/conf.d/ 
    sudo systemctl start nginx.service
    if [ $? -eq 0 ]
    then
      echo "The nginx server active" > nginx_state.txt 
    else
      echo "The nginx server went wrong" > nginx_state.txt
    fi

fi

if grep -q "Ubuntu" $release_file
then
    sudo apt update && upgrade -y  2>>error_log
fi
