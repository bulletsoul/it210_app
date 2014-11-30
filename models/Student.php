<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property string $student_no
 * @property string $fname
 * @property string $lname
 * @property string $mname
 * @property string $course
 * @property string $email_add
 * @property double $total_grade
 *
 * @property Attendance[] $attendances
 * @property Grade[] $grades
 * @property Requirement[] $grReqs
 * @property User $studentNo
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_no', 'fname', 'lname', 'mname', 'course', 'email_add', 'total_grade'], 'required'],
            [['total_grade'], 'number'],
            [['student_no'], 'string', 'max' => 10],
            [['fname', 'lname', 'mname', 'email_add'], 'string', 'max' => 30],
            [['course'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_no' => 'Student No.',
            'fname' => 'First Name',
            'lname' => 'Last Name',
            'mname' => 'Middle Name',
            'course' => 'Course',
            'email_add' => 'Email address',
            'total_grade' => 'Total Grade',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendances()
    {
        return $this->hasMany(Attendance::className(), ['att_student_no' => 'student_no']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrades()
    {
        return $this->hasMany(Grade::className(), ['gr_student_no' => 'student_no']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrReqs()
    {
        return $this->hasMany(Requirement::className(), ['req_id' => 'gr_req_id'])->viaTable('grade', ['gr_student_no' => 'student_no']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentNo()
    {
        return $this->hasOne(User::className(), ['student_no' => 'student_no']);
    }
}
