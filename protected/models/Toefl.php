<?php

/**
 * This is the model class for table "t_toefl".
 *
 * The followings are the available columns in table 't_toefl':
 * @property integer $id_toefl
 * @property string $judul
 * @property string $deskripsi
 *
 * The followings are the available model relations:
 * @property Grade[] $grades
 * @property Modultest[] $modultests
 */
class Toefl extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_toefl';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('judul', 'required'),
			array('judul', 'length', 'max'=>30),
			array('deskripsi', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_toefl, judul, deskripsi', 'safe', 'on'=>'search'),
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
			'grades' => array(self::HAS_MANY, 'Grade', 'id_toefl'),
			'modultests' => array(self::HAS_MANY, 'Modultest', 'id_toefl'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_toefl' => 'Id Toefl',
			'judul' => 'Judul',
			'deskripsi' => 'Deskripsi',
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

		$criteria->compare('id_toefl',$this->id_toefl);
		$criteria->compare('judul',$this->judul,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Toefl the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
