#!/bin/bash

echo Copying files to XAMPP

if [[ "$1" != "" && "$1" != "./copy-files.sh" && "$1" != "copy-files.sh" ]];
then
  rm -rf /Users/$1/.bitnami/stackman/machines/xampp/volumes/root/htdocs/tarea
  cp -R src/ /Users/$1/.bitnami/stackman/machines/xampp/volumes/root/htdocs/tarea
  echo Copied files successfully
  echo Access to http://localhost:8080/tarea
  echo To see latest changes
else
  echo Call this file defining USER, example, "copy-files.sh foo"
fi
