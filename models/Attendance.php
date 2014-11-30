<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attendance".
 *
 * @property string $att_student_no
 * @property string $date
 *
 * @property Student $attStudentNo
 */
class Attendance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attendance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['att_student_no', 'date'], 'required'],
            [['date'], 'safe'],
            [['att_student_no'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'att_student_no' => 'Student No.',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttStudentNo()
    {
        return $this->hasOne(Student::className(), ['student_no' => 'att_student_no']);
    }
}
