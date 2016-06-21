# Demo Profile Site

Using [LaraDock](https://github.com/LaraDock/laradock)

## Installation
Clone this repository
```
git clone https://github.com/pparke/demo-site.git
```
## Usage
1) **Windows & Mac Users only**
Install the [Docker Toolbox](https://www.docker.com/toolbox) or run
a Docker Virtual Host. [See the Laradock instructions for further details](https://github.com/LaraDock/laradock/blob/master/README.md#Run-Docker-Virtual-Host)

2) Use the included Makefile to start the containers
```
make start
```
*Note: you may need to use sudo depending on how you installed Docker*

**or** run the containers manually
```
cd laradock && docker-compose up -d nginx postgres
```

3) You can run commands from the workspace container, enter it by using the Makefile
```
make cli
```
or manually
```
cd laradock && docker exec -it {Workspace-Container-Name} bash
```


4) Setup the Laravel configuration file by copying the ```.env.example``` file to ```.env``` in the ```site``` directory and set the ```DB_HOST``` to your Docker IP
[How to find my Docker IP address](https://github.com/LaraDock/laradock/blob/master/README.md#Find-Docker-IP-Address)

5) You will need to also run ```npm install``` ```composer update```  ```composer install``` ```php artisan key:generate``` and ```php artisan migrate``` from within the workspace container to install the needed dependencies

6) You should now restart the workspace container if you have it running by using
```
make restart
```
or
```
cd laradock && docker stop {Workspace-Container-Name} && docker-compose start workspace
```

7) You may now view the site by opening your browser and visiting your Docker IP address, you may also wish to configure your hosts file to assign an easy to remember name such as laravel.dev or docker.dev

There are also several other convenience commands included in the Makefile.

Display container status and names
```
make status
```
or
```
docker-compose ps
```

Connect to db cli
```
make sql
```
or
```
cd laradock && docker exec -it laradock_postgres_1 psql -h localhost -U homestead
```

Shutdown all containers
```
make stop
```
or
```
cd laradock && docker-compose stop
```

Remove all containers
```
make clean
```
or
```
cd laradock && docker-compose rm --force
```

Please see the [Laradock repo](https://github.com/LaraDock/laradock/blob/master/README.md) for additional information and debugging tips
