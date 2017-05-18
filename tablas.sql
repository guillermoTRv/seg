CREATE TABLE checklist_jornada(
	id_check_j INT  NOT NULL AUTO_INCREMENT,
	id_registro_es INT NOT NULL,
	fecha_registro datetime NOT NULL,
	estado varchar(20) NOT NULL
	primary key(id_check_j)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE checklist_detalle(
	id_check_det INT NOT NULL AUTO_INCREMENT,
	id_check_j   INT NOT NULL,
	categoria    varchar(30) NOT NULL,
	situacion    varchar(30) NOT NULL,
	estado       varchar(10) NOT NULL,
	comentario   varchar(120) NOT NULL
	primary key(id_check_det)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE estado_inmuebles(
	id_est_inm INT NOT NULL AUTO_INCREMENT,
	id_proveniente INT NOT NULL,
	modo varchar(20) NOT NULL,
	detalle varchar(200) NOT NULL,
	detalle_ck varchar(120),
	status varchar(10) NOT NULL,
	primary key(id_est_inm)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE estado_usuarios(
	id_est_inm INT NOT NULL AUTO_INCREMENT,
	modo varchar(20) NOT NULL,
	detalle varchar(200) NOT NULL,
	detalle_ck varchar(120),
	status varchar(10) NOT NULL,
	primary key(id_est_inm)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE reportes_extra(
	id_reporte INT NOT NULL AUTO_INCREMENT,
	id_usuario INT NOT NULL,
	id_registro_es INT NOT NULL,
	detalle_reporte varchar(250) NOT NULL,
	estado_inicial varchar(12) NOT NULL, 
	estado_control varchar(12) NOT NULL,
	fecha_registro date NOT NULL,
	primary key(id_reporte)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE jornadas_trabajo(
	id_jornada INT NOT NULL AUTO_INCREMENT,
	id_usuario INT NOT NULL,
	id_registro_es INT NOT NULL,
	estado varchar(12) NOT NULL,
	fecha_entrada datetime,
	fecha_salida datetime,
	hora entrada varchar(8),
	hora salida varchar(8),
	primary key(id_jornada)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;
