<?php
/**
 * Created by PhpStorm.
 * User: Swift
 * Date: 2019/7/31
 * Time: 0:24
 */
namespace app\commom\validate;
use think\Validate;
class User extends Validate
{
    //验证规则
  protected $rule = [
      'user_name|用户名'=>'require',
      'user_pwd|密码'=>'require|length:32',

      'username|用户名'=>'require',
      'is_exist|用户是否存在'=>'require|length:1',

      'code|验证码'=>'require|number|length:6',

      'user_id|用户ID'=>'require|number',
      'user_icon|用户头像'=>'require|image|fileSize:2000000|fileExt:jpeg,jpg,png'

  ];
  //登录场景
  protected  function sceneLogin(){
      return $this->only(['user_name','user_pwd']);
  }
  //验证码场景
    protected  function sceneGet_code(){
        return $this->only(['username','is_exist']);
    }
    //注册场景
    protected  function  sceneRegister(){
      return $this->only(['username','user_pwd','code']);
    }
    //用户头像上传场景
    protected function sceneUser_head_icon(){
      return $this->only(['user_id','user_icon']);
    }

}
