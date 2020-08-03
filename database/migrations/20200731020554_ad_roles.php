<?php

use think\migration\Migrator;
use think\migration\db\Column;

class AdRoles extends Migrator
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
        $table = $this->table("roles");
           $table
               ->addColumn("title","string",['default'=>'','limit'=>30,'comment'=>'当前的规则名称'])
               ->addColumn('name',"string",['default'=>'','limit'=>30,'comment'=>'当前规则的英文名称与规则相对应'])
               ->addColumn('parent_id', 'integer', ['default' => 0, 'comment' => '当前规则的父级'])
               ->addColumn('description', 'string', ['default' => '', 'limit' => 100, 'comment' => '描述当前的权限信息'])
               ->addColumn('data_role', 'integer', ['default' => 0, 'limit' => 2, 'comment' => '当前权限对应的数据权限'])
               ->addColumn('create_time', 'integer', ['default' => 0, 'comment' => '创建时间'])
               ->addColumn('update_time', 'integer', ['default' => 0, 'comment' => '更新时间'])
               ->create();
    }
}
