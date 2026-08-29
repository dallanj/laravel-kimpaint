# Kim Painting CMS

A custom marketing website and lightweight content management system built for a residential and commercial painting contractor in Ontario's Niagara region.

This repository is presented as a portfolio case study. It demonstrates how a small business website can combine a polished, responsive public experience with practical tools that let a non-technical client manage pages, navigation, project posts, gallery images, and testimonials without developer support.

> Client note: This began as a production client engagement. The repository is retained for educational and portfolio purposes; demo credentials and sample seed content are not production data.

## Product overview

The application serves two audiences:

- Visitors can explore services and recent projects, filter blog posts, read testimonials, and request an estimate through a validated contact form.
- Authenticated staff can manage site content through reactive Livewire interfaces, including rich-text pages, nested navigation, posts and categories, image uploads, and testimonials.

### Highlights

- Responsive public site built with Blade, Tailwind CSS, and Alpine.js
- Database-driven pages with configurable home and not-found fallbacks
- Searchable blog with category and author filters
- Livewire CRUD workflows with modal forms and pagination
- Trix rich-text editing for pages and posts
- Image upload management backed by Laravel's public filesystem
- Contact lead capture with server-side validation, database persistence, and email notification
- Laravel Jetstream authentication, email verification, teams, API tokens, and two-factor authentication

## Technical design

| Layer | Technology | Responsibility |
| --- | --- | --- |
| Backend | PHP 8, Laravel 8 | Routing, validation, email, persistence, authorization |
| Interactive UI | Livewire 2, Alpine.js | Reactive administration without a separate SPA |
| Presentation | Blade, Tailwind CSS 3 | Server-rendered, responsive interface |
| Data | Eloquent, MySQL | Pages, posts, navigation, contacts, media metadata |
| Tooling | Laravel Mix, PHPUnit | Asset compilation and automated checks |

The public routes are declared before the final CMS slug route, preventing dynamic pages from shadowing application endpoints. Contact submissions use a dedicated form request, store only validated attributes, send from the configured application address, and set the visitor as `Reply-To` to avoid mail spoofing issues.

## Local setup

Prerequisites:

- PHP 8.0 with the extensions required by Laravel 8
- Composer 2
- Node.js 16+ and npm
- MySQL 5.7+ or MariaDB 10.3+

Install and configure the application:

```bash
git clone <repository-url>
cd laravel-kimpaint
composer install
cp .env.example .env
php artisan key:generate
```

Create a database, update the `DB_*` values in `.env`, then run:

```bash
php artisan migrate --seed
php artisan storage:link
npm install
npm run dev
php artisan serve
```

Open `http://127.0.0.1:8000`. The seed creates sample content and a local-only administrator account:

```text
Email: demo@example.com
Password: password
```

Change or remove this account before exposing any seeded environment publicly.

### Email configuration

Contact requests are always saved to the database. To also deliver notifications, configure `MAIL_*` and set the recipient:

```dotenv
MAIL_CONTACT_RECIPIENT=contact@example.com
```

For local development, `MAIL_MAILER=log` is a convenient option; messages will be written to `storage/logs/laravel.log`.

## Useful commands

```bash
# Run the PHP test suite
php artisan test

# Rebuild front-end assets during development
npm run dev

# Create an optimized production bundle
npm run prod

# Reset and repopulate a local database
php artisan migrate:fresh --seed
```

## Project structure

```text
app/Http/Livewire/       Reactive content-management components
app/Http/Controllers/    Public blog and contact request handling
app/Http/Requests/       Reusable request validation
app/Models/              Eloquent domain models
database/migrations/     Relational schema
database/seeders/        Repeatable portfolio demo content
resources/views/         Blade layouts, components, and pages
resources/css/           Tailwind entry point and custom styling
routes/web.php           Public, authenticated, and CMS routes
```

## Refactoring notes

The portfolio version focuses on maintainability and operational safety while preserving the original client experience:

- consolidated duplicate dashboard routes and replaced repetitive view closures with `Route::view`
- restored database-driven page slugs with constrained, last-match routing
- standardized blog administration on the `Post` domain model
- replaced broad mass assignment with explicit allowlists and model casts
- moved contact validation into a form request and removed visitor-controlled sender addresses
- ensured deleting gallery records also removes their stored files
- replaced raw query-builder access on the homepage with Eloquent models
- added deterministic demo content for a working fresh install

## Further improvements

Given another iteration, the next priorities would be upgrading the Laravel/Livewire stack, adding browser coverage for each admin workflow, moving contact delivery to a queued mailable, adding spam protection and rate limiting, and migrating client-specific copy into configurable page sections.

## License

The application code is provided for portfolio and educational review. Client branding, copy, and photography remain the property of their respective owners and are not licensed for reuse.
