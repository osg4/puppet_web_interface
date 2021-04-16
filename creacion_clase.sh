#!/bin/bash

su - Usuario <<EOF
contraseña
cd /var/www/proyecto/prueba8
pdk new class $1
EOF
