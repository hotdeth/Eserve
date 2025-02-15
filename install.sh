#!/bin/bash
release_file=/etc/os-release

if grep -q "Arch" $release_file
then
    sudo pacman -Syu 2>>error_log
fi

if grep -q "fedora" $release_file
then
  ./fedora-install.sh
    fi

if grep -q "Ubuntu" $release_file
then
   ./Ubuntu-install.sh 
fi
