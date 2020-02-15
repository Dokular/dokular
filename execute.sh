cd /var/www/html
git pull deploy master
composer install
php artisan migrate --force
npm install
npm run production
exit
