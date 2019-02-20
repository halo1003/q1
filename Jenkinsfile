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
                        // sh './script/stop_httpd'                        
                        sh 'docker run -d -v ~/workspace/Test_pileline/src:/var/www/html --name my_httpd  -p 8080:80 nimmis/apache-php5'                
                    }            
                }
                stage('MYSQL'){
                    steps{
                        echo "========Create MySql container========"
                        // sh './script/stop_mysql'
                        sh 'docker run -d --name my_mysql -p 8001:3306 -e MYSQL_ROOT_PASSWORD=root mysql'                                      
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