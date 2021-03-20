## PHP 5.6 project bootstrap: 

> Note: I have changed one line of code in the original project as the query didn't produce any results and it didn't seem like that was the indended purpose. 

The query in question is:   $query = 'SELECT * FROM option WHERE name = \'price\''; 

I have changed it to $query = 'SELECT * FROM database.option WHERE name = \'price\'';  in order to produce results. 
It was not working because 'option' is a reserved SQL keyword (https://en.wikipedia.org/wiki/SQL_reserved_words). 

- Assume Docker, docker-compose is installed on local machine 
```
$ docker version
	Client: Docker Engine - Community
 	Cloud integration: 1.0.2
 	Version:           19.03.13
 	API version:       1.40
 	Go version:        go1.13.15
 	Git commit:        4484c46d9d
 	Built:             Wed Sep 16 17:00:27 2020
 	OS/Arch:           windows/amd64
 	Experimental:      false

Server: Docker Engine - Community
 	Engine:
  	Version:          19.03.13
  	API version:      1.40 (minimum version 1.12)
  	Go version:       go1.13.15
  	Git commit:       4484c46d9d
  	Built:            Wed Sep 16 17:07:04 2020
  	OS/Arch:          linux/amd64
  	Experimental:     false
 containerd:
  	Version:          v1.3.7
  	GitCommit:        8fba4e9a7d01810a393d5d25a3621dc101981175
 runc:
  	Version:          1.0.0-rc10
  	GitCommit:        dc9208a3303feef5b3839f4323d9beb36df0a9dd
 docker-init:
  	Version:          0.18.0
  	GitCommit:        fec3683

$ docker-compose version
	docker-compose version 1.27.4, build 40524192
	docker-py version: 4.3.1
	CPython version: 3.7.4
	OpenSSL version: OpenSSL 1.1.1c  28 May 2019
```

- Navigate to the initial-project folder from a CLI terminal 
- Run the command: 
```
	docker-compose up -d 
```
- Connect to the database using a MySQL client ( I used HeidiSQL ) 
```
	Connection details:
	Host: 127.0.0.1
	User: root
	Password: toor 
	Port: 3306 
```
- Run the queries from database.sql file on the database called 'database' 
- PHP 5.6 project should now be up and running under http://127.0.0.1:8001/
- To stop it we need to run the command: 
```
	docker-compose down
```

## Using Symfony 3.4 

For the PHP 7.4 project I would like to start off with Symfony 3.4 ( on a machine with php version 7.4 ) as Symfony 3.4 is the latest version compatible with 5.6 and Symfony 4 has a minimum requirement of PHP 7.1, so any further release will not work on a PHP 5 machine. 

After creating the Symfony 3.4 project, it can be upgraded via composer to 4.4 once the server's PHP version is upgraded to 7.1+. 

## Installation instructions for new project 

