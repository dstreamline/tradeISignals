<?php

class m140223_160826_add_table_signal extends CDbMigration
{
	public function up()
	{
        $this->createTable('sg_order', array(
            'id'          => 'pk',
            'tool'    => 'varchar (64) NOT NULL',
            'date_enter'     => 'datetime',
            'order_type' => "enum('buy','sell','buy_limit','sell_limit') NOT NULL",
            'enter_price'    => 'varchar (15) NOT NULL',

            'comment' =>  'varchar (256) ',
            'closed_date'     => 'datetime',
            'closed_price'     => 'varchar (15)',
            'result' => 'INT(10)'
        ));
	}

	public function down()
	{
        $this->dropTable('sg_order');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}