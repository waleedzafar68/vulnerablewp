#! usr/bin/bash
echo "Running apt update"
sudo apt update
echo "Installing docker and docker-compose"
snap install docker
sudo curl -L "https://github.com/docker/compose/releases/download/1.27.4/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose #manual install
echo "Running docker containers"
docker-compose up -d
