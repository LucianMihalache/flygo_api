### TODO:

Every day the New York Times publish a mini crossword available at this page https://www.nytimes.com/crosswords/game/mini

Build a production ready utility that, given a date, generates an output similar to the following one:

Where each line represents a JSON object for each of the clue/answer in the crossword for that day with the following fields:

- Which infrastructure resources you would need to run the utility daily in an automated fashion?
- > To automatically generate the daily crosswords we need to use the crons, for this we need to add: <pre>* * * * * cd /path/to/flygo_api && php artisan schedule:run >> /dev/null 2>&1</pre>
- How would you deploy your code to the infrastructure?
- > We would preferably use ci/cd with a runner to build and deploy the app
- How would you automate your deployments so that each push to your default branch will trigger a deployment to your production environment
- > We would use the ci/cd if we have a runner. If not, we can use the webhooks.
- Is it possible to get the data about past crosswords? If yes, how would you build a solution to get all the historical crosswords data?
- > Use the build-in restful api. See the bottom documentation

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
### Get crosswords. It defaults to the current day.
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
