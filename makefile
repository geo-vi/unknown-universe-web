build:
	@docker-compose -p docms build
run:
	@docker-compose -p docms up -d xamppy
stop:
	@docker-compose -p docms down
restart:
	$(MAKE) stop
	$(MAKE) run
clean-data:
	@docker-compose -p docms down -v
clean-images:
	@docker rmi `docker images -q -f "dangling=true"`
full-reset:
	$(MAKE) clean-data
	$(MAKE) build
	$(MAKE) run
reload:
	@docker exec docms_xamppy_1 /opt/lampp/lampp restart
db:
	@docker exec -ti docms_xamppy_1 /load_db.sh
bash:
	@docker exec -ti docms_xamppy_1 bash
error-log:
	@docker exec -ti docms_xamppy_1 tail -f /opt/lampp/logs/php_error_log