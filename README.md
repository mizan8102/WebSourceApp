# US Cities Information Management System

This project aims to create a web application for managing information about US cities. The application utilizes the CoreUI admin panel for the backend and Vue.js 3 for the public page.

## Pages

List of pages-

### Authentication

    - Login Page
    - Registration Page

### Import

    - Import Excel Form
    - Populate and Show List 

### List

Create a page within the admin panel to display all cities' data in a list format. Implement a filter mechanism to allow users to filter data based on state and/or county.

### View Mechanism

Implement a view mechanism to display detailed information about any city in a modal. Users should be able to click on a city in the list to view additional details in a modal without leaving the list page.

## Public Page (SPA) - Vue.js

### City Search Page

Create a Vue.js-based single-page application (SPA) for the public page. Implement a city search page where users can search for cities by name, state, and/or county.

### Display Search Results

Ensure that the search results are displayed dynamically without reloading the entire page. Utilize Vue.js features to update the search results seamlessly as users enter search criteria.

### Display City Details in Modal

Implement a modal in the SPA to display detailed information about a city when a user clicks on a show button in list. The modal should show relevant details without requiring a page reload.

## Project Description

This project establishes a comprehensive US cities information management system. The backend enables efficient data management, including batch processing for data upload and a user-friendly interface for viewing and filtering city information. The Vue.js-based SPA provides a seamless public page, allowing users to search for cities and view details without reloading the entire page.

## Technologies Used

- **Backend:** Laravel 10
- **Frontend (SPA):** Vue.js 3
- **Database:** MySQL
- **Queue System:** Laravel Jobs/Queue for data upload processing

## Table of Contents

- [Project Installation](#project-installation)
  - [Clone Project](#1-clone-project)
  - [Navigate to Project Folder](#2-navigate-to-project-folder)
  - [Composer Install](#3-composer-install)
  - [.env Setup](#4-env-setup)
  - [Database Setup](#5-database-setup)
  - [Generate Application Key](#6-generate-application-key)
  - [Migrate Database](#7-migrate-database)
  - [NPM Setup](#8-npm-setup)
  - [Run Application](#9-run-application)
  - [Run Job](#10-run-job)

## Project Installation

Follow these steps to set up and run the project locally.

### 1. Clone Project

    git clone <https://github.com/mizan8102/WebSourceApp.git>

### 2. Navigate to Project Folder

    cd ./WebSourceApp

### 3. Composer Install

    composer install --ignore-platform-reqs

### 4. .env Setup

    cp .env.example .env

### 5. Database Setup

Create a database named \`websolution\`.

### 6. Generate Application Key

    php artisan key:generate

### 7. Migrate Database

    php artisan migrate

### 8. NPM Setup

    npm install
    npm run build

### 9. Run Application

    php artisan serve

### 10. Run Job

    php artisan queue:work

Browse: [http://127.0.0.1:8000/#/](http://127.0.0.1:8000#/)
