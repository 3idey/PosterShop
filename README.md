# 🖼️ Poster Shop - Laravel Web Application

Poster Shop is a Laravel-based e-commerce platform that allows admins to upload posters and users to browse and purchase them.

---

## 🚀 Features

-   User registration & authentication (email or phone login)
-   Admin panel (guarded) to manage posters
-   Real cart persisted in DB (session-linked) with checkout and orders
-   Collections and poster detail pages
-   Responsive UI with reusable Blade components
-   Vite-powered assets and smart image resolution
-   Clean routing with middleware protection

## 🛠️ Setup

1. Copy env and generate key

```bash
cp .env.example .env
php artisan key:generate
```

2. Configure your DB in `.env` (MariaDB by default), then run migrations and seeders:

```bash
php artisan migrate --seed
```

3. Start the dev servers:

```bash
composer run dev
```

Vite dev server + Laravel server + queue worker + logs will start together.

## 🔐 Default Users

- Admin: admin@example.com / password
- User: test@example.com / password

## 📸 Images

- For uploaded images, run:

```bash
php artisan storage:link
```

- Built-in seed posters reference `resources/images/*` and are served via Vite. DB-stored image paths are resolved automatically in views.
