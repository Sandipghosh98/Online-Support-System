# Online Support Ticket

A support ticket application provides a medium for customers to lodge issues they face using a particular organization's service/product by opening a support ticket with the organization's help desk.

## Application Features
- An authenticated user can open support tickets.
- Upon opening the tickets, an email will be sent to the user along with the details of the support ticket opened.
- Subsequently, mails will be sent to the user as the customer support staff or admin response to the ticket.
- The user can also respond to the ticket he/she opened by commenting on the ticket.
- The admin or the customer support staff can also mark a ticket as resolved.
- Once a ticket is marked as closed, the user who opened the ticket will be notified by email on the status of the ticket
- Web portal is also available in hindi language.

## Getting Started

Clone the project repository by running the command below

```git clone https://github.com/kishan79/ticket.git```

Run the command below to install Laravel dependencies

```composer install```

## Setting Up
- To setup your database and `cd` into the project directory then run:

    ```php artisan migrate```

- Now enter your Gmail ID and Password in the **.env** file to send emails.

- Once the database is settup and migrations are up, run

    ```php artisan serve```

    and visit [http://localhost:8000/](http://localhost:8000/) to see the application in action.

