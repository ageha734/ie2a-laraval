# https://hub.docker.com/_/phpにあるイメージファイルを指定
ARG php_image_version="php:8.0-fpm"
FROM ${php_image_version} AS build

# docker label
LABEL version="0.1"
LABEL description="laraval8"

# Summary of Variables
ARG docker_uid
ARG docker_gid
ARG docker_user
ARG docker_groups
ARG docker_password
ARG user="root"
ARG work_dir="/home/${docker_user}/${docker_user}"

# Use root account to use apk
WORKDIR ${user}
USER ${user}

# set environment variables
ENV TERM xterm
ENV BASEDIR ${work_dir}

# phpの設定ファイルをコンテナ側にコピーする
COPY php.ini /usr/local/etc/php/

# RUNコマンドは、buildしたときに元となるdockerイメージに対して実行する処理を記述する。
# \（バックスラッシュ）を用いて、複数行に分けることが可能。
# パッケージ一覧を更新
RUN apt-get update \
    # zlibはデータの圧縮に関するアルゴリズムをライブラリ化したもの
    && apt-get install -y zlib1g-dev \
    # vimをインストール
    # MariaDBデータベースのクライアントアプリケーションである「mysql」を使えるように「mariadb-client」をインストール
    # libzip-devはzip圧縮時に必要となるライブラリ(libzip は、zlib を使用する)
    # docker-php-ext-installはPHPに標準で備わっている拡張パッケージのインストール＆有効化ができるコマンド
    # PDO_MYSQL は、PHP から MySQL データベースへのアクセスを可能にするための PHP Data Objects (PDO) インターフェイス を実装したドライバ。
    && apt-get install -y vim mariadb-client libzip-dev docker-php-ext-install zip uzip pdo_mysql \
    # git make locales のインストール
    && apt-get install -y git make \
    # xdebugのインストール
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    # セッションクリア
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# user setup
RUN groupadd -g ${docker_gid} ${docker_groups} && \
    useradd -m -s /bin/bash -u ${docker_uid} -g ${docker_gid} -G ${docker_groups} ${docker_user} && \
    echo ${docker_user}:${docker_password} | chpasswd && \
    echo "${docker_user}   ALL=(ALL) NOPASSWD:ALL" >> /etc/sudoers
    
# Composerのインストール & パス通す
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1

ENV COMPOSER_HOME /composer

ENV PATH $PATH:/composer/vendor/bin

# nodeインストール(aptだとNodejsは古いため、パッケージマネージャの n を使用してインストール)
RUN apt install -y npm \
    && npm install n -g \
    && n stable

# RUN , CMD , ENTRYPOINT , COPY , ADD を実行する時のワーキングディレクトリを指定
USER ${docker_user}
WORKDIR ${work_dir}

# startup command
RUN composer global require "laravel/installer"