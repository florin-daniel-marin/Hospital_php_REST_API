# Hospital Laravel API

Restful Hospital API realizat cu framework-ul Laravel 9.0.
Acesta include tabelele in Mysql: **Doctors, Patients, Assistants si Treatments si Users**

## How to use
**Dependencies**  
1. Install **XAMPP with PHP version 8.1.x** from https://www.apachefriends.org/download.html 
2. Install Composer (dependency for Laravel) from https://getcomposer.org/download/  
Run this command in new terminal (or cmd) in root directory
```
composer install
php artisan key:generate
```

**Database Setup**  
(Optional) This app uses **MySQL** (installed with XAMPP). To **use something different**, open up **config/database.php** and change the default driver.  
<sub>18:'default' => env('DB_CONNECTION', 'mysql'),</sub>  

3. Setup a database and then add your db credentials(database, username and password) to the .env.example file **and rename it to .env**
```
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

**Migrations and seeding**  
4. Create all the nessesary tables and columns, run the following in terminal:
```
php artisan migrate
```
5. To populate db run the following
```
php artisan migration:fresh --seed
```

**File Uploading**  
6. When uploading listing files, they go to "storage/app/public". Create a symlink with the following command to make them publicly accessible.
```
php artisan storage:link
```

**Start the app**  
7. Start Apache and MySQL from XAMPP and run this command to make the connection to local server 
```
php -S localhost:8000 -t public/
```

## Making this project
## - Dependente
Conexiunea Php si mysql din XAMPP, versiunea de php: 8.1.10   
Laravel depinde de Composer, pentru a creea un nou proiect Laravel, am rulat comenzile:  
composer init si composer create-project laravel/laravel 9.0  
Apoi am instalat **node.js: npm install, npm run dev**  

## - Structura
### * Folderul database

Tabelele le-am definit in folderul **database/migrations**, prin 
```
php artisan make:migration create_"name"_table
```
In folderul **database/factories** am definit intrarile in tabele si in **database/seeders** sunt puse nr de valori generate de factories

### * Folderul app/Controllers
Datorita funtionalitatilor cerute, in folderul **app/Modules** am definit relatiile intre module, astfel **! tabelele din Sql = modele in Laravel !** 
Am creeat **app/Http/Controllers:** controllere pentru fiecare model cu abilitatiile de baza: CRUD (Create, Update, Delete)  
  
### * Folderul routes
Iar in **routes/web.php** sunt definite toate rutele pentru cele 5 modele: **Assistant, Doctor, Patient, Treatment, User**  
De aici sunt apelate functiile din **app/Http/Controllers** !  
Common Resource Routes <- **Functii**:
- index - Show all resources
- show - Show single resource
- create - Show form to create new resource
- store - Store new resource
- edit - Show form to edit resource
- update - Update resource
- destroy - Delete resource  

### * Folderul app/Models
Datorita funtionalitatilor cerute, in folderul **app/Modules** am definit relatiile intre module, astfel **! tabelele din Sql = modele in Laravel !**  
Relatiile sunt:  
- **polymorphic one to many:** Treatments cu Doctors si Assistants  
<sub>//--1 tratament poate sa fie dat ori de un doctor, ori de un asistent</sub>  
  
- **polymorphic one to one:** Users cu Doctors si Assistants  
<sub>//-- un cont poate fi ori a unui doctor, ori a unui asistent</sub>  
  
- **one to many:** Doctors si Patients  
  
- **many to many:** Assistants si Doctors  
  
## - Users  
In tabelul users exista coloana employee_type: se definesc 3 tipuri de useri: **GM, Doctors, Assistants**  
login/logout: Daca nu esti logat (esti guest), atunci vei ramane blocat la meniul de logare. Pentru ca nu exista butonul register,  

### Creearea unui cont
Pentru ca nu exista butonul register, trebuie sters din **routes/web.php**:  
<sub>
Route::get('/register', [UserController::class, 'create'])->~~middleware('auth')~~;  
Route::post('/users', [UserController::class, 'store'])->~~middleware('auth')~~;  
</sub>

## - Front End
Pe partea de front end, am folosit **bootstrap 5** pentru styling, iar paginile din view sunt scrise in **blade.php**  
<sub>Blade.php usureaza scrierea si face codul mai usor de urmarit, dar are si niste unelte care ajuta compartimentarea,  
eu le-am definit sub forma de card, si sunt in fisierul de compartiments.  
Compartimentarea am facut-o cu ajutorul functiilor din blade in front end: @yield si @section, si prin rute in routes/Web.php.</sub>  
  
**-Main page** are un meniu ce contine modelele definite, iar in functie de userul logat functionalitatea site-ului ii este constransa,  
<sub>de ex: daca este doctor nu poate sa vada informatiile despre alti doctori, daca este asistent nu poate sa vada detalii despre doctori</sub>  

### Functionalitati GM (General Manager)
Este implementat un buton de Add Users pentru a creea utilizatori  
Add, Refresh, Edit, Delete pentru fiecare modificarea fiecarui model in parte  
Este implementata si o bara de search functionala si un sistem de cautare dupa tag-uri (nume, prenume, descriere).  

### Functionalitati atinse
- Login 
- Doctor management done by GM 
- Patient management done by Doctor or GM
- Assistant management done by GM
- Treatment manager done by Doctor or GM
- Treatment recommended by doctor to patient done by Doctor  
  
Proiectul nu este finalizat, exista multe probleme, dintre care: doctorul, asistentul pot creea useri noi, nu sunt implementate
metode de accesare a tabelelor legate, probleme foarte mari la principii importante de cod, DRY, probleme de securitate, neintelegerea pe deplin cum
functioneaza toata compartimentarea laravel,etc.    
  
In final, pentru mine este prima experienta cu un framework php: Laravel si cu un api de dimensiunile si utilizabilitatea acestuia.  
  
## Licente
Proiectul l-am facut pentru pozitia de PHP Developer la Tremend [^1]  
Exista de asemenea si un model cu tot cu metode implementate, numit **listings**, pe care l-am folosit ca model, din [^2]  
Template pentru paginile HTML, l-am folosit pe acesta [^3]  
Laravel, framework complet php, versiunea 9.1, mai multe detalii [^4]  

[^1]: https://tremend.com/
[^2]: https://github.com/bradtraversy/laragigs.git  
[^3]: https://templatemo.com/tm-566-medic-care  
[^4]: https://laravel.com/docs/9.x/releases