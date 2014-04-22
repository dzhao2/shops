<?php

/**
 * This is the model class for table "cms_shop".
 *
 * The followings are the available columns in table 'cms_shop':
 * @property integer $sh_id
 * @property string $sh_title
 * @property string $sh_weixin
 * @property string $sh_tempid
 * @property integer $sh_isfake
 */
class CmsShop extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cms_shop';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sh_title, sh_weixin', 'required'),
			array('sh_isfake', 'numerical', 'integerOnly'=>true),
			array('sh_title, sh_weixin', 'length', 'max'=>80),
			array('sh_tempid', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('sh_id, sh_title, sh_weixin, sh_tempid, sh_isfake', 'safe', 'on'=>'search'),
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
			'menus'=>array(self::HAS_MANY, 'CmsShopMenu', 'sm_shop_id'),
			'cmsAttributes'=>array(self::HAS_MANY, 'CmsShopAttribute', 'sa_shop_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sh_id' => '编号',
			'sh_title' => '标题',
			'sh_weixin' => '微信账号',
			'sh_tempid' => '模板id',
			'sh_isfake' => '是否草稿',
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
		$criteria->compare('sh_tempid',$this->sh_tempid,true);
		$criteria->compare('sh_isfake',$this->sh_isfake);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CmsShop the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	private $menuGroupMap ;
	public function initMenuGroup(){
		$this->menuGroupMap = array();
		for( $i = 0 , $len = count( $this->menus ); $i < $len ; $i ++ ){
			$menu = $this->menus[$i];
			if( !isset($this->menuGroupMap[$menu->sm_group_id]) ){
				$this->menuGroupMap[$menu->sm_group_id] = array();
			} 
			
			array_push( $this->menuGroupMap[$menu->sm_group_id], $menu );
		}
		foreach( $this->menuGroupMap as $group ){
			usort( $group, 'self::menuCompare');
		}
	}
	private
	function menuCompare($m1, $m2){
		if( $m1->sm_index > $m2->sm_index )
			return 1;
		return -1;
	}
	public function getMenuGroup($groupId){
		if( !isset($this->menuGroupMap) ){
			$this->initMenuGroup();
		}
		if( isset($this->menuGroupMap[ $groupId ] ) )
			return $this->menuGroupMap[ $groupId ];
		return array();
	}
	private $cmsAttributeMap;
	public function getCmsAttribute($attrName){
		if( !isset( $this->cmsAttributeMap ) ) {
			$this->cmsAttributeMap = array();
			foreach( $this->cmsAttributes as $attr ) {
				$this->cmsAttributeMap[ $attr->sa_name] = $attr;
			}
		}
		return isset($this->cmsAttributeMap[$attrName])?$this->cmsAttributeMap[$attrName]:null;
	}
	
	public function getCmsAttributeValue($attrName){
		$attr = $this->getCmsAttribute($attrName);
		if( isset( $attr ) ){
			return $attr->sa_value;
		}
		return '';
	}
}
