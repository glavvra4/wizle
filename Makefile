#!make
SHELL := /bin/bash

### override the default docker-compose command using export DOCKER_COMPOSE='docker compose'
DOCKER_COMPOSE ?= docker compose
DOCKER_COMPOSE_FILE ?= docker-compose.yml

PHP_CONTAINER := "php-cli"

DC := $(DOCKER_COMPOSE)
DC_DIR := .
DC_CMD := $(DC) -f $(DC_DIR)/$(DOCKER_COMPOSE_FILE)

help: ## Show this help
	@printf "\033[33m%s:\033[0m\n" 'Available commands'
	@awk 'BEGIN {FS = ":.*?## "}/^[a-zA-Z_-]+:.*?##/{printf "\033[32m%-24s\033[0m %s\n",$$1,$$2}' $(MAKEFILE_LIST)

copy-env:
	cp app/.env app/.env.local

build: ## Build Docker image
	@$(DC_CMD) build

up: ## Run all services
	@$(DC_CMD) up -d

down: ## Run all services
	@$(DC_CMD) down --remove-orphans

install-dependency: ## Install Composer dependencies
	@$(DC_CMD) exec $(PHP_CONTAINER) composer install --no-scripts --no-progress

clear-cache: ## Clear Symfony cache
	@$(DC_CMD) exec $(PHP_CONTAINER) bin/console c:cl

start: ## Starts the app
	@$(DC_CMD) exec $(PHP_CONTAINER) bin/console tg:handle-updates

run-tests: ## Run PHPUnit tests
	@$(DC_CMD) exec $(PHP_CONTAINER) composer tests

run-tests-coverage-text: ## Run PHPUnit tests with coverage
	@$(DC_CMD) exec $(PHP_CONTAINER) composer tests-coverage-text
