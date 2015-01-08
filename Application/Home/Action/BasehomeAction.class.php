<?php

/**
 * BasehomeAction.class.php
 * 前台页面公共方法
 * 前台核心文件，其他页面需要继承本类方可有效
 * @author cooper ding <qiuyuncode@163.com.com>
 * @copyright 2012- www.dingcms.com www.dogocms.com www.qiuyuncode.com www.adminsir.net All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:08
 * @package  Controller
 * @todo 完善更多方法
 */
namespace Home\Action;
use Think\Action;
class BasehomeAction extends Action {

    //初始化
    function _initialize()
    {
        $skin = $this->getSkin(); //获取前台主题皮肤名称
        $navhead = R('Common/System/getNav', array('header')); //导航菜单
        $navfoot = R('Common/System/getNav', array('footer')); //导航菜单
        $this->assign('navhead', $navhead);
        $this->assign('navfoot', $navfoot);
        $this->assign('style_common', '/Common');
        $this->assign('style', '/Skin/Home/' . $skin);
        $this->assign('tpl_header', './Theme/Home/' . $skin . '/tpl_header.html');
        $this->assign('tpl_footer', './Theme/Home/' . $skin . '/tpl_footer.html');
    }
    /*
     * getSkin
     * 获取站点设置的主题名称
     * @todo 使用程序读取主题皮肤名称
     */

    public function getSkin()
    {
        $skin = R('Common/System/getCfg', array('cfg_skin_web'));
        if (!$skin) {
            $skin = C('DEFAULT_THEME');
        }
        return $skin;
    }

}

?>
