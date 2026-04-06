@echo off
echo Installing PHP dependencies...
composer install
if %errorlevel% neq 0 exit /b %errorlevel%

echo Installing Node.js dependencies...
npm install
if %errorlevel% neq 0 exit /b %errorlevel%

if not exist .env (
    echo Creating .env file...
    copy .env.example .env
)

echo Generating application key...
php artisan key:generate
if %errorlevel% neq 0 exit /b %errorlevel%

echo Running migrations...
php artisan migrate
if %errorlevel% neq 0 exit /b %errorlevel%

echo Building frontend assets...
npm run build
if %errorlevel% neq 0 exit /b %errorlevel%

echo.
echo All dependencies installed and setup completed.
echo You can now run:
echo php artisan serve
echo npm run dev
pause
