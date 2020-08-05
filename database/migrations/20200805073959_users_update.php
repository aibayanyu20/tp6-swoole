<?php

use think\migration\Migrator;
use think\migration\db\Column;

class UsersUpdate extends Migrator
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
        $table->addColumn("last_login_ip","string",['limit'=>30,'default'=>'','comment'=>'最后登录的ip、地址'])
            ->addColumn("last_login_time",'string',['limit'=>30,'comment'=>'最后登录时间','default'=>''])
            ->update();
    }
}
