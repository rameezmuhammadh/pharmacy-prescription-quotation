## Technologies and Packages Used for this app

-   Back-end: Laravel
-   Front-end: Blade
-   Database: sqlite
-   Breeze for User Authentication
-   Spatie for Role and Permission Management

## How to Clone this App

-   1. Use Git cole to clone this repo

````sh
   git clone (https://github.com/rameezmuhammadh/pharmacy-prescription-quotation.git)
```
   after cloning Navigate to Folder (Use cd folder-Name)
- 2.  Composer Install
  ```sh
composer install
```
- 3.  Copy .env.example and rename it .env
```sh
cp .env.example .env
```
- 4. Generate application key:

```sh
php artisan key:generate
```
- 5. Run database migrations:

```sh
php artisan migrate
```
- 6. Run database seeder:

```sh
php artisan db:seed
```

````


## Features
 - User Can Register and Login to system
 - User Can Uploade Prescriptions 
 - User can view Quotation for Prescription
 - User Can Accept or Reject Quotations
 - Email Notifications features (New Quotations, Prescription Upload and Quotation Status )
 - Admin can Create Quotations and Drug