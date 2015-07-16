<?php

/**
 * This is the model class for table "t_topik".
 *
 * The followings are the available columns in table 't_topik':
 * @property integer $id_topik
 * @property string $judul_topik
 * @property string $materi_topik
 * @property integer $id_modul
 *
 * The followings are the available model relations:
 * @property Quiz[] $quizs
 * @property Modul $idModul
 */
class Topik extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_topik';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('judul_topik, materi_topik', 'required'),
			array('id_modul', 'numerical', 'integerOnly'=>true),
			array('judul_topik', 'length', 'max'=>30),
			array('materi_topik', 'length'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_topik, judul_topik, materi_topik, id_modul', 'safe', 'on'=>'search'),
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
			'quizs' => array(self::HAS_MANY, 'Quiz', 'id_topik'),
			'idModul' => array(self::BELONGS_TO, 'Modul', 'id_modul'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_topik' => 'Id Topik',
			'judul_topik' => 'Judul Topik',
			'materi_topik' => 'Materi Topik',
			'id_modul' => 'Id Modul',
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

		$criteria->compare('id_topik',$this->id_topik);
		$criteria->compare('judul_topik',$this->judul_topik,true);
		$criteria->compare('materi_topik',$this->materi_topik,true);
		$criteria->compare('id_modul',$this->id_modul);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Topik the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
