#### Server Requirements
1. PHP >=8.0 ,
2. MySQL database,
3. Composer



#### Installation Steps

1. Clone the repo : `git clone https://github.com/syahrizal-alisadikin/workshop-pondokIT.git`
2. `$ cd workshop-pondokIT`
3. `$ composer install`
4. `$ cp .env.example .env`
5. `$ php artisan key:generate`
6. Create new MySQL database for this application  
(with simple command: `$ mysqladmin -urootuser -p create laravel_new`)
7. Set database credentials on `.env` file
8. `$ php artisan migrate`
9. `$ php artisan db:seed`
10. `$ php artisan storage:link`
11. `$ php artisan serve`


Starting Laravel development server: http://127.0.0.1:8000
