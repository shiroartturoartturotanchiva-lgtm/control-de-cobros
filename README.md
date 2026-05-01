#  Agua SAC - Sistema de Gestión de Cobros

Sistema web integral diseñado para la automatización de la administración de abonados, generación de recibos mensuales y control de recaudación para la empresa **Agua SAC**.

## 1. Descripción del Negocio
**Agua SAC** es una organización de servicios básicos dedicada a la gestión y distribución de agua potable. El sistema moderniza la operación administrativa, eliminando los registros manuales y centralizando la información de deudas y pagos en una plataforma digital accesible.

## 2. Identificar el Problema y Solución
*   **Problema**: El uso de planillas físicas generaba falta de trazabilidad, errores en los saldos y la imposibilidad de consulta remota para el cliente.
*   **Solución**: Implementación de una arquitectura **MVC** en **PHP** y **MariaDB** que permite el control de caja en tiempo real y ofrece un portal de consulta externa mediante DNI.

## 3. Preanálisis
*   **Necesidades**: Registro de clientes, emisión masiva de recibos y seguridad en el acceso administrativo.
*   **Viabilidad**: Stack tecnológico basado en software de código abierto (PHP/MariaDB), garantizando bajo costo y alta compatibilidad.
*   **Alcance**: Desde el registro del abonado hasta la implantación del sistema en entorno local (XAMPP).

## 4. Análisis de Requisitos
### Requisitos Funcionales
*   **Gestión de Usuarios**: Autenticación para personal administrativo (Admin/Operador).
*   **Control de Clientes**: CRUD completo de abonados vinculados por DNI.
*   **Facturación**: Generación de recibos con periodos mensuales y montos específicos.
*   **Consulta Externa**: Portal para que el cliente visualice deudas con su DNI y clave web.
*   **Registro de Pagos**: Liquidación de recibos y registro de transacciones de caja.

### Requisitos No Funcionales
*   **Seguridad**: Encriptación de claves y uso de **PDO** contra Inyección SQL.
*   **Arquitectura**: Patrón Modelo-Vista-Controlador (MVC).
*   **Rendimiento**: Motor de base de datos **InnoDB** para integridad de transacciones.

## 5. Diseño de Base de Datos
El esquema relacional consta de 4 tablas optimizadas:
*   `usuarios`: Personal administrativo.
*   `clientes`: Datos  de cliente.
*   `recibos`: Registro de deudas mensuales.
*   `pagos`: Historial de recaudación.

## 6. Stack Tecnológico
*   **Backend**: PHP 8+ (POO & MVC)
*   **Base de Datos**: MariaDB / MySQL
*   **Conectividad**: PDO (PHP Data Objects)
*   **Frontend**: HTML5, CSS3, JavaScript

## 7. Implantación
1. Clonar el repositorio.
2. Importar el archivo `schema.sql` en MariaDB.
3. Configurar la conexión en `config/Conexion.php`.
4. Ejecutar mediante un servidor local como XAMPP.

---





