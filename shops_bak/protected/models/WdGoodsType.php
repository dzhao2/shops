<?php

/**
 * This is the model class for table "wd_goods_type".
 *
 * The followings are the available columns in table 'wd_goods_type':
 * @property integer $gt_id
 * @property integer $gt_goods_id
 * @property string $gt_title
 * @property double $gt_price
 */
class WdGoodsType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'wd_goods_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gt_id, gt_goods_id', 'numerical', 'integerOnly'=>true),
			array('gt_price', 'numerical'),
			array('gt_title', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('gt_id, gt_goods_id, gt_title, gt_price', 'safe', 'on'=>'search'),
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
			'gt_id' => 'Gt',
			'gt_goods_id' => 'Gt Goods',
			'gt_title' => 'Gt Title',
			'gt_price' => 'Gt Price',
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

		$criteria->compare('gt_id',$this->gt_id);
		$criteria->compare('gt_goods_id',$this->gt_goods_id);
		$criteria->compare('gt_title',$this->gt_title,true);
		$criteria->compare('gt_price',$this->gt_price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WdGoodsType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
