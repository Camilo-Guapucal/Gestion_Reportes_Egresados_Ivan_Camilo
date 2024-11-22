# Gestión de Reportes de Egresados

Este es un proyecto desarrollado en Laravel para gestionar reportes de egresados. El sistema permite crear, ver, editar y eliminar reportes relacionados con los egresados de la carrera de Ingeniería de Sistemas, facilitando el seguimiento y análisis de la información relevante.

## Tabla de Contenidos

1. [Requisitos](#requisitos)
2. [Instalación](#instalación)
3. [Configuración](#configuración)
4. [Funcionalidades](#funcionalidades)
5. [Diseño de la Base de Datos](#diseño-de-la-base-de-datos)
6. [Seguridad y Manejo del Proyecto](#seguridad-y-manejo-del-proyecto)
7. [Pruebas Unitarias](#pruebas-unitarias)
8. [Autores](#autores)
9. [Derechos Reservados](#derechos-reservados)

## Requisitos

- PHP >= 8.0
- Laravel >= 9.x
- MySQL o cualquier otro motor compatible con Laravel
- Composer
- Node.js (si deseas usar Vite para el frontend)
- Herramientas como `php artisan serve` para ejecutar el proyecto en local

## Instalación

### Paso 1: Clonar el repositorio

Primero, clona este repositorio a tu máquina local:

```bash
git clone https://github.com/tu-usuario/nombre-del-repositorio.git
Paso 2: Instalar dependencias
Navega a la carpeta del proyecto e instala las dependencias con Composer:

bash
Copiar código
cd nombre-del-repositorio
composer install
Instala las dependencias de frontend (si las necesitas):

bash
Copiar código
npm install
Paso 3: Configurar el archivo .env
Copia el archivo .env.example a .env y configura la conexión de la base de datos y otras configuraciones relevantes:

bash
Copiar código
cp .env.example .env
Asegúrate de tener la configuración adecuada en tu archivo .env, especialmente en las siguientes líneas:

ini
Copiar código
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
Paso 4: Generar clave de la aplicación
Ejecuta el siguiente comando para generar la clave de la aplicación:

bash
Copiar código
php artisan key:generate
Paso 5: Ejecutar las migraciones
Crea la base de datos y ejecuta las migraciones para crear las tablas necesarias:

bash
Copiar código
php artisan migrate
Paso 6: Ejecutar el servidor
Finalmente, para ejecutar el proyecto en tu entorno local, usa el comando:

bash
Copiar código
php artisan serve
Visita http://localhost:8000 para acceder a la aplicación.

Configuración
El proyecto está configurado para ser ejecutado en el entorno local (APP_ENV=local). Si necesitas desplegar el proyecto en un entorno de producción, asegúrate de configurar adecuadamente el archivo .env y de seguir las prácticas recomendadas para seguridad.

Funcionalidades
1. Gestión de Reportes
Los usuarios pueden agregar, editar, eliminar y consultar reportes de egresados. Los botones disponibles en la interfaz son:

Crear Reporte: Permite crear un nuevo reporte con la información correspondiente.
Ver Reportes: Muestra una lista de los reportes existentes.
Editar Reporte: Permite modificar un reporte existente.
Eliminar Reporte: Permite eliminar un reporte de la base de datos.
2. Exportación de Reportes
Los reportes pueden ser exportados en diferentes formatos, incluyendo:

PDF
Word
Excel
Estos botones se encuentran en la vista principal de los reportes y permiten exportar la información de manera sencilla y eficiente.

Diseño de la Base de Datos
La base de datos está diseñada para almacenar la información relacionada con los egresados y sus reportes. A continuación se presenta un diseño básico de la base de datos:

Tablas Principales
egresados: Almacena la información de los egresados, como nombre, fecha de egreso, carrera, entre otros.
reportes: Contiene los reportes asociados a los egresados, incluyendo detalles del reporte, fecha de creación y modificación, etc.
La base de datos también cuenta con relaciones entre las tablas, donde un reporte está vinculado a un egresado específico. Las migraciones y seeders están configurados para crear y poblar estas tablas automáticamente.

Relaciones
Un egresado puede tener muchos reportes. Esta relación se gestiona mediante claves foráneas en la base de datos.
Seguridad y Manejo del Proyecto
Este proyecto sigue las mejores prácticas de seguridad de Laravel:

Autenticación y Autorización: Laravel utiliza un sistema robusto de autenticación para garantizar que solo los usuarios autorizados puedan acceder a las funcionalidades del sistema. Asegúrate de que tu archivo .env tenga configuraciones seguras para el manejo de las contraseñas y autenticación.

Protección CSRF: Laravel incluye protección CSRF de forma predeterminada en todos los formularios, lo que ayuda a prevenir ataques de falsificación de solicitudes entre sitios.

Validación de Entrada: Todos los datos que se reciben de los usuarios son validados antes de ser almacenados en la base de datos, lo que ayuda a prevenir inyecciones SQL y otros ataques relacionados.

Seguridad de Archivos: Los archivos exportados (PDF, Word, Excel) son gestionados de manera segura para prevenir la ejecución de código malicioso.

Control de Errores: Laravel maneja los errores y excepciones de manera eficiente, proporcionando mensajes claros para el desarrollo y la producción.

Pruebas Unitarias
El proyecto incluye pruebas unitarias que permiten verificar el correcto funcionamiento de las funcionalidades principales, como la creación, modificación, y eliminación de reportes, así como las funciones de exportación.

Para ejecutar las pruebas unitarias, usa el siguiente comando:

bash
Copiar código
php artisan test
Esto ejecutará todas las pruebas definidas en el directorio tests.

Autores
Iván Darío Coral Escobar
Johan Camilo Guapucal Morán
Estudiantes de Ingeniería de Sistemas de la Universidad Mariana.

Derechos Reservados
© 2024 Todos los derechos reservados. Este proyecto es de uso exclusivo para fines educativos y no debe ser distribuido sin el consentimiento de los autores. Todos los derechos de propiedad intelectual relacionados con este proyecto son propiedad de los autores mencionados.
