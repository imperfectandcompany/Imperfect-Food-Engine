Hello. To run food engine, you must download XAMPP and run a local apache web server along with a database.

Create a database called imperfect_foodengine.

Update the connection details to the database inside class/class.database.php if needed.

Open the file database_creation.txt and execute the given queries necessary for our database.

You will be able to access public_html to access the site. Keep file structure as it is setup, backend and frontend is at a upper level directory for security purposes.

For payment, edit the 'business' index of the $data arrray inside backend/status.php with your business email. Must be set to a real paypal business email in order to access the IPN. Change the $urlPage with either localhost or the domain where this project is hosted within that same file (backend/status.php).

<a href="https://imperfectandcompany.com"><img src="https://imperfectdesignsystem.com/assets/img/imperfectandcompany/umbrella.png" width="15" height="15" title="Imperfect and Company" alt="Logo"></a> No Copyright 2024 © <a href="https://imperfectandcompany.com" target="_blank">Imperfect and Company LLC</a>. All rights unreserved.