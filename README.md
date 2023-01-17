# Introduction

This is open source of website www.thichhoc.com. Feel free to ask me a question about this. Every suggestion to improve this project is valuable to me, I appreciate it.

# Prerequisites

-   Docker engine >= 20
-   Docker Compose >= 1

# How to run

-   Check port in `docker-compose.yml` to make sure that you don't have any application which is running on same port. Feel free to change port in `docker-compose.yml` to fit your need.
-   Run `make up`
-   Run `make migration`
-   Run `make admin`. Default name is `admin`, email is `admin@email.com` and password is `password123`. Pass `ADMIN_NAME`, `ADMIN_EMAIL` and `ADMIN_PASSWORD` to change name, email and password.
-   Access port of application and start using it

# TODO

-   [x] Add landing page
-   [x] Add signup page
-   [x] Add login page
-   [x] Add logout
-   [x] Add profile page
-   [x] Check image from resources instead of public folder
-   [ ] Add course list page
-   [ ] Add course detail page: have list all quiz belongs to course
-   [ ] Add quiz list page
-   [ ] Add quiz detail page: have list of all question belongs to quiz, user can do quiz in here
-   [ ] Check responsive
