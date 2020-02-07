cd /var/www/html
git pull
composer install
php artisan migrate --force
npm install
npm run production
exit
