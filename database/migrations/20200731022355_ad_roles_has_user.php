<?php

use think\migration\Migrator;
use think\migration\db\Column;

class AdRolesHasUser extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('role_user');
        $table->addColumn('user_id','integer',['default'=>0,'comment'=>'用户id'])
            ->addColumn('role_id','integer',['default'=>0,'comment'=>'角色id'])
            ->addColumn('create_time','integer',['default'=>0,'comment'=>'创建时间'])
            ->create();
    }
}
