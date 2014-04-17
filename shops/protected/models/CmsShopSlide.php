<?php

/**
 * This is the model class for table "cms_shop_slide".
 *
 * The followings are the available columns in table 'cms_shop_slide':
 * @property integer $ss_id
 * @property integer $ss_shop_id
 * @property string $ss_picurl
 * @property string $ss_title
 * @property string $ss_desc
 * @property string $ss_linkurl
 * @property integer $ss_index
 * @property string $ss_group_id
 */
class CmsShopSlide extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cms_shop_slide';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ss_shop_id', 'required'),
			array('ss_shop_id, ss_index', 'numerical', 'integerOnly'=>true),
			array('ss_picurl, ss_title, ss_linkurl', 'length', 'max'=>140),
			array('ss_desc', 'length', 'max'=>300),
			array('ss_group_id', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ss_id, ss_shop_id, ss_picurl, ss_title, ss_desc, ss_linkurl, ss_index, ss_group_id', 'safe', 'on'=>'search'),
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
			'ss_id' => 'Ss',
			'ss_shop_id' => 'Ss Shop',
			'ss_picurl' => 'Ss Picurl',
			'ss_title' => 'Ss Title',
			'ss_desc' => 'Ss Desc',
			'ss_linkurl' => 'Ss Linkurl',
			'ss_index' => 'Ss Index',
			'ss_group_id' => 'Ss Group',
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

		$criteria->compare('ss_id',$this->ss_id);
		$criteria->compare('ss_shop_id',$this->ss_shop_id);
		$criteria->compare('ss_picurl',$this->ss_picurl,true);
		$criteria->compare('ss_title',$this->ss_title,true);
		$criteria->compare('ss_desc',$this->ss_desc,true);
		$criteria->compare('ss_linkurl',$this->ss_linkurl,true);
		$criteria->compare('ss_index',$this->ss_index);
		$criteria->compare('ss_group_id',$this->ss_group_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CmsShopSlide the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
