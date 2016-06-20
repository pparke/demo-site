CURRENT_DIRECTORY := $(shell pwd)

start:
	@cd laradock && \
	docker-compose up -d nginx postgres

clean:
	@cd laradock && \
	docker-compose rm --force

stop:
	@cd laradock && \
	docker-compose stop

status:
	@cd laradock && \
	docker-compose ps

cli:
	@cd laradock && \
	docker exec -it laradock_workspace_1 bash

sql:
	@cd laradock && \
	docker exec -it laradock_postgres_1 psql -h localhost -U homestead

log:
	@cd laradock && \
	tail -f logs/nginx/error.log

restart:
	@cd laradock && \
	docker stop laradock_workspace_1 && \
	docker-compose start workspace

.PHONY: clean start stop status cli log restart
