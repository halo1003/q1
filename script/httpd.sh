# if [ ! "$(docker ps -q -f name=my_httpd)" ]; then
#     if [ "$(docker ps -aq -f status=exited -f name=my_httpd)" ]; then
#         docker stop container my_httpd
#         docker rm my_httpd
#         docker run -d -v ~/workspace/Test_pileline/src:/var/www/html --name my_httpd  -p 8080:80 nimmis/apache-php5
#     fi                            
#     docker run -d -v ~/workspace/Test_pileline/src:/var/www/html --name my_httpd  -p 8080:80 nimmis/apache-php5
# fi 

docker stop my_httpd
docker rm my_httpd