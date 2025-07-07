#  NOMAD: Secure Laravel CRUD System

This is a Laravel-based CRUD system built with advanced **security enhancements** including **Two-Factor Authentication (2FA)**, **RBAC**, **CSRF/XSS protection**, **SQL injection prevention**, and **secure file handling**.

---

##  Table of Contents

- [Project Overview](#project-overview)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Security Enhancements](#security-enhancements)
- [Team & Responsibilities](#team--responsibilities)
- [Installation](#installation)
- [Usage](#usage)
- [Folder Structure](#folder-structure)
- [License](#license)

---

## Project Overview

NOMAD is a secure Laravel-based CRUD application that allows users to manage **trips** and **destinations** with user authentication and admin capabilities. The application includes robust **backend security features** such as input validation, role-based access control, and 2FA.

---

##  Features

-  User Registration & Login
-  Email Verification
-  Two-Factor Authentication (2FA)
-  Role-Based Access Control (RBAC)
-  Admin Panel for User & Trip Management
-  Trip & Destination CRUD
-  Save/Remove Destinations
-  Secure File Upload Handling
-  Middleware-based Security Headers
-  SQL Injection & XSS Protection

---

##  Security Enhancements

###  Authentication & Authorization
- Laravel Fortify for Login, Registration, Password Reset
- Two-Factor Authentication via TOTP
- Custom Login Pipeline to enforce 2FA
- RBAC using Middleware (`admin`, `user` roles)

###  CSRF & XSS Protection
- CSRF token included in every form
- All Blade outputs escaped using `{{ }}`
- Sanitization on user input

###  SQL Injection Prevention
- Use of Eloquent ORM (parameterized queries)
- Server-side validation using Form Requests

###  File Upload Protection
- File type & size restrictions
- Laravel's `store` method for safe storage
- Upload directory access restricted via `.htaccess` (Apache)

###  Secure Headers Middleware
Added global middleware:
- `Content-Security-Policy`
- `X-Frame-Options`
- `X-Content-Type-Options`
- `Referrer-Policy`
- `Permissions-Policy`

---

##  Team & Responsibilities

| Name     | Role                         | Responsibilities |
|----------|------------------------------|------------------|
| **Moctar** | Leader, Security Enhancer     | - 2FA via Laravel Fortify<br>- RBAC & Middleware<br>- XSS & CSRF Prevention<br>- Project Coordination<br>- GitHub & Documentation |
| **Dinnie** | Developer, ZAP Scanner        | - OWASP ZAP Scanning<br>- Client & Server Side Input Validation<br>- Assisted in XSS/CSRF Mitigation |
| **Zaed**   | Developer, Security Configurator | - SQL Injection Prevention<br>- File Upload Security<br>- Web Server Security Configuration |

---

##  Technologies Used

- Laravel 12.x
- Laravel Fortify
- MySQL / phpMyAdmin
- Blade Templates
- Tailwind CSS
- OWASP ZAP (for testing)
- Git & GitHub

---

##  Installation

```bash
# 1. Clone the repo
git clone https://github.com/Mamito1234/NOMAD.git
cd NOMAD

# 2. Install dependencies
composer install
npm install && npm run build

# 3. Setup .env
cp .env.example .env
php artisan key:generate

# 4. Configure database in .env
# Then run:
php artisan migrate --seed

# 5. Run server
php artisan serve
````

---

##  Usage

* Visit `/register` to create a user.
* Visit `/dashboard` after login.
* Admin can manage users at `/admin/dashboard`.
* 2FA can be enabled from `/profile`.

---

##  Folder Structure

```
/app
    /Http
        /Controllers
        /Middleware
        /Requests
    /Models
    /Actions/Fortify
/resources
    /views
        /auth
        /profile
        /admin
/routes
    web.php
    auth.php
```

---

##  License

This project is open-sourced for educational purposes.

---

##  Contributions

Pull requests are welcome for enhancements, especially in areas of security and UI improvements.

---



<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
