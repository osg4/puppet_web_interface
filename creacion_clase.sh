#!/bin/bash

su - Usuario <<EOF
password
cd /var/www/proyecto/$1/manifests/
pdk new class $2
EOF
