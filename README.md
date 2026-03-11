# ITP4513-Assignment
> **IVE 2015/16 Internet and Multimedia Applications Development (ITP4513) Assignment**
>
> A dynamic web-based platform developed using **PHP** and **MySQL**, designed to facilitate travel service management for multiple stakeholders including customers, agents, and service providers.

[![PHP](https://img.shields.io/badge/php-%23777BB4.svg?&logo=php&logoColor=white)](#) &nbsp;
[![HTML](https://img.shields.io/badge/HTML-%23E34F26.svg?logo=html5&logoColor=white)](#) &nbsp;
[![CSS](https://img.shields.io/badge/CSS-639?logo=css&logoColor=fff)](#) &nbsp;
[![JavaScript](https://img.shields.io/badge/Javacript-F9AB00?logo=javascript&logoColor=white)](#) &nbsp;
[![SQLite](https://img.shields.io/badge/SQLite-%2307405e.svg?logo=sqlite&logoColor=white)](#) &nbsp;
[![License](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)

## Project Features
This system implements a role-based access control (RBAC) model to provide tailored functionalities for different user groups:
* **Customers:** Browse travel packages, search for information, and manage personal bookings.
* **Travel Agents:** Manage tour packages, pricing, and coordinate with service providers.
* **Hotel Owners:** List available accommodations and manage room inventory.
* **Airline Companies:** Manage flight schedules and seat availability.

## Installation & Setup
### Prerequisites
* **XAMPP** (or any LAMP/WAMP stack with PHP 5.6+ and MySQL)
* **Web Browser** (Chrome, Firefox, or Edge)

### Database Configuration
1. Launch **phpMyAdmin** (typically at `http://localhost/phpmyadmin`).
2. Create a new database or use the import function.
3. Import the SQL schema file: `/src/database/CreateProjectDB.sql`.
4. Verify that the database `createprojectdb` and its associated tables are successfully created.

### Deployment
1. Copy all files from the `/src` directory.
2. Paste them into your server's root folder (e.g., `C:/xampp/htdocs/OTIS/`).
3. Start **Apache** and **MySQL** modules in the XAMPP Control Panel.
4. Access the application via: `http://localhost/OTIS/index.php`.

### Run the program
http://127.0.0.1:8080/index.php

## Screenshots
![Image](https://github.com/alvinau0427/ITP4513-Assignment/blob/master/doc/demo.png)

## License
- ITP4513-Assignment is released under the [MIT License](https://opensource.org/licenses/MIT).
```
Copyright (c) 2020 alvinau0427

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```
