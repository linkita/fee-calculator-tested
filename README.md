feecalculator
=============


AVISO: Este proyecto es un ejercicio de testing. Los precios y valores no pertenecen a ninguna comercializadora. Cualquier parecido con la realidad es pura coincidencia ;)

A Symfony project created on October 14, 2017, 10:14 pm.

## Steps to Execute:

### Instalar docker 
https://www.docker.com/community-edition

### Levantar docker:

```$ docker-compose up -d --build```

### Hacer composer install:
```$ docker exec -it feecalculatortested_php_1 composer install -d /var/www/feecalculator```

La demo está incompleta y no tiene infrastructura (por ahora) . Con lo cual no tiene funcionalidad fuera de lanzar los tests unitarios.


### Tirar los tests (esto sí que va :) )

```$ docker exec -it feecalculatortested_php_1 /var/www/feecalculator/vendor/bin/phpunit```

### Apagar los contendores
```$ docker-compose down```
