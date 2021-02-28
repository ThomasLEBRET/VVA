VVA : Village Vacances des Alpes  

To load web projet with docker :  
```bash
docker-compose up -d --build
```

Change permission to edit files into code folder :  

```bash
sudo chow <username> code/
```

Add existing database in docker-compose :  

```bash
docker exec -i <container_id> mysql -uroot -pfoo <dbname> < fileName.sql
```  

Check configuration in docker-compose.yml to see login informations for phpmyadmin and mysql  
You must be configure user and password for this project /!\

