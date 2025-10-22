# Classifieds XML Export + FTPS (PHP)

Builds a small classifieds XML (Willhaben-style) and uploads it via FTPS.

## Features
- XML generator for vehicles
- FTPS upload via cURL
- Env-based credentials

## Quick Start
cp .env.example .env
composer install
php examples/generate_and_upload.php
