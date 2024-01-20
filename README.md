## Backend Microservice Architecture in PHP

Task 1: Microservice Setup

Create a simple PHP microservice that exposes an API endpoint to retrieve information about users. The microservice should have the following features:

    Endpoint: /users/{id}

        Method: GET
        Retrieve user information by ID.
        Return a JSON response with user details (e.g., user ID, name, email).

    User Data:

        You can use a static array to simulate a database of users. Include at least 5 users with different IDs, names, and emails.

Task 2: Error Handling

Implement error handling for the microservice. If a user with the requested ID is not found, return a proper HTTP response code and a meaningful error message in JSON format.

Task 3: Authentication

Add a basic authentication mechanism to the microservice using a hard-coded API key. Only requests with a valid API key should be allowed to access the /users/{id} endpoint.

Task 4: Dockerize the Microservice

Create a Dockerfile to containerize the microservice. The Docker image should be based on an official PHP image, and the microservice should run on port 8080. 

Development with docker

# Prerequisits:
Docker Desktop for Mac
Copy .env file into project root dir

# building docker image for development
docker build -t microservice .

# mount project root dir, map port to container and develop
docker run -p 8080:8080 --name microservice microservice:latest

# commands to execute inside container
composer install

# API endpoint to retrieve user information.

# Get all user informations
curl --location 'http://127.0.0.1:8080/api/users?api_key=base64%3AniAH0v3v4lfdzJm0nwBUlCV4za57WU2FydDRCcVDY%3D' \
--header 'Cookie: auth-key=4996e0a1-5554-4aa0-83d0-027b36b4208c'

# Get user information by ID
curl --location 'http://127.0.0.1:8080/api/users/3?api_key=base64%3AniAH0v3v4lfdzJm0nwBUlCV4za57WU2FydDRCcVDY%3D' \
--header 'Cookie: auth-key=4996e0a1-5554-4aa0-83d0-027b36b4208c'

# Authentication (set in .env file)
APP_KEY=base64:niAH0v3v4lfdzJm0nwBUlCV4za57WU2FydDRCcVDY=



