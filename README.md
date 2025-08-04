# Student Gradebook

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)

A multi-role web application built with Laravel for managing and tracking student grades with three distinct user roles.

## Table of Contents
- [Features](#-features)
- [Technology Stack](#-technology-stack)
- [Installation](#-installation)
- [Usage Guide](#-usage-guide)
- [Screenshots](#-screenshots)
- [Contributing](#-contributing)
- [License](#-license)

## ✨ Features

### Admin Dashboard
- **User Management**: Create and manage instructor accounts
- **Course Management**: Create courses with unique codes and credit hours
- **Course Assignment**: Assign courses to instructors
- **Comprehensive Overview**: View all courses and instructor assignments

### Instructor Dashboard
- **Course List**: View all assigned courses
- **Grade Management**: Enter and update student scores (0-100)
- **Automatic Grading**: System converts scores to letter grades automatically

### Student Dashboard
- **Grade Portal**: View all grades for enrolled courses
- **GPA Calculator**: See cumulative GPA updated in real-time
- **Report Generator**: One-click PDF grade report download

## 🛠️ Technology Stack
- **Backend**: Laravel 11
- **Frontend**: Tailwind CSS, Alpine.js
- **Authentication**: Laravel Breeze
- **Database**: MySQL/SQLite
- **PDF Generation**: barryvdh/laravel-dompdf
- **Deployment**: Ready for Laravel Forge/Vapor

## 🚀 Installation

### Prerequisites
- PHP 8.2+
- Composer 2.0+
- Node.js 16+
- MySQL 5.7+ or SQLite

### Setup Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/Tovas7/student-gradebook.git
   cd student-gradebook
# Student Gradebook

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)

A multi-role web application built with Laravel for managing and tracking student grades with three distinct user roles.

## Table of Contents
- [Features](#-features)
- [Technology Stack](#-technology-stack)
- [Installation](#-installation)
- [Usage Guide](#-usage-guide)
- [Screenshots](#-screenshots)
- [Contributing](#-contributing)
- [License](#-license)

## ✨ Features

### Admin Dashboard
- **User Management**: Create and manage instructor accounts
- **Course Management**: Create courses with unique codes and credit hours
- **Course Assignment**: Assign courses to instructors
- **Comprehensive Overview**: View all courses and instructor assignments

### Instructor Dashboard
- **Course List**: View all assigned courses
- **Grade Management**: Enter and update student scores (0-100)
- **Automatic Grading**: System converts scores to letter grades automatically

### Student Dashboard
- **Grade Portal**: View all grades for enrolled courses
- **GPA Calculator**: See cumulative GPA updated in real-time
- **Report Generator**: One-click PDF grade report download

## 🛠️ Technology Stack
- **Backend**: Laravel 11
- **Frontend**: Tailwind CSS, Alpine.js
- **Authentication**: Laravel Breeze
- **Database**: MySQL/SQLite
- **PDF Generation**: barryvdh/laravel-dompdf
- **Deployment**: Ready for Laravel Forge/Vapor

## 🚀 Installation

### Prerequisites
- PHP 8.2+
- Composer 2.0+
- Node.js 16+
- MySQL 5.7+ or SQLite

### Setup Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/Tovas7/student-gradebook.git
   cd student-gradebook
   # Student Gradebook

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)

A multi-role web application built with Laravel for managing and tracking student grades with three distinct user roles.

## Table of Contents
- [Features](#-features)
- [Technology Stack](#-technology-stack)
- [Installation](#-installation)
- [Usage Guide](#-usage-guide)
- [Screenshots](#-screenshots)
- [Contributing](#-contributing)
- [License](#-license)

## ✨ Features

### Admin Dashboard
- **User Management**: Create and manage instructor accounts
- **Course Management**: Create courses with unique codes and credit hours
- **Course Assignment**: Assign courses to instructors
- **Comprehensive Overview**: View all courses and instructor assignments

### Instructor Dashboard
- **Course List**: View all assigned courses
- **Grade Management**: Enter and update student scores (0-100)
- **Automatic Grading**: System converts scores to letter grades automatically

### Student Dashboard
- **Grade Portal**: View all grades for enrolled courses
- **GPA Calculator**: See cumulative GPA updated in real-time
- **Report Generator**: One-click PDF grade report download

## 🛠️ Technology Stack
- **Backend**: Laravel 11
- **Frontend**: Tailwind CSS, Alpine.js
- **Authentication**: Laravel Breeze
- **Database**: MySQL/SQLite
- **PDF Generation**: barryvdh/laravel-dompdf
- **Deployment**: Ready for Laravel Forge/Vapor

## 🚀 Installation

### Prerequisites
- PHP 8.2+
- Composer 2.0+
- Node.js 16+
- MySQL 5.7+ or SQLite

### Setup Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/Tovas7/student-gradebook.git
   cd student-gradebook
   Install dependencies:

bash
composer install
npm install
npm run build
Configure environment:

bash
cp .env.example .env
php artisan key:generate
Set up database:

bash
php artisan migrate --seed
Start the server:

bash
php artisan serve
Access the application at: http://localhost:8000

Configuration
Environment Variables
Key configuration options in .env:

ini
APP_ENV=local
APP_DEBUG=true
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gradebook
DB_USERNAME=root
DB_PASSWORD=

# PDF Configuration
FPDF_FONTPATH=/path/to/fonts
User Roles
Configure in app/Providers/AuthServiceProvider.php:

php
Gate::define('admin', fn(User $user) => $user->role === 'admin');
Gate::define('instructor', fn(User $user) => $user->role === 'instructor');
Usage
Initial Setup
Create first admin user:

bash
php artisan make:admin
Log in at /login

Access admin dashboard at /admin

Common Workflows
Admin Creating Course:

Navigate to Courses > Add New

Enter course details:

Course Code (e.g., MATH-101)

Title

Credit Hours (1-4)

Assign instructor

Set enrollment capacity

Instructor Grading:

Select course from dashboard

Choose "Enter Grades"

Input scores or upload CSV

Submit to calculate letter grades

Student View:

Log in to view dashboard

Select "My Grades" for current courses

Click "Generate Report" for PDF transcript

Database Schema
https://docs/database_schema.png

Key Tables:

users (id, name, email, role)

courses (id, code, title, credits)

enrollments (id, user_id, course_id)

grades (id, enrollment_id, score, letter_grade)

API Endpoints
Endpoint	Method	Description
/api/courses	GET	List all courses
/api/grades/{course}	GET	Get grades for course
/api/report/generate	POST	Generate PDF grade report
Testing
Run test suite:

bash
php artisan test
Test Coverage Includes:

User authentication

Grade calculations

PDF generation

Role-based access control

Deployment
Production Requirements
Web server (Nginx/Apache)

Database server

Queue worker (for PDF generation)

Deployment Steps
Configure production .env

Run optimizations:

bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
Set up queue worker:

bash
php artisan queue:work
Troubleshooting
Common Issues:

PDF Generation Fails:

Ensure storage/ is writable

Verify font path configuration

Authentication Problems:

Clear cache:

bash
php artisan cache:clear
php artisan config:clear
Contributing
Fork the repository

Create feature branch:

bash
git checkout -b feature/new-feature
Commit changes:

bash
git commit -m "Add new feature"
Push to branch:

bash
git push origin feature/new-feature
Open pull request

License
MIT License - See LICENSE for details.

