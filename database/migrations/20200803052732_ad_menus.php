<?php

use think\migration\Migrator;
use think\migration\db\Column;

class AdMenus extends Migrator
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
        $table = $this->table("menus");
        $table
            ->addColumn('title','string',['default'=>'','comment'=>'菜单标题','limit'=>30])
            ->addColumn('name','string',['default'=>'','comment'=>'菜单名称','limit'=>30])
            ->addColumn('parent_id', 'integer', ['default' => 0, 'comment' => '当前规则的父级'])
            ->addColumn('creator_id', 'integer', ['default' => 0, 'comment' => '当前创建菜单的用户id'])
            ->addColumn('component','string',['default'=>'','comment'=>'菜单组件','limit'=>30])
            ->addColumn('path','string',['default'=>'','comment'=>'菜单路径，如果不存在路径需要通过component生成路径','limit'=>30])
            ->addColumn('r_id','boolean',['default'=>0,'comment'=>'可以被用户访问的权限','limit'=>1])
            ->addColumn('icon','string',['default'=>'','comment'=>'图标配置项','limit'=>30])
            ->addColumn('type','boolean',['default'=>0,'comment'=>'菜单类型【0】为菜单【1】为子菜单','limit'=>1])
            ->addColumn('status','boolean',['default'=>0,'comment'=>'菜单状态','limit'=>1])
            ->addColumn('redirect','string',['default'=>'','comment'=>'重定向地址，如果存在就重定向至对应的地址'])
            ->addColumn('i18n','string',['default'=>'','comment'=>'多语言配置'])
            ->addColumn('target','string',['default'=>'','comment'=>'是否存在跳转_blank没有则不需要配置'])
            ->addColumn('sort','integer',['default'=>0,'comment'=>'菜单排序数值越大越靠前'])
            ->addColumn('create_time','integer',['default'=>0,'comment'=>'创建时间'])
            ->addColumn('update_time','integer',['default'=>0,'comment'=>'更新时间'])
            ->create();
    }
}
