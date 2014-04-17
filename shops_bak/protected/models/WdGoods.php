<?php

/**
 * This is the model class for table "wd_goods".
 *
 * The followings are the available columns in table 'wd_goods':
 * @property integer $g_id
 * @property string $g_title
 * @property integer $g_default_pic
 * @property integer $g_default_type
 */
class WdGoods extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'wd_goods';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('g_default_pic, g_default_type', 'numerical', 'integerOnly'=>true),
			array('g_title', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('g_id, g_title, g_default_pic, g_default_type', 'safe', 'on'=>'search'),
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
			'pictures' => array(self::HAS_MANY, 'WdGoodsPicture', 'gp_goods_id'),
			'types' => array(self::HAS_MANY, 'WdGoodsType', 'gt_goods_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'g_id' => 'ID',
			'g_title' => '商品标题',
			'g_default_pic' => 'G Default Pic',
			'g_default_type' => 'G Default Type',
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
		$criteria->compare('g_title',$this->g_title,true);
		$criteria->compare('g_default_pic',$this->g_default_pic);
		$criteria->compare('g_default_type',$this->g_default_type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WdGoods the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
