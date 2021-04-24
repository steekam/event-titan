
# Event Titan

A simple event booking platform built using Laravel, Blade components and Livewire. This project was part of a take-away project for a technical interview.


## Features

- Basic CRUD functionalities for events.
- List Upcoming Events from other users.
- User can make booking for another user's event.
- User can list their booked events.

  
## Run Locally

Clone the project

```bash
  git clone https://github.com/steekam/event-titan
```

Go to the project directory

```bash
  cd event-titan
```

Install dependencies

```bash
  npm install
```

```bash
  composer install
```

Build frontend assets

```bash
  npm run dev
```

Create `.env` file if it doesn't exist

```bash
php -r "file_exists('.env') || copy('.env.example', '.env');"
```

Generate `APP_KEY`

```bash
php artisan key:generate
```

> Ensure you have created a database and updated the `.env` file.

Migrate database tables

```bash
  php artisan migrate
```

Optionally seed data into the database
```bash
  php artisan db:seed
```

Start the server

```bash
  php artisan serve
```

> Update `APP_URL` to the URL provided by `serve` command for the emails to generate correct URLs.

If you seed the application you get test credentials for a single user.

**username:** `test@mail.com` **password:** `password`


  
## Environment Variables

To run this project, you will need to add/update the following environment variables to your .env file

- `MAIL_*` for the SMTP server so that email sending for account verification and password reset works.


  
## Running Tests

To run tests, run the following command

```bash
  php artisan test
```

  
## Tech Stack

**Client:** Laravel Blade Templates, TailwindCSS, AlpineJS

**Server:** Laravel, Livewire

  
## Authors and Acknowledgement

- Kamau Wanyee [@steekam](https://www.github.com/steekam) for development.
- [Jetstream](https://jetstream.laravel.com/2.x/introduction.html) for project scaffold.
- [TailwindUI](https://tailwindui.com) for the HTML templates.
