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
