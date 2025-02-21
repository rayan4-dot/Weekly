# Weekly - Web Platform for Ads

🎯 **Objectif**  
Weekly is a web platform where users can post, view, and comment on ads. The application will be built using Laravel 11, following best practices for security, scalability, and maintainability.

## Features

- **User Management**: Secure authentication system (Laravel Breeze, Jetstream, or Laravel UI).
- **CRUD for Ads**: Full CRUD functionality for managing ads with pagination and soft delete.
- **Category Management**: Categorization of ads for better organization.
- **Comments**: Users can comment on each ad.
- **Development Tools**: Using Artisan commands (php artisan make --all), seeders, factories, and REPL (Tinker) for development and testing.

## Technologies and Tools

- **Framework**: Laravel (latest stable version)
- **Database**: MySQL / PostgreSQL
- **Frontend**: Blade + Tailwind CSS (via Laravel Breeze/Jetstream)
- **Authentication**: Laravel Breeze / Jetstream / UI
- **Development Tools**:
  - `php artisan make:model -mcr` (Models, Migrations, Controllers, Requests)
  - `php artisan make:seeder` & `php artisan make:factory` (Test data)
  - `php artisan tinker` (REPL for testing queries)
  - Eloquent ORM for database interactions

## Project Architecture

### 1️⃣ User Management (users)
- **Authentication**: Laravel Breeze / Jetstream for secure user login and registration.
- **User Profiles**: Manage user information.
- **Roles and Permissions** (optional): Implement roles like admin and user.
- **Model**: `User`
  - `id` (PK)
  - `name`
  - `email` (unique)
  - `password`
  - `role` (admin, user) (optional)
  - `timestamps`

#### Features
- User registration and login.
- Profile management.
- Middleware to restrict access to certain pages.

### 2️⃣ Ad Management (annonces)
- **CRUD with Pagination**: Users can create, view, edit, and delete ads (soft delete).
- **Relations**: Ads are related to users and categories.
- **Model**: `Annonce`
  - `id` (PK)
  - `title`
  - `description`
  - `price` (optional)
  - `image` (optional)
  - `user_id` (FK → users)
  - `category_id` (FK → categories)
  - `status` (active, draft, archived)
  - `deleted_at` (Soft Delete)
  - `timestamps`

#### Features
- Create and display ads.
- Edit and soft delete ads.
- Pagination for displaying ads.

### 3️⃣ Category Management (categories)
- **Ad Categorization**: Organize ads into categories.
- **CRUD for Admin**: Admins can manage categories.
- **Model**: `Category`
  - `id` (PK)
  - `name` (unique)
  - `slug` (SEO-friendly)
  - `timestamps`

#### Features
- Display categories.
- Link ads to categories.

### 4️⃣ Comment Management (commentaires)
- **Relation to Ads and Users**: Each comment is linked to an ad and a user.
- **Validation**: Comments are validated before submission.
- **Model**: `Commentaire`
  - `id` (PK)
  - `content`
  - `user_id` (FK → users)
  - `ad_id` (FK → ads)
  - `timestamps`

#### Features
- Add comments to ads.
- Delete own comments.

## Development Tools & Artisan Commands

1. **Generate Models and Migrations**:  
   `php artisan make:model -mcr Ad`  
   `php artisan make:model -mcr Category`  
   `php artisan make:model -mcr Comment`

2. **Add Factories and Seeders**:  
   `php artisan make:seeder AdSeeder`  
   `php artisan make:factory AdFactory`

3. **Use Tinker for Testing**:  
   `php artisan tinker` (Test queries interactively)

## Best Practices

- **Validation**: Use Form Requests to validate user inputs.
- **Middleware**: Secure access to resources with middleware.
- **Soft Delete**: Avoid permanent deletion of ads using soft delete.
- **Eloquent Relationships**: Leverage Eloquent relationships for clean, efficient queries.

---

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/rayan4-dot/weekly.git
   cd weekly
