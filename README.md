feecalculator
=============

A Symfony project created on October 14, 2017, 10:14 pm.

## Steps to Execute:

###Instalar docker 
https://www.docker.com/community-edition

###Levantar docker:

```$ docker-compose up -d --build```

###Hacer composer install:
```$ docker exec -it feecalculatortested_php_1 composer install -d /var/www/feecalculator```

###Ir a apidoc
```http://0.0.0.0:8080/api/doc```

Si en /etc/hosts incluyes 0.0.0.0 feecalculatortested.app podrás ejecutar el apidoc en
 ```http://feecalculator.app:8080/api/doc```

###Tirar los tests

```$ docker exec -it feecalculatortested_php_1 /var/www/feecalculator/vendor/bin/phpunit```

###Apagar los contendores
```$ docker-compose down```
