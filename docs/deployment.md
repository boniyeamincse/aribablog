# Production Deployment Guide

Instructions for deploying Abriba to a production environment.

## Server Requirements
- **Web Server**: Nginx or Apache
- **Cache**: Redis (Highly Recommended)
- **SSL**: Let's Encrypt (Required for API/Sanctum)

---

## Deployment Steps

### 1. Optimization Commands
Always run these during deployment:
```bash
composer install --no-dev --optimize-autoloader
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 2. Environment (Production)
Set these keys in your production `.env`:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com
```

### 3. File Permissions
Ensure the web server has write access to `storage` and `bootstrap/cache`:
```bash
sudo chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

### 4. CI/CD Pipeline (Recommended)
Use GitHub Actions or GitLab CI to automate:
- Linting (Pint)
- Testing (PHPUnit)
- Asset building (Vite)
- Zero-downtime deployment (Envoy/Laravel Forge)

---

## Monitoring
Integrate one for production health:
- **Sentry**: For error tracking.
- **Laravel Pulse**: For performance monitoring.
- **Log Viewer**: For debugging production issues securely.
