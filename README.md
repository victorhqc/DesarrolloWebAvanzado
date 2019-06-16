# DesarrolloWebAvanzado
Tarea para la materia de "Computación en el servidor web" en la "Maestría de Ingeniería de
Software".

## Requerimientos

- Instalar [XAMPP](https://www.apachefriends.org/index.html)
- Git

## XAMPP

Inicia XAMPP y consluta el [FAQ](http://localhost:8080) de forma local.

- **Raíz de archivos:** /Users/`<User>`/.bitnami/stackman/machines/xampp/volumes/root

## Desarrollo

Clona el repositorio localmente antes de empezar.

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

El siguiente script creará el archivo usado para realizar la autorización de usuarios.

```sh
init-file.sh
```

**Cuidado:** Cada vez que se ejecute el comando, el archivo `users.csv` será reinicializado.

## Notas

[Como es sabido](https://www.php.net/manual/en/faq.passwords.php#faq.passwords.fasthash), utilizar
SHA1 o md5 no es recomendado para contraseñas, ya que utilizar fuerza bruta para obtener la
contraseña es trivial hoy en día. Sin embargo, éste algoritmo es usado para simplificar el
ejercicio.
