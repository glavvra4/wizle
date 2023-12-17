#!make
SHELL := /bin/bash

### override the default docker-compose command using export DOCKER_COMPOSE='docker compose'
DOCKER_COMPOSE ?= docker-compose
DOCKER_COMPOSE_FILE ?= docker-compose.yml

PHP_CONTAINER := "php-cli"

DC := $(DOCKER_COMPOSE)
DC_DIR := .
DC_CMD := $(DC) -f $(DC_DIR)/$(DOCKER_COMPOSE_FILE)

help: ## Show this help
	@printf "\033[33m%s:\033[0m\n" 'Available commands'
	@awk 'BEGIN {FS = ":.*?## "}/^[a-zA-Z_-]+:.*?##/{printf "\033[32m%-24s\033[0m %s\n",$$1,$$2}' $(MAKEFILE_LIST)

up: ## Run all services
	@$(DC_CMD) up -d

install-dependency: ## Install all dependencies
	@$(DC_CMD) exec $(PHP_CONTAINER) composer install --no-scripts --no-progress

start: ## Starts the app
	@$(DC_CMD) exec $(PHP_CONTAINER) bin/console tg:handle-updates

run-tests:
	@$(DC_CMD) exec $(PHP_CONTAINER) composer tests

run-tests-coverage-text:
	@$(DC_CMD) exec $(PHP_CONTAINER) composer tests-coverage-text
