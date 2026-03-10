# Abriba - Premium Laravel Blog Engine

[![Laravel Version](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/PHP-8.2%2B-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE.md)

**Abriba** is a modern, modular, and high-performance blog platform built with Laravel 12. Designed for scalability, SEO excellence, and developer productivity.

## 🚀 Quick Start

```bash
# Clone the repository
git clone https://github.com/boniyeamincse/aribablog.git abriba
cd abriba

# Run the setup script (includes composer, npm, migrations)
composer run setup
```

## 🏗️ Architecture

Abriba uses a **Module-Based Architecture** located in `app/Modules`. This provides a clean separation of concerns for features like User Management, SEO, and Media.

## 📚 Documentation

Comprehensive blueprints and guides are available in the [**docs/**](./docs) directory:

- [**Project Overview**](./docs/README.md) - Vision and Core Features.
- [**Modular Guide**](./docs/modules.md) - Detailed breakdown of all 11 modules.
- [**Architecture**](./docs/architecture.md) - Folder structure and design patterns.
- [**Database Schema**](./docs/database.md) - Table structures and ERD.
- [**API Reference**](./docs/api.md) - RESTful endpoints.
- [**Setup & Installation**](./docs/setup.md) - Developer environment configuration.
- [**Deployment**](./docs/deployment.md) - Production best practices.

## 🛠️ Key Modules

- **User Management**: RBAC, Profile, and Auth.
- **Blog Engine**: Advanced drafting, scheduling, and categorization.
- **SEO Ready**: Automatic sitemaps, meta management, and canonicals.
- **API First**: Headless capabilities with Sanctum auth.

## 🤝 Contributing

We welcome contributions! Please see our [Developer Setup Guide](./docs/setup.md) to get started.

## 📄 License

The Abriba blog engine is open-sourced software licensed under the [MIT license](LICENSE.md).
