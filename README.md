# Document Request System

This is a simple document request system built with Laravel. It allows users to request documents from a central authority, and for the authority to approve or deny those requests.

## Installation

1. Clone the repository
2. Run `composer install`
3. Run `php artisan key:generate`
4. Run `php artisan migrate`
5. Run `php artisan db:seed`

## Usage

1. Register as a user
2. Request a document
3. As an admin, log in and approve or deny the request

## Features

* User registration and login
* Document request form
* Admin dashboard for managing requests
* Email notifications for users and admins upon request approval or denial
