# fantasyrealms

Fantasy realms is a project created for the IT328 class. It uses php, OOP, and PDO. It allows users to create an account, login, and create fantasy characters attached to their account.

Login system:
Create a login and Password by clicking the create account button on the main page and then filling out the information. You can also click the premium checkbox to be able to add certain skills to all of your characters. After, click create and you will be sent back to the login page. If you forget your password, you can click on the forget password button to reset it. You just need to remember your username. You can login to Fantasy Realms by filling out the correct information and clicking the login button.

Character Select: After logging in, you will be brought to the character select screen. You will first see the navbar at the top that is universal to the entire site except the view all button. The Fantasy Realms button will always bring you back to the home page. The view all button (unique to the select screen's navbar) will take you to a page to view all characters. The very right button will log you out of the site and you will be brought back to the home page.

In the body of the page, there are two columns. The column on the left is an introduction to the user. The column on the right is what user's will be mostly using. It allows users to create characters, view them, edit them, delete them, and progress through a story that will add to their character information after completion.

Adding a character: After clicking the add character button, you will be brought to the character creation page. Here, you can make a fantasy character with certain credentials. You will need to fill out the name of the character, the rest will have default values that you can change through. If you checked the checkbox for premium when creating an account, you will have access to the skills at the bottom. You can choose as many as you want. The picture to the right is dependant on the selection of class. After clicking create, you will be taken back to the character select screen.
You will then see the character in the right column with various buttons to choose from.

Delete a character: To delete a character, you simply click the delete button below the character you wish to delete. You will get an alert if you wish to truly delete the character. If yes, the character will be wiped from the select screen and the database. If no, they will remain.

Edit a character: Clicking this button will take you to a page very similar to the character creation page. The choices made to create the character will already be pre populated. You can change any values that you wish. After clicking edit, you will be taken back to the select screen and you can see the edited character in the right column.

View a character: Clicking this button will take you to a character summary page specific to the character the button was attached to. It will display all of the information that was used to create the character. If the character finished the story, there will also be an added bio section telling the characters adventures.

Story: Clicking the story button will take your character through the journey of their life. The first story page will ask you to choose one of three choices dependant on your race. After clicking continue, you will be taken to a second story page that is similar but is dependant on the character's class. The third and fourth pages are also similar but are random stories. The final page completes the character's story. After clicking finish on the final page, you are brought to the character summary page, now with the bio section.

View all: Clicking the view all button will take you to a page with all of the characters that have been created and clicking a character's attached view button will take you to their summary page.

Requirements:

Seperates all db/business logic using the MVC pattern: We are using fat free and have different locations for the Model, Views, and Controller.

Routes all URLs and leverages a templating language using the Fat-Free framework: Strong user of php with the controller (index.php)

Has a clearly defined database layer using PDO and prepared statements: In the model, there is a db-functions.php which uses PDO to communicate with the database

Data can be viewed, added, updated, and deleted: Characters and users can be created, they can both be edited and updated, and characters can be deleted

Has a history of commits from both team members to a Git repository: We both committed close to equally amount of commits. https://github.com/mhorn97/fantasyrealms/commits/master

Uses OOP, and defines multiple classes, including at least one inheritance relationship: Premium character and regular characters. Premium characters also have skills

Contains full Docblocks for all php files: Each php file has a docblock for the file, methods, and classes if they have them'

Has full validation on the client side through javascript and server side through php: We show the user what is wrong with their input using javascript. We do not continue if there is an issue on the server side.

Incorporates jQuery and Ajax: Most of our javascript uses jquery. We use Ajax post.

