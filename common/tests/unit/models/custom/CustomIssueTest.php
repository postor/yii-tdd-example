<?php
/**
 * Created by PhpStorm.
 * User: linyanjun
 * Date: 2019/2/26
 * Time: 15:33
 */

namespace common\tests\unit\models\custom;

use common\fixtures\IssueFixture;
use Yii;
use common\models\custom\CustomIssue;
use common\models\User;
use common\fixtures\UserFixture;
use common\fixtures\UserRolesFixture;
use yii\base\Exception;


class CustomIssueTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;


    /**
     * @return array
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'custom_issue_users.php'
            ],
            'user_roles' => [
                'class' => UserRolesFixture::className(),
                'dataFile' => codecept_data_dir() . 'custom_issue_user_roles.php'
            ],
            'issues' => [
                'class' => IssueFixture::className(),
                'dataFile' => codecept_data_dir() . 'custom_issue_issues.php'
            ]
        ];
    }

    public function testWrongState()
    {
        //需求确认直接转到测试通过，需要先转到开发中
        $this->expectException(Exception::class);
        Yii::$app->user->login(User::findByUsername('qa1'));
        $issue = CustomIssue::findOne(['id'=>1]);
        $issue->setVerified();
    }

    public function testWrongUser()
    {
        //需要测试人员才可以转到验证，开发不可以
        $this->expectException(Exception::class);
        Yii::$app->user->login(User::findByUsername('developer2'));
        $issue = CustomIssue::findOne(['id'=>2]);
        $issue->setVerified();
    }

    public function testCorrectStateUser()
    {
        //测试人员将开发中转为验证通过
        Yii::$app->user->login(User::findByUsername('qa1'));
        $issue = CustomIssue::findOne(['id'=>2]);
        $issue->setVerified();
        expect('state should change',$issue->state)->equals(CustomIssue::STATE_VERIFIED);
    }
}