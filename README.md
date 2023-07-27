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
DB_HOST=127.0.0.1
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

Start the server

```bash
  php artisan serve
```

