
# Agiledrop talk on Laravel Livewire

In this repository you can find 2 branches:
- **main**: the laravel installation I used that has already the user.edit view.
- **livewire_update_user**: the code with the Livewire component added.


[Google Presentation](https://docs.google.com/presentation/d/1kPeX7B4-kGl8woBco4BVGfb96mTKIS_bBzkdBxr-9Qk/edit?usp=sharing)

YouTube video: add url here


---

### Access to the virtual machine database

You can access to the homestead database using **MySQLWorkbench** or **Sequel Ace**
(Sequel Ace is the "sequel" to longtime macOS tool Sequel Pro.)

I suggest to use **Sequel Ace** instead of **Sequel Pro** since **Sequel Pro** may have problems connecting to the Homestead database.

Connect using SSH and this parameters:

```
MySQL host: 127.0.0.1
Database user: homestead
Database password: secret
Database: homestead

SSH host: 192.168.10.10 (unless you changed it in Vagrantfile)
SSH user: vagrant
SSH password: vagrant
```

Then create the database **agiledrop_livewire_talk**

### Setup the dev environment

Clone this repo into a local folder:
```
git clone git@github.com:davide-casiraghi/livewire_agiledrop_talk.git
```

Copy & customize your .env config:   
```cp .env.example .env```    
```nano .env```


Config the .env like this:
```
DB_CONNECTION=mysql
DB_HOST=192.168.10.10
DB_PORT=3306
DB_DATABASE=agiledrop_livewire_talk
DB_USERNAME=homestead
DB_PASSWORD=secret
```

Add configuration to the Homestead.yaml file. (Homestead installed globally)
```
cd ~/Homestead  
sudo nano Homestead.yaml  

```
And here add:
```yaml
folders:
    - map: .... absolute path of the local folder related to your git repo...
      to: /home/vagrant/code/livewire_agiledrop_talk
      
sites:
    - map: livewire_agiledrop_talk.local
      to: /home/vagrant/code/livewire_agiledrop_talk/public
      php: "7.4"
```

To start the virtual machine:
```
cd ~/Homestead  
vagrant up
```

Install vendor files:   
```composer install```

Generate a unique app key by the following command:    
```php artisan key:generate ```  
The key will be added to your .env file:
```APP_KEY=```

Run the db migrations:    
```php artisan migrate```

Clean the cache:  
```php artisan cache:clear```

Open the hosts file on your machine in your text editor and add this entry.

```192.168.10.10 livewire_agiledrop_talk.local```

Install all npm modules:   
```npm install```

Create the file storage symbolic link from public/storage to storage/app/public

```php artisan storage:link```

Access the local website at:   
[https://livewire_agiledrop_talk.local/](https://livewire_agiledrop_talk.local/)

---


### Generate dummy data
If you are using PHPStorm you can generate the users data with this plugin:

[https://plugins.jetbrains.com/plugin/14957-laravel-tinker](https://plugins.jetbrains.com/plugin/14957-laravel-tinker)

Once the plugin is installed in phpstorm.
1) From the console empty the database and run the seeders   
   ```php artisan migrate:fresh && php artisan db:seed```
2) Press ctrl+Shift+T
3) Paste the following code
4) Press again  ctrl+Shift+T to execute the code


```php
<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Sequence;

$user = User::factory()->create([
    'name'  =>  "Davide Casiraghi",
    'email' => 'davide.casiraghi@gmail.com',
]);

User::factory()->count(4)->create();

```