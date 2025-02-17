## Booking System for Balloon Festivals

The Balloon Festival Booking System is an online platform designed to facilitate ticket reservations for balloon festivals. It allows users to browse available events, book tickets, and manage their reservations conveniently.

Note!: This project is currently in development, and this is only the first working version. Future updates will include additional features and improvements.


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

Create the symbolic link to files
```bash
php artisan storage:link
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