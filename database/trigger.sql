CREATE TRIGGER `annuleActiInscript` AFTER UPDATE ON `activite`
 FOR EACH ROW BEGIN 
    IF new.CODEETATACT = 'N' 
        THEN
            UPDATE inscription 
            SET DATEANNULE = DATE(NOW())
            WHERE NOACT = old.NOACT;
    END IF;
END

