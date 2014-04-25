<?php

/**
 * This is the model class for table "cms_goods".
 *
 * The followings are the available columns in table 'cms_goods':
 * @property integer $g_id
 * @property integer $g_shop_id
 * @property string $g_title
 * @property double $g_price
 * @property string $g_picurl
 * @property string $g_createdate
 * @property string $g_updatedate
 * @property string $g_detail
 * @property integer $g_category_id
 * @property integer $g_count
 */
class CmsGoods extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cms_goods';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('g_shop_id', 'required'),
			array('g_shop_id, g_category_id, g_count', 'numerical', 'integerOnly'=>true),
			array('g_price', 'numerical'),
			array('g_title', 'length', 'max'=>280),
			array('g_picurl', 'length', 'max'=>140),
			array('g_createdate, g_updatedate, g_detail', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('g_id, g_shop_id, g_title, g_price, g_picurl, g_createdate, g_updatedate, g_detail, g_category_id, g_count', 'safe', 'on'=>'search'),
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
			'g_id' => 'ID',
			'g_shop_id' => '网站ID',
			'g_title' => '商品标题',
			'g_price' => '商品价格',
			'g_picurl' => '商品图片',
			'g_createdate' => '创建日期',
			'g_updatedate' => '更新日期',
			'g_detail' => '详细信息',
			'g_category_id' => '类别',
			'g_count' => '库存',
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

		$criteria->compare('g_id',$this->g_id);
		$criteria->compare('g_shop_id',$this->g_shop_id);
		$criteria->compare('g_title',$this->g_title,true);
		$criteria->compare('g_price',$this->g_price);
		$criteria->compare('g_picurl',$this->g_picurl,true);
		$criteria->compare('g_createdate',$this->g_createdate,true);
		$criteria->compare('g_updatedate',$this->g_updatedate,true);
		$criteria->compare('g_detail',$this->g_detail,true);
		$criteria->compare('g_category_id',$this->g_category_id);
		$criteria->compare('g_count',$this->g_count);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CmsGoods the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
