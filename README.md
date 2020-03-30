# Laravel 6.0+/7.0+ UI/frontend preset for GOV.UK Frontend

For Laravel 7, use the latest version of this preset - `composer require cabinetoffice/laravel-govuk-frontend-preset`

For Laravel 6, use the version tagged as v1.0.3 - `composer require cabinetoffice/laravel-govuk-frontend-preset:v1.0.3`

*Using Laravel 5.x? See below*

A Laravel Front-end scaffolding preset for [GOV.UK Frontend](https://github.com/alphagov/govuk-frontend).

GOV.UK Frontend contains the code you need to start building a user interface for government platforms and services.

See live examples of GOV.UK Frontend components, and guidance on when to use them in your service, in the [GOV.UK Design System](https://design-system.service.gov.uk/).

We suggest you read the [GOV.UK Design System](https://design-system.service.gov.uk/) for full guidance.

*Current version:* **GOV.UK Frontend 3.6.0**

## Usage

1. Fresh install Laravel and cd to your app directory.
2. Install this preset via `composer require cabinetoffice/laravel-govuk-frontend-preset`. Laravel will automatically discover this package. You do not need to register the service provider.
3. Use `php artisan ui govuk` for the basic GOV.UK Frontend preset OR use `php artisan ui govuk-auth` for the basic preset, auth route entry and GOV.UK Frontend auth views in one go.
4. `npm install && npm run dev`
5. You may need to carry out additional configuration and database migration depending on your set up.
6. `php artisan serve` to run server and test preset.


### Laravel 5.x

If you want use [GOV.UK Frontend](https://github.com/alphagov/govuk-frontend) for Laravel 5.x, you can use [this original preset](https://packagist.org/packages/lukevincent/laravel-govuk-preset), maintained by Luke Vincent from DfT.

### Maintainers
The preset has been developed by Digital Communication, Cabinet Office and No10 Communication.

### Contributing
If you want to contribute, please do so with a pull request. 

### Security Vulnerabilities
If you discover vulnerability with this preset, please send an email to webmaster@cabinetoffice.gov.uk.

If you discover a security vulnerability within Laravel, please send an email to Taylor Otwell at taylor@laravel.com.

### License

Crown Copyright, 2020.
