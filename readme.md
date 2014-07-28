#Chalkbox
![Chalkbox image](https://raw.githubusercontent.com/harrisonde/chalkbox/master/public/images/chalkbox.png "Chalkbox")
##Description of Chalkbox
Chalkbox makes tracking time really simple. Manage your projects like a creative - not an accountant. 

##Features
###User
* [x] Allow registration 

* [x] Welcome email after registration

* [x] Authentication - sign-in

* [x] Authentication - sign-out

* [x] Authentication - Password Remider

###Project
* [x] Create project

* [x] Update project

* [ ] Delete project 

* [x] Display all projects

* [x] Display projects detail

* [x] Search for projects

* [x] Add time (toggle timer button)

* [x] Update time (toggle timer button)

###Validation
 * [x] Error messages
 
 * [x] Success messages

#Extra (Future) Features

* [x] Create Custom Facade for Timer (Stopwatch)

* [x] Create Seeder(s)

* [x] Project start date

* [x] Project end date

* [x] Project status

* [x] Project Description

* [ ] Project Notes

* [ ] Project Total Project Hours

* [ ] Share Proejct timeline

* [ ] User Groups (Roles) 

* [ ] RESTful API 

* [ ] Graphs

* [ ] Email

* [ ] Export

* [ ] RSS Feed

##Routes
Chalkbox listens at the following routes and will "catch" fhe following HTTP verbs:

| Method  | Route                     | Description                  |
|-------- | ------------------------- | ---------------------------- |
| GET     | /                         | index			             |
| GET     | /projects{project?}       | list project(s)              |
| GET     | /search				      | new search input             |
| GET     | /projects/create          | make a new project           |
| GET     | /projects/details         | route to project list        |
| GET     | /signout                  | logout current session       |
| GET     | /password                 | password rest link email     |
| POST    | /search{projectName?}     | return project(s) matching   |
| POST    | /user/signin{user}        | user sign in and auth        |
| POST    | /user/registration{user}  | new user registration        |
| POST    | /projects/create{project} | Add project to database      |
| POST    | /projects/details         | list project detail          |
| POST    | /password                 | password reset with token    |
