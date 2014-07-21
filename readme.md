#Chalkbox
![Chalkbox image](https://raw.githubusercontent.com/harrisonde/chalkbox/master/public/images/chalkbox.png "Chalkbox")
##Description of Chalbox
Chalkbox makes tracking time really simple. Manage your projects like a creative - not an accountant. 

##Features
###User
* [ ]Allow registration
* [ ]Allow password reminder via email


###Project
* [ ]Add project

* [ ]Create project

* [ ]Update project

* [ ]Delete project 

* [ ]Update time

* [ ]Display all projects

* [x]Search for projects

* [ ]Add time to project

#Extra (Future) Features
* [ ]Project start date

* [ ]Project end date

* [ ]Project status

* [ ]Project Notes

* [ ]Share Proejct timeline

* [ ]User Groups  

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
| POST    | /search{projectName?}     | return project(s) matching   |
| POST    | /user/signin{user}        | user sign in and auth        |
| POST    | /user/registration{user}  | new user registration        |
| POST    | /projects/details         | list project detail          |
