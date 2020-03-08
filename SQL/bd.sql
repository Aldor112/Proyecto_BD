para la tabla de profesores
CREATE TABLE `db_proyecto`.`tb_profesor` ( `Nomb_P` TEXT NOT NULL , `Cod_P` INT(32) NOT NULL , PRIMARY KEY (`Cod_P`));
para la tabla de Materia
CREATE TABLE `db_proyecto`.`tb_materia` ( `Cred` INT(2) NOT NULL , `Nomb_materia` TEXT NOT NULL , `Cod_materia` INT(10) NOT NULL , `Cod_P` INT(32) NOT NULL , PRIMARY KEY (`Cod_materia`, `Cod_P`));
ALTER TABLE `tb_materia` ADD FOREIGN KEY (`Cod_P`) REFERENCES `tb_profesor`(`Cod_P`) ON DELETE SET NULL ON UPDATE CASCADE;
