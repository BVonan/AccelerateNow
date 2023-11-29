# Accelerate Now - Luxury And Super Car Rentals

Accelerate Now is a web application for luxury and supercar rentals. It allows users to explore and rent the finest luxury cars for special occasions. Please read this README to understand the project structure and how to get started.

## Technologies Used

- **PHP:** The main programming language for server-side development.
- **HTML/CSS:** Front-end styling and structure.
- **Tailwind CSS:** Used for responsive and modern UI design.
- **Bootstrap:** Used for the navigation bar and other components.
- **JavaScript:** Used for client-side scripting.
- **MySQL:** The database system for storing and retrieving data.
- **Api** Google maps API used in the contact page of the busniness
- **Herd:** The server used to run the project.

## Project Structure

- `index.php`: The main HTML file that serves as the homepage.
- `assets/`: Directory for storing CSS and JavaScript files.
- `includes/`: Contains shared PHP files, such as `nav.php`.
- `fast_car_logo.png`: The logo image used in the navigation bar.
- `db.sql`: SQL queries for setting up the database schema.

## Getting Started

1. **Environment Setup**: Make sure you have PHP, MySQL, and your server (in this case, Herd) set up.

2. **Database Setup**: Create a MySQL database and import the schema from `db.sql`. This will set up the necessary tables.

3. **Configure Connection**: Open `config.php` and update the database connection settings with your own credentials.

4. **Running the Project**: Start your server (e.g., Herd), and access the project through your web browser.

## Project Features

- **Navigation Bar**: A navigation bar at the top of the page for easy access to different sections.
- **Hero Section**: A visually appealing section that introduces the project and its core message.
- **Car Listing Section**: This section can be populated with car listings from the database. The database should contain information like car type, brand, 0-60 time, and more.
- **Footer**: A simple footer displaying the project's copyright information.

## Known Issues and Future Enhancements

- The project is still under production and doesn't have dynamic car listings from the database. This will be implemented soon.

## Author

- Bohnny Vonan
