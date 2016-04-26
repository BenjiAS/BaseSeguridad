-- inserts PERMISOS

INSERT INTO permiso (descripcion) VALUES ('Crear usuario');
INSERT INTO permiso (descripcion) VALUES ('Editar usuario');
INSERT INTO permiso (descripcion) VALUES ('Eliminar usuario');
INSERT INTO permiso (descripcion) VALUES ('Crear voluntario');
INSERT INTO permiso (descripcion) VALUES ('Editar voluntario');
INSERT INTO permiso (descripcion) VALUES ('Eliminar voluntario');
INSERT INTO permiso (descripcion) VALUES ('Agregar patrocinador');
INSERT INTO permiso (descripcion) VALUES ('Editar patrocinador');
INSERT INTO permiso (descripcion) VALUES ('Eliminar patricinador');
INSERT INTO permiso (descripcion) VALUES ('Agregar institucion');
INSERT INTO permiso (descripcion) VALUES ('Editar institucion');
INSERT INTO permiso (descripcion) VALUES ('Eliminar institucion');

-- SELECT * FROM permiso;
-- inserts Volunatio

INSERT INTO Voluntario VALUES ('A01233188','Liliana del Carmen', 'Barraza','Pineda', '1995-06-14', 'lilyybp@hotmail.com',
	'8711438708', 'ITIC', '6', 'XS');
INSERT INTO Voluntario VALUES ('A01233107', 'Benjamin', 'Arredondo', 'Sagui', '1995-05-18', 'benjis_95@hotmail.com',
	'8713343392', 'ITIC', '6','M');
INSERT INTO Voluntario VALUES ('A01231278','Alejandra', 'Muñoz','Villalobos', '1995-02-23', 'alemv18@gmail.com',
	'8711453061',' ITIC','6','S');
    
-- SELECT * FROM voluntario;
-- insert usuario
INSERT INTO usuario (matricula, password, tipo) VALUES ('A01233188','lily123','Admin');
INSERT INTO usuario (matricula, password, tipo) VALUES ('A01233107','benji123','Mesa');

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
INSERT INTO usuarioPermiso (id, matricula) VALUES (4,'A01233107');
INSERT INTO usuarioPermiso (id, matricula) VALUES (5,'A01233107');
INSERT INTO usuarioPermiso (id, matricula) VALUES (7,'A01233107');
INSERT INTO usuarioPermiso (id, matricula) VALUES (8,'A01233107');
INSERT INTO usuarioPermiso (id, matricula) VALUES (10,'A01233107');
INSERT INTO usuarioPermiso (id, matricula) VALUES (11,'A01233107');

-- SELECT * FROM usuarioPermiso;

-- insert opcionesNavegacion
INSERT INTO opcionesNavegacion VALUES (1, 'Eventos', 'eventos.html', '1');
INSERT INTO opcionesNavegacion VALUES (2, '&iquestQui&eacutenes somos?', 'acerca.html', '1');
INSERT INTO opcionesNavegacion VALUES (3, 'Patrocinadores', 'patrocinadores.html', '1');
INSERT INTO opcionesNavegacion VALUES (4, 'Donaciones', 'donaciones.html', '1');
INSERT INTO opcionesNavegacion VALUES (5, 'Contacto', 'contacto.html', '1');
INSERT INTO opcionesNavegacion VALUES (6, 'Iniciar Sesi&oacuten', 'sesion.php', '1');
INSERT INTO opcionesNavegacion VALUES (7, 'Cerrar Sesi&oacuten', 'cerrarSesion.php', '0');
INSERT INTO opcionesNavegacion VALUES (8, 'Administraci&oacuten', 'regVoluntario.php', '0');


SELECT * FROM opcionesNavegacion;


