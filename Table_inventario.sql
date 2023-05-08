CREATE TABLE inventario_laboratorio (
  numero_serial BIGINT PRIMARY KEY,
  nombre_material VARCHAR(255) NOT NULL,
  cantidad INT NOT NULL,
  imagen Bytea
);
