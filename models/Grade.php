<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grade".
 *
 * @property double $grade
 * @property string $gr_student_no
 * @property integer $gr_req_id
 *
 * @property Requirement $grReq
 * @property Student $grStudentNo
 */
class Grade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grade';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grade', 'gr_student_no', 'gr_req_id'], 'required'],
            [['grade'], 'number'],
            [['gr_req_id'], 'integer'],
            [['gr_student_no'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'grade' => 'Grade',
            'gr_student_no' => 'Student No',
            'gr_req_id' => 'Requirement ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrReq()
    {
        return $this->hasOne(Requirement::className(), ['req_id' => 'gr_req_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrStudentNo()
    {
        return $this->hasOne(Student::className(), ['student_no' => 'gr_student_no']);
    }
}
