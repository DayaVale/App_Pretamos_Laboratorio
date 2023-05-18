--------- CREATE TABLE USERS -----------------
--- Primary key ID 
--- Vachar Name 
--- Vachar LastName
--- Vachar Email
--- Vachar(8-10) Password
--- Vachar Carrer
--- Vachar Check(Student,Professor,Admin) Role
----------------------------------------------

CREATE TABLE Usuarios (
	username varchar(255) NOT NULL PRIMARY KEY,
	PrimerNombre varchar(255) NOT NULL,
	SegundoNombre varchar(255),
	PrimerApellido varchar(255) NOT NULL,
	SegundoApellido varchar(255),
	Email varchar(255) NOT NULL UNIQUE,
	Contrasena varchar(30) NOT NULL CHECK(CHAR_LENGTH(Contrasena) >= 8),
	Programa varchar(255) NOT NULL,
	Rol varchar(255) NOT NULL CHECK(Rol = 'estudiante'OR Rol = 'profesor'
													  OR Rol = 'Admin')
);

---------------------------------------------------------------------------
SELECT * FROM usuarios;

---------------------------------------------------------------------------

INSERT INTO usuarios
VALUES (1000591286,'dayana','valentina',
		'gonzalez','vargas','dayana.gonzalez@urosario.edu.co',
		'candy123',3113305548,'Macc','estudiante');

---------------------------------------------------------------------------

DROP TABLE usuarios;

-------------------------- CREATE TABLE INVENTARIO -----------------------
--- Primary key Numero serial
--- Vachar Nombre material 
--- Int Catidad total
--- TEXT observacion
--- Bytea Imagen
--- Vachar Tipo de Imagen (PNG, JPG,...)
-------------------------------------------------------------------------
CREATE TABLE inventario_laboratorio (
  numero_serial BIGINT PRIMARY KEY,
  nombre_material VARCHAR(255) NOT NULL,
  cantidad_total INT NOT NULL,
  observacion TEXT,
  imagen VARCHAR(255),
  disponible BOOLEAN DEFAULT true
);

-----------------------------------------
SELECT * FROM inventario_laboratorio;

---------------------------------------------------------------------------
DROP TABLE inventario_laboratorio;

-----------------------------------------------------------------------
SELECT * FROM reservaciones;
---------------------------------------------------------------
CREATE TABLE reservaciones(
	Id BIGSERIAL PRIMARY KEY,
	user_id varchar(255) NOT NULL,
	insumo_id BIGINT NOT NULL,
	fecha_inicio DATE NOT NULL,
	fecha_termi DATE NOT NULL,
	cantidad_re INT NOT NULL DEFAULT 0,
	status varchar(255) NOT NULL DEFAULT 'vigente' CHECK(status = 'vigente'OR status = 'vencido' OR status = 'finalizado'),
	CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES usuarios(username),
	CONSTRAINT fk_insumo FOREIGN KEY (insumo_id) REFERENCES inventario_laboratorio(numero_serial)
);

---- El estatus tiene activo o vigente/ vencido / finalizado