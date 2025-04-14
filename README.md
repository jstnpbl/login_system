# Login System with Admin Approval

This is a PHP-based login system with MySQL database integration. It features an admin approval process for user registration, encryption and decryption of credentials, and a simple user dashboard.

## Features
- **User Registration**: Users can register with their credentials.
- **Admin Approval**: Admin can approve or reject user registrations.
- **Encryption**: User credentials are encrypted before being stored in the database.
- **Decryption**: Admin can decrypt and view user credentials.
- **Login System**: Only approved users can log in.
- **User Dashboard**: A simple dashboard for logged-in users.
- **Logout**: Users can log out securely.

## Technologies Used
- **PHP**: For server-side scripting.
- **MySQL**: For database management.
- **HTML/CSS**: For the front-end interface.

## Database Structure
- **Users Table**:
  - `id`: Primary key
  - `username`: Encrypted username
  - `password`: Encrypted password
  - `status`: Approval status (`pending`, `approved`, `rejected`)

## How to Run Locally
1. Clone the repository:
   ```bash
   git clone https://github.com/jstnpbl/login_system.git
