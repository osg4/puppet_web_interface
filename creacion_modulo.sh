#!/bin/bash

su - usuario <<EOF
password
cd /var/www/proyecto/
pdk new module $1 --skip-interview
EOF
