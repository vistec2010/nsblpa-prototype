# NSBLPA Prototype

This is a mobile-first PHP prototype for the NSBLPA site (assignment).

## What's included
- index.php, ownership.php, teams.php, apps.php, contact.php
- header.php, footer.php, db.php (MySQL connection)
- assets/styles.css, assets/scripts.js, SVG placeholders in assets/images
- README and SQL to create `contacts` table

## How to run locally
1. Copy `nsblpa-prototype` into your local PHP server directory (e.g., htdocs for XAMPP).
2. Create a MySQL database called `nsblpa` and run the SQL file (contacts.sql) or run the SQL below.
3. Update `db.php` with DB credentials if needed.
4. Open `http://localhost/nsblpa-prototype/index.php` in your browser.

## SQL (contacts table)
```sql
CREATE DATABASE IF NOT EXISTS nsblpa;
USE nsblpa;
CREATE TABLE contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150),
  email VARCHAR(150),
  message TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Notes & design decisions
- Mobile-first CSS, lightweight and responsive.
- Semantic HTML and simple ARIA for navigation and forms.
- No external frameworks required; works offline without build tools.
- Placeholder SVGs used for logos to keep assets small and editable.
