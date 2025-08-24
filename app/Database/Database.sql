-- Crear la base de datos
CREATE DATABASE farmacia CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE farmacia;

-- Crear la tabla categorias
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

-- Crear la tabla productos
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10,2) NOT NULL,
    categoria_id INT NOT NULL,
    imagen VARCHAR(255),
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);
INSERT INTO categorias (nombre) VALUES 
('Medicamentos'),
('Suplementos'),
('Cuidado personal'),
('Equipos médicos'),
('Vitaminas'),
('Cosméticos');


INSERT INTO productos (nombre, descripcion, precio, categoria_id, imagen) VALUES
('Paracetamol 500mg', 'Analgésico y antipirético', 5.50, 1, 'paracetamol.jpg'),
('Omega 3', 'Suplemento alimenticio', 30.00, 2, 'omega3.jpg'),
('Jabón antibacterial', 'Jabón líquido para manos', 10.00, 3, 'jabon.jpg'),
('Tensiómetro digital', 'Equipo para medir la presión arterial', 150.00, 4, 'tensiometro.jpg'),
('Vitamina C 1g', 'Refuerza el sistema inmune', 25.00, 5, 'vitaminaC.jpg'),
('Crema hidratante', 'Hidratante para piel seca', 45.00, 6, 'crema.jpg');