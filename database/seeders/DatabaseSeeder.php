<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\catalogos\CatEntes;
use App\Models\administracion\Sistema;
use App\Models\administracion\Menu;
use App\Models\administracion\Funciones;
use App\Models\administracion\Grupo;
use DB;

class DatabaseSeeder extends Seeder
{

        protected $cat_entes = array(
            ['id' => 1, 'cve_upp' => '01', 'nombre_upp' => 'Secretaría de Administración y Finannzas', 'cve_ur' => '01', 'nombre_ur' => 'Dirección de Gobienrno Digital', 'cve_uo' => '001', 'nombre_uo' => 'Departamento de Proyectos Internos']
        );

        protected $cat_users = array(
            ['id' => 1, 'id_ente' => null, 'nombre' => 'sudo', 'p_apellido' => 'admin', 's_apellido' => 'sedj', 'celular' => '00-00-00-00-00', 'email' => 'prueba1@gmail.com', 'username' => 'administrador', 'password' => 'valida2022', 'sudo' => 1],
            ['id' => 2, 'id_ente' => 1, 'nombre' => 'Francisco', 'p_apellido' => 'Méndez', 's_apellido' => 'Chávez', 'celular' => '44-32-21-90-95', 'email' => 'pacomendez2308@gmail.com', 'username' => 'depExpedientes', 'password' => 'depExpedientes.22', 'sudo' => 0]
        );

        protected $sistemas = array(
            ['id' => 1, 'nombre_sistema' => 'Sistema de Expedientes Jurídicos','ruta' => 'sistemas', 'logo' => 'logo_expedientes.png', 'logo_min' => 'logo_expedientes_min.png', 'descripcion' => 'Sistema para la adminsitración de expedientes Jurídicos', 'estatus' => 1],
        );

        protected $menus = array(
            ['id' => 1, 'id_sistema' => 1, 'padre' => 0, 'nombre_menu' => 'Expedientes', 'ruta' => '/expedientes', 'icono' => 'fa-folder-open', 'nivel' => 0, 'posicion' => 1, 'descripcion' => 'Módulo de expedientes digitales'],
            ['id' => 2, 'id_sistema' => 1, 'padre' => 0, 'nombre_menu' => 'Calendario', 'ruta' => '/calendario', 'icono' => 'fa-calendar', 'nivel' => 0, 'posicion' => 2, 'descripcion' => 'Módulo de calendario'],
            ['id' => 3, 'id_sistema' => 1, 'padre' => 0, 'nombre_menu' => 'Gráficas', 'ruta' => '#', 'icono' => 'fa-bar-chart-o', 'nivel' => 0, 'posicion' => 3, 'descripcion' => 'Módulo de gráficas del sistema'],
            ['id' => 4, 'id_sistema' => 1, 'padre' => 0, 'nombre_menu' => 'Reportes', 'ruta' => '#', 'icono' => 'fa-file-pdf-o', 'nivel' => 0, 'posicion' => 4, 'descripcion' => 'Módulo de reportes del sistema'],
            ['id' => 5, 'id_sistema' => 1, 'padre' => 0, 'nombre_menu' => 'Usuarios/Abogados', 'ruta' => '/adm-usuarios', 'icono' => 'fa-user', 'nivel' => 0, 'posicion' => 5, 'descripcion' => 'Módulo para administrar los usuarios del sistema'],

            ['id' => 6, 'id_sistema' => 1, 'padre' => 0, 'nombre_menu' => 'Catálogos', 'ruta' => '#', 'icono' => 'fa-database', 'nivel' => 0, 'posicion' => 6, 'descripcion' => 'Módulo de catálogos del Sistema de Expedientes Jurídicos'],
            ['id' => 7, 'id_sistema' => 1, 'padre' => 6, 'nombre_menu' => 'Dirreciones', 'ruta' => '/cat-direccion', 'icono' => 'fa-building', 'nivel' => 1, 'posicion' => 1, 'descripcion' => 'CRUD de direcciones'],
/*             ['id' => 8, 'id_sistema' => 1, 'padre' => 6, 'nombre_menu' => 'Departamentos', 'ruta' => '/cat-departamento', 'icono' => 'fa-institution', 'nivel' => 1, 'posicion' => 2, 'descripcion' => 'CRUD de departamentos'],
 */            ['id' => 9, 'id_sistema' => 1, 'padre' => 6, 'nombre_menu' => 'Dependencias', 'ruta' => '/cat-dependencia', 'icono' => 'fa-briefcase', 'nivel' => 1, 'posicion' => 3, 'descripcion' => 'CRUD de dependencias'],
            ['id' => 10, 'id_sistema' => 1, 'padre' => 6, 'nombre_menu' => 'Tribunales', 'ruta' => '/cat-tribunal', 'icono' => 'fa-university', 'nivel' => 1, 'posicion' => 4, 'descripcion' => 'CRUD de tribunales'],
            ['id' => 11, 'id_sistema' => 1, 'padre' => 6, 'nombre_menu' => 'Juzgados', 'ruta' => '/cat-juzgado', 'icono' => 'fa-legal', 'nivel' => 1, 'posicion' => 5, 'descripcion' => 'CRUD de juzgados'],
            ['id' => 12, 'id_sistema' => 1, 'padre' => 6, 'nombre_menu' => 'Localizaciones', 'ruta' => '/cat-localizacion', 'icono' => 'fa-bullseye', 'nivel' => 1, 'posicion' => 6, 'descripcion' => 'CRUD de localizaciones'],
            ['id' => 13, 'id_sistema' => 1, 'padre' => 6, 'nombre_menu' => 'Salas', 'ruta' => '/cat-sala', 'icono' => 'fa-cube', 'nivel' => 1, 'posicion' => 7, 'descripcion' => 'CRUD de salas'],

            ['id' => 14, 'id_sistema' => 1, 'padre' => 0, 'nombre_menu' => 'Administración', 'ruta' => '#', 'icono' => 'fa-gears', 'nivel' => 0, 'posicion' => 7, 'descripcion' => 'Conjunto de módulos de adminsitración del sistema'],
            ['id' => 15, 'id_sistema' => 1, 'padre' => 14, 'nombre_menu' => 'Grupos', 'ruta' => '/adm-grupos', 'icono' => 'fa-users', 'nivel' => 1, 'posicion' => 1, 'descripcion' => 'Módulo para administrar los grupos del sistema'],
            ['id' => 16, 'id_sistema' => 1, 'padre' => 14, 'nombre_menu' => 'Bitácora', 'ruta' => '/adm-bitacora', 'icono' => 'fa-bookmark', 'nivel' => 1, 'posicion' => 2, 'descripcion' => 'Bitácora de movimientos del sistema'],
        );

        protected $funciones = array(
            ['id' => 1, 'id_sistema' => 1, 'id_menu' => 5, 'modulo' => 'Usuarios', 'funcion' => 'getUsuarios', 'tipo' => 'Consulta', 'descripcion' => 'Obtener todos los usuarios de la BD'],
            ['id' => 2, 'id_sistema' => 1, 'id_menu' => 5, 'modulo' => 'Usuarios', 'funcion' => 'postUsuarios', 'tipo' => 'Insercion', 'descripcion' => 'Insertar un usuario a la BD'],
            ['id' => 3, 'id_sistema' => 1, 'id_menu' => 5, 'modulo' => 'Usuarios', 'funcion' => 'putUsuarios', 'tipo' => 'Actualizacion', 'descripcion' => 'Actualizar un usuario a la BD'],
            ['id' => 4, 'id_sistema' => 1, 'id_menu' => 5, 'modulo' => 'Usuarios', 'funcion' => 'deleteUsuarios', 'tipo' => 'Eliminacion', 'descripcion' => 'Eliminar un usuario a la BD'],
            ['id' => 5, 'id_sistema' => 1, 'id_menu' => 5, 'modulo' => 'Usuarios', 'funcion' => 'viewPostUsuarios', 'tipo' => 'Vista', 'descripcion' => 'Vista create usuario'],
            ['id' => 6, 'id_sistema' => 1, 'id_menu' => 5, 'modulo' => 'Usuarios', 'funcion' => 'viewPutUsuarios', 'tipo' => 'Vista', 'descripcion' => 'Vista Update usuario'],
            ['id' => 7, 'id_sistema' => 1, 'id_menu' => 15, 'modulo' => 'Grupos', 'funcion' => 'getGrupos', 'tipo' => 'Consulta', 'descripcion' => 'Insertar un grupo a la BD'],
            ['id' => 8, 'id_sistema' => 1, 'id_menu' => 15, 'modulo' => 'Grupos', 'funcion' => 'postGrupos', 'tipo' => 'Insercion', 'descripcion' => 'Insertar un grupo a la BD'],
            ['id' => 9, 'id_sistema' => 1, 'id_menu' => 15, 'modulo' => 'Grupos', 'funcion' => 'putGrupos', 'tipo' => 'Actualizacion', 'descripcion' => 'Actualizar un grupo a la BD'],
            ['id' => 10, 'id_sistema' => 1, 'id_menu' => 15, 'modulo' => 'Grupos', 'funcion' => 'deleteGrupos', 'tipo' => 'Eliminacion', 'descripcion' => 'Eliminar un grupo a la BD'],
            ['id' => 11, 'id_sistema' => 1, 'id_menu' => 15, 'modulo' => 'Grupos', 'funcion' => 'viewPostGrupos', 'tipo' => 'Vista', 'descripcion' => 'Vista create grupo'],
            ['id' => 12, 'id_sistema' => 1, 'id_menu' => 15, 'modulo' => 'Grupos', 'funcion' => 'viewPutGrupos', 'tipo' => 'Vista', 'descripcion' => 'Vista update grupo'],
            ['id' => 13, 'id_sistema' => 1, 'id_menu' => 15, 'modulo' => 'Permisos', 'funcion' => 'getPermisos', 'tipo' => 'Consulta', 'descripcion' => 'Consulta de permisos'],
            ['id' => 14, 'id_sistema' => 1, 'id_menu' => 15, 'modulo' => 'Permisos', 'funcion' => 'postPermisos', 'tipo' => 'Insercion', 'descripcion' => 'Crear registro de permisos'],
            ['id' => 15, 'id_sistema' => 1, 'id_menu' => 15, 'modulo' => 'Permisos', 'funcion' => 'deletePermisos', 'tipo' => 'Eliminacion', 'descripcion' => 'Eliminar registro de permisos'],
            ['id' => 16, 'id_sistema' => 1, 'id_menu' => 16, 'modulo' => 'Bitacora', 'funcion' => 'getBitacora', 'tipo' => 'Consulta', 'descripcion' => 'Consulta de registros de la bitácora'],
            ['id' => 17, 'id_sistema' => 1, 'id_menu' => 1, 'modulo' => 'Expedientes', 'funcion' => 'getExpediente', 'tipo' => 'Consulta', 'descripcion' => 'Consulta de expedientes'],
            ['id' => 18, 'id_sistema' => 1, 'id_menu' => 1, 'modulo' => 'Expedientes', 'funcion' => 'postExpediente', 'tipo' => 'Insercion', 'descripcion' => 'Creación de un expedientes'],
            ['id' => 19, 'id_sistema' => 1, 'id_menu' => 1, 'modulo' => 'Expedientes', 'funcion' => 'putExpediente', 'tipo' => 'Actualizacion', 'descripcion' => 'Actualizacion de un expedientes'],
            ['id' => 20, 'id_sistema' => 1, 'id_menu' => 1, 'modulo' => 'Expedientes', 'funcion' => 'deleteExpediente', 'tipo' => 'Eliminacion', 'descripcion' => 'Eliminacion de un expedientes'],
            ['id' => 21, 'id_sistema' => 1, 'id_menu' => 1, 'modulo' => 'Expedientes', 'funcion' => 'viewPostExpediente', 'tipo' => 'Vista', 'descripcion' => 'Vista create expedientes'],
            ['id' => 22, 'id_sistema' => 1, 'id_menu' => 1, 'modulo' => 'Expedientes', 'funcion' => 'viewPutExpediente', 'tipo' => 'Vista', 'descripcion' => 'Vista update expediente'],
            ['id' => 23, 'id_sistema' => 1, 'id_menu' => 2, 'modulo' => 'Calendario', 'funcion' => 'getCalendario', 'tipo' => 'Consulta', 'descripcion' => 'Consulta de calendario'],
            ['id' => 24, 'id_sistema' => 1, 'id_menu' => 2, 'modulo' => 'Calendario', 'funcion' => 'postCalendario', 'tipo' => 'Insercion', 'descripcion' => 'Insercion de pendientes, dias inhabiles al calendario'],
            ['id' => 25, 'id_sistema' => 1, 'id_menu' => 2, 'modulo' => 'Calendario', 'funcion' => 'putCalendario', 'tipo' => 'Actualizacion', 'descripcion' => 'Actualizacion de pendientes, dias inhabiles al calendario'],
            ['id' => 26, 'id_sistema' => 1, 'id_menu' => 2, 'modulo' => 'Calendario', 'funcion' => 'deleteCalendario', 'tipo' => 'Eliminacion', 'descripcion' => 'Eliminacion de pendientes, dias inhabiles al calendario'],
            ['id' => 27, 'id_sistema' => 1, 'id_menu' => 7, 'modulo' => 'Direcciones', 'funcion' => 'getDirecciones', 'tipo' => 'Consulta', 'descripcion' => 'Consulta de direcciones'],
            ['id' => 28, 'id_sistema' => 1, 'id_menu' => 7, 'modulo' => 'Direcciones', 'funcion' => 'postDirecciones', 'tipo' => 'Insercion', 'descripcion' => 'Insercion de direcciones'],
            ['id' => 29, 'id_sistema' => 1, 'id_menu' => 7, 'modulo' => 'Direcciones', 'funcion' => 'putDirecciones', 'tipo' => 'Actualizacion', 'descripcion' => 'Actualizacion de direcciones'],
            ['id' => 30, 'id_sistema' => 1, 'id_menu' => 7, 'modulo' => 'Direcciones', 'funcion' => 'deleteDirecciones', 'tipo' => 'Eliminacion', 'descripcion' => 'Eliminacion de direcciones'],
            ['id' => 31, 'id_sistema' => 1, 'id_menu' => 7, 'modulo' => 'Direcciones', 'funcion' => 'viewPostDirecciones', 'tipo' => 'Vista', 'descripcion' => 'Vista create direcciones'],
            ['id' => 32, 'id_sistema' => 1, 'id_menu' => 7, 'modulo' => 'Direcciones', 'funcion' => 'viewPutDirecciones', 'tipo' => 'Vista', 'descripcion' => 'Vista update direcciones'],
/*             ['id' => 33, 'id_sistema' => 1, 'id_menu' => 8, 'modulo' => 'Departamentos', 'funcion' => 'getDepartamentos', 'tipo' => 'Consulta', 'descripcion' => 'Consulta de departamentos'],
             ['id' => 34, 'id_sistema' => 1, 'id_menu' => 8, 'modulo' => 'Departamentos', 'funcion' => 'postDepartamentos', 'tipo' => 'Insercion', 'descripcion' => 'Insercion de departamentos'],
            ['id' => 35, 'id_sistema' => 1, 'id_menu' => 8, 'modulo' => 'Departamentos', 'funcion' => 'putDepartamentos', 'tipo' => 'Actualizacion', 'descripcion' => 'Actualizacion de departamentos'],
            ['id' => 36, 'id_sistema' => 1, 'id_menu' => 8, 'modulo' => 'Departamentos', 'funcion' => 'deleteDepartamentos', 'tipo' => 'Eliminacion', 'descripcion' => 'Eliminacion de departamentos'],
            ['id' => 37, 'id_sistema' => 1, 'id_menu' => 8, 'modulo' => 'Departamentos', 'funcion' => 'viewPostDepartamentos', 'tipo' => 'Vista', 'descripcion' => 'Vista create departamentos'],
            ['id' => 38, 'id_sistema' => 1, 'id_menu' => 8, 'modulo' => 'Departamentos', 'funcion' => 'viewPutDepartamentos', 'tipo' => 'Vista', 'descripcion' => 'Vista update departamentos'],
         */   ['id' => 39, 'id_sistema' => 1, 'id_menu' => 9, 'modulo' => 'Dependencias', 'funcion' => 'getDependencias', 'tipo' => 'Consulta', 'descripcion' => 'Consulta de dependencias'],
            ['id' => 40, 'id_sistema' => 1, 'id_menu' => 9, 'modulo' => 'Dependencias', 'funcion' => 'postDependencias', 'tipo' => 'Insercion', 'descripcion' => 'Insercion de dependencias'],
            ['id' => 41, 'id_sistema' => 1, 'id_menu' => 9, 'modulo' => 'Dependencias', 'funcion' => 'putDependencias', 'tipo' => 'Actualizacion', 'descripcion' => 'Actualizacion de dependencias'],
            ['id' => 42, 'id_sistema' => 1, 'id_menu' => 9, 'modulo' => 'Dependencias', 'funcion' => 'deleteDependencias', 'tipo' => 'Eliminacion', 'descripcion' => 'Eliminacion de dependencias'],
            ['id' => 43, 'id_sistema' => 1, 'id_menu' => 9, 'modulo' => 'Dependencias', 'funcion' => 'viewPostDependencias', 'tipo' => 'Vista', 'descripcion' => 'Vista create dependencias'],
            ['id' => 44, 'id_sistema' => 1, 'id_menu' => 9, 'modulo' => 'Dependencias', 'funcion' => 'viewPutDependencias', 'tipo' => 'Vista', 'descripcion' => 'Vista update dependencias'],
            ['id' => 45, 'id_sistema' => 1, 'id_menu' => 10, 'modulo' => 'Tribunales', 'funcion' => 'getTribunales', 'tipo' => 'Consulta', 'descripcion' => 'Consulta de tribunales'],
            ['id' => 46, 'id_sistema' => 1, 'id_menu' => 10, 'modulo' => 'Tribunales', 'funcion' => 'postTribunales', 'tipo' => 'Insercion', 'descripcion' => 'Insercion de tribunales'],
            ['id' => 47, 'id_sistema' => 1, 'id_menu' => 10, 'modulo' => 'Tribunales', 'funcion' => 'putTribunales', 'tipo' => 'Actualizacion', 'descripcion' => 'Actualizacion de tribunales'],
            ['id' => 48, 'id_sistema' => 1, 'id_menu' => 10, 'modulo' => 'Tribunales', 'funcion' => 'deleteTribunales', 'tipo' => 'Eliminacion', 'descripcion' => 'Eliminacion de tribunales'],
            ['id' => 49, 'id_sistema' => 1, 'id_menu' => 10, 'modulo' => 'Tribunales', 'funcion' => 'viewPostTribunales', 'tipo' => 'Vista', 'descripcion' => 'Vista create tribunales'],
            ['id' => 50, 'id_sistema' => 1, 'id_menu' => 10, 'modulo' => 'Tribunales', 'funcion' => 'viewPutTribunales', 'tipo' => 'Vista', 'descripcion' => 'Vista update tribunales'],
            ['id' => 51, 'id_sistema' => 1, 'id_menu' => 11, 'modulo' => 'Juzgados', 'funcion' => 'getJuzgados', 'tipo' => 'Consulta', 'descripcion' => 'Consulta de juzgados'],
            ['id' => 52, 'id_sistema' => 1, 'id_menu' => 11, 'modulo' => 'Juzgados', 'funcion' => 'postJuzgados', 'tipo' => 'Insercion', 'descripcion' => 'Insercion de juzgados'],
            ['id' => 53, 'id_sistema' => 1, 'id_menu' => 11, 'modulo' => 'Juzgados', 'funcion' => 'putJuzgados', 'tipo' => 'Actualizacion', 'descripcion' => 'Actualizacion de juzgados'],
            ['id' => 54, 'id_sistema' => 1, 'id_menu' => 11, 'modulo' => 'Juzgados', 'funcion' => 'deleteJuzgados', 'tipo' => 'Eliminacion', 'descripcion' => 'Eliminacion de juzgados'],
            ['id' => 55, 'id_sistema' => 1, 'id_menu' => 11, 'modulo' => 'Juzgados', 'funcion' => 'viewPostJuzgados', 'tipo' => 'Vista', 'descripcion' => 'Vista create juzgados'],
            ['id' => 56, 'id_sistema' => 1, 'id_menu' => 11, 'modulo' => 'Juzgados', 'funcion' => 'viewPutJuzgados', 'tipo' => 'Vista', 'descripcion' => 'Vista update juzgados'],
            ['id' => 57, 'id_sistema' => 1, 'id_menu' => 12, 'modulo' => 'Localizaciones', 'funcion' => 'getLocalizaciones', 'tipo' => 'Consulta', 'descripcion' => 'Consulta de localizaciones'],
            ['id' => 58, 'id_sistema' => 1, 'id_menu' => 12, 'modulo' => 'Localizaciones', 'funcion' => 'postLocalizaciones', 'tipo' => 'Insercion', 'descripcion' => 'Insercion de localizaciones'],
            ['id' => 59, 'id_sistema' => 1, 'id_menu' => 12, 'modulo' => 'Localizaciones', 'funcion' => 'putLocalizaciones', 'tipo' => 'Actualizacion', 'descripcion' => 'Actualizacion de localizaciones'],
            ['id' => 60, 'id_sistema' => 1, 'id_menu' => 12, 'modulo' => 'Localizaciones', 'funcion' => 'deleteLocalizaciones', 'tipo' => 'Eliminacion', 'descripcion' => 'Eliminacion de localizaciones'],
            ['id' => 61, 'id_sistema' => 1, 'id_menu' => 12, 'modulo' => 'Localizaciones', 'funcion' => 'viewPostLocalizaciones', 'tipo' => 'Vista', 'descripcion' => 'Vista create localizaciones'],
            ['id' => 62, 'id_sistema' => 1, 'id_menu' => 12, 'modulo' => 'Localizaciones', 'funcion' => 'viewPutLocalizaciones', 'tipo' => 'Vista', 'descripcion' => 'Vista update localizaciones'],
            ['id' => 63, 'id_sistema' => 1, 'id_menu' => 13, 'modulo' => 'Salas', 'funcion' => 'getSalas', 'tipo' => 'Consulta', 'descripcion' => 'Consulta de salas'],
            ['id' => 64, 'id_sistema' => 1, 'id_menu' => 13, 'modulo' => 'Salas', 'funcion' => 'postSalas', 'tipo' => 'Insercion', 'descripcion' => 'Insercion de salas'],
            ['id' => 65, 'id_sistema' => 1, 'id_menu' => 13, 'modulo' => 'Salas', 'funcion' => 'putSalas', 'tipo' => 'Actualizacion', 'descripcion' => 'Actualizacion de salas'],
            ['id' => 66, 'id_sistema' => 1, 'id_menu' => 13, 'modulo' => 'Salas', 'funcion' => 'deleteSalas', 'tipo' => 'Eliminacion', 'descripcion' => 'Eliminacion de salas'],
            ['id' => 67, 'id_sistema' => 1, 'id_menu' => 13, 'modulo' => 'Salas', 'funcion' => 'viewPostSalas', 'tipo' => 'Vista', 'descripcion' => 'Vista create salas'],
            ['id' => 68, 'id_sistema' => 1, 'id_menu' => 13, 'modulo' => 'Salas', 'funcion' => 'viewPutSalas', 'tipo' => 'Vista', 'descripcion' => 'Vista update salas']
        );

    protected $grupos = array(
        ['id' => 1, 'nombre_grupo' => 'AbogadoDictaminador', 'estatus' => 0],
        ['id' => 2, 'nombre_grupo' => 'JefeDepartamento', 'estatus' => 0],
        ['id' => 3, 'nombre_grupo' => 'Director', 'estatus' => 0],
        ['id' => 4, 'nombre_grupo' => 'Archivo', 'estatus' => 0],
        ['id' => 5, 'nombre_grupo' => 'Administrador', 'estatus' => 0],
        ['id' => 6, 'nombre_grupo' => 'Auditor', 'estatus' => 0]
    );



    public function run()
    {
        echo "\nInicializacion de Catalogos del Sistema";

        echo "\n    -Limpieza Anterior";
        DB::statement("SET foreign_key_checks=0");
        User::truncate();
        Sistema::truncate();
        Menu::truncate();
        Funciones::truncate();
        CatEntes::truncate();
        DB::statement("SET foreign_key_checks=1");

        DB::beginTransaction();
        try {
            echo "\n    -Carga Catálogo Entes";
            foreach ($this->cat_entes as $ente) {
                $ente_bd = CatEntes::find($ente['id']);
                if (!$ente_bd) {
                    CatEntes::create($ente);
                } else {
                    $ente_bd->update($ente);
                    $ente_bd->save();
                }
            }

            echo "\n    -Carga Catálogo Usuarios";
            foreach ($this->cat_users as $user) {
                $user_bd = User::find($user['id']);
                if (!$user_bd) {
                    User::create($user);
                } else {
                    $user_bd->update($user);
                    $user_bd->save();
                }
            }

            echo "\n    -Carga Catálogo Sistemas";
            foreach ($this->sistemas as $sistema) {
                $sistema_bd = Sistema::find($sistema['id']);
                if (!$sistema_bd) {
                    Sistema::create($sistema);
                } else {
                    $sistema_bd->update($sistema);
                    $sistema_bd->save();
                }
            }

            echo "\n    -Carga Catálogo Menus";
            foreach ($this->menus as $menu) {
                $menu_bd = Menu::find($menu['id']);
                if (!$menu_bd) {
                    Menu::create($menu);
                } else {
                    $menu_bd->update($menu);
                    $menu_bd->save();
                }
            }

            echo "\n    -Carga Catálogo Funciones";
            foreach ($this->funciones as $funcion) {
                $funcion_bd = Funciones::find($funcion['id']);
                if (!$funcion_bd) {
                    Funciones::create($funcion);
                } else {
                    $funcion_bd->update($funcion);
                    $funcion_bd->save();
                }
            }

            echo "\n    -Carga Catálogo Grupos";
            foreach ($this->grupos as $grupo) {
                $grupo_bd = Grupo::find($grupo['id']);
                if (!$grupo_bd) {
                    Grupo::create($grupo);
                } else {
                    $grupo_bd->update($grupo);
                    $grupo_bd->save();
                }
            }


            DB::commit();
            echo "\n    - Se aplico con exito el Seeder - Base:\n";
        } catch (\Exception $e) {
            DB::rollback();
            echo "\n    - Ocurrio un error al ejecutar la operacion:",$e;
        }
    }
}
