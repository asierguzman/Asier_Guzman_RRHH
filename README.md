# Sistema de Gestión de RRHH (Tech Solutions SAS)

## Descripción
Sistema backend para la gestión de recursos humanos desarrollado con Laravel 11, siguiendo estrictamente la metodología TDD (Test-Driven Development) y Git Flow.

## Stack Tecnológico
- Framework: Laravel 11
- Base de Datos: MySQL 8.0+ / SQLite (desarrollo)
- Testing: PHPUnit
- Roles y Permisos: spatie/laravel-permission
- Control de Versiones: Git (Git Flow)

## Estructura del Proyecto


├── app/
│ ├── Models/
│ │ ├── Colaborador.php
│ │ ├── Contrato.php
│ │ ├── Prorroga.php
│ │ └── Terminacion.php
├── database/
│ ├── factories/
│ ├── migrations/
│ └── seeders/
├── tests/
│ └── Unit/
│ ├── ColaboradorTest.php
│ ├── ContratoTest.php
│ ├── ProrrogaTest.php
│ └── TerminacionTest.php
└── routes/
└── web.php


## Casos de Prueba Implementados (CP-001 a CP-004)

### Gestión de Colaboradores (CP-001) - 5 tests
| Prueba | Estado |
|--------|--------|
| Crear colaborador con datos válidos | OK |
| Rechazar documento duplicado | OK |
| Actualizar información de colaborador | OK |
| Listar todos los colaboradores | OK |
| Eliminar (soft-delete) colaborador | OK |

### Gestión de Contratos (CP-002) - 4 tests
| Prueba | Estado |
|--------|--------|
| Crear contrato con datos válidos | OK |
| Listar contratos | OK |
| Actualizar contrato | OK |
| Eliminar (soft-delete) contrato | OK |

### Gestión de Prórrogas (CP-003) - 5 tests
| Prueba | Estado |
|--------|--------|
| Crear prórroga de tiempo | OK |
| Crear prórroga de valor | OK |
| Listar prórrogas | OK |
| Actualizar prórroga | OK |
| Eliminar prórroga | OK |

### Terminación de Contratos (CP-004) - 3 tests
| Prueba | Estado |
|--------|--------|
| Crear terminación de contrato | OK |
| Listar terminaciones | OK |
| No permitir múltiples terminaciones | OK |

### Ejecución de Tests
```bash
php artisan test
php artisan test --filter=ColaboradorTest
php artisan test --filter=ContratoTest
php artisan test --filter=ProrrogaTest
php artisan test --filter=TerminacionTest


Requisitos Previos
PHP 8.1+

Composer

MySQL / SQLite

Git


git clone https://github.com/asierguzman/Asier_Guzman_RRHH.git
cd Asier_Guzman_RRHH
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
composer require spatie/laravel-permission
php artisan migrate
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
php artisan test