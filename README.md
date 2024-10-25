
# Kindersoft

Este proyecto consiste en un sistema de gestión para un jardín infantil, desarrollado con el framework Laravel. El objetivo es facilitar la administración de alumnos, educadores y clases, así como llevar un control de la asistencia y generar reportes.


## Features

- Gestión de Alumnos: Registro, edición y eliminación de alumnos.
- Gestión de Educadores: Administración de docentes y asignación de clases.
- Gestión de Clases: Creación y gestión de diferentes clases.
- Control de Asistencia: Registro diario de asistencia de los alumnos.
- Interfaz Administrativa: Panel fácil de usar para la gestión del jardín infantil.



## Tech Stack

**Client:** 
- Framework: Laravel
- Base de Datos: MySQL
- Livewire
**Frontend:**
- Tailwind CSS
- Alpine JS



## Requirements

- PHP >= 8.2
- Composer
- MySQL
- Servidor web (Apache o Nginx)

## Installation

1. Clonar el Repositorio:

```bash
    git clone https://github.com/owercamp/kindersoft_new.git
    cd kindersoft_new
```
2. Instalar Dependencias:

```bash
    composer install
```

3. Configurar el Archivo .env:

- Copiar el archivo .env.example a .env:

```bash
    cp .env.example .env
```
- Configurar las credenciales de la base de datos en el archivo `'.env'`.

4. Generar la Clave de Aplicación:

```bash
    php artisan key:generate
```

5. Ejecutar Migraciones:

```bash
    php artisan migrate
```

6. Iniciar el Servidor Local:

```bash
    php artisan serve
```


## Usage/Examples

- Acceder al sistema a través del navegador en http://localhost:8000.
- Registrarse o iniciar sesión como administrador para acceder al panel administrativo.
- Gestionar alumnos, educadores y clases desde el menú principal.



## License

Este proyecto está bajo la Licencia MIT. Para más detalles, consulta el archivo LICENSE [MIT](https://choosealicense.com/licenses/mit/).

