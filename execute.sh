cd /var/www/html
git checkout public/css/app.css public/js/app.js
git pull deploy master
composer install
php artisan migrate --force
npm install
npm run production
exit
