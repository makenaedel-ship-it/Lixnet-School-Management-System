# Development Setup Guide

This guide will help you set up the Lixnet School Management System for local development.

## 🛠️ Prerequisites

Before you begin, ensure you have the following installed on your development machine:

### Required Software

| Software | Version | Purpose |
|----------|---------|---------|
| **Node.js** | 18.x or higher | Frontend development and build tools |
| **PHP** | 8.1 or higher | Backend development |
| **Composer** | 2.x or higher | PHP dependency management |
| **MySQL** | 8.0 or higher | Database server |
| **Git** | Latest | Version control |

### Optional but Recommended

| Software | Purpose |
|----------|---------|
| **Docker & Docker Compose** | Containerized development environment |
| **Redis** | Caching and session storage |
| **VS Code** | Recommended IDE with extensions |

## 🚀 Quick Start with Docker

The fastest way to get started is using Docker Compose:

```bash
# Clone the repository
git clone https://github.com/frostlab63/Lixnet-School-Management-System.git
cd Lixnet-School-Management-System

# Start all services
docker-compose up -d

# Install dependencies
docker-compose exec backend composer install
docker-compose exec frontend npm install

# Setup database
docker-compose exec backend php artisan migrate --seed

# Access the application
# Frontend: http://localhost:3000
# Backend API: http://localhost:8000
# phpMyAdmin: http://localhost:8080
# MailHog: http://localhost:8025
```

## 🔧 Manual Setup

If you prefer to set up the development environment manually:

### 1. Clone and Setup Repository

```bash
git clone https://github.com/frostlab63/Lixnet-School-Management-System.git
cd Lixnet-School-Management-System
```

### 2. Backend Setup

```bash
cd backend

# Install PHP dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure database in .env file
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=lixnet_sms
# DB_USERNAME=your_username
# DB_PASSWORD=your_password

# Run database migrations and seeders
php artisan migrate --seed

# Start the development server
php artisan serve
```

### 3. Frontend Setup

```bash
cd frontend

# Install Node.js dependencies
npm install

# Copy environment file
cp .env.example .env

# Configure API URL in .env file
# REACT_APP_API_URL=http://localhost:8000/api

# Start the development server
npm start
```

## 🗄️ Database Setup

### Creating the Database

```sql
-- Connect to MySQL as root
mysql -u root -p

-- Create database
CREATE DATABASE lixnet_sms CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Create user (optional)
CREATE USER 'lixnet_user'@'localhost' IDENTIFIED BY 'your_password';
GRANT ALL PRIVILEGES ON lixnet_sms.* TO 'lixnet_user'@'localhost';
FLUSH PRIVILEGES;
```

### Running Migrations

```bash
cd backend

# Run migrations
php artisan migrate

# Run seeders (creates sample data)
php artisan db:seed

# Or run both together
php artisan migrate --seed

# Reset database (caution: deletes all data)
php artisan migrate:fresh --seed
```

## 🔑 Environment Configuration

### Backend Environment (.env)

```env
APP_NAME="Lixnet SMS"
APP_ENV=local
APP_KEY=base64:your-generated-key
APP_DEBUG=true
APP_URL=http://localhost:8000

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lixnet_sms
DB_USERNAME=lixnet_user
DB_PASSWORD=your_password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=localhost
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="noreply@lixnet.com"
MAIL_FROM_NAME="${APP_NAME}"

# M-Pesa Configuration (for development)
MPESA_ENV=sandbox
MPESA_CONSUMER_KEY=your_consumer_key
MPESA_CONSUMER_SECRET=your_consumer_secret
MPESA_SHORTCODE=174379
MPESA_PASSKEY=your_passkey
MPESA_CALLBACK_URL=http://localhost:8000/api/mpesa/callback

# JWT Configuration
JWT_SECRET=your_jwt_secret
JWT_TTL=60
```

### Frontend Environment (.env)

```env
REACT_APP_API_URL=http://localhost:8000/api
REACT_APP_APP_NAME="Lixnet SMS"
REACT_APP_VERSION=2.0.0

# Development settings
GENERATE_SOURCEMAP=true
REACT_APP_DEBUG=true

# Feature flags
REACT_APP_ENABLE_ANALYTICS=false
REACT_APP_ENABLE_NOTIFICATIONS=true
```

## 🧪 Running Tests

### Backend Tests

```bash
cd backend

# Run all tests
php artisan test

# Run tests with coverage
php artisan test --coverage

# Run specific test file
php artisan test tests/Feature/AuthTest.php

# Run tests in parallel
php artisan test --parallel
```

### Frontend Tests

```bash
cd frontend

# Run all tests
npm test

# Run tests with coverage
npm run test:coverage

# Run tests in CI mode
npm run test:ci

# Run specific test file
npm test -- StudentForm.test.tsx
```

## 🔍 Code Quality Tools

### Backend Code Quality

```bash
cd backend

# PHP CS Fixer (code formatting)
./vendor/bin/php-cs-fixer fix

# PHPStan (static analysis)
./vendor/bin/phpstan analyse

# Laravel Pint (code style)
./vendor/bin/pint

# Run all quality checks
composer run quality
```

### Frontend Code Quality

```bash
cd frontend

# ESLint (linting)
npm run lint
npm run lint:fix

# Prettier (formatting)
npm run format
npm run format:check

# TypeScript checking
npm run type-check
```

## 🐛 Debugging

### Backend Debugging

1. **Laravel Telescope** (included in development)
   - Access: http://localhost:8000/telescope
   - Monitor requests, queries, jobs, and more

2. **Debug Bar** (optional)
   ```bash
   composer require barryvdh/laravel-debugbar --dev
   ```

3. **Xdebug Setup** (optional)
   ```ini
   ; php.ini
   zend_extension=xdebug
   xdebug.mode=debug
   xdebug.start_with_request=yes
   xdebug.client_port=9003
   ```

### Frontend Debugging

1. **React Developer Tools** (browser extension)
2. **Redux DevTools** (browser extension)
3. **VS Code Debugger** configuration in `.vscode/launch.json`

## 📱 Mobile Development

For testing mobile responsiveness:

```bash
# Start frontend with network access
npm start -- --host 0.0.0.0

# Access from mobile device
# http://your-ip-address:3000
```

## 🔧 IDE Setup

### VS Code Extensions

Recommended extensions for optimal development experience:

```json
{
  "recommendations": [
    "ms-vscode.vscode-typescript-next",
    "bradlc.vscode-tailwindcss",
    "esbenp.prettier-vscode",
    "ms-vscode.vscode-eslint",
    "bmewburn.vscode-intelephense-client",
    "ms-vscode.vscode-docker",
    "ms-vscode.vscode-json"
  ]
}
```

### VS Code Settings

```json
{
  "editor.formatOnSave": true,
  "editor.defaultFormatter": "esbenp.prettier-vscode",
  "php.validate.executablePath": "/usr/bin/php",
  "typescript.preferences.importModuleSpecifier": "relative"
}
```

## 🚨 Troubleshooting

### Common Issues

1. **Port Already in Use**
   ```bash
   # Kill process on port 3000
   lsof -ti:3000 | xargs kill -9
   
   # Kill process on port 8000
   lsof -ti:8000 | xargs kill -9
   ```

2. **Permission Issues (Linux/Mac)**
   ```bash
   # Fix storage permissions
   sudo chown -R $USER:www-data backend/storage
   sudo chmod -R 775 backend/storage
   ```

3. **Composer Memory Issues**
   ```bash
   # Increase memory limit
   php -d memory_limit=-1 /usr/local/bin/composer install
   ```

4. **Node.js Version Issues**
   ```bash
   # Use Node Version Manager
   nvm install 18
   nvm use 18
   ```

### Getting Help

If you encounter issues not covered here:

1. Check the [FAQ](../user-guides/faq.md)
2. Search existing [GitHub Issues](https://github.com/frostlab63/Lixnet-School-Management-System/issues)
3. Create a new issue with detailed information
4. Join our development Slack channel

---

**Next Steps**: Once your development environment is set up, check out the [API Documentation](../api/README.md) and [Architecture Guide](../architecture/README.md).
