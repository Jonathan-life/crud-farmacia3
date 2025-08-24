# CodeIgniter 4 - Aplicación Inicial

## Requisitos
- PHP 8.1 o superior (recomendado)
- Composer
- MySQL o MariaDB

## Instalación

1. **Clonar este repositorio o descargar el proyecto**
   ```bash
   git clone https://github.com/usuario/proyecto.git
   cd proyecto
   ```

2. **Instalar dependencias con Composer**
   ```bash
   composer install
   ```

3. **Configurar la base de datos**
   Edita el archivo:
   ```
   app/Config/Database.php
   ```
   con las credenciales de tu base de datos.

4. **Configurar las tablas**
   Ejecuta las migraciones:
   ```bash
   php spark migrate
   ```
   o importa manualmente el script SQL proporcionado.

5. **Iniciar el servidor de desarrollo**
   ```bash
   php spark serve
   ```

## Uso
  si tu carpeta es **farmacia**:  
  [http://localhost/farmacia/public/]

- Modifica los siguientes directorios para personalizar tu aplicación:
  - **Controladores:** `app/Controllers`
  - **Modelos:** `app/Models`
  - **Vistas:** `app/Views`
