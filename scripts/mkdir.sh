#!/bin/bash
sudo rm /var/www/html/camera/ -r
sudo mkdir /var/www/html/camera/
sudo mkdir /var/www/html/camera/live
DATE=$(date +"%Y-%m-%d")
sudo mkdir /var/www/html/camera/"$DATE"
