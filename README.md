# SafeReport

**SafeReport** is a web-based anonymous incident reporting system developed for the **Computer Communication Development Institute (CCDI)**. It gives students, teachers, and staff a safe and confidential way to report any incident or threat within the school, without fear of their identity being revealed.

## Full-Stack Developer, UI/UX Designer, Tester, and Project Manager
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
- **Faculty Request Approval by Authorized Personnel**: Administrators can review, verify, approve, reject, or revoke faculty account requests to ensure that only authorized CCDI personnel gain access to internal incident reports.
- **Faculty Interface**: Verified faculty members can log in to view reports, update incident statuses (e.g., *Reviewing*, *I will handle this*, *Resolved*), and send direct investigation notes to the admin.
- **Admin Dashboard**: Admins can log in to view, prioritize, update, and manage submitted reports.

## Requirements

- PHP 8.2 or higher
- Composer
- Node.js and npm
- MySQL (for example through XAMPP)

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

5. Open phpMyAdmin (`http://localhost/phpmyadmin`) and create an empty database named `ccdi_safe_report_db`.

6. Open `.env` and make sure the database settings match your MySQL setup (the default XAMPP values are shown below):
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ccdi_safe_report_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```
   If your MySQL runs on a different port, change `DB_PORT` accordingly.

7. Create the tables and the test accounts:
   ```
   php artisan migrate --seed
   ```

8. In two separate terminals, run:
   ```
   php artisan serve
   npm run dev
   ```
9. Open `http://127.0.0.1:8000` in your browser.

## Notes for Evaluation

- The test faculty account is **already approved**, so it can log in right away without going through the admin approval.
- New faculty registrations need admin approval first. To try this, register a new account on the Faculty Login page, then log in as admin and approve it under **Faculty Requests**.
- Faculty registration only works for faculty listed in the school roster (`faculty_rosters` table), which is also filled in by the seeder.
- Students can submit reports anonymously without logging in. A tracking code is given after submitting, which can be used on the **Track Report** page.
- If a login shows **"Invalid credentials"**, reset the database and the test accounts with:
  ```
  php artisan migrate:fresh --seed
  ```
  This deletes all existing data and recreates the tables and test accounts.
- If the test faculty account was revoked in the admin panel, click **Approve** on it again under **Faculty Requests**.

## Credits
Credits to the following technologies used in this system:

- Laravel (PHP) as our back-end PHP framework
- MySQL (via XAMPP) as our database
- Tailwind CSS as our main utility-first CSS framework
- Vite as our front-end build tool
- Blade Templates as our templating engine