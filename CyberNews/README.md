## Sobre CyberNews 

CyberNews es un portal web dedicado a la constante publicación e información de noticias, también conocido como un periódico digital.

## Instalación

Una vez el proyecto ha sido clonado, realizar desde el directorio los siguientes pasos:

- git remote add origin https://gitlab.com/jr.melo/CyberNews.git
- git pull origin master
- composer install
- npm -g install
- Crear base de datos en mysql con el nombre 'cybernewsdb'.
- php artisan key:generate
- php artisan migrate:fresh --seed

## Crear Rama para Implementaciones

- Ubicarse en rama master.
- git checkout -b (NombreRama. Ej: "git checkout -b feature/crud-publicaciones").
- Luego de realizar cambios: git push origin "NombreDeRamaCreada".


## Licencia

Todos los derechos son reservados. CyberNews.
