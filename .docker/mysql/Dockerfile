# set base image
ARG mysql_image_version="mysql:8.0"
FROM ${mysql_image_version}

# set environment variables
ENV MYSQL_ROOT_PASSWORD mysql
ENV MYSQL_ALLOW_EMPTY_PASSWORD 'yes'
ENV LANG ja_JP.UTF-8
ENV LANGUAGE ja_JP:ja
ENV LC_ALL ja_JP.UTF-8
ENV TZ 'Asia/Tokyo'

# set work directory
COPY my.cnf /etc/mysql/conf.d/my.cnf
RUN chmod 644 /etc/mysql/conf.d/my.cnf

# install dependencies
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime &&  \
    chown -R mysql:$MYSQL_ROOT_PASSWORD /var/lib/mysql/

# Expose application port
EXPOSE 3306

# start cmd setting
CMD ["mysqld"]
