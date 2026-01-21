# Maintainer Guide

This guide covers the essential workflows for maintaining this project.

---

## Pre-Push Checklist

Run these commands before every push to ensure CI passes:

```bash
# 1. Format PHP code
composer format

# 2. Format frontend code (Prettier)
npm run format

# 3. Lint frontend code (ESLint)
npm run lint

# 4. Build to verify no errors
npm run build

# 5. Run tests
composer test
```

### One-Liner

```bash
composer format && npm run format && npm run lint && npm run build && composer test
```

---

## Available Scripts

### PHP (Composer)

| Command              | Description                                        |
| -------------------- | -------------------------------------------------- |
| `composer dev`       | Start all dev servers (Laravel, Queue, Logs, Vite) |
| `composer format`    | Format PHP code with Pint                          |
| `composer test:lint` | Check PHP formatting (CI mode)                     |
| `composer analyse`   | Run PHPStan static analysis                        |
| `composer test`      | Run full test suite                                |

### Frontend (NPM)

| Command                | Description                         |
| ---------------------- | ----------------------------------- |
| `npm run dev`          | Start Vite dev server               |
| `npm run build`        | Build for production (client + SSR) |
| `npm run format`       | Format with Prettier                |
| `npm run format:check` | Check formatting (CI mode)          |
| `npm run lint`         | Lint and fix with ESLint            |

---

## CI Pipeline

The GitHub Actions workflows run these checks:

### Tests (`tests.yml`)

- Runs on PHP 8.4
- Creates SQLite database
- Runs migrations
- Builds frontend assets
- Runs Pest tests

### Linter (`lint.yml`)

- `composer test:lint` - PHP formatting check
- `npm run format:check` - Prettier check
- `npx eslint . --max-warnings 0` - ESLint check

---

## Common Issues

### Case Sensitivity

- **Problem**: macOS is case-insensitive, Linux (CI) is case-sensitive
- **Solution**: Always use correct casing for imports (`@/Components/`, `@/Layouts/`)

### Import Ordering

- Prettier's `organize-imports` plugin handles import sorting
- ESLint's `import/order` rule is disabled to avoid conflicts

### Build Fails on CI

1. Check for case-sensitive path issues
2. Run `npm run build` locally to verify
3. Ensure all imports use the correct `@/` alias

---

## Development Workflow

### Starting Development

```bash
# Using Sail (Docker)
./vendor/bin/sail up -d
./vendor/bin/sail composer run dev

# Or directly
composer dev
```

### Creating New Features

1. Create branch from `main`
2. Make changes
3. Run pre-push checklist
4. Push and create PR

### Adding UI Components

```bash
npx shadcn-vue@latest add <component-name>
```

---

## Project Conventions

### Directory Structure

- `resources/js/Components/` - Vue components (uppercase)
- `resources/js/Layouts/` - Layout components (uppercase)
- `resources/js/pages/` - Inertia pages (lowercase)
- `resources/js/composables/` - Vue composables

### Import Paths

- Use `@/` alias for all imports
- Example: `import Button from '@/Components/ui/button'`

### Testing

- Feature tests: `tests/Feature/`
- Unit tests: `tests/Unit/`
- Use Pest syntax
- Run specific test: `composer test -- --filter=testName`
