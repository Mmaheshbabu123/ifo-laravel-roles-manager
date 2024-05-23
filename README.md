## ifo/Laravel Roles Permissions Manager
<h5>Laravel Version : ^9</h5>
<hr />
<h4>Previews</h4>


<p>
  
  ![classification](https://github.com/Mmaheshbabu123/ifo-laravel-roles-manager/assets/29708637/18350c3f-80e0-47b0-bd7b-ebf143e371e5)


</p>


<p>
 
  ![permssion](https://github.com/Mmaheshbabu123/ifo-laravel-roles-manager/assets/29708637/226e5659-9346-4645-b697-14f385e5d6b8)

</p>

<hr />

<p>
   
  ![roles](https://github.com/Mmaheshbabu123/ifo-laravel-roles-manager/assets/29708637/29e35fe7-f51c-418b-b391-01a7c2f51eae)
 
</p>



## License

[MIT license](https://opensource.org/licenses/MIT).

## Usage
This is a package - it's a full Laravel project that you should use as a starter boilerplate, and then add your own custom functionality.
Here in this package can create roles and manager using the classification and permission manager.

<ul>
    <li>Clone the repository with <code>git clone</code></li>
    <li>Copy <code>.env.example</code> file to <code>.env</code> and edit database credentials there</li>
    <li>Run <code>composer install</code></li>
    <li>Run <code>php artisan migrate</code></li>
    <li>To run db:seed please run below command to store default permissions and users data</li>
    <li>Run <code>php artisan db:seed --class="Packages\\RoleManager\\Database\\Seeders\\DatabaseSeeder"</code></li>
    <li> Go to root project public folder then Please run below symbolic link creation for pointing to package public folder </li>
    <li>ln -s ../vendor/ifo/laravel-roles-permission-manager/src/public role-manager</li>
    <li>Please add below middleware in kernal.php  file inside web middleware group for registering the Auth gate middleware to api.php file</li>
    <li>\Packages\RoleManager\App\Http\Middleware\AuthGates::class</li>
    <li>Run <code>php artisan key:generate</code></li>
</ul>

With that user you can create more roles/permissions/users, and then use them in your code, by using functionality like Gate or @can, as in default Laravel.

<b>Your will be get Login Credentials from seeder file</b> <br>
--- &lt;root-project&gt; / database / seeders / UsersTableSeeder.php <br>
<b>Run below url to navigate to roles manager</b><br>
 http://127.0.0.1:8000/ifo-roles
## Notice
We are not responsible for any functionality or bugs in Monsteradmin & Others packages or their future versions, if you find bugs there - please contact vendors directly.

## Credit

<p><b>Author : </b> Mahesh Babu Manikanti</p>

<p><b>Development : </b> Mahesh Babu Manikanti</p>
<br><br>
Thanks For Downloading

