<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedbackform".
 *
 * @property string $KdFeedback
 * @property string $DeskripsiFeedback
 * @property string $Keterangan
 */
class Feedbackform extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $cari;
    public static function tableName()
    {
        return 'feedbackform';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KdFeedback', 'DeskripsiFeedback', 'Keterangan'], 'required'],
            [['DeskripsiFeedback'], 'string'],
            [['KdFeedback'], 'string', 'max' => 3],
            [['Keterangan'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KdFeedback' => 'Kode Feedback',
            'DeskripsiFeedback' => 'Deskripsi Feedback',
            'Keterangan' => 'Keterangan',
        ];
    }
}
