symfony-playground
====================

An empty Symfony 3 project with a self-contained custom development environment on Docker.

Include: 

- Nginx + php7-fpm
- MySql

Usage
-----

1. Clone the Project.
2. Start containers using: 
```
docker-compose up -d --build
```

Access via web:  
http://sp.dev  

Access to php-fpm:
```
docker exec -it app_dev_fpm  bash
```

Ready to use! 
 
PHPStorm Configuration
----------------------

1. Create a Docker Interpreter and Docker Server.

![alt text](https://image.ibb.co/fC95d5/phpstorm_conf_dokcer_interpreter.png)

![alt text](https://image.ibb.co/ifJyy5/phpstorm_conf_docker_server.png)

Check out if your Docker container is correctly configured (specially the host path): 

![alt text](https://image.ibb.co/kK10wQ/phpstorm_docker_container_settings.png)

2. Create a PhpUnit configuration.

![alt text](https://image.ibb.co/meOLBQ/phpstorm_conf_phpunit.png)

