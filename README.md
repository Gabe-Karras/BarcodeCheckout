# BarcodeCheckout

A self-checkout web app that uses a barcode scanner to purchase items and print receipts. Implemented with a local MySQL database.
***
This program relies on a pre-existing MySQL database. You can easily create a new schema in MySQL Workbench. Once your database is created, run populate_database.sql inside of it. You'll also need to create a local .env file in the top level of your repo with the following key/value pairs:

```
DB_HOST=localhost
DB_USER=[username for connection ('root' by default)]
DB_PASS=[password for connection]
DB_NAME=[name of schema]
```
***
Start the php server with `php -S localhost:8000`. You can then navigate to the beginning page of the program through your browser. (ex: localhost:8000/index.html)
