

# Library Management System

### ___


## INTRODUCTION

This is an interactive and dynamic web portal for a Library Management System designed using
HTML, CSS, and PHP. The database is managed by PHPMyadmin ( Database details at the end).

## Website Structure

This website has two types of access controls, the first type is of admin(or librarian for the
context of the problem statement) and the second is of a student.
Admin access-
Admins have functionality such as Login, Display Available Books, Add a book to the database,
Modify a book’s condition, say torn or lost can be updated, after which the said book will not
appear in the list of Available Books and also retrieve a list of Issued Books.


Student/User access-
A student/user has can login to the system, and display available books ready for issue.
The entire website has a logout button on every page and certain pages like display available
pages when are restricted to be accessible only after login.

## Home Page

There are two different homepages implemented one for an admin and other for a user.

## 1. Admin Homepage


As mentioned above admin homepage has navigation links to pages like Display
Available Books, Add a book to the database, Modify a book’s condition, and Get issued
book list.
Snapshot -
![Admin Home Page](/utils/Home_page.jpg)


## 2. Student Homepage


A student homepage will only have navigation to displaying available books as per
problem statement.
Snapshot-
A page like Display available books when accessed without login the system generates a
pop-up and redirects the user to the Login Page-


## 3. Homepage when not logged in


When a user is not logged in the website won’t allow certain pages to open and
additionally, there will be navigations to login and logout pages.
Snapshot-


## Login And Signup Page

The login page has a validation for incorrect username/password checked with the database
where the password is stored as BYCRYPT hash for security purposes.
An error message in red is displayed if entered wrong password or username, otherwise, the
user is redirected to its respective Home Pages (The home page displays the username currently
logged in, this is performed using SESSION).
Login Page -


The signup Page
The signup page has only two fields, for now, validation for username is that it should be longer
than 3 characters and is alphanumeric and for a password, it should be longer than 8 characters,
Must contain a capital letter, must contain a lowercase letter, must contain a number and also a
special character for security purpose.
Different error messages are printed based upon the violation of validation specified above,


## Display Available books Page

This page retrieves and displays a list of available books from the database, it excludes the
books whose condition is marked torn/lost. This is done by simple NOT IN sql query.

## Display Issued books Page

This page is admin access only. It shows the issued books and the username of the issuer.


## Modify book condition Page

This page allows the admin to change the condition of the book it has two fields id and new
condition.


## Add book condition Page

This page is admin-access only, It allows the admin to add a book to the database. This has 10
fields as shown in the figure (all are required and that condition is validated).


## Database Structure

The database has tables like logincredentials, issue and books.
The logincredentials store username and hashed password (BYCRYPT HASH) for enhanced
security,
And the other tables are straightforward.


