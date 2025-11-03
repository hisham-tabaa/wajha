# Repository Overview

## Project
- **Name**: wejha backend
- **Framework**: Laravel (modular architecture via nwidart/laravel-modules)
- **Language**: PHP 8+
- **Primary Module**: Auth, System, etc.

## Conventions
- **Namespace Root**: `Modules\ModuleName`
- **Controllers**: Located in `Modules/<Module>/Http/Controllers`
- **Services**: Located in `Modules/<Module>/Services`
- **Requests**: Located in `Modules/<Module>/Http/Requests`
- **Routes**: Located in `Modules/<Module>/Routes`
- **Views**: Located in `Modules/<Module>/resources/views`

## Testing
- **Framework**: PHPUnit
- **Directory**: `tests/`

## Other Notes
- **Mail**: Verification email template at `Modules/Auth/resources/views/emails/verification-code.blade.php`
