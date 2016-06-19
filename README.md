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

4) Edit the Laravel configuration file by opening the ```.env``` file in the ```site``` directory and set the ```DB_HOST``` to your Docker IP
[How to find my Docker IP address](https://github.com/LaraDock/laradock/blob/master/README.md#Find-Docker-IP-Address)

5) You should now restart the workspace container if you have it running by using
```
make restart
```
or
```
cd laradock && docker stop {Workspace-Container-Name} && docker-compose start workspace
```

6) You may now view the site by opening your browser and visiting your Docker IP address, you may also wish to configure your hosts file to assign an easy to remember name such as laravel.dev or docker.dev

Please see the [Laradock repo](https://github.com/LaraDock/laradock/blob/master/README.md) for additional information and debugging tips
