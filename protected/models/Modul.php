<?php

/**
 * This is the model class for table "t_modul".
 *
 * The followings are the available columns in table 't_modul':
 * @property integer $id_modul
 * @property string $nama_modul
 * @property string $deskripsi_modul
 *
 * The followings are the available model relations:
 * @property Topik[] $topiks
 */
class Modul extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_modul';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_modul', 'required'),
			array('nama_modul', 'length', 'max'=>30),
			array('deskripsi_modul', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_modul, nama_modul, deskripsi_modul', 'safe', 'on'=>'search'),
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
			'topiks' => array(self::HAS_MANY, 'Topik', 'id_modul'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_modul' => 'Id Modul',
			'nama_modul' => 'Nama Modul',
			'deskripsi_modul' => 'Deskripsi Modul',
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

		$criteria->compare('id_modul',$this->id_modul);
		$criteria->compare('nama_modul',$this->nama_modul,true);
		$criteria->compare('deskripsi_modul',$this->deskripsi_modul,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Modul the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
