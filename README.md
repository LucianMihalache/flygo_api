## Run Locally

Clone the project

```bash
git clone https://github.com/LucianMihalache/flygo_api
```

Go to the project directory

```bash
cd flygo_api
```

Copy&rename .env.example into .env

```bash
cp .env.example .env
```

Update the .env database connection
```bash
DB_CONNECTION=mysql
DB_HOST=DATABASE_HOST
DB_PORT=3306
DB_DATABASE=DATABASE_NAME
DB_USERNAME=DATABASE_USER
DB_PASSWORD=DATABASE_PASSWORD
```

Install dependencies

```bash
composer install
```

Run database migrations

```bash
php artisan migrate
```

Run database seeder

```bash
php artisan db:seed
```

Create cached symlink for the crosswords

```bash
php artisan storage:link
```

Generate the daily cached crosswords

```bash
php artisan crosswords:generate
```

Start the server

```bash
php artisan serve
```

Access the daily cached crosswords

```bash
http://127.0.0.1:8000/storage/crosswords.json
```

Use the restful API to manage the crosswords

```http request
### Get crosswords
GET http://127.0.0.1:8000/api/crossword
Accept: application/json

### Get crosswords for specific date
GET http://127.0.0.1:8000/api/crossword?date=2023-07-28
Accept: application/json

### Create crossword
POST http://127.0.0.1:8000/api/crossword
Content-Type: application/json
Accept: application/json

{
    "answer": "Lorem",
    "clue": "Ipsum?",
    "date": "2023-07-27",
    "direction": "across"
}

### Update crossword
PUT http://127.0.0.1:8000/api/crossword/5
Content-Type: application/json
Accept: application/json

{
    "date": "2023-07-29"
}

### Delete crossword
DELETE http://127.0.0.1:8000/api/crossword/2
Content-Type: application/json
```
