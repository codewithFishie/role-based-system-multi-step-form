# Role-Based System Multi-Step Form

A Laravel 13 + Livewire project that implements a role-based authentication system with a 3-step registration form.

## What this project does

- Public 3-step registration form on the landing page
- Role-based access control for **Admin** and **User**
- Generates a unique **User ID** after successful form submission
- Sends the **User ID** and **temporary password** by email
- Allows login using **User ID or Email**
- Forces password change on first login
- Provides a normal **Change Password** option after login
- Separate dashboards for **Admin** and **User**
- Displays submitted registration data on the user dashboard
- Admin can view all user submissions
- MySQL database with included `.sql` export

## Tech stack

- **Framework:** Laravel 13
- **Frontend:** Blade, Livewire, Tailwind CSS
- **Database:** MySQL
- **Mail:** SMTP (Gmail SMTP was used during development)
- **Build Tool:** Vite

## Project structure

- `app/` – application logic, Livewire components, mail classes, models
- `resources/views/` – Blade templates and dashboards
- `routes/` – web routes
- `database/` – migrations and database-related files
- `role_based_system_multi_step_form.sql` – exported MySQL database

## Prerequisites

Before running the project, make sure you have:

- PHP 8.2+ 
- Composer
- Node.js and npm
- MySQL Server / MySQL Workbench
- A mail account for SMTP testing (optional but recommended)

## Setup

### 1. Clone the repository

```bash
git clone https://github.com/codewithFishie/role-based-system-multi-step-form.git
cd role-based-system-multi-step-form
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Install frontend dependencies

```bash
npm install
```

### 4. Create the environment file

```bash
cp .env.example .env
```

If you are on Windows and `cp` does not work, manually copy `.env.example` and rename it to `.env`.

### 5. Generate the application key

```bash
php artisan key:generate
```

### 6. Configure the database in `.env`

Update the following values in your `.env` file:

```env
APP_NAME="Role Based System Multi Step Form"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=role_based_system_multi_step_form
DB_USERNAME=root
DB_PASSWORD=8080
```

Change `DB_USERNAME` and `DB_PASSWORD` according to your local MySQL setup.

### 7. Import the MySQL database

Open MySQL Workbench and import the file:

```text
role_based_system_multi_step_form.sql
```

This file contains the required schema and sample data.

### 8. Configure mail (optional but recommended)

To send User ID and temporary password by email, configure SMTP in `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=sumon5505@gmail.com
MAIL_PASSWORD=azhu wkoe srol dpty
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=sumon5505@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

> If using Gmail, use an **App Password**, not your normal Gmail password.

### 9. Clear cache

```bash
php artisan optimize:clear
```

### 10. Start the development servers

Run Laravel:

```bash
php artisan serve
```

Run Vite in a separate terminal:

```bash
npm run dev
```

Then open:

```text
http://127.0.0.1:8000
```

## Application flow

### New user flow

1. Open the landing page
2. Fill out the **3-step registration form**
3. Submit the form
4. Receive **User ID** and **temporary password** by email
5. Sign in using **User ID or Email**
6. Change password on first login
7. View submitted information on the user dashboard

### Existing user flow

1. Click **Already a member? Sign in**
2. Log in using **User ID or Email** and password
3. Access the appropriate dashboard based on role

## Main features

### User

- Register using the 3-step form
- Receive unique User ID and temporary password by email
- Log in using User ID or Email
- Forced password reset on first login
- Change password after login
- View submitted form data on dashboard

### Admin

- Log in to admin dashboard
- View all submitted user records
- Change password after login

## Useful commands

```bash
php artisan optimize:clear
php artisan serve
npm run dev
php artisan tinker
```

### 1. `install_dependencies.bat`

This is the main Windows batch installer file.

Run it on Windows to automatically execute:

```bat
composer install
npm install
copy .env.example .env
php artisan key:generate
php artisan migrate
npm run build
```

Use this if you want a one-click dependency setup on Windows.

### 2. `install_dependencies.ps1`

This is the PowerShell version of the installer.

It performs the same setup steps as the `.bat` file, but is intended for PowerShell users.

Run it using:

```powershell
powershell -ExecutionPolicy Bypass -File install_dependencies.ps1
```

## Database Setup

Database used: **MySQL**

If you want to import the provided SQL file:

```bash
mysql -u root -p role_based_system_multi_step_form < role_based_system_multi_step_form.sql
```

## Important Notes

- Use **MySQL** for database setup
- Make sure your `.env` mail settings are correct for email sending
- Gmail users should use an **App Password**
- `install_dependencies.bat` or `install_dependencies.ps1` is the easiest way to set up dependencies on Windows

## Project Files you need

- Project source code
- `README.md`
- `install_dependencies.bat`
- `install_dependencies.ps1`
- `role_based_system_multi_step_form.sql`

## Author

GitHub: [codewithFishie](https://github.com/codewithFishie)


## License

This project is open-source and available under the MIT License.
