#!/bin/bash

su - Usuario <<EOF
contraseña
cd /var/www/proyecto/
pdk new module $1 --skip-interview
EOF
