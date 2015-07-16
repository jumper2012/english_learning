<?php

/**
 * This is the model class for table "t_soal".
 *\\\\\\\\
 * The followings are the available columns in table 't_soal':\
 * @property integer $id_soal
 * @property string $soal
 * @property integer $id_file
 * @property string $jawaban
 * @property string $a
 * @property string $b
 * @property string $c
 * @property string $d
 * @property string $e
 * @property integer $order
 *
 * The followings are the available model relations:
 * @property TQuiz[] $tQuizs
 * @property TQuiz[] $tQuizs1
 * @property TFile $idFile
 * @property TToefl[] $tToefls
 */
class Soal extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Soal the static model class
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
		return 't_soal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('soal, jawaban, a, b, c, d, order', 'required'),
			array('id_file, order', 'numerical', 'integerOnly'=>true),
			//array('soal', 'length'),
			array('jawaban', 'length', 'max'=>1),
			array('a, b, c, d, e', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_soal, soal, id_file, jawaban, a, b, c, d, e, order', 'safe', 'on'=>'search'),
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
			'tQuizs' => array(self::MANY_MANY, 'TQuiz', 't_quizgrade(id_grade, id_quiz)'),
			'tQuizs1' => array(self::MANY_MANY, 'TQuiz', 't_quizsoal(id_soal, id_quiz)'),
			'idFile' => array(self::BELONGS_TO, 'TFile', 'id_file'),
			'tToefls' => array(self::MANY_MANY, 'TToefl', 't_toeflsoal(id_soal, id_toefl)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_soal' => 'Id Soal',
			'soal' => 'Soal',
			'id_file' => 'Id File',
			'jawaban' => 'Jawaban',
			'a' => 'A',
			'b' => 'B',
			'c' => 'C',
			'd' => 'D',
			'e' => 'E',
			'order' => 'Order',
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

		$criteria->compare('id_soal',$this->id_soal);
		$criteria->compare('soal',$this->soal,true);
		$criteria->compare('id_file',$this->id_file);
		$criteria->compare('jawaban',$this->jawaban,true);
		$criteria->compare('a',$this->a,true);
		$criteria->compare('b',$this->b,true);
		$criteria->compare('c',$this->c,true);
		$criteria->compare('d',$this->d,true);
		$criteria->compare('e',$this->e,true);
		$criteria->compare('order',$this->order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function namaSubWBS($x)
    {
        $sql='SELECT file FROM t_file WHERE id_file='.$x;
        $list= Yii::app()->db->createCommand($sql)->queryAll();
        foreach($list as $as){foreach($as as $us){$fin=$us;}}
        return $fin;
    }
    public function namaWBS($x)
    {
        $sql='SELECT jenis FROM t_file WHERE id_file='.$x;
        $list= Yii::app()->db->createCommand($sql)->queryAll();
        foreach($list as $as){foreach($as as $us){$fin=$us;}}
        return $fin;
    }
    
    public function getJawaban($x)
    {
        $sql='SELECT t_soal.jawaban FROM t_soal join t_quizsoal on t_soal.id_soal=t_quizsoal.id_soal AND t_quizsoal.id_quiz='.$x;
        $list= Yii::app()->db->createCommand($sql)->queryAll();
        foreach($list as $as){$fan=$as; foreach($as as $us){$fin=$us;}}
        return $list;
    }
    
    public function getJawabanToefl($x)
    {
        $sql='SELECT t_soal.jawaban FROM t_soal join t_modultestsoal on t_soal.id_soal=t_modultestsoal.id_soal AND t_modultestsoal.id_modultest='.$x;
        $list= Yii::app()->db->createCommand($sql)->queryAll();
        foreach($list as $as){$fan=$as; foreach($as as $us){$fin=$us;}}
        return $list;
    }
}