<?php

/**
 * This is the model class for table "t_file".
 *
 * The followings are the available columns in table 't_file':
 * @property integer $id_file
 * @property string $file
 * @property string $jenis
 *
 * The followings are the available model relations:
 * @property TSoal[] $tSoals
 */
class File extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return File the static model class
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
		return 't_file';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('file, jenis', 'required'),
			array('file', 'length', 'max'=>30),
			array('jenis', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_file, file, jenis', 'safe', 'on'=>'search'),
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
			'tSoals' => array(self::HAS_MANY, 'TSoal', 'id_file'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_file' => 'Id File',
			'file' => 'File',
			'jenis' => 'Jenis',
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

		$criteria->compare('id_file',$this->id_file);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('jenis',$this->jenis,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}