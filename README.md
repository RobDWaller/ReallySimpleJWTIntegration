# Really Simple JWT Integration

This is an integration testing tool for the [Really Simple JWT](https://github.com/RobDWaller/ReallySimpleJWT) library.

## Setup

This library comes with a Docker Compose config. To setup the environment run the following commands:

```bash
// Spin up Docker environment
docker-compose up -d

// Bash inside Docker environment
docker-compose exec php bash

// Install dependencies
composer update
```

## Usage

Once the environment is setup create a simple PHP server.

```bash
cd public/

php -S 0.0.0.0:80
```

Then visit [localhost:8080](http://localhost:8080/). You can then run all the relevant integration tests which have been setup.