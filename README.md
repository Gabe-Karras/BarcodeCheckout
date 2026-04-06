# BarcodeCheckout

A self-checkout web app that uses a barcode scanner to purchase items and print receipts. Implemented with a local MySQL database.
***
This program relies on a pre-existing MySQL database. You can easily create a new schema in MySQL Workbench. Once your database is created, run populate_database.sql inside of it to populate it with a starter of 250,000 amazon items.
    1. Download and run SQL Installer
    2. Install MySQL Workbench
    3. Install PHP
        a. In the PHP download page, recommended to use the single line installer instructions
    4. Open MySQL Workbench and open the default connection or create a new one
    5. Create a schema and name it (ei. barcode)

Make sure to extract the Amazon-Products.csv file from the zip and make it visible to the sql as you run it. You may also have to enable local data reading through MySQL.
You may also have to enable local data reading through MySQL.
    1. Open command prompt
    2. Enable mysqli extension
        a. Enter “php -v” to check if php is installed
        b. Enter “php --ini” to locate .ini file
        c. Open .ini file and locate “extension=mysqli”
        d. Uncomment it by deleting the semicolon in front of it
    3. Enable local file loading in MySQL Workbench
        a. Navigate to home and right click connection being used
        b. In the connections tab -> advanced
        c. Add “OPT_LOCAL_INFILE=1” in the Others section

Make sure to extract the Amazon-Products.csv file from the zip and make it visible to the sql as you run it. 
    1. Unzip “Amazon-Products.csv” file and place it into easy to access place
    2. Copy and paste “populate_db.sql” code into MySQL Workbench
    3. Add file path to the unzipped “Amazon-Products.csv” file to “LOAD DATA LOCAL INFILE” located at the top of the .sql file 
    4. Select the schema created in the Navigator (Left side of window)
        a. You may need to reconnect by clicking “reconnect to database” button located directly under “Tools” 
    5. Click the lightning bolt button to run the file

You'll also need to create a local .env file in the top level of your repo with the following key/value pairs:
    1. In the Barcode Checkout repository file
    2. Create a file called “.env”
    3. Add the code below and remove the bracket and text inside with its corresponding information
    ```
    DB_HOST=localhost
    DB_USER=[username for connection ('root' by default)]
    DB_PASS=[password for connection]
    DB_NAME=[name of schema]
    ```

```
DB_HOST=localhost
DB_USER=[username for connection ('root' by default)]
DB_PASS=[password for connection]
DB_NAME=[name of schema]
```
***
Start the php server with `php -S localhost:8000`. You can then navigate to the beginning page of the program through your browser. (ex: localhost:8000/Webpage/HomePage.php)
<<<<<<< Updated upstream
***
If you'd like to test that you've set everything up correctly between the php and sql, navigate to `localhost:8000/test_files/input_test.php` and mess around with some stuff!
=======
    1. Run start.bat file
            OR
    1. Open command prompt
    2. Navigate to repository file
        a. Enter “cd [path/to/file/BarcodeCheckout]”
    3. Start local server
        a. Enter “php -S localhost:8000”
    4. Enter “http://localhost:8000/Webpage/HomePage.php” into browser to start the program
>>>>>>> Stashed changes
