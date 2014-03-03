<?php

class m140303_193111_addColumnLotToOrder extends CDbMigration
{
	public function up()
	{
        $this->addColumn('sg_order', 'lotsize', 'varchar (32) AFTER enter_price');
	}

	public function down()
	{
        $this->dropColumn('sg_order','lotsize');
	}


}