# DesarrolloWebAvanzado
Tarea para la materia de "Computación en el servidor web" en la "Maestría de Ingeniería de
Software".

## Requerimientos

- Instalar [XAMPP](https://www.apachefriends.org/index.html)

## XAMPP

Inicia XAMPP y consluta el [FAQ](http://localhost:8080) de forma local.

- **Raíz de archivos:** /Users/`<User>`/.bitnami/stackman/machines/xampp/volumes/root


## Desarrollo

Para poder visualizar el proyecto utilizando XAMPP, primero es necesario tener corriendo el
servicio de XAMPP y tener montado el sistema de archivos de la máquina virtual que XAMPP provee.
Después, ejecutar el siguiente comando:

```sh
copy-files.sh USER
```

Reemplaza `USER` con el nombre de usuario que tu computadora tenga, por ejemplo: `v.quiroz` de tal
forma que el script sepa a dónde copiar los archivos.
