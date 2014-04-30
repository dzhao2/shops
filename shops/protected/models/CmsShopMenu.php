<?php

/**
 * This is the model class for table "cms_shop_menu".
 *
 * The followings are the available columns in table 'cms_shop_menu':
 * @property integer $sm_id
 * @property integer $sm_shop_id
 * @property string $sm_picurl
 * @property string $sm_title
 * @property string $sm_desc
 * @property string $sm_linkurl
 * @property integer $sm_index
 * @property string $sm_group_id
 * @property string $sm_icon
 * @property string $sm_attr1
 * @property string $sm_attr2
 * @property string $sm_attr3
 * @property string $sm_attr4
 * @property string $sm_attr5
 */
class CmsShopMenu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cms_shop_menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sm_shop_id', 'required'),
			array('sm_shop_id, sm_index', 'numerical', 'integerOnly'=>true),
			array('sm_picurl, sm_title, sm_linkurl', 'length', 'max'=>140),
			array('sm_desc', 'length', 'max'=>300),
			array('sm_group_id, sm_icon', 'length', 'max'=>45),
			array('sm_attr1, sm_attr2, sm_attr3, sm_attr4, sm_attr5', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('sm_id, sm_shop_id, sm_picurl, sm_title, sm_desc, sm_linkurl, sm_index, sm_group_id, sm_icon, sm_attr1, sm_attr2, sm_attr3, sm_attr4, sm_attr5', 'safe', 'on'=>'search'),
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
			'sm_id' => 'Sm',
			'sm_shop_id' => 'Sm Shop',
			'sm_picurl' => 'Sm Picurl',
			'sm_title' => 'Sm Title',
			'sm_desc' => 'Sm Desc',
			'sm_linkurl' => 'Sm Linkurl',
			'sm_index' => 'Sm Index',
			'sm_group_id' => 'Sm Group',
			'sm_icon' => 'Sm Icon',
			'sm_attr1' => 'Sm Attr1',
			'sm_attr2' => 'Sm Attr2',
			'sm_attr3' => 'Sm Attr3',
			'sm_attr4' => 'Sm Attr4',
			'sm_attr5' => 'Sm Attr5',
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

		$criteria->compare('sm_id',$this->sm_id);
		$criteria->compare('sm_shop_id',$this->sm_shop_id);
		$criteria->compare('sm_picurl',$this->sm_picurl,true);
		$criteria->compare('sm_title',$this->sm_title,true);
		$criteria->compare('sm_desc',$this->sm_desc,true);
		$criteria->compare('sm_linkurl',$this->sm_linkurl,true);
		$criteria->compare('sm_index',$this->sm_index);
		$criteria->compare('sm_group_id',$this->sm_group_id,true);
		$criteria->compare('sm_icon',$this->sm_icon,true);
		$criteria->compare('sm_attr1',$this->sm_attr1,true);
		$criteria->compare('sm_attr2',$this->sm_attr2,true);
		$criteria->compare('sm_attr3',$this->sm_attr3,true);
		$criteria->compare('sm_attr4',$this->sm_attr4,true);
		$criteria->compare('sm_attr5',$this->sm_attr5,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CmsShopMenu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function makeCopy($shopid){
		$menu = new CmsShopMenu;
		$menu->sm_shop_id = $shopid;
		$menu->sm_picurl = $this->sm_picurl;
		$menu->sm_title = $this->sm_title;
		$menu->sm_desc = $this->sm_desc;
		$menu->sm_linkurl = $this->sm_linkurl;
		$menu->sm_index = $this->sm_index;
		$menu->sm_group_id = $this->sm_group_id;
		$menu->sm_icon = $this->sm_icon;
		$menu->sm_attr1= $this->sm_attr1;
		$menu->sm_attr2= $this->sm_attr2;
		$menu->sm_attr3= $this->sm_attr3;
		$menu->sm_attr4= $this->sm_attr4;
		$menu->sm_attr5= $this->sm_attr5;
		return $menu;
	}
}
