-- inserts PERMISOS

-- SET FOREIGN_KEY_CHECKS = 0; 
-- TRUNCATE permiso; 
-- SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO permiso (descripcion) VALUES ('Ver usuarios');
INSERT INTO permiso (descripcion) VALUES ('Crear usuario');
INSERT INTO permiso (descripcion) VALUES ('Editar usuario');
INSERT INTO permiso (descripcion) VALUES ('Eliminar usuario');
INSERT INTO permiso (descripcion) VALUES ('Ver voluntarios');
INSERT INTO permiso (descripcion) VALUES ('Crear voluntario');
INSERT INTO permiso (descripcion) VALUES ('Editar voluntario');
INSERT INTO permiso (descripcion) VALUES ('Eliminar voluntario');
INSERT INTO permiso (descripcion) VALUES ('Ver patrocinadores');
INSERT INTO permiso (descripcion) VALUES ('Agregar patrocinador');
INSERT INTO permiso (descripcion) VALUES ('Editar patrocinador');
INSERT INTO permiso (descripcion) VALUES ('Eliminar patricinador');
INSERT INTO permiso (descripcion) VALUES ('Ver instituciones');
INSERT INTO permiso (descripcion) VALUES ('Agregar institucion');
INSERT INTO permiso (descripcion) VALUES ('Editar institucion');
INSERT INTO permiso (descripcion) VALUES ('Eliminar institucion');
INSERT INTO permiso (descripcion) VALUES ('Ver niños');
INSERT INTO permiso (descripcion) VALUES ('Agregar niño');
INSERT INTO permiso (descripcion) VALUES ('Editar niño');
INSERT INTO permiso (descripcion) VALUES ('Eliminar niño');

-- SELECT * FROM permiso;
-- inserts Volunatio
INSERT INTO Voluntario VALUES ('A01233186','Liliana del Carmen', 'Barraza','Pineda', '1995-06-14', 'lilyybp@hotmail.com',
	'8711438708', 'ITIC', '6', 'XS',7131954);
 
 INSERT INTO Voluntario VALUES ('A01233108', 'Benjamin', 'Arredondo', 'Sagui', '1995-05-18', 'benjis_95@hotmail.com',
	'8713343392', 'ITIC', '6','M',7132021);
    
INSERT INTO Voluntario VALUES ('A01231274','Alejandra', 'Muñoz','Villalobos', '1995-02-23', 'alemv18@gmail.com',
	'8711453061',' ITIC','6','S',7156789);

INSERT INTO Voluntario VALUES ('A01213181','Graciela', 'Alvarez','Cassio', '1996-07-08', 'graciela@hotmail.com',
	'8711433419', 'ITIC', '9', 'M', 7111227);
 
 INSERT INTO Voluntario VALUES ('A01234156', 'Joaquin', 'Alvarado', 'Lopez', '1993-04-15', 'joaquinAlvarado@hotmail.com',
	'8713343392', 'ITIC', '6','M',7132051);
    
INSERT INTO Voluntario VALUES ('A01224567','Alejandro', 'Rodriguez','Gonzalez', '1993-01-22', 'alejandroRodriguez@gmail.com',
	'8711453061',' Meca','7','XL',7113289);
    
-- SELECT * FROM voluntario;
-- insert usuario
INSERT INTO usuario (matricula, password, tipo) VALUES ('A01233188','bey9c6C7qGtu2','Admin');
INSERT INTO usuario (matricula, password, tipo) VALUES ('A01233107','berFqUDue9NTI','Mesa');

-- insert Usuariopermiso

INSERT INTO usuarioPermiso (id, matricula) VALUES (1,'A01233188');
INSERT INTO usuarioPermiso (id, matricula) VALUES (2,'A01233188');
INSERT INTO usuarioPermiso (id, matricula) VALUES (3,'A01233188');
INSERT INTO usuarioPermiso (id, matricula) VALUES (4,'A01233188');
INSERT INTO usuarioPermiso (id, matricula) VALUES (5,'A01233188');
INSERT INTO usuarioPermiso (id, matricula) VALUES (6,'A01233188');
INSERT INTO usuarioPermiso (id, matricula) VALUES (7,'A01233188');
INSERT INTO usuarioPermiso (id, matricula) VALUES (8,'A01233188');
INSERT INTO usuarioPermiso (id, matricula) VALUES (9,'A01233188');
INSERT INTO usuarioPermiso (id, matricula) VALUES (10,'A01233188');
INSERT INTO usuarioPermiso (id, matricula) VALUES (11,'A01233188');
INSERT INTO usuarioPermiso (id, matricula) VALUES (12,'A01233188');
INSERT INTO usuarioPermiso (id, matricula) VALUES (13,'A01233188');
INSERT INTO usuarioPermiso (id, matricula) VALUES (14,'A01233188');
INSERT INTO usuarioPermiso (id, matricula) VALUES (15,'A01233188');
INSERT INTO usuarioPermiso (id, matricula) VALUES (16,'A01233188');
INSERT INTO usuarioPermiso (id, matricula) VALUES (17,'A01233188');
INSERT INTO usuarioPermiso (id, matricula) VALUES (18,'A01233188');
INSERT INTO usuarioPermiso (id, matricula) VALUES (19,'A01233188');
INSERT INTO usuarioPermiso (id, matricula) VALUES (20,'A01233188');
INSERT INTO usuarioPermiso (id, matricula) VALUES (1,'A01233107');
INSERT INTO usuarioPermiso (id, matricula) VALUES (3,'A01233107');
INSERT INTO usuarioPermiso (id, matricula) VALUES (5,'A01233107');
INSERT INTO usuarioPermiso (id, matricula) VALUES (7,'A01233107');
INSERT INTO usuarioPermiso (id, matricula) VALUES (9,'A01233107');
INSERT INTO usuarioPermiso (id, matricula) VALUES (11,'A01233107');
INSERT INTO usuarioPermiso (id, matricula) VALUES (13,'A01233107');
INSERT INTO usuarioPermiso (id, matricula) VALUES (15,'A01233107');
INSERT INTO usuarioPermiso (id, matricula) VALUES (17,'A01233107');
INSERT INTO usuarioPermiso (id, matricula) VALUES (19,'A01233107');

-- SELECT * FROM usuarioPermiso;

-- insert opcionesNavegacion
INSERT INTO opcionesNavegacion VALUES (1, 'Eventos', 'eventos.html', '1');
INSERT INTO opcionesNavegacion VALUES (2, '&iquestQui&eacutenes somos?', 'acerca.html', '1');
INSERT INTO opcionesNavegacion VALUES (3, 'Patrocinadores', 'patrocinadores.html', '1');
INSERT INTO opcionesNavegacion VALUES (4, 'Donaciones', 'donaciones.html', '1');
INSERT INTO opcionesNavegacion VALUES (5, 'Contacto', 'contacto.html', '1');
INSERT INTO opcionesNavegacion VALUES (6, 'Administraci&oacuten', 'regVoluntario.php', '0');
INSERT INTO opcionesNavegacion VALUES (7, 'Iniciar Sesi&oacuten', 'sesion.php', '1');
INSERT INTO opcionesNavegacion VALUES (8, 'Cerrar Sesi&oacuten', 'cerrarSesion.php', '0');

-- SELECT * FROM opcionesNavegacion;


-- insert opcionesAdministracion

INSERT INTO opcionesAdministracion (nombre, href, permiso) VALUES ('Administración de Voluntarios', 'regVoluntario.php', '1');
INSERT INTO opcionesAdministracion (nombre, href, permiso) VALUES ('Administración de Instituciones', 'regInstitucion.php', '5');
INSERT INTO opcionesAdministracion (nombre, href, permiso) VALUES ('Administración de Patrocinadores', 'regPatrocinador.php', '9');
INSERT INTO opcionesAdministracion (nombre, href, permiso) VALUES ('Administración de Usuarios', 'regUsuario.php', '13');
INSERT INTO opcionesAdministracion (nombre, href, permiso) VALUES ('Administración de Niños', 'regNino.php', '17');





