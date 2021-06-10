create table user(
	iduser int not null auto_increment primary key,
	name varchar(255) null,
	lastname varchar(255) null,
	email varchar(255) null,
	password varchar(255) null,
	type varchar(25) null,
	profile_pic text null,
	created_at datetime
);

INSERT INTO `user` (`iduser`, `name`, `lastname`, `email`, `password`, `type`, `profile_pic`, `created_at`) VALUES (NULL, 'Amner', 'Saucedo', 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', '1', NULL, '2020-05-15 12:24:24');




create table producto(
	idproducto int not null primary key auto_increment,
	nombre varchar(255) not null,
	sku varchar(255) not null,
	presentacion varchar(255) null,
	volumen varchar(255) null,
	unidades_caja  varchar(255) null,
	fotografia text null,
	user_id int not null,
	created_at datetime

);

create table proveedor(
	idproveedor int not null primary key auto_increment,
	nombre varchar(255) null,
	telefono varchar(255) null,
	correo varchar(255) null,
	direccion varchar(255) null,
	user_id int not null,
	created_at datetime
);




create table proveedor_producto(
	idproveedor_producto int not null primary key auto_increment,
	idproducto int not null,
	idproveedor int not null,
	precio varchar(250) not null,
	comentario text null,
	user_id int not null,
	created_at datetime,
	foreign key (idproducto) references producto(idproducto),
	foreign key (idproveedor) references proveedor(idproveedor)
);





create table contenedor(
	idcontenedor int not null primary key auto_increment,
	nombre varchar(255) not null,
	fecha_arrivo date not null,
	lugar_salida varchar(255) null,
	lugar_salida_lat varchar(255) null,
	lugar_salida_long varchar(255) null,
	lugar_destino varchar(255) null,
	lugar_destino_lat varchar(255) null,
	lugar_destino_long varchar(255) null,
	user_id int not null,
	created_at datetime
	
);

create table detalle_contenedor(
	iddetalle_contenedor int not null primary key auto_increment,
	idproducto int not null,
	cantidad_producto int not null,
	idcontenedor int not null,
	foreign key (idproducto) references producto(idproducto)
)




create table envio(
	idenvio int not null primary key auto_increment,
	destino varchar(255) not null,
	fecha_entrega date not null,
	idcontenedor int not null,
	user_id int not null,
	created_at datetime
);























