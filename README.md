# Ijob
Symfony 3 JobeetBoard 



## Symfony 3 Jobeet DAY 3: DATA MODEL

### generating entities
php bin/console doctrine:generate:entities Ct --path= src

php bin/console doctrine:generate:entity --entity=CtJobeetBundle:CategoryAffiliate

php bin/console doctrine:schema:update --force

composer require --dev doctrine/doctrine-fixtures-bundle