node {
    repositoryUrl = "https://github.com/halo1003/q1.git"
    stage('Clone sources'){
        gitClone(repositoryUrl)
    }
}

def gitClone(String source){
    git_clone = sh (
        script: "git clone ${source}",
        returnStdout: true
    ).trim()
    return git_clone
}   