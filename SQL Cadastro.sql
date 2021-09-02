/*Criando o Banco de Dados*/
CREATE DATABASE cadastro;

/*Permitindo caracteres acentuados*/
ALTER DATABASE `cadastro`CHARSET = UTF8 COLLATE = utf8_general_ci;

DROP TABLE IF EXISTS usuario;
CREATE TABLE usuario(
idUsuario INT PRIMARY KEY AUTO_INCREMENT,
nomeUsuario VARCHAR(50),
senhaUsuario VARCHAR(50),
dataNascimento DATE,
cpfUsuario VARCHAR(50),
rgUsuario VARCHAR(50)
);

DROP TABLE IF EXISTS tipoTelefone;
CREATE TABLE tipoTelefone(
idTipoTelefone INT PRIMARY KEY AUTO_INCREMENT,
tipoTelefone varchar(50)
);

DROP TABLE IF EXISTS tipoEndereco;
CREATE TABLE tipoEndereco(
idTipoEndereco INT PRIMARY KEY AUTO_INCREMENT,
tipoEndereco varchar(50)
);

DROP TABLE IF EXISTS tipoRedeSocial;
CREATE TABLE tipoRedeSocial(
idTipoRedeSocial INT PRIMARY KEY AUTO_INCREMENT,
tipoRedeSocial VARCHAR(50)
);

DROP TABLE IF EXISTS telefone;
CREATE TABLE telefone(
idTelefone INT PRIMARY KEY AUTO_INCREMENT,
numeroTelefone VARCHAR(10),
idUsuarioTelefone INT,
idTipoTelefone INT,
FOREIGN KEY (idUsuarioTelefone) REFERENCES usuario(idUsuario),
FOREIGN KEY (idTipoTelefone) REFERENCES tipoTelefone(idTipoTelefone)
);

DROP TABLE IF EXISTS endereco;
CREATE TABLE endereco(
idEndereco INT PRIMARY KEY AUTO_INCREMENT,
endereco varchar(200),
idUsuarioEndereco INT,
idTipoEndereco INT,
FOREIGN KEY (idUsuarioEndereco) REFERENCES usuario(idUsuario),
FOREIGN KEY (idTipoEndereco) REFERENCES tipoEndereco(idTipoEndereco)
);

CREATE TABLE redeSocial(
idRedeSocial INT PRIMARY KEY AUTO_INCREMENT,
idUsuarioRedeSocial INT,
idTipoRedeSocial INT,
FOREIGN KEY (idUsuarioRedeSocial) REFERENCES usuario(idUsuario),
FOREIGN KEY (idTipoRedeSocial) REFERENCES tipoRedeSocial(idTipoRedeSocial)
);

DELIMITER $$
DROP PROCEDURE IF EXISTS cadastroUsuario $$
CREATE PROCEDURE cadastroUsuario(vnomeUsuario VARCHAR(50), vsenhaUsuario VARCHAR(50), vdataNascimento DATE, vcpfUsuario VARCHAR(50), vrgUsuario VARCHAR(50))
	BEGIN
		INSERT INTO usuario(idUsuario, nomeUsuario, senhaUsuario, dataNascimento, cpfUsuario, rgUsuario) 
			VALUES(DEFAULT, vnomeUsuario, vsenhaUsuario, vdataNascimento, vcpfUsuario, vrgUsuario) ;
	END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS cadastroTelefone $$
CREATE PROCEDURE cadastroTelefone(vnumeroTelefone VARCHAR(10), vidUsuarioTelefone INT, vidTipoTelefone INT)
	BEGIN
		INSERT INTO telefone(idTelefone, numeroTelefone, idUsuarioTelefone, idTipoTelefone) 
			VALUES(DEFAULT, vnumeroTelefone, vidUsuarioTelefone, vidTipoTelefone) ;
		/*SELECT idTelefone FROM telefone WHERE vnumeroTelefone = numeroTelefone AND vidUsuarioTelefone = idUsuarioTelefone;*/
	END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS cadastroTipoTelefone $$
CREATE PROCEDURE cadastroTipoTelefone(vtipoTelefone varchar(50))
	BEGIN
		INSERT INTO tipotelefone(idTipoTelefone, tipoTelefone) 
			VALUES(DEFAULT, vtipoTelefone) ;
	END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS cadastroEndereco $$
CREATE PROCEDURE cadastroEndereco(vendereco varchar(200), vidUsuarioEndereco INT, vidTipoEndereco INT)
	BEGIN
		INSERT INTO endereco(idEndereco, endereco, idUsuarioEndereco, idTipoEndereco) 
			VALUES(DEFAULT, vendereco, vidUsuarioEndereco, vidTipoEndereco) ;
		/*SELECT idEndereco FROM endereco WHERE vendereco = endereco AND vidUsuarioEndereco = idUsuarioEndereco;*/
	END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS cadastroTipoEndereco $$
CREATE PROCEDURE cadastroTipoEndereco(vtipoEndereco varchar(50))
	BEGIN
		INSERT INTO tipoEndereco(idTipoEndereco, tipoEndereco) 
			VALUES(DEFAULT, vtipoEndereco) ;
	END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS cadastroRedeSocial $$
CREATE PROCEDURE cadastroRedeSocial(vidUsuarioRedeSocial INT, vidTipoRedeSocial INT)
	BEGIN
		INSERT INTO redeSocial(idRedeSocial, idUsuarioRedeSocial, idTipoRedeSocial) 
			VALUES(DEFAULT, vidUsuarioRedeSocial, vidTipoRedeSocial) ;
            /*SELECT idRedeSocial FROM endereco WHERE vidUsuarioRedeSocial = idUsuarioRedeSocial;*/
	END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS cadastroTipoRedeSocial $$
CREATE PROCEDURE cadastroTipoRedeSocial(vtipoRedeSocial VARCHAR(50))
	BEGIN
		INSERT INTO tipoRedeSocial(idTipoRedeSocial, tipoRedeSocial) 
			VALUES(DEFAULT, vtipoRedeSocial) ;
	END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS verificaLogin $$ 
CREATE PROCEDURE verificaLogin(vsenhaUsuario VARCHAR(50),vnomeUsuario VARCHAR(50))
	BEGIN
		IF(vsenhaUsuario != "" AND vnomeUsuario != "") THEN 
			SELECT idUsuario FROM usuario WHERE senhaUsuario = vsenhaUsuario and nomeUsuario =  vnomeUsuario ;
		END IF ;
	END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS atualizaUsuario $$
CREATE PROCEDURE atualizaUsuario(vidUsuario INT, vnomeUsuario VARCHAR(50), vsenhaUsuario VARCHAR(50), vdataNascimento DATE, vcpfUsuario VARCHAR(50), vrgUsuario VARCHAR(50))
	BEGIN
		UPDATE usuario SET nomeUsuario = vnomeUsuario WHERE idUsuario = vidUsuario;  
		UPDATE usuario SET senhaUsuario = vsenhaUsuario WHERE idUsuario = vidUsuario;
        UPDATE usuario SET dataNascimento = vdataNascimento WHERE idUsuario = vidUsuario;
        UPDATE usuario SET cpfUsuario = vcpfUsuario WHERE idUsuario = vidUsuario;
        UPDATE usuario SET rgUsuario = vrgUsuario WHERE idUsuario = vidUsuario;
	END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS mostrarDadosDoUsuarioPorNome $$
CREATE PROCEDURE mostrarDadosDoUsuarioPorNome(vnomeUsuario VARCHAR(50))
	BEGIN
		SELECT idUsuario, nomeUsuario,senhaUsuario, dataNascimento, cpfUsuario, rgUsuario FROM usuario 
			WHERE nomeUsuario = vnomeUsuario;
	END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS mostrarDadosDoTelefone $$
CREATE PROCEDURE mostrarDadosDoTelefone(vidUsuario INT)
	BEGIN
		SELECT numeroTelefone, tipoTelefone FROM telefone INNER JOIN tipoTelefone 
			ON telefone.idTipoTelefone = tipoTelefone.idTipoTelefone WHERE idUsuarioTelefone = vidUsuario;
	END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS mostrarDadosDoEndereco $$
CREATE PROCEDURE mostrarDadosDoEndereco(vidUsuario INT)
	BEGIN
		SELECT endereco, tipoEndereco FROM endereco INNER JOIN tipoEndereco 
			ON endereco.idTipoEndereco = tipoEndereco.idTipoEndereco WHERE idUsuarioEndereco = vidUsuario;
	END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS mostrarDadosDaRedeSocial $$
CREATE PROCEDURE mostrarDadosDaRedeSocial(vidUsuario INT)
	BEGIN
		SELECT tipoRedeSocial FROM redeSocial INNER JOIN tipoRedeSocial 
			ON redeSocial.idTipoRedeSocial = tipoRedeSocial.idTipoRedeSocial WHERE idUsuarioRedeSocial = vidUsuario;
	END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS mostrarDadosDoUsuario $$
CREATE PROCEDURE mostrarDadosDoUsuario()
	BEGIN
		SELECT idUsuario, nomeUsuario,senhaUsuario, dataNascimento, cpfUsuario, rgUsuario FROM usuario;
	END $$
DELIMITER ;

/*Cadastrando os tipos de telefone*/
CALL cadastroTipoTelefone("Comercial");
CALL cadastroTipoTelefone("Residencial");
CALL cadastroTipoTelefone("Celular");

/*Cadastrando os tipos de Endereço*/
CALL cadastroTipoEndereco("Comercial");
CALL cadastroTipoEndereco("Residencial");
CALL cadastroTipoEndereco("Outros");

/*Cadastrando os tipos de RedeSocial*/
CALL cadastroTipoRedeSocial("Facebook");
CALL cadastroTipoRedeSocial("Linkedin");
CALL cadastroTipoRedeSocial("Twitter");
CALL cadastroTipoRedeSocial("Instagram"); 

SELECT * FROM usuario;
SELECT * FROM telefone;
SELECT * FROM endereco;
SELECT * FROM redeSocial;






