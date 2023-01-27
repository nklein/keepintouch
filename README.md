# Keep In Touch

This is a working name. A more useful name will be set up later.

## Important Links

* [Kanban board](https://trello.com/b/mss44EAX/keep-in-touch)

## Development Details

### Getting started on a new machine

#### Setup in the `website/` directory

Fetch all of the application dependencies by typing: `composer install`.

Make sure the `.env` file has the correct database information in it
and has the `CI_ENVIRONMENT` is set to `development`.

Then do `php spark migrate --all` to get all of the CodeIgniter/Shield tables
into the new database.

### Running mysql locally

To run mysqld locally, just run `mysqld_safe`.
The way mysql is installed on my laptop, this should be run as me rather than as root.

### Compiling the CSS and Javascript

First, install SASS. On the Mac, this can be `brew install sass/sass/sass`.

Then, in the `website/` directory, run: `composer css` to install the CSS.
If you're going to be constantly tweaking the CSS, then you might prefer to run:
`composer css-watch` to have it rebuild any time the `sass/site.css` changes.

To install the Javascript, go to the `website/` directory and
run: `composer js`.

### Running a local webserver

To run a webserver locally that serves the application,
begin in the `website/` directory and run: `php spark serve`.

## Run unit tests

In the `website/` directory, run `./vendor/bin/phpunit`.
