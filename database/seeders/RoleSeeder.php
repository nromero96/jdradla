<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Secretaria']);
        $role3 = Role::create(['name' => 'Participante']);
        $role4 = Role::create(['name' => 'Acompañante']);
        $role5 = Role::create(['name' => 'Expositor']);
        $role6 = Role::create(['name' => 'Calificador']);
        $role7 = Role::create(['name' => 'Hotelero']);

        Permission::create(['name' => 'dashboard.index',
                            'description' => 'Ver Dashboard'])->syncRoles([$role1, $role2, $role3, $role4, $role5, $role6, $role7]);
        //Users
        Permission::create(['name' => 'users.index',
                            'description' => 'Listar Usuarios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.create',
                            'description' => 'Crear Usuario'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.edit',
                            'description' => 'Editar Usuario'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.destroy',
                            'description' => 'Eliminar Usuario'])->syncRoles([$role1, $role2]);
        //Roles
        Permission::create(['name' => 'roles.index',
                            'description' => 'Listar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.create',
                            'description' => 'Crear Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.edit',
                            'description' => 'Editar Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.destroy',
                            'description' => 'Eliminar Rol'])->syncRoles([$role1]);
        //Programs
        Permission::create(['name' => 'programs.index',
                            'description' => 'Listar Programas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'programs.create',
                            'description' => 'Crear Programa'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'programs.edit',
                            'description' => 'Editar Programa'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'programs.destroy',
                            'description' => 'Eliminar Programa'])->syncRoles([$role1, $role2]);

        //Inscriptions
        Permission::create(['name' => 'inscriptions.index',
                            'description' => 'Listar Inscripciones'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'inscriptions.create',
                            'description' => 'Crear Inscripción'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'inscriptions.edit',
                            'description' => 'Editar Inscripción'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'inscriptions.destroy',
                            'description' => 'Eliminar Inscripción'])->syncRoles([$role1, $role2]);

        //HotelReservations
        Permission::create(['name' => 'hotelreservations.index',
                            'description' => 'Listar Reservas de Hotel'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'hotelreservations.create',
                            'description' => 'Crear Reserva de Hotel'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'hotelreservations.edit',
                            'description' => 'Editar Reserva de Hotel'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'hotelreservations.destroy',
                            'description' => 'Eliminar Reserva de Hotel'])->syncRoles([$role1, $role2]);

        //Works
        Permission::create(['name' => 'works.index',
                            'description' => 'Listar Trabajos'])->syncRoles([$role1, $role2, $role3, $role6]);
        Permission::create(['name' => 'works.create',
                            'description' => 'Crear Trabajo'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'works.edit',
                            'description' => 'Editar Trabajo'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'works.destroy',
                            'description' => 'Eliminar Trabajo'])->syncRoles([$role1, $role2]);

        //Exhibitors
        Permission::create(['name' => 'exhibitors.index',
                            'description' => 'Listar Expositores'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'exhibitors.create',
                            'description' => 'Crear Expositor'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'exhibitors.edit',
                            'description' => 'Editar Expositor'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'exhibitors.destroy',
                            'description' => 'Eliminar Expositor'])->syncRoles([$role1, $role2]);

        //SpecialCodes
        Permission::create(['name' => 'specialcodes.index',
                            'description' => 'Listar Códigos Especiales'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'specialcodes.create',
                            'description' => 'Crear Código Especial'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'specialcodes.edit',
                            'description' => 'Editar Código Especial'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'specialcodes.destroy',
                            'description' => 'Eliminar Código Especial'])->syncRoles([$role1, $role2]);

        //Invitations
        Permission::create(['name' => 'invitations.index',
                            'description' => 'Listar Invitaciones'])->syncRoles([$role1, $role2]);

    }
}
