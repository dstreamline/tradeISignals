<?php

/**
 * This is the model class for table "sg_order".
 *
 * The followings are the available columns in table 'sg_order':
 * @property integer $id
 * @property string $tool
 * @property string $date_enter
 * @property string $order_type
 * @property string $enter_price
 * @property string $comment
 * @property string $closed_date
 * @property string $closed_price
 * @property integer $result
 */
class SgOrder extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sg_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tool, order_type, enter_price', 'required'),
			array('result', 'numerical', 'integerOnly'=>true),
			array('tool', 'length', 'max'=>64),
			array('order_type', 'length', 'max'=>10),
			array('enter_price, closed_price', 'length', 'max'=>15),
			array('comment', 'length', 'max'=>256),
			array('date_enter, closed_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tool, date_enter, order_type, enter_price, comment, closed_date, closed_price, result', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'tool' => 'Валютная пара',
			'date_enter' => 'Дата/Время открытия ордера',
			'order_type' => 'Тип ордера (buy/sell)',
			'enter_price' => 'Цена входа',
			'comment' => 'Комментарий',
			'closed_date' => 'Дата/Время закрытия ордера',
			'closed_price' => 'Цена выхода',
			'result' => 'Количество полученных пунктов',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('tool',$this->tool,true);
		$criteria->compare('date_enter',$this->date_enter,true);
		$criteria->compare('order_type',$this->order_type,true);
		$criteria->compare('enter_price',$this->enter_price,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('closed_date',$this->closed_date,true);
		$criteria->compare('closed_price',$this->closed_price,true);
		$criteria->compare('result',$this->result);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SgOrder the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
