    sudo dnf update -y  2>>error_log
    sudo dnf install dhcp-server
    sudo systemctl enable dhcpd.service
    sudo cp dhcpd.conf /etc/dhcp/dhcpd.conf
    sudo systemctl start -q dhcpd.service
    
    if [ $? -eq 0 ]
    then
      echo "The DHCP server running" > dhcp_state.txt
    else
      echo "Something went wrong with DHCP server , check your ethernet ip address"  > dhcp_state.txt
    fi
    
    sudo dnf install vsftpd -y
    sudo systemctl start vsftpd
    sudo systemctl enable vsftpd
    sudo adduser ftpuser
    sudo passwd ftpuser
    sudo chown ftpuser:ftpuser /home/ftpuser
    sudo chmod 700 /home/ftpuser
    sudo systemctl restart -q  vsftpd
    if [ $? -eq 0 ]
    then
      echo "FTP running" > ftp_state.txt
    else
      echo "FTP error" > ftp_state.txt
    fi
    sudo dnf install nginx 
    sudo systemctl enable nginx.service
    sudo cp ./nginx_test.conf /etc/nginx/conf.d/ 
    sudo cp ./php-fpm.conf /etc/nginx/conf.d/ 
    sudo cp ./web_for_test.php /var/www/html/
    sudo systemctl start -q nginx.service
    if [ $? -eq 0 ]
    then
      echo "nginx running" > nginx_state.txt 
    else
      echo "nginx error!" > nginx_state.txt
    fi
