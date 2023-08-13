#!/bin/bash
set -eux

./tools/php-cs-fixer/vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.dist.php --stop-on-violation --using-cache=no -vvv --diff
./tools/phpstan/vendor/bin/phpstan analyse src tests --level=max