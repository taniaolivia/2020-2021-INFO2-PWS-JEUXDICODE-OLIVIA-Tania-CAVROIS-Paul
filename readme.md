**IUT La Rochelle**   
**Département Informatique**   
**2O20-2021**   
**PWS Docker-Template Project**   

# Structure docker d'un projet Symfony5

Ce projet peut déployer une application développée en php7.4 dans apache2. 

Ce projet montre la structure docker utilisée pour les projets Symfony5
qui utilisent une base de données du serveur Mysql:8.0 et déployés
dans un serveur Web de type Apache2. 

# Comment changer ma config entre une app php et une app sf

## Pour une application php 

Dans `docker-compose.yml`, il faut définir la variable : 
```docker
APP_DOCUMENT_ROOT: /var/www/html/phpdemo
```

## Pour une application sf

Dans `docker-compose.yml`, il faut définir la variable : 
```docker
APP_DOCUMENT_ROOT: /var/www/html/symfonydemo/public
```

# Build and up docker containers

```
docker-compose up --build
```

# Execute app 

Open a web client and visit the url : 
```
http://localhost:9999
```


