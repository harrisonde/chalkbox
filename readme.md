#Chalkbox
![Chalkbox image](https://raw.githubusercontent.com/harrisonde/chalkbox/master/public/images/chalkbox.png "Chalkbox")

##Table of Contents
 - Description
 - Expectation
 - What is in this repository might I ask?
 - Features
   - Project
   - User
   - Validation
 - Future (Extra) Features
 - Routes
 - Packages
 - [User Guide](#user-guide)
   - Getting Started
     - Register or Signin
   - User Interface
     - Projects
     - New Project
     - Manage a Project

##Description of Chalkbox
Chalkbox makes tracking time really simple. Manage your projects like a web artisan - not an accountant. 

##Expectation
Expect to experience the advanced functions needed to build a web application in the Laravel framework. 

##What is in this repository might I ask?
Well, yes - you absolutely should ask. This repository holds one Laravel applicaion, Chalkbox, which includes:
* Super clean user interface
* Track project time
* Create project notes 
* Projects News Feed
* CRUDy management

##Features
###Project
* [x] Create project

* [x] Update project

* [x] Delete project 

* [x] Display all projects

* [x] Display projects detail

* [x] Search for projects

* [x] Add time (+start timer button)

* [x] Update time (stop timer button)

###User
* [x] New user registration 

* [x] Send welcome email after new user registration

* [x] Automatically authenticate and sign-in after new user registration

* [x] Authentication - sign-in

* [x] Authentication - sign-out

* [x] Authentication - Password Remider

###Validation
* [x] Error messages
 
* [x] Success messages

##Future (Extra) Features

* [x] Create Custom Facade for Timer (Stopwatch)

* [x] Create Seeder(s)

* [x] Project start date

* [x] Project end date

* [x] Project status

* [x] Project Description

* [x] Project Notes

* [x] Project Total Project Hours

* [ ] Share Project timeline

* [ ] User Groups (Roles) 

* [x] RESTful API (notes) resource::edit/store 

* [x] AJAX (notes) remove page refresh for pulling note content

* [ ] Expand RESTful API (include project)

* [ ] Graphs

* [x] Email

* [ ] Export

* [ ] RSS Feed

##Routes
Chalkbox listens at the following routes and will "catch" fhe following HTTP verbs:

| Domain | URI                                  | Name                   | Action                            | Before Filters | After Filters |
| ------ | ------------------------------------ | ---------------------- | --------------------------------- | -------------- | ------------- |
|        | GET|HEAD /                           |                        | Closure                           |                |               |
|        | GET|HEAD password                    | password.index         | RemindersController@index         |                |               |
|        | GET|HEAD password/create             | password.create        | RemindersController@create        |                |               |
|        | POST password                        | password.store         | RemindersController@store         |                |               |
|        | GET|HEAD password/{password}         | password.show          | RemindersController@show          |                |               |
|        | GET|HEAD password/{password}/edit    | password.edit          | RemindersController@edit          |                |               |
|        | PUT password/{password}              | password.update        | RemindersController@update        |                |               |
|        | PATCH password/{password}            |                        | RemindersController@update        |                |               |
|        | DELETE password/{password}           | password.destroy       | RemindersController@destroy       |                |               |
|        | GET|HEAD password/reset              | password.reset.index   | RemindersController@index         |                |               |
|        | GET|HEAD password/reset/create       | password.reset.create  | RemindersController@create        |                |               |
|        | POST password/reset                  | password.reset.store   | RemindersController@store         |                |               |
|        | GET|HEAD password/reset/{reset}      | password.reset.show    | RemindersController@show          |                |               |
|        | GET|HEAD password/reset/{reset}/edit | password.reset.edit    | RemindersController@edit          |                |               |
|        | PUT password/reset/{reset}           | password.reset.update  | RemindersController@update        |                |               |
|        | PATCH password/reset/{reset}         |                        | RemindersController@update        |                |               |
|        | DELETE password/reset/{reset}        | password.reset.destroy | RemindersController@destroy       |                |               |
|        | GET|HEAD projects/{id}/edit/settings |                        | ProjectController@editSetting     |                |               |
|        | POST projects/{id}/edit/name         |                        | ProjectController@editSettingName |                |               |
|        | GET|HEAD projects                    | projects.index         | ProjectController@index           |                |               |
|        | GET|HEAD projects/create             | projects.create        | ProjectController@create          |                |               |
|        | POST projects                        | projects.store         | ProjectController@store           |                |               |
|        | GET|HEAD projects/{projects}         | projects.show          | ProjectController@show            |                |               |
|        | GET|HEAD projects/{projects}/edit    | projects.edit          | ProjectController@edit            |                |               |
|        | PUT projects/{projects}              | projects.update        | ProjectController@update          |                |               |
|        | PATCH projects/{projects}            |                        | ProjectController@update          |                |               |
|        | DELETE projects/{projects}           | projects.destroy       | ProjectController@destroy         |                |               |
|        | GET|HEAD register                    | register.index         | RegisterController@index          |                |               |
|        | GET|HEAD register/create             | register.create        | RegisterController@create         |                |               |
|        | POST register                        | register.store         | RegisterController@store          |                |               |
|        | GET|HEAD register/{register}         | register.show          | RegisterController@show           |                |               |
|        | GET|HEAD register/{register}/edit    | register.edit          | RegisterController@edit           |                |               |
|        | PUT register/{register}              | register.update        | RegisterController@update         |                |               |
|        | PATCH register/{register}            |                        | RegisterController@update         |                |               |
|        | DELETE register/{register}           | register.destroy       | RegisterController@destroy        |                |               |
|        | GET|HEAD search                      | search.index           | SearchController@index            |                |               |
|        | GET|HEAD search/create               | search.create          | SearchController@create           |                |               |
|        | POST search                          | search.store           | SearchController@store            |                |               |
|        | GET|HEAD search/{search}             | search.show            | SearchController@show             |                |               |
|        | GET|HEAD search/{search}/edit        | search.edit            | SearchController@edit             |                |               |
|        | PUT search/{search}                  | search.update          | SearchController@update           |                |               |
|        | PATCH search/{search}                |                        | SearchController@update           |                |               |
|        | DELETE search/{search}               | search.destroy         | SearchController@destroy          |                |               |
|        | GET|HEAD signin                      | signin.index           | SignInController@index            |                |               |
|        | GET|HEAD signin/create               | signin.create          | SignInController@create           |                |               |
|        | POST signin                          | signin.store           | SignInController@store            |                |               |
|        | GET|HEAD signin/{signin}             | signin.show            | SignInController@show             |                |               |
|        | GET|HEAD signin/{signin}/edit        | signin.edit            | SignInController@edit             |                |               |
|        | PUT signin/{signin}                  | signin.update          | SignInController@update           |                |               |
|        | PATCH signin/{signin}                |                        | SignInController@update           |                |               |
|        | DELETE signin/{signin}               | signin.destroy         | SignInController@destroy          |                |               |
|        | GET|HEAD signout                     | signout.index          | SignOutController@index           |                |               |
|        | GET|HEAD signout/create              | signout.create         | SignOutController@create          |                |               |
|        | POST signout                         | signout.store          | SignOutController@store           |                |               |
|        | GET|HEAD signout/{signout}           | signout.show           | SignOutController@show            |                |               |
|        | GET|HEAD signout/{signout}/edit      | signout.edit           | SignOutController@edit            |                |               |
|        | PUT signout/{signout}                | signout.update         | SignOutController@update          |                |               |
|        | PATCH signout/{signout}              |                        | SignOutController@update          |                |               |
|        | DELETE signout/{signout}             | signout.destroy        | SignOutController@destroy         |                |               |
|        | GET|HEAD system_default_styles       |                        | Closure                           |                |               |
|        | GET|HEAD timer                       | timer.index            | TimerController@index             |                |               |
|        | GET|HEAD timer/create                | timer.create           | TimerController@create            |                |               |
|        | POST timer                           | timer.store            | TimerController@store             |                |               |
|        | GET|HEAD timer/{timer}               | timer.show             | TimerController@show              |                |               |
|        | GET|HEAD timer/{timer}/edit          | timer.edit             | TimerController@edit              |                |               |
|        | PUT timer/{timer}                    | timer.update           | TimerController@update            |                |               |
|        | PATCH timer/{timer}                  |                        | TimerController@update            |                |               |
|        | DELETE timer/{timer}                 | timer.destroy          | TimerController@destroy           |                |               |
|        | GET|HEAD note                        | note.index             | NoteController@index              |                |               |
|        | GET|HEAD note/create                 | note.create            | NoteController@create             |                |               |
|        | POST note                            | note.store             | NoteController@store              |                |               |
|        | GET|HEAD note/{note}                 | note.show              | NoteController@show               |                |               |
|        | GET|HEAD note/{note}/edit            | note.edit              | NoteController@edit               |                |               |
|        | PUT note/{note}                      | note.update            | NoteController@update             |                |               |
|        | PATCH note/{note}                    |                        | NoteController@update             |                |               |
|        | DELETE note/{note}                   | note.destroy           | NoteController@destroy            |                |               |


##Packages
Several packages were used in the making of this application. All are awesome because each is open source - go community!

###GravatarLib
GravatarLib is a small library intended to provide easy integration of gravatar-provided avatars. More @ [thomaswelton/gravatarlib](https://github.com/thomaswelton/gravatarlib)

## The "Black Box" demystified
The [black box](http://en.wikipedia.org/wiki/Black_box "wikipedia tells all") or web application is constructed with CSS3, HTML5, JavaScript, and PHP. All the really fancy goodies are driven by Bourbon, Neat, Bitters, and Refils. Big thanks to [Thoughtbot](http://thoughtbot.com/ "Visit the gods of SASS") for maintaining and funding the project. Don't know where the development community would be without folks like these!

##<a name="user-guide"/>User Guide
###Getting started
####Register or Signin 
Get started by creating a new [user account](http://p4.harrisondestefano.com/register). Once a new account is created, enjoy, you will be automatically authenticated and redirected to your project management page. If you happen to misplace a password, no worries - [forgot password](http://p4.harrisondestefano.com/password).

####User Interface
#####Projects
Chalkbox projects are displayed after signing into the application on the “projects” user interface. 
![Chalkbox user interface - projects ](https://raw.githubusercontent.com/harrisonde/chalkbox/master/chalkbox-projects.png "Chalkbox")
From this page please enjoy creating and modifying each of your Chalkbox projecs! The UI provides a project news feed too - running list of major project modifications.

#####New Project
Building a new project in Chalkbox is a breeze - all we really need is a name!
![Chalkbox user interface - projects ](https://raw.githubusercontent.com/harrisonde/chalkbox/master/chalkbox-new-project.png "Chalkbox")
The “+ New Project” user interface collects all a lot of good information about a project such as name, description, states and date. Just be sure to add your project name - no worries if you make a mistake as we can make edits too.

#####Manage a Project
What good is project management if you can not “manage” the project? The project details user interface let’s you do just that - basic project management.
![Chalkbox user interface - projects ](https://raw.githubusercontent.com/harrisonde/chalkbox/master/chalkbox-manager.png "Chalkbox")

Time tracking is a breeze with the “+ Start Timer” and “Stop Timer” buttons. Clicking the "+ Start Timer” button kicks off a timer, do this while you work. When you done, click the “Stop Timer” button to stop tracking time.  

All the time logged to a project is displayed in the project “epic.". Just look for the project icon.   

Chalkbox can keep project notes too! To create a note, click “+ New Note” tab. Once you’ve created and saved a note, said note will be displayed in the “Note” tab. 

To view an existing note, just click the title of the note. Chalkbox will display the contents of the note right on the page.
