#!/bin/bash

echo "config your interface ip"






read -p "Enter your ip address:" ipaddress
read -p "SubnetMask in slash:" subnet
read -p "Gateway:" gateway
read -p "DNS1" DNS1
read -p "DNS2" DNS2


sudo echo " 
network:
 version: 2
 renderer: NetworkManager
 ethernets:
   eth0:
     dhcp4: no
     addresses: [$ipaddress/$subnet]
     gateway4:  $gateway 
     nameservers:
         addresses: [$DNS1,$DNS2] " > /etc/netplan/01-network-manager-all.yaml
