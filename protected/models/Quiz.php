<?php

/**
 * This is the model class for table "t_quiz".
 *
 * The followings are the available columns in table 't_quiz':
 * @property integer $id_quiz
 * @property integer $id_topik
 * @property string $judul_quiz
 * @property string $deskripsi
 * @property string $durasi
 * @property string $time_start
 * @property string $time_end
 *
 * The followings are the available model relations:
 * @property Grade[] $grades
 * @property Topik $idTopik
 * @property Soal[] $soals
 */
class Quiz extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_quiz';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_topik, judul_quiz, durasi', 'required'),
			array('id_topik', 'numerical', 'integerOnly'=>true),
			array('judul_quiz', 'length', 'max'=>30),
			array('deskripsi', 'length', 'max'=>50),
			array('time_start, time_end', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_quiz, id_topik, judul_quiz, deskripsi, durasi, time_start, time_end', 'safe', 'on'=>'search'),
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
			'grades' => array(self::HAS_MANY, 'Grade', 'id_quiz'),
			'idTopik' => array(self::BELONGS_TO, 'Topik', 'id_topik'),
			'soals' => array(self::HAS_MANY, 'Soal', 'id_quiz'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_quiz' => 'Id Quiz',
			'id_topik' => 'Id Topik',
			'judul_quiz' => 'Judul Quiz',
			'deskripsi' => 'Deskripsi',
			'durasi' => 'Durasi',
			'time_start' => 'Time Start',
			'time_end' => 'Time End',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_quiz',$this->id_quiz);
		$criteria->compare('id_topik',$this->id_topik);
		$criteria->compare('judul_quiz',$this->judul_quiz,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('durasi',$this->durasi,true);
		$criteria->compare('time_start',$this->time_start,true);
		$criteria->compare('time_end',$this->time_end,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Quiz the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
