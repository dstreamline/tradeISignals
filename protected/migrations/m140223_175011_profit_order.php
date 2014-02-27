<?php

class m140223_175011_profit_order extends CDbMigration
{
	public function up()
	{
        $this->createTable('sg_profit_order', array(
            'id'          => 'pk',
            'order_id' => 'int not null',
            'price'    => 'varchar (64) NOT NULL',
            'create_date' => 'datetime',
        ),'ENGINE = InnoDB COLLATE utf8_general_ci');
        $this->addForeignKey("fk_order_profit", "sg_profit_order", "order_id", "sg_order", "id", "CASCADE", "CASCADE");

    }

	public function down()
	{
        $this->dropForeignKey('fk_order_profit','sg_profit_order');
        $this->dropTable('sg_profit_order');
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