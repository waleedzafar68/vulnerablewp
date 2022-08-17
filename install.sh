#! usr/bin/bash
echo "Running apt update"
sudo apt update
echo "Installing docker-compose"
sudo apt install docker-compose -y
echo "Running docker containers"
docker-compose up -d