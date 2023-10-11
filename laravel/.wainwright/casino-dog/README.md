## Installation

Worker & schedule runner required to run automated game importer jobs:

Setting up cronjob to run every minute `php artisan schedule:run`:

Run `crontab-e` select vi/nano editor.

Paste at bottom:
```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

Check if cron running:
```bash
systemctl status cron
```

Setting up supervisor:
```bash
sudo apt-get install supervisor
cd /etc/supervisor/config.d
sudo nano laravel-worker.conf
```

laravel-worker.conf:
```bash
[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=/usr/bin/php /var/www/laravel/artisan queue:work --sleep=0.1 --tries=2 >
autostart=true
autorestart=true
user=root
numprocs=10
redirect_stderr=true
stdout_logfile=/var/www/laravel/storage/logs/worker.log
```

```bash
service supervisor restart
```


You can disable automated game import processing in config/casino-dog.php
