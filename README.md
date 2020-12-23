<p align="center"><a href="#" target="_blank"><img src="https://c.wallhere.com/photos/ee/c1/Vocaloid_symbols_transparent_background_typography-1354881.jpg!d" width="400"></a></p>



## VocaMusic

Vocamusic is an open-source web application (built in @Laravel) for streaming Vocaloid and Utaite Music. Some features can be detailed here:

- Using CDN From Fast.io to storage videos.
- The main host stream is Google Drive.
- Login/Register (Login With Oauth2/Facebook/Google)
- Sort by: Related, Top viewers and Alphabet.
- Pagination.
- Upload video vias Google Drive API.
- Top ranks uploaders.

This web application is accessible and **completely open-source.**

## Database.

Coming Soon.

## Usage

- Clone this git to Laravel project has just created.
```bash
git clone clone kobato-chan1912/vocaloid-streaming
```
- Using terminal and cd to your project. 
- Install Composer Dependencies
```bash
composer install
```
- Create a copy of your .env file
```bash
cp .env.example .env
```
- Generate an app encryption key
```bash
php artisan key:generate
```
- Edit Appkey in .env file 
```bash
APP_KEY={key has been generated}
```
- Open to MySQL Admin (PHPMyadmin, MySQL Workbench,...) and load the sql file.
```bash
SQL File (coming soon)
```

- Get the Drive Client ID, Client Secret and Refresh Token [here](https://gist.github.com/sergomet/f234cc7a8351352170eb547cccd65011)
- Loading the database configuration and Google Drive API in .env file 
```bash
// MYSQL Connection
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=vocaloid
DB_USERNAME=root
DB_PASSWORD=root

// Google Drive API Setting
GOOGLE_DRIVE_CLIENT_ID=XXX.apps.googleusercontent.com
GOOGLE_DRIVE_CLIENT_SECRET=XXX
GOOGLE_DRIVE_REFRESH_TOKEN=X
GOOGLE_DRIVE_FOLDER_ID=X

//If you upload to the main drive, set the folder id = null. 
//If upload in a folder, set the id of that folder.
```
## Admin Account
You can you this admin account to access /admin.
```
Format: 
email
password
```
```
no_body156@yahoo.com.vn
admin
```
## Deploy

Coming Soon.

## Contributing

Thank you for considering contributing to the VocaMusic! You can send your pull request everytime.


## License

This app is based on Laravel framework - an open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
