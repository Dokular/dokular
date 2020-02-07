cd /var/www/html
git pull
composer install
php artisan migrate -y
npm install
npm run production
exit
