## Sobre CyberNews [![Build Status](https://travis-ci.com/jr-melo/CyberNews.svg?branch=master)](https://travis-ci.com/jr-melo/CyberNews)

CyberNews es un portal web dedicado a la constante publicación e información de noticias, también conocido como un periódico digital.

## Instalación

Una vez el proyecto ha sido clonado, realizar desde el directorio los siguientes pasos:

- git clone https://github.com/jr-melo/CyberNews
- composer install
- npm install
- Crear base de datos en mysql con el nombre 'cybernewsdb'.
- Modificar archivo .env.example (Poner .env y asignar valores de db).
- php artisan key:generate
- php artisan migrate:fresh --seed

## Crear Rama para Implementaciones

- Ubicarse en rama master.
- git checkout -b NombreRama (Ej: "git checkout -b feature/crud-publicaciones").
- Luego de realizar cambios: git push origin "NombreDeRamaCreada".


## Licencia

Todos los derechos son reservados. CyberNews.
