# BarcodeCheckout

A self-checkout web app that uses a barcode scanner to purchase items and print receipts. Implemented with a local MySQL database.
***
This program relies on a pre-existing MySQL database. You can easily create a new schema in MySQL Workbench. Once your database is created, run populate_database.sql inside of it to populate it with a starter of 250,000 amazon items.
1. Download and run SQL Installer
2. Install MySQL Workbench
3. Install PHP
   - In the PHP download page, I recommend to using the single line installer instructions
4. Open MySQL Workbench and open the default connection or create a new one
5. Create a schema and name it (ei. barcode)

Make sure to extract the Amazon-Products.csv file from the zip and make it visible to the sql as you run it. You may also have to enable local data reading through MySQL.
You may also have to enable local data reading through MySQL.
1. Open command prompt
2. Enable mysqli extension
   - Enter `php -v` to check if php is installed
   -  Enter `php --ini` to locate .ini file
   - Open .ini file and locate `extension=mysqli`
   - Uncomment it by deleting the semicolon in front of it
3. Enable local file loading in MySQL Workbench
   - Navigate to home and right click connection being used
   - In the connections tab -> advanced
   - Add `OPT_LOCAL_INFILE=1` in the Others section

Make sure to extract the Amazon-Products.csv file from the zip and make it visible to the sql as you run it. 
1. Unzip _Amazon-Products.csv_ file and place it into easy to access place
2. Copy and paste the _populate_db.sql_ code into MySQL Workbench
3. Add file path to the unzipped _Amazon-Products.csv_ file at the end of `LOAD DATA LOCAL INFILE` located at the top of the .sql file 
4. Select/Highlight the schema created in the Navigator (Left side of window)
   - You may need to reconnect by clicking the _reconnect to database_ button located directly under _Tools_
5. Click the lightning bolt button to run the file

You'll also need to create a local .env file in the top level of your repo with the following key/value pairs:
1. In the Barcode Checkout repository file
2. Create a file called _.env_
3. Add the code below and remove the bracket and text inside with its corresponding information
    ```
    DB_HOST=localhost
    DB_USER=[username for connection ('root' by default)]
    DB_PASS=[password for connection]
    DB_NAME=[name of schema]
    ```

***
Start the php server with `php -S localhost:8000`. You can then navigate to the beginning page of the program through your browser. (ex: localhost:8000/Webpage/HomePage.php)
1. Run _start.bat_ file\
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OR
1. Open command prompt
2. Navigate to repository file
   - Enter `cd [path/to/file/BarcodeCheckout]`
3. Start local server
   - Enter `php -S localhost:8000`
4. Enter [http://localhost:8000/Webpage/HomePage.php](http://localhost:8000/Webpage/HomePage.php) into browser to start the program
