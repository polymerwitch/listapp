<?php

class m130724_173022_create_mglist_table extends CDbMigration
  {
    protected $MySqlOptions = 'ENGINE=InnoDB CHARSET=utf8 COLLATE=utf8_unicode_ci';
    public $tablePrefix;
    public $tableName;

    public function before() {
      $this->tablePrefix = Yii::app()->getDb()->tablePrefix;
      if ($this->tablePrefix <> '')
        $this->tableName = $this->tablePrefix.'mglist';
    }

  	public function safeUp()
  	{
  	  $this->before();
   $this->createTable($this->tableName, array(
              'id' => 'pk',
              'address' => 'string NOT NULL',
              'name' => 'string NOT NULL',
              'description' => 'text',
              'access_level'=> 'string NOT NULL',
              'created_at' => 'DATETIME NOT NULL DEFAULT 0',
              'modified_at' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
                ), $this->MySqlOptions);
               $this->createIndex('mglist_id', $this->tableName , 'id', true);
  	}

  	public function safeDown()
  	{
  	  	$this->before();
        $this->dropIndex('mglist_id', $this->tableName);
  	    $this->dropTable($this->tableName);
  	}
}