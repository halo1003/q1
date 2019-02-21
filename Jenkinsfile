pipeline{
    agent any
    stages{
        stage('HTTPD-image'){
            agent {
                docker { image 'nimmis/apache-php5' }
            }
            steps{
                echo "========HTTPD image executing========"
                sh 'php -v'            
            }
        }

        stage('MYSQL-image'){
            agent {
                docker { image 'mysql' }
            }
            steps{
                echo "=========MYSQL image executing========="
                sh 'mysql --version'
            }
        }

        stage ('Containers'){
            stages{
                stage('APACHE'){
                    steps{
                        echo "========Create https container========"
                        
                        sh """
                            if [ ! "$(docker ps -q -f name=my_httpd)" ]; then
                                if [ "$(docker ps -aq -f status=exited -f name=my_httpd)" ]; then
                                    docker rm my
                                fi                            
                                docker run -d -v ~/workspace/Test_pileline/src:/var/www/html --name my_httpd  -p 8080:80 nimmis/apache-php5
                            fi    
                        """          
                    }            
                }
                stage('MYSQL'){
                    steps{
                        echo "========Create MySql container========"
                        
                        sh """
                            if [ ! "$(docker ps -q -f name=my_mysql)" ]; then
                                if [ "$(docker ps -aq -f status=exited -f name=my_mysql)" ]; then
                                    docker rm my
                                fi                            
                                docker run -d --name my_mysql -p 8001:3306 -e MYSQL_ROOT_PASSWORD=root mysql
                            fi    
                        """
                    }            
                }
            }            
        }        
    }
    post{
        always{
            echo "========always========"
        }
        success{
            echo "========pipeline executed successfully ========"
        }
        failure{
            echo "========pipeline execution failed========"
        }
    }
}