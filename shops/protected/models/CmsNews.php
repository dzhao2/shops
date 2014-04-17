<?php

/**
 * This is the model class for table "cms_news".
 *
 * The followings are the available columns in table 'cms_news':
 * @property integer $n_id
 * @property integer $n_shop_id
 * @property string $n_title
 * @property string $n_createdate
 * @property string $n_updatedate
 * @property string $n_author
 * @property string $n_picurl
 * @property string $n_content
 * @property integer $n_category_id
 */
class CmsNews extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cms_news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('n_shop_id', 'required'),
			array('n_shop_id, n_category_id', 'numerical', 'integerOnly'=>true),
			array('n_title', 'length', 'max'=>280),
			array('n_author', 'length', 'max'=>40),
			array('n_picurl', 'length', 'max'=>140),
			array('n_createdate, n_updatedate, n_content', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('n_id, n_shop_id, n_title, n_createdate, n_updatedate, n_author, n_picurl, n_content, n_category_id', 'safe', 'on'=>'search'),
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
			'n_id' => 'N',
			'n_shop_id' => 'N Shop',
			'n_title' => 'N Title',
			'n_createdate' => 'N Createdate',
			'n_updatedate' => 'N Updatedate',
			'n_author' => 'N Author',
			'n_picurl' => 'N Picurl',
			'n_content' => 'N Content',
			'n_category_id' => 'N Category',
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

		$criteria->compare('n_id',$this->n_id);
		$criteria->compare('n_shop_id',$this->n_shop_id);
		$criteria->compare('n_title',$this->n_title,true);
		$criteria->compare('n_createdate',$this->n_createdate,true);
		$criteria->compare('n_updatedate',$this->n_updatedate,true);
		$criteria->compare('n_author',$this->n_author,true);
		$criteria->compare('n_picurl',$this->n_picurl,true);
		$criteria->compare('n_content',$this->n_content,true);
		$criteria->compare('n_category_id',$this->n_category_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CmsNews the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
