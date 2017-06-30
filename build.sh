#!/bin/bash
set -e

###
# Build Script
# Use this script to build theme assets,
# and perform any other build-time tasks.
##

# Clean up the working directory (useful when building from local dev files)
if [ -d ".git" ]
then
	git clean -xdf
fi

# Add composer auth file
if [ ! -z $COMPOSER_USER ] && [ ! -z $COMPOSER_PASS ]
then
	cat <<- EOF >> auth.json
		{
			"http-basic": {
				"composer.wp.dsd.io": {
					"username": "$COMPOSER_USER",
					"password": "$COMPOSER_PASS"
				}
			}
		}
	EOF
fi

# Install PHP dependencies (WordPress, plugins, etc.)
composer install

# Build theme assets
cd web/app/themes/lawcom
npm install -g bower grunt-cli && echo "{ \"allow_root\": true }" > /root/.bowerrc
npm install && bower install
grunt build

# Remove node_modules to (drastically) reduce image size
rm -Rf node_modules

cd ../../../..

# Remove composer auth.json
rm -f auth.json
