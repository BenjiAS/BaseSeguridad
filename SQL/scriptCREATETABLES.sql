
CREATE TABLE voluntario(
	matricula varchar(10) NOT NULL,
    nombres varchar (30) NOT NULL,
    apellidoPat varchar (20) NOT NULL,
    apellidoMat varchar (20),
	fechaDeNac date NOT NULL,
	email varchar (100) NOT NULL,
	celular char (10),
    escolaridad varchar (5) NOT NULL,
    semestre char(1),
    talla varchar(3),
	CONSTRAINT voluntario_pk PRIMARY KEY (matricula)
);

CREATE TABLE usuario(
    matricula varchar(10) NOT NULL,
    password varchar(128) NOT NULL,
    tipo varchar(5) NOT NULL,
    intentos int DEFAULT 0,
    CONSTRAINT usuario_pk PRIMARY KEY (matricula),
	CONSTRAINT matriculaUsuario_fk FOREIGN KEY (matricula) REFERENCES voluntario(matricula) ON DELETE CASCADE
);

CREATE TABLE permiso(
	id int NOT NULL AUTO_INCREMENT,
    descripcion varchar(50) NOT NULL,
    CONSTRAINT permisos_pk PRIMARY KEY (id)
);

CREATE TABLE usuarioPermiso(
    matricula varchar(10) NOT NULL,
    id int NOT NULL,
    CONSTRAINT up_pk PRIMARY KEY (id,matricula),
    CONSTRAINT upId_fk FOREIGN KEY (id) REFERENCES permiso(id) ON DELETE CASCADE,
    CONSTRAINT upMatricula_fk FOREIGN KEY (matricula) REFERENCES usuario(matricula) ON DELETE CASCADE
);

CREATE TABLE tablaLog(
	id int NOT NULL AUTO_INCREMENT,
    tipoDeEvento varchar(15) NOT NULL,
    descripcion varchar(200) NOT NULL,
    CONSTRAINT tablaLog_pk PRIMARY KEY (id)
);