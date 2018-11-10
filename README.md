# Doctrine ORM Bug Replicator

This repository contains demonstration of possible bug in doctrine.

# DO NOT USE THIS REPOSITORY!

## In order to trigger:
- Create database:  
  `rm var/dev.db ; bin/console doctrine:database:create ; bin/console doctrine:schema:create ; bin/console doctrine:fixtures:load -n `
- Run `bin/console app:test` (see code there)
