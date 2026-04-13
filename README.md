# Halcón - Sistema de Gestión de Pedidos - Evidencia 1

![Estado del Proyecto](https://img.shields.io/badge/Estado-En_Desarrollo-green)
![Versión](https://img.shields.io/badge/Versi%C3%B3n-1.0.0-blue)

##  Descripción del Proyecto

"Halcón" es una aplicación web diseñada para automatizar y transparentar los procesos internos de distribución de materiales de construcción. El sistema proporciona una fuente única de verdad para el ciclo de vida de los pedidos, permitiendo a los clientes rastrear sus entregas en tiempo real y al personal interno gestionar la logística mediante un sistema basado en roles.

###  Objetivos Principales
* **Para los Clientes:** Proveer una interfaz pública para consultar el estado de sus pedidos (con número de cliente y factura) y visualizar la evidencia fotográfica de la entrega.
* **Para la Empresa:** Administrar el flujo de trabajo de los pedidos a través de departamentos específicos (Ventas, Compras, Almacén y Ruta) utilizando un Dashboard Administrativo seguro.

---

##  Tecnologías Propuestas

* **Frontend:** React, Vite, Tailwind CSS
* **Backend:** Java 
* **Base de Datos:** MySQL
* **Control de Versiones:** Git / GitHub
* **Metodología de Trabajo:** Scrum

---

##  Roles y Permisos (RBAC)

El sistema cuenta con un modelo de Control de Acceso Basado en Roles para garantizar la seguridad y separación de responsabilidades:

1. **Administrador:** Gestión de usuarios (CRUD) y asignación de roles.
2. **Ventas:** Creación de nuevos pedidos y captura de datos fiscales.
3. **Almacén:** Gestión de inventario y preparación de pedidos para distribución.
4. **Compras:** Adquisición de materiales faltantes reportados por Almacén.
5. **Ruta:** Distribución física, captura de fotografías de carga y evidencia de entrega.

---

##  Ciclo de Vida del Pedido

El sistema impone un flujo estricto de estados para cada pedido:
1. `Ordenado` ➡️ 2. `En Proceso` ➡️ 3. `En Ruta` ➡️ 4. `Entregado`


---

##  Instalación y Configuración Local

Sigue estos pasos para levantar el entorno de desarrollo en tu máquina local:

### Prerrequisitos
* Git
* Node.js (v18+)
* Java Development Kit (JDK 17+)
* MySQL Server (v8.0+)

### Pasos de Instalación

1. **Clonar el repositorio:**
   ```bash
   git clone [https://github.com/TU-USUARIO/halcon-webapp.git](https://github.com/TU-USUARIO/halcon-webapp.git)
   cd halcon-webapp

   
   
## Evidencia 2 - Funcionalidad Lógica
Se implementó el backend del sistema utilizando Laravel:
- **Modelos y Migraciones:** Creación de tablas para Usuarios, Roles, Órdenes y Evidencias.
- **Factories/Seeders:** Se poblaron datos de prueba y catálogo de roles.
- **Vistas y Controladores:** Se creó el CRUD de usuarios y pedidos, incluyendo borrado lógico (Soft Deletes) y subida de fotografías.
- **Seguridad:** Se implementó Laravel Breeze para proteger el dashboard administrativo.

**Instrucciones para correr en local:**
1. `composer install` y `npm install`
2. Configurar el archivo `.env`
3. `php artisan migrate:fresh --seed`
4. `php artisan storage:link` (Para habilitar las fotos)
5. `php artisan serve`