FROM canals/php:latest

RUN apt-get update

RUN apt-get install --yes --force-yes\
    nano tree