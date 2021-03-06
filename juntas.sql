CREATE TABLE usuarios(
	id_usuario INT  NOT NULL AUTO_INCREMENT,
	nombre varchar(30) NOT NULL,
	apellido_p varchar(30) NOT NULL,
	apellido_m varchar(30) NOT NULL,
	correo varchar(30) NOT NULL,
	pass_xc varchar(20) NOT NULL,
	grupo varchar(30) NOT NULL,
	fecha_registro datetime NOT NULL,
	primary key(id_usuario)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE salas_juntas(
	id_sala INT  NOT NULL AUTO_INCREMENT,
	sala INT NOT NULL,
	fecha_registro datetime NOT NULL,
	estado varchar(20) NOT NULL
	primary key(id_check_j)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE horario_juntas(
	id_check_j INT  NOT NULL AUTO_INCREMENT,
	id_registro_es INT NOT NULL,
	fecha_registro datetime NOT NULL,
	estado varchar(20) NOT NULL
	primary key(id_check_j)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;