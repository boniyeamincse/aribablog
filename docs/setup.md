# Setup & Installation Guide

Follow these steps to get your Abriba development environment running.

## Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js & NPM
- MySQL or PostgreSQL

## Installation Steps

1. **Clone the Repo**:
   ```bash
   git clone https://github.com/boniyeamincse/aribablog.git
   cd abriba
   ```

2. **Install PHP Dependencies**:
   ```bash
   composer install
   ```

3. **Environment Setup**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Configuration**:
   Update your `.env` file with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=abriba
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Run Migrations & Seeders**:
   ```bash
   php artisan migrate --seed
   ```

6. **Frontend Assets**:
   ```bash
   npm install
   npm run dev
   ```

7. **Local Server**:
   ```bash
   php artisan serve
   ```

## Development Commands
- `npm run build`: Production asset compilation.
- `php artisan test`: Run the test suite.
- `php artisan module:make`: (Custom command) Generate a new module scaffold.
