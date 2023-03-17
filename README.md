# Laravel E-commerce Web App with M-Pesa STK Push

This is a simple e-commerce web application built using Laravel, Tailwind CSS, and PHPMyAdmin SQL database. The app allows users to view a list of products, view product details, and purchase products using the M-Pesa STK push API.

## Installation

1. Clone the repository to your local machine:

git clone https://github.com/Muhidiny/Laravel-M-Pesa.git

2. Install the required packages:

composer install

3. Copy the `.env.example` file to a new file called `.env` and update the necessary values, including the database credentials and M-Pesa API credentials:

cp .env.example .env

4. Generate a new application key:

php artisan key:generate

5. Run the database migrations to create the necessary tables:

php artisan migrate

6. Seed the database with some sample data:

php artisan db:seed

7. Start the local development server:

php artisan serve

## Usage

Visit `http://localhost:8000` in your web browser to view the home page. From there, you can browse the list of products, view product details, and purchase products using the M-Pesa STK push API.

## Contributing

Contributions are welcome! If you find any issues with the code or have suggestions for improvements, please open an issue or submit a pull request.

## License

MIT License

Copyright (c) [2023] [Muhidin Osman]




