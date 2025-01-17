## Presentation Video

**[Video Link](https://drive.google.com/file/d/1uxw38O4OxwTqVILsYzQ7MnQUecVJ886t/view)**


## Project Setup

Follow the steps below to set up the project:

- Clone the repository
- Run composer install
- Run cp .env.example .env OR Rename .env.example file to .env file.
- Run php artisan key:generate
- Set your database credentials in the .env file.
- Set your mail credentials in the .env file.
- Run php artisan migrate:refresh --seed or You can download Database.sql.zip file from Root folder and import the data into your MySQL database.
- Run php artisan serve to start the test server.
- Open http://127.0.0.1:8000/ on your browser.
