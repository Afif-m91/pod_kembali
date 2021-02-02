<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedbackdetail".
 *
 * @property string $KdFeedbackTraining
 * @property string $KdFeedback
 * @property string $FeedbackPoint
 */
class Feedbackdetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedbackdetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KdFeedbackTraining', 'KdFeedback', 'FeedbackPoint'], 'required'],
            [['FeedbackPoint'], 'string'],
            [['KdFeedbackTraining'], 'string', 'max' => 15],
            [['KdFeedback'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KdFeedbackTraining' => 'Kd Feedback Training',
            'KdFeedback' => 'Kd Feedback',
            'FeedbackPoint' => 'Feedback Point',
        ];
    }
}
