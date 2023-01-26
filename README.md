# Keep In Touch

This is a working name. A more useful name will be set up later.

## Important Links

* [Kanban board](https://trello.com/b/mss44EAX/keep-in-touch)

## Development Details

### Getting started on a new machine

#### Setup in the `website` directory

Fetch all of the application dependencies by typing: `composer install`.

Make sure the `.env` file has the correct database information in it
and has the `CI_ENVIRONMENT` is set to `development`.

Then do `php spark migrate --all` to get all of the CodeIgniter/Shield tables
into the new database.

### Running mysql locally

To run mysqld locally, just run `mysqld_safe`.
The way mysql is installed on my laptop, this should be run as me rather than as root.

### Running a local webserver

To run a webserver locally that serves the application,
begin in the `website/` directory and run: `php spark serve`.
