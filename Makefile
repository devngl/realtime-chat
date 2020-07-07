HUB_ID := $(shell eval docker ps -q --filter ancestor=dunglas/mercure)


all: start_mercure_hub

start_mercure_hub:
	@echo "Starting Mercure Hub with JWT: '!ChangeMe!' on http://localhost:8083"
	@if [ -z $(HUB_ID) ]; then\
		docker run -e JWT_KEY='!ChangeMe!' -e DEMO=1 -e ALLOW_ANONYMOUS=1 -e CORS_ALLOWED_ORIGINS='http://localhost:8000' -e PUBLISH_ALLOWED_ORIGINS='http://localhost,http://localhost:8083,https://realtime-chat.test' -p 8083:80 -d dunglas/mercure;\
	else\
		echo "Hub already running on http://localhost:8083";\
	fi


stop:
	@echo "Apagando MercureHub"
	docker stop $(HUB_ID)

