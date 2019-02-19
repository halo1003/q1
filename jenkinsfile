pipeline{
    agent{
        docker{
            image 'php'
        }
    }
    stages{
        stage('build'){
            steps{
                echo "========executing build========"
                sh 'php --version'
            }
            post{
                always{
                    echo "========always========"
                }
                success{
                    echo "========A executed successfully========"
                }
                failure{
                    echo "========A execution failed========"
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