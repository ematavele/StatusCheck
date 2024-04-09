//1 - Criar o ficheiro check_erp.php usando nano

//2 - tornar o ficheiro check_erp.php executavel no servidor usando "chmod +x check_erp.php"

//3 - Criar um cronjob pelo "crontab -e"

//4 - Inserir a a seguinte intrucao "0 7 * * * /dir/do/script/check_erp.php >> /dir/do/script/cron_log.txt 2>&1"

//4 - Inserir a a seguinte intrucao "0 13 * * * /dir/do/script/check_erp.php >> /dir/do/script/cron_log.txt 2>&1"

//5 - Verificar se o cronjob foi criado usando "crontab -l"