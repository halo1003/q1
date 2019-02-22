# if [ ! "$(docker ps -q -f name=my_mysql)" ]; then
#     if [ "$(docker ps -aq -f status=exited -f name=my_mysql)" ]; then        
#         docker stop my_mysql        
#     fi                                
#     # docker run -v ~/workspace/Test_pileline/mysql:/var/lib/mysql --name my_mysql -e MYSQL_ROOT_PASSWORD=root -p 3300:3306 -d mysql:5.5
#     docker stop my_mysql 
# fi    

docker stop my_mysql
docker rm my_mysql