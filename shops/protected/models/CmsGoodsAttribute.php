<?php

/**
 * This is the model class for table "cms_goods_attribute".
 *
 * The followings are the available columns in table 'cms_goods_attribute':
 * @property integer $ga_id
 * @property integer $ga_goods_id
 * @property string $ga_name
 * @property string $ga_value
 */
class CmsGoodsAttribute extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cms_goods_attribute';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ga_goods_id, ga_name', 'required'),
			array('ga_goods_id', 'numerical', 'integerOnly'=>true),
			array('ga_name', 'length', 'max'=>80),
			array('ga_value', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ga_id, ga_goods_id, ga_name, ga_value', 'safe', 'on'=>'search'),
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
			'ga_id' => 'Ga',
			'ga_goods_id' => 'Ga Goods',
			'ga_name' => 'Ga Name',
			'ga_value' => 'Ga Value',
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

		$criteria->compare('ga_id',$this->ga_id);
		$criteria->compare('ga_goods_id',$this->ga_goods_id);
		$criteria->compare('ga_name',$this->ga_name,true);
		$criteria->compare('ga_value',$this->ga_value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CmsGoodsAttribute the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
