<?php

/**
 * This is the model class for table "t_grade".
 *
 * The followings are the available columns in table 't_grade':
 * @property integer $id_grade
 * @property string $username
 * @property string $jawaban
 * @property integer $grade
 * @property string $deskripsi
 *
 * The followings are the available model relations:
 * @property TUser $username0
 * @property TToefl[] $tToefls
 */
class Grade extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Grade the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_grade';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, jawaban, grade', 'required'),
			array('grade', 'numerical', 'integerOnly'=>true),
			array('username, deskripsi', 'length', 'max'=>30),
			array('jawaban', 'length', 'max'=>400),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_grade, username, jawaban, grade, deskripsi', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'username0' => array(self::BELONGS_TO, 'TUser', 'username'),
			'tToefls' => array(self::MANY_MANY, 'TToefl', 't_toeflgrade(id_grade, id_toefl)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_grade' => 'Id Grade',
			'username' => 'Username',
			'jawaban' => 'Jawaban',
			'grade' => 'Grade',
			'deskripsi' => 'Deskripsi',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_grade',$this->id_grade);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('jawaban',$this->jawaban,true);
		$criteria->compare('grade',$this->grade);
		$criteria->compare('deskripsi',$this->deskripsi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}