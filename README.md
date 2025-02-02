## Booking System for Balloon Festivals

The Balloon Festival Booking System is an online platform designed to facilitate ticket reservations for balloon festivals. It allows users to browse available events, book tickets, and manage their reservations conveniently.

## How to run project

Install Dependencies 

```bash
composer install
npm install
```
Copy Environment File
```bash
cp .env.example .env
```

Generate Application Key
```bash
php artisan key:generate
```

Run Migrations
```bash
php artisan migrate
```
Install and Build Frontend
```bash
npm run build
```

Start the Development Server
```bash
php artisan serve
```