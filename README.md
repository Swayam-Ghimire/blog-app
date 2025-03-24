# The Blog App

A feature-rich Laravel-based blogging platform that allows users to create, manage, and interact with blog posts. The app includes authentication, comments, author profiles.

## Features

- 📝 **Create, Edit, and Delete Posts**  
- 🔐 **User Authentication** (Register/Login)  
- 💬 **Comment System** (With Toggle UI)  
- 👤 **Author Profiles** (With Profile Picture Update)  
- 📅 **Timestamps & Author Info on Posts**  
- 📷 **Image Upload Support** for Posts and Profiles   
- ⚙️ **Authorization with Policies** (Only owners can edit/delete posts)  
- 🔄 **Back Button Navigation**  

## Installation

1. **Clone the repository**  
```sh
git clone https://github.com/your-repo/blog-app.git
```

2. **Navigate to the project directory:**
```sh 
    cd blog-app
```
3. **Install dependencies:**
```sh
composer install
```

4. **Install frontend dependencies:**
```sh
npm install
```
5. **Add a .env file to the root folder and copy the contents of .env.example into the .env file.**
```sh
cp .env.example .env
```

6. 
```sh 
php artisan key:generate
```
7. **Run migration files and seed the table:**
```sh
php artisan migrate --seed
```
8. **Run the application:**
```sh
php artisan serve
npm run dev
```
