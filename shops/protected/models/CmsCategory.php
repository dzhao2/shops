<?php

/**
 * This is the model class for table "cms_category".
 *
 * The followings are the available columns in table 'cms_category':
 * @property integer $sca_id
 * @property integer $sca_shop_id
 * @property integer $sca_parent_id
 * @property integer $sca_type
 * @property string $ssc_title
 */
class CmsCategory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cms_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sca_shop_id', 'required'),
			array('sca_shop_id, sca_parent_id, sca_type', 'numerical', 'integerOnly'=>true),
			array('ssc_title', 'length', 'max'=>140),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('sca_id, sca_shop_id, sca_parent_id, sca_type, ssc_title', 'safe', 'on'=>'search'),
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
			'sca_id' => 'Sca',
			'sca_shop_id' => 'Sca Shop',
			'sca_parent_id' => 'Sca Parent',
			'sca_type' => 'Sca Type',
			'ssc_title' => 'Ssc Title',
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

		$criteria->compare('sca_id',$this->sca_id);
		$criteria->compare('sca_shop_id',$this->sca_shop_id);
		$criteria->compare('sca_parent_id',$this->sca_parent_id);
		$criteria->compare('sca_type',$this->sca_type);
		$criteria->compare('ssc_title',$this->ssc_title,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CmsCategory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
