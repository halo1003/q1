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
                        sh "./script/httpd"
                    }            
                }
                stage('MYSQL'){
                    steps{
                        echo "========Create MySql container========"                        
                        sh "./script/mysql"
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