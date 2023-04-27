# EmployApp

Sistema para la Publicación de Convocatorias de Trabajo y Selección de Postulantes

## Características del Sistema

**Módulo Administración**
- [x] Roles
- [x] Usuarios
- [x] Empresas
- [x] Convocatorias

**Módulo Perfil**
- [x] Datos
- [x] Estudios
- [x] Capacitaciones
- [x] Experiencia Laboral

**Módulo Portafolio**
- [x] Convocatorias
- [x] Postulaciones
- [x] Documentos
- [x] Curriculum

## Despliegue

- WSL
- Docker

``` bash
# Enviroment
  cp .env.example .env

# Composer
  docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs

# Sail
  ./vendor/bin/sail up -d
  ./vendor/bin/sail npm install
  ./vendor/bin/sail npm run dev
  ./vendor/bin/sail php artisan key:generate
  ./vendor/bin/sail php artisan storage:link
  ./vendor/bin/sail php artisan migrate --seed
```
