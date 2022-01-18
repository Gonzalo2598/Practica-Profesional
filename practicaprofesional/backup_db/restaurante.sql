CREATE TABLE Categorias(
                id_cat integer auto_increment,
                nombre_cat varchar(30),
                primary key(id_cat));

CREATE TABLE Articulos(
                id_art integer auto_increment,
                id_cat  integer,
                codigo VARCHAR(255),
                descripcion VARCHAR(255),
                precio_compra decimal(10,2),
                precio_venta  decimal(10,2),
                existencia decimal(10,2),
                imagen varchar(80),
                primary key(id_art),
                foreign key (id_cat) references Categorias(id_cat));

CREATE TABLE Pedidos(
                id_pedido integer auto_increment,
                id_cliente  integer,
                id_user integer,
                mozo varchar(15),
                mesa varchar(15),
                precio_uni decimal(10,2),
                cantidad  decimal(10,2),
                total decimal(10,2),
                descripcion_articulo varchar(80),
                fecha datetime,
                fecha_entrega datetime,
                estado_pedido varchar(25),
                codigo varchar(25),
                impuesto varchar(25),
                direccion varchar(100),
                casa varchar(30),
                barrio varchar(40),
                telefono varchar(40),
                primary key(id_pedido),
                foreign key (id_cliente) references Clientes(id_cliente),
                foreign key (id_user) references usuarios(id_user));


CREATE TABLE Clientes (
  id_cliente integer auto_increment,
  nombre varchar(60) NOT NULL,
  domicilio varchar(100) NOT NULL,
  telefono varchar(45) NOT NULL,
  ciudad varchar(45) NOT NULL,
  primary key(id_cliente));

CREATE TABLE ventas(
	id_venta integer auto_increment,
    id_cliente integer,
    id_caja integer,
	fecha DATE,
	total DECIMAL(10,2),
	PRIMARY KEY(id_venta),
    foreign key (id_cliente) references Clientes(id_cliente),
    foreign key (id_caja) references Cajas(id_caja));

CREATE TABLE gestion_cajas(
	id_gestion integer auto_increment,
    id_caja integer,
	id_user integer,
	faltante decimal(10,2),
    motivo varchar(100),
	PRIMARY KEY(id_gestion),
	FOREIGN KEY(id_caja) REFERENCES cajas(id_caja) ON DELETE CASCADE,
    FOREIGN KEY(id_user) REFERENCES usuarios(id_user));

    CREATE TABLE detalles(
	id_det integer auto_increment,
    id_venta integer,
	id_art integer,
	cantidad decimal(10,2),
    precio_unitario decimal(10,2),
	PRIMARY KEY(id_det),
	FOREIGN KEY(id_venta) REFERENCES ventas(id_venta) ON DELETE CASCADE,
    FOREIGN KEY(id_art) REFERENCES Articulos(id_art));

CREATE TABLE compras(
	id_compra integer auto_increment,
    id_prov integer,
    id_caja integer,
    fecha DATE,
    descuento_porcentaje decimal(10,2),
    impuesto_porcentaje  decimal(10,2),
	total DECIMAL(10,2),
	PRIMARY KEY(id_compra),
    foreign key (id_prov) references proveedores(id_prov),
    foreign key (id_caja) references Cajas(id_caja));


CREATE TABLE detalles_compras(
	id_detcom integer auto_increment,
    id_compra integer,
	id_art integer,
	cantidad decimal(10,2),
    precio_unitario decimal(10,2),
	PRIMARY KEY(id_detcom),
	FOREIGN KEY(id_compra) REFERENCES compras(id_compra) ON DELETE CASCADE,
    FOREIGN KEY(id_art) REFERENCES Articulos(id_art));
	
CREATE TABLE Tipos(
                id_tipo integer auto_increment,
                nombre_tipo varchar(30),
                primary key(id_tipo));

CREATE TABLE usuarios(
                id_user integer auto_increment,
                id_tipo integer,
                usuario varchar(30) unique,
                contraseña varchar(255),
                primary key(id_user),
                foreign key (id_tipo) references Tipos1(id_tipo));


CREATE TABLE Cajas(
                id_caja integer auto_increment,
				id_user integer,
				fecha_apertura DATETIME,
				monto_inicial DECIMAL(10,2),
				fecha_cierre DATETIME,
				monto_final DECIMAL(10,2),
				movimiento_ingreso DECIMAL(10,2),
				movimiento_egreso DECIMAL(10,2),
				estado integer(2),
                primary key(id_caja),
				foreign key (id_user) references usuarios(id_user));