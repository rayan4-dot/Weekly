# Weekly - Laravel Classified Ads Platform

A modern web application built with Laravel 11 where users can publish, browse, and comment on classified advertisements. Features a beautiful UI with Tailwind CSS, role-based authentication, and admin management.

## 🚀 Features

### For Users
- **User Authentication**: Register, login, and manage profiles
- **Browse Ads**: View all advertisements with pagination
- **Create Ads**: Post new advertisements with categories
- **Comment System**: Add comments to advertisements
- **Edit/Delete**: Manage your own advertisements 

### For Administrators
- **Admin Dashboard**: Centralized management interface
- **Category Management**: Create, edit, and delete categories
- **Content Moderation**: Full control over advertisements 

### Technical Features
- **Modern UI**: Interface with Tailwind CSS
- **Responsive Design**: Works on desktop, tablet, and mobile
- **Role-Based Access**: Secure admin and user permissions
- **Soft Deletes**: Safe data deletion with recovery options
- **Form Validation**: Comprehensive input validation
- **Database Seeding**: Sample data for testing

## 🛠 Tech Stack

- **Backend**: Laravel 12
- **Frontend**: Blade Templates + Tailwind CSS
- **Database**: MySQL
- **Authentication**: Laravel Breeze
- **Authorization**: Laravel Policies
- **Validation**: Form Requests

## 📋 Prerequisites

Before you begin, ensure you have the following installed:
- PHP 8.2 or higher
- Composer
- Node.js & NPM
- MySQL 
- Git

## 🚀 Installation

### 1. Clone the Repository
```bash
git clone https://github.com/rayan4-dot/weekly.git
cd weekly
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure Database
Edit your `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=weekly_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5. Run Migrations and Seeders
```bash
php artisan migrate
php artisan db:seed
```

### 6. Build Assets
```bash
npm run dev
```

### 7. Start the Development Server
```bash
php artisan serve
```

Visit `http://localhost:8000` to see your application!

## 👤 Default Admin Account

After running the seeders, you can log in with the default admin account:
- **Email**: admin@example.com
- **Password**: password

## 📁 Project Structure

```
weekly/
├── app/
│   ├── Http/
│   │   ├── Controllers/     # Application controllers
│   │   ├── Requests/        # Form validation requests
│   │   └── Policies/        # Authorization policies
│   ├── Models/              # Eloquent models
│   └── Providers/           # Service providers
├── database/
│   ├── migrations/          # Database migrations
│   ├── seeders/            # Database seeders
│   └── factories/          # Model factories
├── resources/
│   └── views/              # Blade templates
│       ├── components/     # Reusable UI components
│       ├── layouts/        # Page layouts
│       ├── annonces/       # Advertisement views
│       ├── categories/     # Category views
│       └── admin/          # Admin dashboard views
└── routes/
    └── web.php             # Web routes
```

## 🔐 Authentication & Authorization

### User Roles
- **Regular Users**: Can create, edit, and delete their own advertisements and comments
- **Administrators**: Full access to all features including category management

### Policies
- `AnnoncePolicy`: Controls who can update/delete advertisements
- Category management is restricted to admin users via middleware
- Comment deletion is restricted to comment owners

## 🎨 UI Components

The application uses custom Blade components with modern styling:
- **Navigation**: Responsive navigation with admin links
- **Cards**: Modern card layouts for advertisements
- **Forms**: Styled forms with validation feedback
- **Buttons**: Gradient buttons with hover effects
- **Modals**: Rounded modals with smooth animations

## 📊 Database Schema

### Tables
- **users**: User accounts with role-based access
- **categories**: Advertisement categories
- **annonces**: Advertisements with soft delete
- **commentaires**: Comments on advertisements

### Relationships
- Users have many Advertisements and Comments
- Categories have many Advertisements
- Advertisements belong to Users and Categories
- Comments belong to Users and Advertisements

## 🧪 Testing

### Using Tinker
```bash
php artisan tinker
```

Example queries:
```php
// Get all advertisements with relationships
\App\Models\Annonce::with(['user', 'categorie'])->get();

// Get user's advertisements
$user = \App\Models\User::first();
$user->annonces;

// Get category's advertisements
$category = \App\Models\Categorie::first();
$category->annonces;
```

### Seeding Test Data
```bash
php artisan db:seed
```

This creates:
- 1 admin user
- 9 regular users
- 5 categories
- 20 advertisements
- 50 comments

## 🚀 Deployment

### Production Setup
1. Set `APP_ENV=production` in `.env`
2. Run `php artisan config:cache`
3. Run `php artisan route:cache`
4. Run `php artisan view:cache`
5. Build assets: `npm run build`

### Environment Variables
Make sure to configure these in production:
- `APP_ENV=production`
- `APP_DEBUG=false`
- `APP_URL=your-domain.com`
- Database credentials
- Mail configuration

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🆘 Support

If you encounter any issues or have questions:
1. Check the Laravel documentation
2. Review the error logs in `storage/logs/`
3. Open an issue on GitHub

## 🙏 Acknowledgments

- Laravel team for the amazing framework
- Tailwind CSS for the utility-first CSS framework
- Laravel Breeze for authentication scaffolding

---

**Happy coding! 🎉** 