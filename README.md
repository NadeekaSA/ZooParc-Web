# ZooParc-Web

## Introduction

ZooParc-Web is a comprehensive web application for managing a zoo. It provides a public-facing website with information about the zoo, a member area for registered users, and an admin panel for managing the zoo's operations.

## Features

### Public Features

*   **View Animals:** Browse a list of animals in the zoo, with details about each species.
*   **View Habitats:** Explore the different habitats within the zoo.
*   **View Services:** See the services offered by the zoo (e.g., guided tours, restaurants).
*   **Contact Form:** Send inquiries to the zoo administration.
*   **User Registration:** Register for a member account.
*   **User Login:** Access the member area.

### Member Features

*   **Submit Animal Reviews:** Members can submit reviews and ratings for animals they have seen.
*   **View Approved Reviews:** View their own approved reviews.
*   **Personalized Dashboard:** (Future enhancement) A dashboard tailored to member preferences.

### Admin Features

*   **User Management:**
    *   Create, edit, and delete user accounts.
    *   Assign roles (e.g., admin, employee, veterinarian).
*   **Animal Management:**
    *   Add, update, and delete animal records.
    *   Upload animal images.
    *   Manage animal health records (food, grammar, details).
*   **Habitat Management:**
    *   Add, update, and delete habitat information.
    *   Upload habitat images.
*   **Service Management:**
    *   Add, update, and delete service information.
*   **Review Management:**
    *   Approve or reject animal reviews submitted by members.
*   **Veterinarian Dashboard:**
    *   View animal health status.
    *   Record animal consultations and treatments.
    *   Update animal health records.
*   **Employee Dashboard:**
    *   View animal feeding schedules.
    *   Update animal feeding records.
*   **View Contact Messages:** Read messages submitted through the public contact form.
*   **System Settings:** (Future enhancement) Configure basic site settings.

## Technologies Used

*   **Frontend:** HTML, CSS, JavaScript
*   **Backend:** PHP
*   **Database:** MySQL

## File Structure Overview

*   **/public:** Contains all publicly accessible files (CSS, JavaScript, images).
*   **/src:** Contains the core PHP source code for the application.
    *   **/src/controllers:** Handles user requests and interacts with models.
    *   **/src/models:** Manages data interaction with the database.
    *   **/src/views:** Contains the HTML templates for different pages.
        *   **/src/views/admin:** Admin panel specific views.
        *   **/src/views/member:** Member area specific views.
        *   **/src/views/public:** Public website views.
    *   **/src/includes:** Reusable PHP components (e.g., header, footer, database connection).
*   **/config:** Contains configuration files (e.g., database credentials - **IMPORTANT: These files often have .php extensions but are critical for setup**).
*   **index.php:** Main entry point for the public website.
*   **admin.php:** Entry point for the admin panel.
*   **member.php:** Entry point for the member area.
*   **README.md:** This file.

## Setup and Installation

1.  **Prerequisites:**
    *   A web server (e.g., Apache, Nginx) with PHP support.
    *   MySQL database server.
2.  **Clone the Repository:**
    ```bash
    git clone <repository_url>
    cd ZooParc-Web
    ```
3.  **Database Setup:**
    *   Create a new MySQL database for the project.
    *   Import the database schema (if a `.sql` dump is provided in the repository, typically in a `/database` or `/config` folder).
    *   Configure the database connection details. This is usually done in one or more PHP files located within the `/config` directory or potentially in `/src/includes`. Look for files like `db_connect.php`, `config.php`, or similar. You will need to update these files with your database host, username, password, and database name.
        *   **Example (conceptual - actual filenames and variable names may vary):**
            ```php
            // In a file like /config/database.php or /src/includes/db.php
            <?php
            define('DB_HOST', 'localhost');
            define('DB_USER', 'your_db_user');
            define('DB_PASS', 'your_db_password');
            define('DB_NAME', 'your_zoo_database');

            $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            ?>
            ```
4.  **Web Server Configuration:**
    *   Point your web server's document root to the project's root directory (or `/public` if designed that way, though current structure suggests project root).
5.  **Permissions:**
    *   Ensure the web server has write permissions for any directories where file uploads will be stored (e.g., animal images, habitat images).

## Usage

*   **Main Website:** Access `http://yourdomain.com/` or `http://localhost/ZooParc-Web/` (depending on your setup).
*   **Admin Panel:** Access `http://yourdomain.com/admin.php` or `http://localhost/ZooParc-Web/admin.php`. You will need admin credentials to log in.
*   **Member Area:** Register an account from the main website and then log in. Access might be through a specific `member.php` page or integrated into the main site after login.

---

This README provides a foundational structure. Specific details like the exact database configuration file names or initial admin credentials might need to be added or adjusted as the project is developed or if such information is already defined.
