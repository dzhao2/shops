<?php

/**
 * This is the model class for table "cms_shop_attribute".
 *
 * The followings are the available columns in table 'cms_shop_attribute':
 * @property integer $sa_id
 * @property integer $sa_shop_id
 * @property string $sa_name
 * @property string $sa_value
 */
class CmsShopAttribute extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cms_shop_attribute';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sa_shop_id, sa_name', 'required'),
			array('sa_shop_id', 'numerical', 'integerOnly'=>true),
			array('sa_name', 'length', 'max'=>80),
			array('sa_value', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('sa_id, sa_shop_id, sa_name, sa_value', 'safe', 'on'=>'search'),
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
			'sa_id' => 'Sa',
			'sa_shop_id' => 'Sa Shop',
			'sa_name' => 'Sa Name',
			'sa_value' => 'Sa Value',
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

		$criteria->compare('sa_id',$this->sa_id);
		$criteria->compare('sa_shop_id',$this->sa_shop_id);
		$criteria->compare('sa_name',$this->sa_name,true);
		$criteria->compare('sa_value',$this->sa_value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CmsShopAttribute the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
