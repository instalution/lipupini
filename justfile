default:
	just --list

# ---

# An idea for a way to grep an account inbox
inbox account:
	ls -l --color=auto --format=single-column collection/{{account}}/.lipupini/inbox

# Start PHP's built-in webserver
serve port='4000':
	cd module/Lukinview/webroot && PHP_CLI_SERVER_WORKERS=2 php -S localhost:{{port}} index.php

# Proxy to `justfile` in `docker` directory
docker *args="":
	cd docker && just {{args}}
