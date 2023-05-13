--------- CREATE TABLE USERS -----------------
--- Primary key ID 
--- Vachar Name 
--- Vachar LastName
--- Vachar Email
--- Vachar(8-10) Password
--- Vachar Phone
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