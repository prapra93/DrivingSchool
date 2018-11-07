<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('categories')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('customers')
            ->addColumn('first_name', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('last_name', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('email', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('phone', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('files')
            ->addColumn('name', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('path', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('status', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('i18n')
            ->addColumn('locale', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('model', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('foreign_key', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('field', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('content', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('lessons')
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('title', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('price', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('lessons_files')
            ->addColumn('lesson_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('file_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('lessons_vehicules', ['id' => false, 'primary_key' => ['lesson_id', 'vehicule_id']])
            ->addColumn('lesson_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('vehicule_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'vehicule_id',
                ]
            )
            ->create();

        $this->table('subcategories')
            ->addColumn('category_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('users')
            ->addColumn('first_name', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('last_name', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('email', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('password', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('role', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('activation', 'text', [
                'default' => '0',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('uuid', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('vehicules')
            ->addColumn('make', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('model', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('plate', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('subcategory_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('lessons')
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('lessons_vehicules')
            ->addForeignKey(
                'vehicule_id',
                'vehicules',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('vehicules')
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('lessons')
            ->dropForeignKey(
                'user_id'
            );

        $this->table('lessons_vehicules')
            ->dropForeignKey(
                'vehicule_id'
            );

        $this->table('vehicules')
            ->dropForeignKey(
                'user_id'
            );

        $this->dropTable('categories');
        $this->dropTable('customers');
        $this->dropTable('files');
        $this->dropTable('i18n');
        $this->dropTable('lessons');
        $this->dropTable('lessons_files');
        $this->dropTable('lessons_vehicules');
        $this->dropTable('subcategories');
        $this->dropTable('users');
        $this->dropTable('vehicules');
    }
}
