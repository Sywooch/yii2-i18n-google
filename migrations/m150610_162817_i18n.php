<?php
/**
 * @link https://github.com/borodulin/yii2-i18n-google
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-i18n-google/blob/master/LICENSE
 */

use yii\db\Schema;
use yii\db\Migration;

/**
 * 
 * @author Andrey Borodulin
 *
 */
class m150610_162817_i18n extends Migration
{
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {   
        $this->createTable('{{%i18n_message}}', [
                'id' => Schema::TYPE_PK,
                'category' => Schema::TYPE_STRING . '(32) NOT NULL',
                'message' => Schema::TYPE_TEXT . ' NOT NULL',
                'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
        
        $this->createTable('{{%i18m_translated_message}}', [
                'id' => Schema::TYPE_INTEGER . 'NOT NULL',
                'language' => Schema::TYPE_STRING . '(16) NOT NULL',
                'translation' => Schema::TYPE_TEXT,
                'PRIMARY KEY (id, language)',
        ]);
        $this->addforeignkey('fk_i18n_translated_message_message', '{{%i18n_message}}', 'id', '{{%i18m_translated_message}}', 'id', 'cascade', 'cascade');
        
    }
    
    public function safeDown()
    {
        $this->dropTable('{{%i18n_message}}');
        $this->dropTable('{{%i18n_translated_message}}');
    }
}
