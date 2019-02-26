<?php
/**
 * Created by PhpStorm.
 * User: linyanjun
 * Date: 2019/2/26
 * Time: 14:51
 */

namespace common\models\custom;

use common\models\db\Issue;
use common\models\db\UserRoles;
use yii\base\Exception;

class CustomIssue extends Issue
{
    const STATE_ISSUING = 0;
    const STATE_DEVELOPING = 1;
    const STATE_TESTING = 2;
    const STATE_VERIFIED = 3;

    const STATE_TITLES = [
        self::STATE_ISSUING => '需求确认中',
        self::STATE_DEVELOPING => '开发中',
        self::STATE_TESTING => '测试中',
        self::STATE_VERIFIED => '测试通过',
    ];

    const ROLE_QA = 1;
    const ROLE_DEVELOPER = 2;

    /**
     * 设置为开发状态
     */
    public function setDevelop()
    {

    }

    /**
     * 设置为测试状态
     */
    public function setTesting()
    {

    }

    /**
     * 设置为测试通过
     */
    public function setVerified()
    {
        //状态检查
        if ($this->state != self::STATE_DEVELOPING) {
            throw new Exception('state must be STATE_DEVELOPING=' . self::STATE_DEVELOPING);
        }
        //身份检查
        if (!UserRoles::findOne([
            'id' => \Yii::$app->user->getId(),
            'role' => self::ROLE_QA,
        ])) {
            throw new Exception('user must have role ROLE_QA=' . self::ROLE_QA);
        }

        $this->state = self::STATE_VERIFIED;
        $this->save(false);
    }
}