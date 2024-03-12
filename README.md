![Home Screen](https://ben-dodd.com/assets/images/projects/csc348project/home.png)

## Overview

This project was created for the CSC348 Web Application Development module at Swansea University. The aim was to create a forums style website using Laravel as the framework. The project specification allowed me to demonstrate numerous development skills that are key for web development.

## Features

### Comment on items in the database combined with AJAX

![Comment](https://ben-dodd.com/assets/images/projects/csc348project/comment.png)

The comment system demonstrates creating entries to the database and associating an entry with another model, in this case a comment to a post. Furthermore, by using AJAX, a request is made to update the page in real time to show the new comment, therefore a refresh is not required.

![User](https://ben-dodd.com/assets/images/projects/csc348project/user.png)

Additionally, posts are associated with users, and these posts can be seen on the profile of that user. This demonstrates the one to many relationship between users and posts. Additionally, only the user who created the comment can see edit and delete buttons.

### CSS Framework and Pagination used

![Posts](https://ben-dodd.com/assets/images/projects/csc348project/posts.png)

I decided to use Bootstrap as my CSS framework as I have previously used it in my projects and the extensive documentation meant it was quick for me to setup with my web application.

Using paginate on my Eloquent queries for posts, users, and communities means that the page does not get filled with every single item from the database, and allows me to easily navigate through the pages.

### Service Container Pattern

![Profile](https://ben-dodd.com/assets/images/projects/csc348project/profile.png)

As part of the extra features for the specification I used the service container pattern to implement a weather indicator on a user's profile. This container makes requests to a weather API and stores the information. This container can be accessed across the entire scope of the website meaning I can easily add the weather feature elsewhere. Furthermore it allows me to easily update the request code if the provider makes breaking changes to their API.

### Multiple level of authorisation

I created two roles, a user and an admin. The admin has the ability to create, edit and delete posts, users, and communities. The user can only create posts and comments. This demonstrates the use of middleware to restrict access to certain pages. Furthermore, the admin can delete users, and this cascades to delete all posts and comments associated with that user.

To achieve this I associated certain permissions to each of these roles, meaning I can easily add new permissions without affecting current roles, and create new roles with certain permissions.

### User presence

- User registration
- Multiple level of authorisation (user roles)

### Working with data

- Create, edit and delete items
- Validation implemented
- One to one, one to many and many to many relationships used
- Images can be uploaded and stored in the database
- Polymorphic relationships used.
