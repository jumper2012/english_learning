<?php

/**
 * This is the model class for table "t_modultest".
 *
 * The followings are the available columns in table 't_modultest':
 * @property integer $id_modulTest
 * @property string $nama_modulTest
 * @property string $durasi
 * @property integer $id_toefl
 * @property string $time_start
 * @property string $time_end
 *
 * The followings are the available model relations:
 * @property Toefl $idToefl
 * @property Soal[] $soals
 */
class Modultest extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_modultest';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_modulTest, durasi', 'required'),
			array('id_toefl', 'numerical', 'integerOnly'=>true),
			array('nama_modulTest', 'length', 'max'=>30),
			array('time_start, time_end', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_modulTest, nama_modulTest, durasi, id_toefl, time_start, time_end', 'safe', 'on'=>'search'),
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
			'idToefl' => array(self::BELONGS_TO, 'Toefl', 'id_toefl'),
			'soals' => array(self::HAS_MANY, 'Soal', 'id_modulTest'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_modulTest' => 'Id Modul Test',
			'nama_modulTest' => 'Nama Modul',
			'durasi' => 'Durasi',
			'id_toefl' => 'Id Toefl',
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

		$criteria->compare('id_modulTest',$this->id_modulTest);
		$criteria->compare('nama_modulTest',$this->nama_modulTest,true);
		$criteria->compare('durasi',$this->durasi,true);
		$criteria->compare('id_toefl',$this->id_toefl);
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
	 * @return Modultest the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
