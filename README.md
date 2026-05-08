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
```sql
-- Base de datos para Agua SAC
CREATE DATABASE IF NOT EXISTS gestion_agua_sac;
USE gestion_agua_sac;

-- 1. Usuarios (Acceso Administrativo)
CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50) NOT NULL UNIQUE,
    clave VARCHAR(250) NOT NULL,
    rol ENUM('admin', 'operador') DEFAULT 'operador'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 2. Clientes (Acceso de Consulta)
CREATE TABLE clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    dni CHAR(8) NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL,
    direccion VARCHAR(150),
    clave_web VARCHAR(250) DEFAULT '123456',
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 3. Recibos (Control de Deudas)
CREATE TABLE recibos (
    id_recibo INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    mes_periodo VARCHAR(50) NOT NULL,
    monto_total DECIMAL(10,2) NOT NULL,
    estado ENUM('pendiente', 'pagado', 'anulado') DEFAULT 'pendiente',
    fecha_emision TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_recibo_cliente FOREIGN KEY (id_cliente) 
        REFERENCES clientes(id_cliente) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 4. Pagos (Historial de Caja)
CREATE TABLE pagos (
    id_pago INT AUTO_INCREMENT PRIMARY KEY,
    id_recibo INT NOT NULL,
    id_usuario INT NOT NULL,
    fecha_pago TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    metodo_pago VARCHAR(50) NOT NULL,
    CONSTRAINT fk_pago_recibo FOREIGN KEY (id_recibo) 
        REFERENCES recibos(id_recibo) ON DELETE CASCADE,
    CONSTRAINT fk_pago_usuario FOREIGN KEY (id_usuario) 
        REFERENCES usuarios(id_usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

```


#  Imagen del problema 

<img width="899" height="1599" alt="WhatsApp Image 2026-05-07 at 7 43 40 PM" src="https://github.com/user-attachments/assets/625f0f93-ad94-4da0-b783-32391ad5b2e3" />

#  imagen de la empresa

<img width="899" height="1599" alt="WhatsApp Image 2026-05-07 at 7 43 32 PM" src="https://github.com/user-attachments/assets/65085f42-c7c0-4c97-8fca-2d7dc36c9d0f" />



