<?php

use think\migration\Migrator;
use think\migration\db\Column;

class UsersUpdateTwo extends Migrator
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
        $table = $this->table("users");
        $table->addColumn("gender","boolean",['limit'=>1,'default'=>1,'comment'=>'【0】为未知，【1】为男，【2】为女'])
            ->addColumn("age",'integer',['limit'=>4,'comment'=>'年龄','default'=>0])
            ->update();
    }
}
