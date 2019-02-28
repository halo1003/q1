repositoryUrl = "https://github.com/halo1003/q1.git"
branch = "master"

pipeline {
    agent any 

    stages {
        stage('Clone sources') {
           steps {
                git url: repositoryUrl, credentialsId: "git-credentials", branch: branch
           }
        }        
        // stage('Prepare') {
        //     steps {
        //         sh 'rm -rf build/api'
        //         sh 'rm -rf build/phpdox'
        //         sh 'rm -rf app/build/api'
        //         sh 'rm -rf app/build/code-browser'
        //         sh 'rm -rf app/build/coverage'
        //         sh 'rm -rf app/build/logs'
        //         sh 'rm -rf app/build/pdepend'
        //         sh 'rm -rf app/build/phpdox'
        //         sh 'mkdir -p app/build/api'
        //         sh 'mkdir -p app/build/code-browser'
        //         sh 'mkdir -p app/build/coverage'
        //         sh 'mkdir -p app/build/logs'
        //         sh 'mkdir -p app/build/pdepend'
        //         sh 'mkdir -p app/build/phpdox'                  
        //         sh 'php ./tools/composer.phar self-update || true'
        //         sh 'php ./tools/composer.phar install --prefer-dist --no-progress || true'
        //     }
        // }        
        // stage('Test'){
        //     steps {
        //         sh './tools/phpunit.phar --no-configuration ./tests --teamcity'
        //     }
        // }
        // stage('Checkstyle') {
        //     steps {                
        //         sh './tools/phpcs.phar --report=checkstyle --report-file=`pwd`/app/build/logs/checkstyle.xml --standard=PSR2 --extensions=php src/ || exit 0'
        //         checkstyle canComputeNew: false, defaultEncoding: '', healthy: '', pattern: 'app/build/logs/checkstyle.xml', unHealthy: ''
        //     }
        // }
        // stage('Lines of Code') {
        //     steps { sh './tools/phploc.phar --count-tests --log-csv app/build/logs/phploc.csv --log-xml app/build/logs/phploc.xml src/' }
        // }
        // stage('Copy paste detection') {
        //     steps {
        //         sh './tools/phpcpd.phar --log-pmd app/build/logs/pmd-cpd.xml src/ || exit 0'
        //         dry canComputeNew: false, defaultEncoding: '', healthy: '', pattern: 'app/build/logs/pmd-cpd.xml', unHealthy: ''
        //     }
        // }
        // /* -- SLOW */
        // stage('Mess detection') {
        //     steps {
        //         sh './tools/phpmd.phar src/ xml app/phpmd.xml --reportfile app/build/logs/pmd.xml src/ || exit 0'
        //         pmd canComputeNew: false, defaultEncoding: '', healthy: '', pattern: 'app/build/logs/pmd.xml', unHealthy: ''
        //     }
        // }
        // /* -- SLOW */
        // stage('Software metrics') {
        //     steps { sh './tools/pdepend.phar --jdepend-xml=app/build/logs/jdepend.xml --jdepend-chart=app/build/pdepend/dependencies.svg --overview-pyramid=app/build/pdepend/overview-pyramid.svg src/'
        //     }
        // }
        // stage('Generate documentation') {
        //     steps { sh './tools/phpdox.phar -f app/phpdox.xml'
        //     }
        // }
        // stage('Generate php metrics') {
        //     steps {
        //     sh './tools/phpmetrics.phar --report-html=app/build/phpmetrics.html --report-xml=app/build/phpmetrics.xml --report-violations=app/build/violations.xml src'
        //     publishHTML([allowMissing: false, alwaysLinkToLastBuild: false, keepAll: false, reportDir: 'app/build', reportFiles: 'phpmetrics.html', reportName: 'Phpmetrics report', reportTitles: ''])
        //     }
        // }        

        // stage('mysql') {
        //     steps{                                
        //         sh 'docker stop my_mysql || true'
        //         sh 'docker rm my_mysql || true'
        //         sh 'docker run -v ~/workspace/Test_pileline/mysql:/var/lib/mysql --name my_mysql -e MYSQL_ROOT_PASSWORD=root -p 3300:3306 -d mysql:5.5'
        //         sh 'docker logs my_mysql || true'
        //     }
        //     post {
        //         success{                    
        //             echo "========Mysql executed successfully ========"
        //         }
        //         failure{
        //             echo "========Mysql execution failed========"
        //         } 
        //     }
        // }

        stage('Deploy') {
            steps{                         
                sh 'docker stop my_httpd || true'
                sh 'docker rm my_httpd || true'
                sh 'docker run -d -v ~/workspace/Test_pileline/src:/var/www/html --name my_httpd  -p 8080:80 nimmis/apache-php5'
                sh 'docker logs my_httpd || true'
            }
            post {
                success{
                    sh "git tag v1.1"
                    sh "git push origin --tag"
                }
                failure{
                    echo "========Deploy execution failed========"
                } 
            }
        }
    }
}

//deloy VM2 using multiple agent 

//phan du bo
//show test case past or not 
//artifact ? where
// register store image ? where
// dung lai image ? deloy where
// slack ? use 