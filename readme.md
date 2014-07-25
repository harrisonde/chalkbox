#Chalkbox
![Chalkbox image](https://raw.githubusercontent.com/harrisonde/chalkbox/master/public/images/chalkbox.png "Chalkbox")
##Description of Chalkbox
Chalkbox makes tracking time really simple. Manage your projects like a creative - not an accountant. 

##Features
###User
* [x]Allow registration 
* [x]Welcome email after registration
* [x]Authentication - sign-in
* [x]Authentication - sign-out
* [x]Authentication - Password Remider

###Project
* [ ]Create project

* [ ]Update project

* [ ]Delete project 

* [ ]Update time

* [x]Display all projects

* [x]Display projects detail

* [x]Search for projects

* [ ]Add time to project

###Validation
 * [x]Error messages
 
 * [x]Success messages

#Extra (Future) Features
* [ ]Project start date

* [ ]Project end date

* [ ]Project status

* [ ]Project Description

* [ ]Project Notes

* [ ]Project Total Project Hours

* [ ]Share Proejct timeline

* [ ]User Groups (Roles) 

* [ ]RESTful API 

* [ ]Graphs

* [ ]Email

* Export

##Routes
Chalkbox listens at the following routes and will "catch" fhe following HTTP verbs:

| Method  | Route                     | Description                  |
|-------- | ------------------------- | ---------------------------- |
| GET     | /                         | index			             |
| GET     | /projects{project?}       | list project(s)              |
| GET     | /search				      | new search input             |
| GET     | /projects/details         | route to project list        |
| GET     | /signout                  | logout current session       |
| GET     | /password                 | password rest link email     |
| POST    | /search{projectName?}     | return project(s) matching   |
| POST    | /user/signin{user}        | user sign in and auth        |
| POST    | /user/registration{user}  | new user registration        |
| POST    | /projects/details         | list project detail          |
| POST    | /password                 | password reset with token    |
