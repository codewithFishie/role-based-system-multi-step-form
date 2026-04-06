Write-Host "Installing PHP dependencies..."
composer install
if ($LASTEXITCODE -ne 0) { exit $LASTEXITCODE }

Write-Host "Installing Node.js dependencies..."
npm install
if ($LASTEXITCODE -ne 0) { exit $LASTEXITCODE }

if (-not (Test-Path ".env")) {
    Write-Host "Creating .env file..."
    Copy-Item ".env.example" ".env"
}

Write-Host "Generating application key..."
php artisan key:generate
if ($LASTEXITCODE -ne 0) { exit $LASTEXITCODE }

Write-Host "Running migrations..."
php artisan migrate
if ($LASTEXITCODE -ne 0) { exit $LASTEXITCODE }

Write-Host "Building frontend assets..."
npm run build
if ($LASTEXITCODE -ne 0) { exit $LASTEXITCODE }

Write-Host ""
Write-Host "All dependencies installed and setup completed."
Write-Host "You can now run:"
Write-Host "php artisan serve"
Write-Host "npm run dev"
