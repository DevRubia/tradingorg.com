FROM php:apache

# Install necessary dependencies
RUN apt-get update && apt-get install -y git

# Download and install the Firebase PHP SDK
RUN git clone https://github.com/kreait/firebase-php.git /var/www/html/conndb.php
