"Medical Data Archiving Web-based System" project:

---

# Medical Data Archiving Web-based System
<img src = "https://github.com/Chilundika/MedDARC/blob/main/screenshots/index.php.png" alt = "landing page" width="900px" height="600px">

## Project Description
This is a simple school project developed to archive and manage medical data through a web-based system. The project is built using PHP, HTML & CSS, and XAMPP for the database.
The significance of the developed system lies in its ability to overcome the limitations of existing
radiology imaging software by centralizing patient information storage and enabling authorized
user access. However, the implications of implementing such a system include cost
considerations, data migration challenges, data format compatibility, security risks, ongoing
maintenance requirements, adherence to legal and regulatory standards, restricted data access,
and the inherent complexity of data archiving systems.

i. **Login section**: patient_login, doctor_login, staff_login, admin_login.

<img src = "https://github.com/Chilundika/MedDARC/blob/main/screenshots/login%20dropdwn.png" alt = "landing page" width="900px" height="600px">

ii. **ADMIN LOGIN**
<img src = "https://github.com/Chilundika/MedDARC/blob/main/screenshots/admin_login.png" alt = "landing page" width="900px" height="600px">

iii. **ARCHIVE LOGIN**
<img src = "https://github.com/Chilundika/MedDARC/blob/main/screenshots/archive_login.png" alt = "landing page" width="900px" height="600px">

iv. **MAIN ARCHIVE AREA**
<img src = "https://github.com/Chilundika/MedDARC/blob/main/screenshots/archive%20main.png" alt = "landing page" width="900px" height="600px">

-----------------------------------------------------------------------------------------------

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
For any queries or contributions, please contact **CHIPO CHILUNDIKA** (mailto:dezignbluprint.tech@gmail.com).

---

Feel free to customize the details further as needed.
