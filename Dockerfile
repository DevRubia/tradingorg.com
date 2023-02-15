# # Use the latest version of PHP
# FROM php:apache-cli

# # Install the Firebase dependencies
# RUN apt-get update && apt-get install -y \
#     curl \
#     git \
#     unzip

# # Install the Firebase CLI
# RUN curl -sL https://firebase.tools | bash

# # Set the working directory
# WORKDIR /app

# # Copy the PHP files
# COPY . /app

# # Define the command to run when the container starts
# CMD ["php", "index.php"]
