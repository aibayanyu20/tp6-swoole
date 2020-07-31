<?php

use think\migration\Migrator;

class AdUsers extends Migrator
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
        $table = $this->table("users",['collation'=>'utf8mb4_general_ci']);
        $table
            ->addColumn('username', 'string',array('limit'  =>  30,'default'=>'','comment'=>'用户名称'))
            ->addColumn('nickname', 'string',array('limit'  =>  30,'default'=>'','comment'=>'用户昵称'))
            ->addColumn('password', 'string',array('limit'  =>  64,'default'=>'','comment'=>'用户密码'))
            ->addColumn('avatar', 'string',array('limit'  =>  255,'default'=>'','comment'=>'用户头像'))
            ->addColumn('parent_id', 'integer',array('default'=>0,'comment'=>'上级id'))
            ->addColumn('phone', 'string',array('limit'  =>  12,'default'=>'','comment'=>'用户手机'))
            ->addColumn('email', 'string',array('limit'  =>  30,'default'=>'','comment'=>'用户邮箱'))
            ->addColumn('status', 'boolean',array('limit'  =>  1,'default'=>1,'comment'=>'当前用户的状态【0】不可用，【1】可以用'))
            ->addColumn('create_time', 'integer',array('comment'=>'创建时间','default'=>0))
            ->addColumn('update_time', 'integer',array('comment'=>'更新时间','default'=>0))
            ->addColumn('delete_time', 'integer',array('comment'=>'软删除时间','default'=>0))
            ->create();
    }

}
