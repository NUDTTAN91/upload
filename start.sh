#!/bin/bash

docker run -d -p 80:80  -v /root/html/:/var/www/html --name=webupdate DockerImages

