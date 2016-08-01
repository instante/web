
      ___           _              _                   //
     |_ _|_ __  ___| |_ __ _ _ __ | |_ ___       .∩∩.//
      | || '_ \/ __| __/ _` | '_ \| __/ _ \     .∩∩∩∩.
      | || | | \__ \ || (_| | | | | ||  __/    \     ) /
     |___|_| |_|___/\__\__,_|_| |_|\__\___|     \_____/

Instante website
------------------------

Deploy application:
------------------------

1. install dependencies by executing `composer install` from project root
2. Ensure that the database schema exists and is empty. Optionally, you may create one extra database schema for tests.
3. Ensure that the www server has write access to these folders
    - temp
    - log
4. setup local environment using bin/deployment/deploy-project.php

Develop/compile frontend:
------------------------

install node.js, then use shell commands:

        # setup
        # install grunt CLI and bower as global node.js module
        your-project/frontend$ npm install -g grunt-cli
        your-project/frontend$ npm install -g bower
        
        # install local grunt packages
        your-project/frontend$ npm install
        
        # install local bower components
        your-project/frontend$ bower install
        
        # start watchdog
        your-project/frontend$ grunt

the watchdog starts to automatically compile less and js on any change.

Managing composer packages:
---------------------------

To install new dependency - library:

1. add the dependency to composer.json
2. run `composer update --lock` - the --lock parameter preserves versions of other libraries.
