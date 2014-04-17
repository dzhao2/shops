<?php

/**
 * This is the model class for table "wd_goods_picture".
 *
 * The followings are the available columns in table 'wd_goods_picture':
 * @property integer $gp_id
 * @property integer $gp_goods_id
 * @property string $gp_pic
 * @property string $gp_date
 */
class WdGoodsPicture extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'wd_goods_picture';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gp_id, gp_goods_id', 'numerical', 'integerOnly'=>true),
			array('gp_pic', 'length', 'max'=>80),
			array('gp_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('gp_id, gp_goods_id, gp_pic, gp_date', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'gp_id' => 'Gp',
			'gp_goods_id' => 'Gp Goods',
			'gp_pic' => 'Gp Pic',
			'gp_date' => 'Gp Date',
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

		$criteria->compare('gp_id',$this->gp_id);
		$criteria->compare('gp_goods_id',$this->gp_goods_id);
		$criteria->compare('gp_pic',$this->gp_pic,true);
		$criteria->compare('gp_date',$this->gp_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WdGoodsPicture the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
