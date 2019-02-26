<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "issue".
 *
 * @property int $id
 * @property string $title 标题
 * @property string $story 描述
 * @property int $state 状态
 * @property int $create_user 创建人
 * @property int $assigned_user 执行人
 */
class Issue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'issue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'story', 'state', 'create_user', 'assigned_user'], 'required'],
            [['story'], 'string'],
            [['state', 'create_user', 'assigned_user'], 'integer'],
            [['title'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'story' => 'Story',
            'state' => 'State',
            'create_user' => 'Create User',
            'assigned_user' => 'Assigned User',
        ];
    }
}
