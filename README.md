<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kaffirfold Surgery Management System</title>
<style>
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
    background-color: #f8f8f8;
    color: #333;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

h1 {
    font-size: 2em;
    margin-bottom: 20px;
}

code {
    background-color: #f8f8f8;
    padding: 2px 5px;
    border-radius: 3px;
}

ul {
    list-style-type: disc;
    padding-left: 20px;
}

li {
    margin-bottom: 10px;
}

hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 0;
    border-top: 1px solid #ddd;
}

</style>
</head>
<body>

<div class="container">
    <h1>Kaffirfold Surgery Management System</h1>
    <p>Welcome to the Kaffirfold Surgery Management System README! This framework, powered by the KaffirFold engine, is designed to revolutionize medical center management. Developed by The TechKaffir at Jongi Brands Tech Solutions, this framework offers a comprehensive suite of features tailored for the efficient operation of healthcare facilities.</p>

    <h2>Features</h2>
    <ul>
        <li><strong>Full Surgery Management Tasks</strong>: Manage every aspect of the surgery process, from patient queueing to medication dispensing.</li>
        <li><strong>Dynamic Sick Note Verification</strong>: Simplify sick note verification for companies with QR code integration, eliminating manual verification processes.</li>
        <li><strong>Patient Follow-up Functionality</strong>: Keep track of patients' follow-up appointments based on doctor's notes.</li>
        <li><strong>In-App Messaging and Blog</strong>: Seamlessly engage with patients and the wider community on health-related issues through in-app messaging and blogging features.</li>
        <li><strong>All-in-One Application</strong>: Combines a Business Management System and Content Management System with a front-end practice website, all in a single platform.</li>
    </ul>

    <h3>Development Made Easy</h3>
    <p><strong>CLI Development</strong>: Streamline development tasks with CLI commands for database operations, model and controller creation, and more.</p>

    <h2>Installation</h2>
    
    <h3>Using Github:</h3>
    <ul>
        <li><strong>Clone Repository</strong>: Clone the repository to your local machine.</li>
    </ul>
    <h3>Using Composer:</h3>
    <ol>
        <li><strong>Use Composer</strong>: Install dependencies using Composer.</li>
            <code>composer create-project kaffirfold/surgery [your-project-name]</code>
        <li><code>php jongi db:create [dbname]</code></li>
        <li><strong>Database Setup</strong>: Configure the database name in <code>app/core/config.php</code>.</li>
        <li><strong>Migrations</strong>: Configure and execute migrations to set up the database tables.</li>
            <code>php jongi migrate:all</code>
    </ol>
    
    <p>Now your application is ready to go! Benefit from essential features such as user authentication, validation, and session management right out of the box.</p>

    <h3>Additional Features</h3>
    <ul>
        <li><strong>Dark/Light Mode</strong>: Customize the user interface with dark and light mode options.</li>
        <li><strong>Google Translate Integration</strong>: Enhance accessibility with front-end language translation capabilities.</li>
        <li><strong>Company Details and Social Links</strong>: Easily manage company information and social media links within the application.</li>
    </ul>

    <hr>

    <h2>License</h2>
    <p>This project is licensed under the GPL-3.0-or-later license.</p>

    <h2>Credits</h2>
    <p>This project utilizes UI templates from Bootstrapmade and KaffirFold for both backend and frontend interfaces.</p>

    <p>In summary, the Kaffirfold Surgery Management System offers a unique blend of functionality, combining the flexibility of WordPress with the power of Laravel. Experience streamlined medical center management like never before!</p>
</div>

</body>
</html>

