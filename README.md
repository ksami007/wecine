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





