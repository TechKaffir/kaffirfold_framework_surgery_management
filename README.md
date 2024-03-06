# Kaffirfold Surgery Management System

Welcome to the Kaffirfold Surgery Management System README! This framework, powered by the KaffirFold engine, is designed to revolutionize medical center management. Developed by The TechKaffir at Jongi Brands Tech Solutions, this framework offers a comprehensive suite of features tailored for the efficient operation of healthcare facilities.

## Features

- **Full Surgery Management Tasks**: Manage every aspect of the surgery process, from patient queueing to medication dispensing.
- **Dynamic Sick Note Verification**: Simplify sick note verification for companies with QR code integration, eliminating manual verification processes.
- **Patient Follow-up Functionality**: Keep track of patients' follow-up appointments based on doctor's notes.
- **In-App Messaging and Blog**: Seamlessly engage with patients and the wider community on health-related issues through in-app messaging and blogging features.
- **All-in-One Application**: Combines a Business Management System and Content Management System with a front-end practice website, all in a single platform.

### Development Made Easy

- **CLI Development**: Streamline development tasks with CLI commands for database operations, model and controller creation, and more.

### Installation

1. **Clone Repository**: Clone the repository to your local machine. OR
   
2. **Use Composer**: Install dependencies using Composer.
    ```bash
    composer create-project kaffirfold/surgery [your-project-name]
    ```
2.1. **Database Setup**: Create a new database.
    ```bash
    composer create-project kaffirfold/surgery [your-project-name]
    ```
    
2.2. Configure the database name in `app/core/config.php`, as per the recently created.

2.3. **Migrations**: Configure and execute migrations to set up the database tables.
    ```bash
    php jongi migrate:all
    ```

Now your application is ready to go! Benefit from essential features such as user authentication, validation, and session management right out of the box.

- **Dark/Light Mode**: Customize the user interface with dark and light mode options.
- **Google Translate Integration**: Enhance accessibility with front-end language translation capabilities.
- **Company Details and Social Links**: Easily manage company information and social media links within the application.

## License

This project is licensed under the GPL-3.0-or-later license.

## Credits

This project utilizes UI templates from Bootstrapmade and KaffirFold for both backend and frontend interfaces.

In summary, the Kaffirfold Surgery Management System offers a unique blend of functionality, combining the flexibility of CMS (Content Management System) with the power of a PHP Web Applications Framework. Experience streamlined medical centre management like never before!
