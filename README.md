# HOW TO USE THE PROJECT
    - as XAMPP is used for database connectivity, you must need to add al files uploded to the following path -  C:\xampp\htdocs\web_development (NOTE: if you have installed XAMPP other than C drive, just note that you have to create a new folder in htdocs which us located in xampp folder, add all flies to that folder)
    - to run the project you just need to type localhost/[folder name located in htdocs] (in my case it is localhost/web_develpoment) in url of the browser.
    - NOTE: before entering your URL, you need to run your XAMPP application and also start Apache and MySQL. MySQL to use the PHPMyAdmin.

# COMPONENTS
    - index.php is used as the signin page.
    - signup.php is used to signup a student for the very first time.
    - forgotpassword_email is used to reset password of existant student user, using registered student email address.
    - forgotpassword_mobile is used to reset password of existant student user, using registered student mobile number.
    - registration.php is used to register more details of students.
    - documents.php is used to register documents of students.
    - profile.php is used to show and edit students profile, which include all details of students.

# FEATURES
1. if username dosent match with corresponding password then gives error
2. if user have do record on database then user cant signup, have to signup first
3. if username already exist then gives an warning.
4. password have rules as follow:
    - Must contain at least one number
    - one uppercase and lowercase letter
    - at least 8 or more characters
5. if password and confirm password dosen't matches thenit gives an warning.
6. forgot password can be done using 2 ways as follows:
    - using email
    - using mobile number
7. student login, student registration student documents table is maintained in mysql database.
8. any document uploded to database will also stored in images folder.
9. profile page is used to exit existant user details.