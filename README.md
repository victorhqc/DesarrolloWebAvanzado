# DesarrolloWebAvanzado
Tarea para la materia de "Computación en el servidor web" en la "Maestría de Ingeniería de
Software".

## Requerimientos

- Instalar [XAMPP](https://www.apachefriends.org/index.html)
- PHP >=7.1
- Git

## XAMPP

Inicia XAMPP y consluta el [FAQ](http://localhost:8080) de forma local.

- **Raíz de archivos:** /Users/`<User>`/.bitnami/stackman/machines/xampp/volumes/root

## Desarrollo

Clona el repositorio localmente antes de empezar.

### Instala Dependencias con Composer

```sh
# Descargando instalador
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

# Instalando de forma global (Linux)
mv composer.phar /usr/local/bin/composer

# Instalando Laravel
composer global require laravel/installer

# Añadiendo los binarios descargados por composer a $PATH
echo 'export PATH="$PATH:$HOME/.composer/vendor/bin"' >> ~/.bashrc
source ~/.bashrc

# Instalando dependencias
composer install
```

### Apache

XAMPP utiliza Apache por defecto, para poder desarrollar el proyecto, se necesitan realizar algunos
cambios a su configuración. Es necesario editar el archivo `/opt/lampp/etc/extra/httpd-xampp.conf` y
añadir lo siguiente

```
<Directory "/opt/lamp/tarea">
  Require all granted
  Options Indexes FollowSymLinks
</Directory>
```

Esto para habilitar el acceso a la tarea.

### Archivos

Ya que hay muchos archivos en _vendor_, no es recomendable copiar los archivos a la carpeta de
XAMPP ya que toma mucho tiempo. Por lo tanto, es recomendable montar el volumen de XAMPP en el
sistema operativo y trabajar directamente en uno de las carpetas expuestas por Apache.

### Base de datos

Ya se han creado migraciones para crear las tablas necesarias. Para ejecutar el comando de
migración asegúrate de tener MySQL configurado y actualiza las variables necesarias en el archivo
`.env`. Después simplemente ejecuta

```sh
php artisan migrate
```

## Problemas conocidos

### Cache
De vez en cuando, Laravel emite algunos errores referentes al cache. Lo más fácil para arreglarlos
es hacer lo siguiente.

```sh
php artisan route:clear
php artisan config:clear
php artisan cache:clear
```

### Llave de aplicación

Para poder utilizar Laravel, se debe de crear una llave, la cual es la que se utiliza para
encritpar las contraseñas. Por cuestiones de seguridad, la llave debe de ser diferente en local y
en producción. Por lo tanto, la llave se debe generar en cada máquina que se utilice.

```sh
php artisan key:generate
php artisan config:clear
```
