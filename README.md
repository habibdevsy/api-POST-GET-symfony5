# api-POST-GET-symfony5

# this is API for insert and show data from data base

# You should do this:

1- installing symfony
2- Installing (composer require Doctrine) and  composer require --dev symfony/maker-bundle.
3- Contact data for the MySQL database must be entered through the (.env) file. (DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name").
4- Creating the User Entity.
5- Creating the User table with migrations.

# NOW
Open the postman and type in the url 
  for POST ( http://127.0.0.1:8000/api/add) and enter key and value (l_name , f_name , description)
  for GET (http://127.0.0.1:8000/api/list) .
