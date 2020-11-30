# Welcome to Delicious Recipes

![Delicious_Recipes](https://github.com/alfonsosargiottoITEC/recipes-efi/blob/master/public/images/logoDR.png)



<a href="#"><img src="https://img.shields.io/badge/license-MIT-green"></a>
<a href="#"><img src="https://img.shields.io/badge/php-^7.4.3-blue"></a>
<a href="#"><img src="https://img.shields.io/badge/laravel-^7.29-red"></a>


## About Delicious Recipes
**Delicious Recipes** is a website made for all the people who love **cooking**. It doesn't matter if you are a **beginner** or a **pro**. You will be allowed to learn from others and spread your **knowledge**.

As a **guest** (that means that you don't have an **user**) you are allowed to **see** all the **recipes**, but no to **access** to all the important **information**.
 To get **access** to all the **features** of _**Delicius Recipes**_ website, you need to **register** yourself and **log in**, of course. Then you will be able to see all the **details** and get all the **info** to execute the recipe you watched. Also, you will be able to **create** your own **recipes** between the **3000** aliments and ingredients we have in our database. You **CAN'T** add new ingredients or aliments to the database,only **Admins can**.
You can **classify** your recipe, to help other people to find what they want, also with the help of **tags**.
_Admin user can do everything: View recipes details, delete and modify. He can also create,edit and delete aliments._

## Database model

To understand a little more about this project here you have the database model screenshot. The main entities are **recipe** and **aliment** because as we all know, a **recipe** is made of two or more **aliments** or ingredients. 
Each recipe has only **one category** and can have many **tags**. Also, **aliments** are **classified** of course.

![Database_Model](https://github.com/alfonsosargiottoITEC/recipes-efi/blob/master/public/images/recipesDBmodel.png)


## How to install Delicious Recipes

1. First create a DB Schema named **'recipesDB'**.

2. Clone the git-repo. It will create a *'recipes-efi'* directory:
    - **`git clone https://github.com/alfonsosargiottoITEC/recipes-efi.git`**

3. Navigate into the folder with your terminal and run the next command to install dependencies:
   - **`composer install`**
   
   - Also you should run another command to install npm packages:  
     -  **`npm install`**

4. Copy the **.env.example** from the root app directory file and create your own **.env** or rename the file to '.env'

5. You need to configure your DB connection and generate an app key with the command:
    - **`php artisan key:generate`**
6. Now, to create the database tables and their relationships run:
    - **`php artisan migrate --seed`**  
    
    _The **'--seed'** flag will insert some random data in the DB so you can start with some info._

    _The migration command will create an **Admin** user by default. You can also create your own **Cocinero** user._

    _The **Admin** user credentials are:_  **email** = superadmin@itecriocuarto.org.ar  ||  **password** = efi2020laravel


7. Finally you are ready to start using the app. Run: 
    - **`php artisan serve`**

    _By default it will run in **port 8000**_
 


## Resources

**API** endpoints:

- Retrieves all the recipes with some info.
  - **Method:** GET
  - **URI:** `http://localhost:8000/api/recipes`
  - **Content-type:** JSON  
- Retrieves a SINGLE recipe with all its related info, as category, aliments and others.
  - **Method:** GET .
  - **URI:** `http://localhost:8000/api/recipes/{recipeID}`
  - **Content-type:** JSON  


**Command list:**  

- To get a list of top viewed recipes run :  
  - **`php artisan recipes:top-views`**

## Project origin
This Laravel project was developed as a end of course work for the "Programación III" signature from Software Development career in Instituto Tecnológico Río Cuarto.


## License

The Delicious Recipes app is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
