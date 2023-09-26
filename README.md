## To clone and run the project locally, perform the following steps:
### 1. Download the source code from https://github.com/shorna33/transport-app.git
### 2. Unzip the downloaded file and open the file in any text editor.
### 3. Open a new terminal and run "composer install/composer install --ignore-platform-reqs".
### 4. Rename the ".env.example" file to ".env".
### 5. Open the ".env" file and set the value of "DB_DATABASE" to "transport" and set the value of "DB_USERNAME" and "DB_PASSWORD" according to your database settings.
### 6. Run "php artisan key:generate" on the terminal.
### 7. Start Apache and MySQL on the XAMPP server and go to phpmyadmin. Create a new table named "transport" and import the "transport.sql" file in that table.
### 8. Run:
### "php artisan passport:install"
### "php artisan serve"

## For testing and performing operations on the APIs, follow the steps to set up the Postman JSON file:
### 1. Download the "transport-api.postman_collection.json" file.
### 2. Open Postman and import the Postman JSON file from "File->Import...".
### 3. After registration using the "register" API, copy the token and go to the Authorization section, select type "OAuth 2.0" and paste the token in the "token" field.
### 4. Perform step 3 for each of the APIs.
### 5. Start performing operations on the APIs.
