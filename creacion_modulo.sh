#!/bin/bash

su - Usuario <<EOF
contraseña
cd /var/www/proyecto/prueba8
pdk new module $1 --skip-interview
EOF
