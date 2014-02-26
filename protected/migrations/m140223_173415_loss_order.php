<?php

class m140223_173415_loss_order extends CDbMigration
{
	public function up()
	{
        $this->createTable('sg_loss_order', array(
            'id'          => 'pk',
            'order_id' => 'int not null',
            'price'    => 'varchar (64) NOT NULL',
            'create_date' => 'datetime',
        ));
        $this->addForeignKey("fk_order_loss", "sg_loss_order", "order_id", "sg_order", "id", "CASCADE", "CASCADE");

    }

	public function down()
	{
        $this->dropForeignKey('fk_order_loss','sg_loss_order');
        $this->dropTable('sg_loss_order');
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