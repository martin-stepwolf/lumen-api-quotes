# Script to automate the installation process

# Install PHP dependencies
docker-compose exec app composer install
# Create the tables and fake data in the database
docker-compose exec app php artisan migrate --seed
