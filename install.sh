#!/bin/bash







release_file=/etc/os-release
error_log=/home/ridha/Desktop/up_error.log

if grep -q "Arch" $release_file
then
    sudo pacman -Syu 2>>$error_log
fi

if grep -q "fedora" $release_file
then
    sudo dnf update -y  2>>$error_log
fi

if grep -q "Ubuntu" $release_file
then
    sudo apt update && upgrade -y  2>>$error_log
fi
