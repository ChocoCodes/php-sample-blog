# 📓 PHP Simple Blog

A small and beginner-friendly blog system built with **PHP** and **MySQL**, demonstrating secure coding practices like **prepared statements** and **input sanitization** for Databases. Intended for beginner's reference and guide

---

## 🔧 Features

- 📝 Add new blog posts (title + content)
- 🗂 List all posts on homepage
- 🔐 Secured against SQL injection using prepared statements
- 🎨 Minimal HTML/CSS layout, easy to customize

---

## 🛠️ Database Setup (via phpMyAdmin)

Follow these steps to set up the MySQL database using XAMPP:

### 1. Start XAMPP

- Open the **XAMPP Control Panel**
- Start both services:
  - ✅ Apache
  - ✅ MySQL

### 2. Access phpMyAdmin

- Open your browser and go to:
```http://localhost/phpmyadmin```

markdown
Copy
Edit

### 3. Create the Database

- Click **"New"** in the left sidebar
- Name the database:
blog_db

sql
Copy
Edit
- Click **"Create"**

### 4. Create the `posts` Table

- Click on the `blog_db` database in the left sidebar
- Go to the **SQL** tab
- Paste the following SQL command:

```sql
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
Click "Go" to execute and create the table