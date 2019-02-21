# git add .

# git commit --amend

if [ ! "$(docker ps -q -f name=my)" ]; then
    if [ "$(docker ps -aq -f status=exited -f name=my)" ]; then
        # cleanup
        docker rm my
    fi
    # run your container
    docker run -d --name <name> my-docker-image
fi