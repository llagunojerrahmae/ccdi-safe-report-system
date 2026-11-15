# SafeReport

**SafeReport** is a web-based anonymous incident reporting system developed for the **Computer Communication Development Institute (CCDI)**. It gives students, teachers, and staff a safe and confidential way to report any incident or threat within the school, without fear of their identity being revealed.

## Developer

- **JERRAH MAE M. LLAGUNO**

## Members

- **SHERN KEITH PASADILLA**
- **JAMAICA JOY MALANA**
- **IVAN MANRIQUE**

**Course/Section:** BSIT Block 3-B
**Instructor:** Jay Millena
**School Year:** 2026-2027

## Features

- **100% Anonymous**: No personal information about the reporter is collected or stored.
- **Fast Reporting**: Select the incident type, fill in the details, and submit the report right away.
- **Track Report**: Reporters receive a tracking code they can use to check the status of their report.
- **Direct Action**: Every submitted report goes directly to the administration for prompt response.
- **Admin Dashboard**: Admins can log in to view, prioritize, update, and manage submitted reports.

## Technologies Used

- Laravel (PHP)
- MySQL (via XAMPP)
- Tailwind CSS
- Vite
- Blade Templates

## Requirements

- XAMPP (PHP 8.x and MySQL)
- Composer
- Node.js and npm

## Installation and Setup

1. Clone the repository:
   ```
   git clone [repo-link]
   cd ccdi-safe-report
   ```
2. Install dependencies:
   ```
   composer install
   npm install
   ```
3. Copy the environment file and generate the app key:
   ```
   copy .env.example .env
   php artisan key:generate
   ```
4. Start Apache and MySQL in XAMPP.
5. Open phpMyAdmin (`http://localhost/phpmyadmin`), create a database named `ccdi_safe_report`, then import `database/ccdi_safe_report_db.sql`.
   - Alternatively, run: `php artisan migrate --seed`
6. In two separate terminals, run:
   ```
   php artisan serve
   npm run dev
   ```
7. Open `http://127.0.0.1:8000` in your browser.