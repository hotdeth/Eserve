#!/bin/bash



release_file = /etc/os-release


if grep -q "fedora" $release_file
then
  sudo dnf install php-fpm
  sudo systemctl  enable php-fpm
  sudo systemctl  start php-fpm


























