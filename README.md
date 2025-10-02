# ZooParc Website

This project is a website for ZooParc, a fictional zoological park. It provides information about the park, its animals, events, and allows users to register as volunteers and members. It also includes an admin panel for managing educational content.

## Key Features

*   **User-facing Website:**
    *   **Home:** Welcome page with an overview of the park.
    *   **About Us:** Information about ZooParc's mission and team.
    *   **Animals:** A gallery of animals at the park.
    *   **Events & Programs:** Information on upcoming events.
    *   **Food Outlets:** Details about dining options.
    *   **Volunteer Registration:** A form for users to register as volunteers.
    *   **Member Community:** A login portal for registered members to access exclusive content.
*   **Admin Panel:**
    *   An interface for administrators to upload and manage educational content and events.
*   **Database Integration:**
    *   Uses MySQL to store user data, event information, and other content.

## Technologies Used

*   **Frontend:**
    *   HTML5
    *   CSS3
    *   JavaScript
*   **Backend:**
    *   PHP
*   **Database:**
    *   MySQL

## Getting Started

To get a local copy up and running, follow these simple steps.

### Prerequisites

You will need a local web server environment that supports PHP and MySQL. We recommend using a package like XAMPP, WAMP, or MAMP.

*   [XAMPP](https://www.apachefriends.org/index.html) (cross-platform)
*   [WAMP](https://www.wampserver.com/en/) (for Windows)
*   [MAMP](https://www.mamp.info/en/mamp/) (for macOS)

### Installation

1.  **Clone the repository:**
    ```bash
    git clone https://github.com/your-username/your-project-name.git
    ```
2.  **Move the project to your web server's root directory:**
    *   For XAMPP, this is typically the `htdocs` folder (e.g., `C:/xampp/htdocs`).
3.  **Set up the database:**
    *   Open phpMyAdmin (usually accessible at `http://localhost/phpmyadmin`).
    *   Create a new database named `zooparcdb`.
    *   You can import the table structure if you have a `.sql` file, or manually create the tables as needed by the PHP scripts. The `connection.php` file uses the username `root` with no password.
4.  **Run the project:**
    *   Start your Apache and MySQL services from your XAMPP/WAMP/MAMP control panel.
    *   Open your web browser and navigate to `http://localhost/your-project-directory-name/home.html`.

## File Structure

Here is an overview of the key files in the project:

```
├── home.html               # The main landing page
├── aboutUs.html            # About Us page
├── animals.html            # Animals gallery page
├── event&prog.php          # Events and Programs page
├── outlets.html            # Food outlets page
├── registration.html       # Volunteer/Member registration form
├── memberwelcome.php       # Login page for members
├── admin.php               # Admin panel for content management
├── homestyle.css           # Styles for the home page
├── connection.php          # Database connection script
├── insertData.php          # Handles user registration data
├── loginconnection.php     # Handles member login
├── eduUploads.php          # Handles uploads from the admin panel
├── delete.php              # Deletes records (likely admin functionality)
├── zooparc.png             # Site logo
└── README.md               # This file
```

## Contributing

We welcome contributions to this project! Please follow these guidelines:

### Reporting Bugs

*   Ensure the bug was not already reported by searching on GitHub under Issues.
*   If you're unable to find an open issue addressing the problem, open a new one. Be sure to include a title and clear description, as much relevant information as possible, and a code sample or an executable test case demonstrating the expected behavior that is not occurring.

### Suggesting Enhancements

*   Open an issue with the label `enhancement`.
*   Clearly describe the enhancement and the motivation for it.
*   Provide examples of how the enhancement would be used.

### Pull Requests

1.  Fork the repository.
2.  Create a new branch (`git checkout -b feature/your-feature-name`).
3.  Make your changes.
4.  Commit your changes (`git commit -am 'Add some feature'`).
5.  Push to the branch (`git push origin feature/your-feature-name`).
6.  Create a new Pull Request.

Please make sure your code adheres to the project's coding standards and includes tests.

## License

This project is not currently licensed.