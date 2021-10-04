WeCine Docker Orchestrator
==========================

Docker global deployment
------------------------
Build and Run:

```bash
$ docker-compose up -d
```

Backend configuration
---------------------
Install symfony vendors:

```bash
$ docker-compose exec engine composer install
```

Configure authentication key/token to Movie DB by setting ./.env variables
```bash
THE_MOVIE_API_KEY=
THE_MOVIE_JWT_TOKEN=
```

Frontend configuration
----------------------
Launch install :
```bash
$ docker-compose exec engine yarn install
```

Build encore webpack app, execute:

```bash
$ docker-compose exec engine yarn encore dev
```

For prod env :
```bash
$ docker-compose exec engine yarn encore production
```

Tada
---------------------------

You are ready to launch your browser on http://localhost:80





