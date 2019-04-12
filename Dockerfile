FROM mojdigital/wordpress-base:upgrade

RUN curl -sL https://deb.nodesource.com/setup_11.x | bash - && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y nodejs && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /var/tmp/* /init

ADD . /bedrock

WORKDIR /bedrock

ARG COMPOSER_USER
ARG COMPOSER_PASS

# Set execute bit permissions before running build scripts
RUN chmod +x bin/* && sleep 1 && \
    #make clean && \
    bin/composer-auth.sh && \
    make build && \
    rm -f auth.json
