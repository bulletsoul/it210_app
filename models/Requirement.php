<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "requirement".
 *
 * @property integer $req_id
 * @property string $deadline
 * @property string $title
 * @property string $description
 *
 * @property File[] $files
 * @property Grade[] $grades
 * @property Student[] $grStudentNos
 */
class Requirement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'requirement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deadline', 'title', 'description'], 'required'],
            [['deadline'], 'safe'],
            [['title'], 'string', 'max' => 256],
            [['description'], 'string', 'max' => 800]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'req_id' => 'Requirement ID',
            'deadline' => 'Deadline',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(File::className(), ['req_id' => 'req_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrades()
    {
        return $this->hasMany(Grade::className(), ['gr_req_id' => 'req_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrStudentNos()
    {
        return $this->hasMany(Student::className(), ['student_no' => 'gr_student_no'])->viaTable('grade', ['gr_req_id' => 'req_id']);
    }
}
