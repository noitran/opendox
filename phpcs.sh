#!/bin/sh

## chmod +x phpcs.sh
## ./phpcs.sh

php-cs-fixer --verbose fix --config=php_cs.php
