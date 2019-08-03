# DesarrolloWebAvanzado
Tarea para la materia de "Computación en el servidor web" en la "Maestría de Ingeniería de
Software".

## Requerimientos

- Instalar [XAMPP](https://www.apachefriends.org/index.html)
- PHP >=7.3
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
```

### Apache

XAMPP utiliza Apache por defecto, para poder desarrollar el proyecto, se necesitan realizar algunos
cambios a su configuración. Es necesario editar el archivo `/opt/lampp/extra/httpd-xampp.conf` y
añadir lo siguiente

```
<Directory "/opt/lamp/tarea">
  Require all granted
  Options Indexes FollowSymLinks
</Directory>
```

Esto para habilitar el acceso a la tarea.

### Archivos

Al estar trabajando con los archivos, es necesario entender que XAMPP crea una máquina virtual, la
cual tiene su propio sistema de archivos, independiente del sistema operativo que se esté
trabajando.

Al editar un archivo en el sistema operativo, es necesario reflejar esos cambios en la máquina
virtual, que para términos prácticos, es el servidor. Se han preparado dos _"scripts"_ que
facilitan un poco actualizar y crear los archivos necesarios.

**Copiar archivos al servidor:**

El siguiente script copiará el contenido de `src/` y lo copiará a la máquina virtual al directorio
de `tarea/`.

```sh
copy-files.sh USER
```

Reemplaza `USER` con el nombre de usuario que tu computadora tenga, por ejemplo: `v.quiroz` de tal
forma que el script sepa a dónde copiar los archivos.

Después, es necesario crear el archivo CSV para manejar los usuarios. Simplemente ejecuta lo
siguiente:

**Archivo CSV de autorización:**

Para guardar las contraseñas, es necesario crear un archivo con extensión `.csv` en blanco
directamente en el servidor donde se está ejecutando PHP. Se podría realizar un método menos
arcaico para crear éste archivo, pero para no complicar demasiado la tares se debe de realizar
manualmente para desarrollar y para ponerse en producción.

```sh
# Crear archivo de texto
touch users.csv
# Cambia los permisos para que PHP pueda escribir en él.
chmod 775 users.csv
# Cambia el propietario para que PHP pueda modificarlo.
chown daemon:daemon users.csv
# Copia la ruta donde se encuentra el archivo, necesario para incluirlo en el archivo de variables
# de entorno.
pwd
```

Asegúrate que el archivo se encuentre fuera de la carpeta donde vive directamente el código de
PHP, ya que al "deployar" nuevo código o al reemplazar los archivos en el desarrollo, el archivo
será re-escrito.

Además, es necesario que se incluya la ruta y el nombre del archivo de autorización en el archivo
de variables de entorno `.env` como se indica a continuación.

```
AUTHORIZATION_FILE=path/to/file/users.csv
```

Tanto la ruta como el nombre del archivo no importan. Sólo ten en cuenta que PHP debe poder acceder
y modificar el archivo, además de ser un archivo `.csv`

## Notas

[Como es sabido](https://www.php.net/manual/en/faq.passwords.php#faq.passwords.fasthash), utilizar
SHA1 o md5 no es recomendado para contraseñas, ya que utilizar fuerza bruta para obtener la
contraseña es trivial hoy en día. Sin embargo, éste algoritmo es usado para simplificar el
ejercicio.
