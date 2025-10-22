# Classifieds XML Export + FTPS (PHP)
Builds a classifieds XML (Willhaben-like) and uploads via FTPS.

## Run
```bash
cp .env.example .env
composer install
php examples/generate_and_upload.php

## C) Commit & push
```bash
git add .
git commit -m "Initial: XML export + FTPS upload"
git push -u origin main
