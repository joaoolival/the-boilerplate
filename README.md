# The Boilerplate

A modern, production-ready Laravel boilerplate with Vue 3, Tailwind CSS 4, and Shadcn UI. Built for developers who want to ship fast without sacrificing quality.

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![Vue](https://img.shields.io/badge/Vue-3-4FC08D?style=flat-square&logo=vue.js&logoColor=white)
![Tailwind](https://img.shields.io/badge/Tailwind-4-06B6D4?style=flat-square&logo=tailwindcss&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php&logoColor=white)

## ✨ Features

### Landing Page

- Beautiful, responsive landing page with modern design
- Hero section with call-to-action buttons
- Features grid showcasing the tech stack
- Footer with navigation links

### Authentication System

- **Login** - Secure user authentication
- **Registration** - New user sign-up
- **Password Reset** - Forgot password flow with email
- **Email Verification** - Verify user email addresses
- **Two-Factor Authentication** - TOTP-based 2FA with QR codes and recovery codes
- **Password Confirmation** - Confirm password for sensitive actions

### Dashboard

- Protected dashboard area for authenticated users
- Modern sidebar navigation with user menu
- Breadcrumb navigation
- Dark/Light mode support

### Settings

- **Profile** - Update name and email
- **Password** - Change password securely
- **Two-Factor** - Enable/disable 2FA with setup wizard
- **Appearance** - Toggle between dark and light themes
- **Account Deletion** - Permanently delete account

### Blog System

- Full-featured blog powered by [laravel-blog-engine](https://github.com/joaoolival/laravel-blog-engine)
- **Posts** - Rich content with featured images
- **Categories** - Organize posts by category
- **Authors** - Author profiles with social links
- **SEO Friendly** - Meta tags and Open Graph support
- **Filament Admin Panel** - Manage content with Filament 5

### Legal Pages

- Terms of Service
- Privacy Policy
- Cookie Policy

---

## 🛠️ Tech Stack

### Backend

| Package    | Version | Description                    |
| ---------- | ------- | ------------------------------ |
| Laravel    | 12      | PHP framework                  |
| Inertia.js | 2       | Modern monolith SPA approach   |
| Fortify    | 1       | Authentication scaffolding     |
| Horizon    | 5       | Queue monitoring dashboard     |
| Wayfinder  | 0.1     | Type-safe routing for frontend |

### Frontend

| Package      | Version | Description                 |
| ------------ | ------- | --------------------------- |
| Vue          | 3       | Reactive UI framework       |
| Tailwind CSS | 4       | Utility-first CSS           |
| Shadcn Vue   | -       | Beautiful UI components     |
| Lucide Icons | -       | Modern icon library         |
| VueUse       | 12      | Collection of Vue utilities |

### Development Tools

| Tool               | Description                    |
| ------------------ | ------------------------------ |
| Laravel Sail       | Docker development environment |
| Pest               | PHP testing framework          |
| Pint               | PHP code style fixer           |
| PHPStan (Larastan) | Static analysis                |
| ESLint             | JavaScript linting             |
| Prettier           | Code formatting                |
| Vite               | Frontend build tool            |

### Admin Panel

| Package  | Version | Description           |
| -------- | ------- | --------------------- |
| Filament | 5       | Admin panel framework |
| Livewire | 4       | Dynamic components    |

---

## 📋 Requirements

- **PHP** >= 8.2
- **Node.js** >= 18
- **Docker** (for Laravel Sail)
- **Composer** >= 2.x

---

## 🚀 Installation

### Using Laravel Sail (Recommended)

1. **Clone the repository**

    ```bash
    git clone https://github.com/your-username/the-boilerplate.git
    cd the-boilerplate
    ```

2. **Copy environment file**

    ```bash
    cp .env.example .env
    ```

3. **Install PHP dependencies**

    ```bash
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php85-composer:latest \
        composer install --ignore-platform-reqs
    ```

4. **Start Laravel Sail**

    ```bash
    ./vendor/bin/sail up -d
    ```

5. **Generate application key**

    ```bash
    ./vendor/bin/sail artisan key:generate
    ```

6. **Run database migrations**

    ```bash
    ./vendor/bin/sail artisan migrate
    ```

7. **Install frontend dependencies**

    ```bash
    ./vendor/bin/sail npm install
    ```

8. **Build frontend assets**

    ```bash
    ./vendor/bin/sail npm run build
    ```

9. **Access the application**

    Open [http://localhost](http://localhost) in your browser.

### Quick Setup (Alternative)

If you have all dependencies installed locally, you can use the setup script:

```bash
composer setup
```

This will:

- Install PHP dependencies
- Copy `.env.example` to `.env`
- Generate application key
- Run migrations
- Install npm dependencies
- Build frontend assets

---

## 🔧 Development

### Starting the Development Server

The project includes a convenient development script that starts all necessary services:

```bash
./vendor/bin/sail composer run dev
```

This runs concurrently:

- **Laravel Server** - PHP development server
- **Queue Worker** - Process queued jobs
- **Pail** - Real-time log viewer
- **Vite** - Frontend dev server with HMR

Alternatively, you can run services individually:

```bash
# Start Sail containers
./vendor/bin/sail up -d

# In a separate terminal, start Vite
./vendor/bin/sail npm run dev
```

### SSR Development

For Server-Side Rendering development:

```bash
./vendor/bin/sail composer run dev:ssr
```

### Running Tests

```bash
# Run all tests
./vendor/bin/sail artisan test

# Run specific test file
./vendor/bin/sail artisan test tests/Feature/ExampleTest.php

# Run with filter
./vendor/bin/sail artisan test --filter=testName

# Run with compact output
./vendor/bin/sail artisan test --compact
```

### Code Quality

```bash
# Format PHP code with Pint
./vendor/bin/sail composer run format

# Check PHP formatting
./vendor/bin/sail composer run test:lint

# Run static analysis
./vendor/bin/sail composer run analyse

# Format frontend code
./vendor/bin/sail npm run format

# Lint frontend code
./vendor/bin/sail npm run lint
```

---

## 📁 Project Structure

```
the-boilerplate/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── Blog/           # Blog controllers
│   │       └── Settings/       # User settings controllers
│   └── Models/                 # Eloquent models
├── bootstrap/
│   ├── app.php                 # Application configuration
│   └── providers.php           # Service providers
├── config/                     # Configuration files
├── database/
│   ├── factories/              # Model factories
│   ├── migrations/             # Database migrations
│   └── seeders/                # Database seeders
├── public/                     # Public assets
├── resources/
│   ├── js/
│   │   ├── Components/         # Vue components
│   │   │   ├── blog/           # Blog-specific components
│   │   │   └── ui/             # Shadcn UI components
│   │   ├── Layouts/            # Page layouts
│   │   └── pages/              # Inertia pages
│   │       ├── auth/           # Authentication pages
│   │       ├── blog/           # Blog pages
│   │       ├── legal/          # Legal pages
│   │       └── settings/       # Settings pages
│   └── views/                  # Blade templates
├── routes/
│   ├── web.php                 # Web routes
│   └── console.php             # Console commands
├── tests/
│   ├── Feature/                # Feature tests
│   └── Unit/                   # Unit tests
└── compose.yaml                # Docker Compose configuration
```

---

## 🗄️ Database

The boilerplate uses MySQL by default with Laravel Sail. The database schema includes:

### Core Tables

- **users** - User accounts with 2FA support

### Blog Tables (via laravel-blog-engine)

- **blog_posts** - Blog articles
- **blog_authors** - Post authors
- **blog_categories** - Post categories
- **blog_post_category** - Many-to-many relationship

### Other Tables

- **sessions** - Session storage
- **cache** - Cache storage
- **jobs** / **failed_jobs** - Queue system

---

## 🎨 Customization

### Changing the App Name

Update the following files:

1. `.env` - Set `APP_NAME`
2. `config/app.php` - Modify default name
3. `resources/js/Components/AppLogo.vue` - Update logo

### Adding New Pages

1. Create Vue component in `resources/js/pages/`
2. Add route in `routes/web.php`
3. Use Inertia to render the page

Example:

```php
// routes/web.php
Route::get('/about', fn () => Inertia::render('About'))->name('about');
```

```vue
<!-- resources/js/pages/About.vue -->
<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import WebLayout from '@/Layouts/WebLayout.vue';
</script>

<template>
    <WebLayout>
        <Head title="About" />
        <!-- Your content -->
    </WebLayout>
</template>
```

### UI Components

This boilerplate uses [Shadcn Vue](https://www.shadcn-vue.com/) components. Add new components with:

```bash
npx shadcn-vue@latest add button
```

---

## 📦 Available Scripts

### Composer Scripts

| Script             | Description               |
| ------------------ | ------------------------- |
| `composer setup`   | Full project setup        |
| `composer dev`     | Start development servers |
| `composer dev:ssr` | Start SSR development     |
| `composer lint`    | Run Pint in parallel      |
| `composer format`  | Format code with Pint     |
| `composer analyse` | Run PHPStan analysis      |
| `composer test`    | Run all tests             |

### NPM Scripts

| Script           | Description                         |
| ---------------- | ----------------------------------- |
| `npm run dev`    | Start Vite dev server               |
| `npm run build`  | Build for production (client + SSR) |
| `npm run format` | Format with Prettier                |
| `npm run lint`   | Lint with ESLint                    |

---

## 🌐 Routes

### Public Routes

| Route                   | Description      |
| ----------------------- | ---------------- |
| `/`                     | Landing page     |
| `/blog`                 | Blog posts index |
| `/blog/{slug}`          | Single blog post |
| `/blog/authors`         | All authors      |
| `/blog/author/{slug}`   | Author profile   |
| `/blog/categories`      | All categories   |
| `/blog/category/{slug}` | Category posts   |
| `/terms`                | Terms of service |
| `/privacy`              | Privacy policy   |
| `/cookies`              | Cookie policy    |

### Authentication Routes

| Route                     | Description            |
| ------------------------- | ---------------------- |
| `/login`                  | Login page             |
| `/register`               | Registration page      |
| `/forgot-password`        | Password reset request |
| `/reset-password/{token}` | Password reset form    |
| `/verify-email`           | Email verification     |
| `/two-factor-challenge`   | 2FA challenge          |

### Protected Routes

| Route                  | Description       |
| ---------------------- | ----------------- |
| `/dashboard`           | User dashboard    |
| `/settings/profile`    | Profile settings  |
| `/settings/password`   | Password settings |
| `/settings/two-factor` | 2FA settings      |
| `/settings/appearance` | Theme settings    |

### Admin Routes

| Route    | Description          |
| -------- | -------------------- |
| `/admin` | Filament admin panel |

---

## 🔐 Environment Variables

Key environment variables to configure:

```env
# Application
APP_NAME=YourAppName
APP_URL=http://localhost
APP_ENV=local

# Database (configured for Sail)
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=sail
DB_PASSWORD=password

# Mail (for password resets, verification)
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025

# Queue
QUEUE_CONNECTION=database

# Cache
CACHE_STORE=database
```

---

## 🐳 Docker Services

Laravel Sail includes these services:

| Service     | Port | Description         |
| ----------- | ---- | ------------------- |
| Laravel     | 80   | Main application    |
| MySQL       | 3306 | Database            |
| Redis       | 6379 | Cache & sessions    |
| Meilisearch | 7700 | Full-text search    |
| Vite        | 5173 | Frontend dev server |

---

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

---

## 📝 License

This project is open-sourced software licensed under the [MIT license](LICENSE).

---

## 🙏 Acknowledgments

- [Laravel](https://laravel.com) - The PHP framework for web artisans
- [Vue.js](https://vuejs.org) - The progressive JavaScript framework
- [Tailwind CSS](https://tailwindcss.com) - A utility-first CSS framework
- [Inertia.js](https://inertiajs.com) - The modern monolith
- [Shadcn Vue](https://www.shadcn-vue.com/) - Beautiful UI components
- [Filament](https://filamentphp.com) - Admin panel built for Laravel
