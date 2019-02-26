<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "user_roles".
 *
 * @property int $id
 * @property int $user_id 用户id
 * @property int $role 角色
 */
class UserRoles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'role'], 'required'],
            [['user_id', 'role'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'role' => 'Role',
        ];
    }
}
