# E-Learning Platform

Welcome to our E-learning web application built with Laravel! This project offers a modern and intuitive platform for delivering engaging educational content online. Whether you're an instructor looking to create dynamic courses or a learner seeking a flexible and interactive learning experience, our E-learning web application has you covered.

The project was initially created to serve the Computer Science Department at Federal University Dutse; however, it is adaptable for use by instructors and learners for educational purposes across various settings.

## Key Features:
* User-Friendly Interface: Navigate seamlessly through courses, lessons, and quizzes with our intuitive user interface designed for a smooth learning experience.

* Interactive Content: Engage with rich multimedia content, including videos, quizzes, and interactive assignments that make learning both enjoyable and effective.

* Community Interaction: Connect with fellow learners and instructors through discussion forums and live chat, fostering a collaborative learning environment.

* Progress Tracking: Monitor your progress effortlessly, track completed courses, and receive personalized recommendations for your educational journey.

Mobile Compatibility: Learn on the go! Our E-learning platform is fully compatible with various devices, ensuring accessibility from smartphones, tablets, and desktops.

Getting Started:
To get started with our E-learning platform, follow the simple installation steps outlined in the Installation section below. Begin your educational journey today!

## Table of Contents

- [Prerequisites](#prerequisites)
- [Getting Started](#getting-started)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)

## Prerequisites

List any prerequisites or dependencies that users need to have installed before they can use your project.

- [PHP](https://www.php.net/) (version 8.2.12)
- [Composer](https://getcomposer.org/) (version 2.6.5)
- [Node.js](https://nodejs.org/) (version 18.17.0 || >=20.5.0)
- [npm](https://www.npmjs.com/) (version 10.1.0)
- [MySQL](https://www.mysql.com/) (version 8.2 or Mariadb version 10.4 or higher)

## Getting Started

Provide a brief overview of what your project does and what users can expect.

## Installation

1. Clone the repository:

    ```bash
    git clone git@github.com:AbubakarMuhammadHussaini/e-learning.git
    ```

2. Change into the project directory:

    ```bash
    cd e-learning
    ```

3. Install PHP dependencies:

    ```bash
    composer install
    ```

4. Install JavaScript dependencies:

    ```bash
    npm install
    ```

5. Copy the environment file:

    ```bash
    cp .env.example .env
    ```

6. Generate application key:

    ```bash
    php artisan key:generate
    ```

7. Configure your database in the `.env` file.

8. Run database migrations and seed:

    ```bash
    php artisan migrate --seed
    ```
9. Run the project:

    ```bash
    php artisan serve
    ```


## Configuration

Explain any additional configuration steps users might need to perform, such as setting up API keys, configuring external services, etc.

## Usage

Upon completion of the aforementioned steps, an administrator is automatically generated. The administrator possesses the ability to include both instructors and students in the system. The administrator is further empowered to assign courses to instructors, who, in turn, can supplement their assigned courses with lessons and upload relevant learning materials. Students, on the other hand, have the capability to enroll in courses, peruse lessons, and download educational resources.
