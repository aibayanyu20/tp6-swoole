<?php
/**
 * @time 16:30 2020/8/4
 * @author loster
 */

namespace app\api\controller\v1;


use app\common\BaseController;
use app\common\model\MenuRole;
use app\common\model\Menus;
use app\common\model\Users;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\response\Json;

/**
 * 用户控制器
 * @time 16:30 2020/8/4
 * @author loster
 * Class User
 * @package app\api\controller\v1
 */
class User extends BaseController
{
    /**
     * 获取用户的基本信息
     * @time 18:30 2020/8/6
     * @param Users $users
     * @return Json
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @author loster
     */
    public function getUserInfo(Users $users)
    {
        // 获取数据信息
        $roleInfo = $this->request->getUserRole();
        // 获取用户的基本信息
        $userinfo = $users->where("id", $this->request->userId)
            ->withoutField("password,delete_time,update_time")
            ->find()->toArray();
        $userinfo['role'] = $roleInfo['name'];
        // 获取数据成功
        return apiSuccess("ok", $userinfo);
    }

    /**
     * 获取菜单规则
     * @param Menus $menus
     * @param MenuRole $menuRole
     * @return Json
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function getMenuList(Menus $menus, MenuRole $menuRole)
    {
        // 获取菜单信息
        $role_id = $this->request->getUserRole();
        // 获取菜单
        if ($role_id['id'] == 1) {
            $menusInfo = $menus->withoutField("update_time,create_time")
                ->with(['role' => function ($query) {
                    $query->field('name,id');
                }])
                ->order("sort", "DESC")->select();
        } else {
            $menusRoles = $menuRole->where("role_id", $role_id['id'])
                ->column("menu_id");
            $menusInfo = $menus->withoutField("update_time,create_time")
                ->order("sort", "DESC")
                ->with(['role' => function ($query) {
                    $query->field('name,id');
                }])
                ->whereIn("id", $menusRoles)->select();
        }
        // 获取菜单成功
        return apiSuccess("ok", $menusInfo);
    }
}