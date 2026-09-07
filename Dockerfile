FROM wordpress:latest

# Устанавливаем расширения PDO и PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql