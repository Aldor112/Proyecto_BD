para la tabla de profesores
CREATE TABLE `db_proyecto`.`tb_profesor` ( `Nomb_P` TEXT NOT NULL , `Cod_P` INT(32) NOT NULL , PRIMARY KEY (`Cod_P`));
para la tabla de Materia
CREATE TABLE `db_proyecto`.`tb_materia` ( `Cred` INT(2) NOT NULL , `Nomb_materia` TEXT NOT NULL , `Cod_materia` INT(10) NOT NULL , `Cod_P` INT(32) NOT NULL , PRIMARY KEY (`Cod_materia`, `Cod_P`));
ALTER TABLE `tb_materia` ADD FOREIGN KEY (`Cod_P`) REFERENCES `tb_profesor`(`Cod_P`) ON DELETE SET NULL ON UPDATE CASCADE;
para la tabla estudiante
CREATE TABLE `db_proyecto`.`tb_estudiante` ( `username` INT(32) NOT NULL , `contrasena` INT(32) NOT NULL , `Notas` INT(2) NULL DEFAULT NULL , `Prom_Pond` INT(2) NULL DEFAULT NULL , `Cod_materia` INT(10) NULL DEFAULT NULL , PRIMARY KEY (`username`));
ALTER TABLE `tb_estudiante` ADD FOREIGN KEY (`Cod_materia`) REFERENCES `tb_materia`(`Cod_materia`) ON DELETE RESTRICT ON UPDATE RESTRICT;
