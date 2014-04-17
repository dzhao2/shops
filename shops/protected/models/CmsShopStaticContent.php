<?php

/**
 * This is the model class for table "cms_shop_static_content".
 *
 * The followings are the available columns in table 'cms_shop_static_content':
 * @property integer $ssc_id
 * @property integer $ssc_shop_id
 * @property string $ssc_name
 * @property string $ssc_title
 * @property string $ssc_contetn
 */
class CmsShopStaticContent extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cms_shop_static_content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ssc_shop_id', 'required'),
			array('ssc_shop_id', 'numerical', 'integerOnly'=>true),
			array('ssc_name', 'length', 'max'=>80),
			array('ssc_title', 'length', 'max'=>140),
			array('ssc_contetn', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ssc_id, ssc_shop_id, ssc_name, ssc_title, ssc_contetn', 'safe', 'on'=>'search'),
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
			'ssc_id' => 'Ssc',
			'ssc_shop_id' => 'Ssc Shop',
			'ssc_name' => 'Ssc Name',
			'ssc_title' => 'Ssc Title',
			'ssc_contetn' => 'Ssc Contetn',
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

		$criteria->compare('ssc_id',$this->ssc_id);
		$criteria->compare('ssc_shop_id',$this->ssc_shop_id);
		$criteria->compare('ssc_name',$this->ssc_name,true);
		$criteria->compare('ssc_title',$this->ssc_title,true);
		$criteria->compare('ssc_contetn',$this->ssc_contetn,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CmsShopStaticContent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
