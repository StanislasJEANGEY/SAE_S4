FROM ubuntu:kinetic

RUN apt-get update

RUN DEBIAN_FRONTEND=noninteractive\
    apt-get install -y --no-install-recommends tzdata &&\
    apt-get clean

RUN apt-get install --yes --force-yes\
    emacs nano vim tree \
    php-common php-json php-mysql