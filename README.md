Here's a README file for your "Medical Data Archiving Web-based System" project:

---

# Medical Data Archiving Web-based System

## Project Description
This is a simple school project developed to archive and manage medical data through a web-based system. The project is built using PHP and XAMPP for the database.

## Features
- **Login/Admin Login**
  - **ID:** medadmin
  - **Password:** admin@#1

- **Archive/Login**
  - **ID:** sudoadmin
  - **Password:** admin

For other logins, please refer to the database file under `patient_login`, `doctor_login`, and `staff_login`.

## Functionalities
- **Patient Login:** Patients can log in to track their diagnosis records.
- **Doctor Login:** Doctors can log in to track and manage patient diagnosis records.
- **Staff Login:** Staff members can log in to update diagnosis records.

## Document Archive
I attempted to create a document archive in the "ARCHIVE" section. You can log in with the provided credentials to access this section. In the main archive area, I aimed to implement a feature to generate reports based on the information in the "Available files section." However, I encountered errors and couldn't complete this feature. This archive section is not fully perfected yet, so feel free to attempt improvements if you wish.

## Improvements
There is still a lot that needs to be improved in this project. Contributions are welcome to enhance its functionalities.

## Getting Started
### Prerequisites
- XAMPP (for Apache and MySQL)

### Installation
1. Clone the repository to your local machine:
   ```sh
   git clone https://github.com/your-username/MedDARC.git
   ```
2. Move the project folder to the XAMPP `htdocs` directory.
3. Start Apache and MySQL from the XAMPP control panel.
4. Import the database:
   - Open phpMyAdmin.
   - Create a new database (e.g., `meddarc_db`).
   - Import the provided SQL file (`Database/test_project.sql`) into the new database.

### Configuration
1. Update the database connection settings in `connection.php` to match your local setup.

### Usage
1. Open your web browser and navigate to `http://localhost/MedDARC`.
2. Use the provided credentials to log in and explore the system.

## License
This project is licensed under the MIT License. See the LICENSE file for more details.

## Contact
For any queries or contributions, please contact [Your Name](mailto:your.email@example.com).

---

Feel free to customize the details further as needed.
