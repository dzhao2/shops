<?php

/**
 * This is the model class for table "wd_shop".
 *
 * The followings are the available columns in table 'wd_shop':
 * @property integer $sh_id
 * @property string $sh_title
 * @property string $sh_weixin
 * @property string $sh_desc
 * @property integer $sh_recm_1
 * @property integer $sh_recm_2
 * @property integer $sh_recm_3
 * @property integer $sh_recm_4
 */
class WdShop extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'wd_shop';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sh_id', 'required'),
			array('sh_id, sh_recm_1, sh_recm_2, sh_recm_3, sh_recm_4', 'numerical', 'integerOnly'=>true),
			array('sh_title, sh_weixin', 'length', 'max'=>45),
			array('sh_desc', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('sh_id, sh_title, sh_weixin, sh_desc, sh_recm_1, sh_recm_2, sh_recm_3, sh_recm_4', 'safe', 'on'=>'search'),
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
			'sh_id' => 'ID',
			'sh_title' => '店铺名称',
			'sh_weixin' => '微信账号',
			'sh_desc' => '店铺描述',
			'sh_recm_1' => '店长推荐商品1',
			'sh_recm_2' => '店长推荐商品2',
			'sh_recm_3' => '店长推荐商品3',
			'sh_recm_4' => '店长推荐商品4',
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

		$criteria->compare('sh_id',$this->sh_id);
		$criteria->compare('sh_title',$this->sh_title,true);
		$criteria->compare('sh_weixin',$this->sh_weixin,true);
		$criteria->compare('sh_desc',$this->sh_desc,true);
		$criteria->compare('sh_recm_1',$this->sh_recm_1);
		$criteria->compare('sh_recm_2',$this->sh_recm_2);
		$criteria->compare('sh_recm_3',$this->sh_recm_3);
		$criteria->compare('sh_recm_4',$this->sh_recm_4);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WdShop the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
