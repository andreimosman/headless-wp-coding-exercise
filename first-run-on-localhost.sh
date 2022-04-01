#!/bin/bash -e

echo "Running for the 1st time on localhost... "
docker-compose up -d

echo "Setting up wordpress... "
docker-compose run --rm wp-cli

echo "Installing and activating advanced-custom-fields... "
docker-compose run --rm wp-cli plugin install advanced-custom-fields --activate

echo "Activating WBL Breweries plugin... "
docker-compose run --rm wp-cli plugin activate wbl_breweries
echo ""
echo ""
echo "==========================================================="
echo Done! Ready to go. Access: http://localhost/wp-admin
echo "==========================================================="

echo ""
echo "[WARNING] Please wait 2 minutes before run the importer..."
echo ""
