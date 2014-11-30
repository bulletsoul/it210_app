<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "file".
 *
 * @property integer $file_id
 * @property integer $req_id
 * @property string $date_submitted
 * @property string $file_path
 * @property string $file_student_no
 *
 * @property Requirement $req
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['req_id', 'date_submitted', 'file_path', 'file_student_no'], 'required'],
            [['req_id'], 'integer'],
            [['date_submitted'], 'safe'],
            [['file_path'], 'string', 'max' => 500],
            [['file_student_no'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'file_id' => 'File ID',
            'req_id' => 'Requirement ID',
            'date_submitted' => 'Date submitted',
            'file_path' => 'File Path',
            'file_student_no' => 'Student No.',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReq()
    {
        return $this->hasOne(Requirement::className(), ['req_id' => 'req_id']);
    }
}
