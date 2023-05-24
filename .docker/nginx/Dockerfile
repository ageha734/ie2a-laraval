# set base image
ARG nginx_image_version="nginx:1.20-alpine"
FROM ${nginx_image_version}

# set environment variables
ENV LANG ja_JP.UTF-8
ENV LANGUAGE ja_JP:ja
ENV LC_ALL ja_JP.UTF-8
ENV TZ 'Asia/Tokyo'

# setting nginx
ADD default.conf /etc/nginx/conf.d/default.conf
RUN chmod 644 /etc/nginx/conf.d/default.conf

# set linux
RUN apk --no-cache add tzdata && \
    cp /usr/share/zoneinfo/$TZ /etc/localtime && \
    apk del tzdata

# Expose application port
EXPOSE 80

# start cmd setting
CMD ["nginx", "-g", "daemon off;"]
