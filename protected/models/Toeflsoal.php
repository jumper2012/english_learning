<?php

/**
 * This is the model class for table "t_toeflsoal".
 *
 * The followings are the available columns in table 't_toeflsoal':
 * @property integer $id_toefl
 * @property integer $id_soal
 */
class Toeflsoal extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Toeflsoal the static model class
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
		return 't_toeflsoal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_toefl, id_soal', 'required'),
			array('id_toefl, id_soal', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_toefl, id_soal', 'safe', 'on'=>'search'),
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
                'toefl_soal' => array(self::BELONGS_TO, 'Soal', 'id_soal'),
                'toefl_modul' => array(self::BELONGS_TO, 'Toefl','id_toefl'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_toefl' => 'Id Toefl',
			'id_soal' => 'Id Soal',
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

		$criteria->compare('id_toefl',$this->id_toefl);
		$criteria->compare('id_soal',$this->id_soal);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}