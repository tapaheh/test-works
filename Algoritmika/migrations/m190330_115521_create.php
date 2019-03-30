<?php

use yii\db\Migration;

/**
 * Class m190330_115521_create
 */
class m190330_115521_create extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('CREATE TABLE `teacher` (
            `id`  int NOT NULL AUTO_INCREMENT ,
            `name`  varchar(255) NOT NULL ,
            PRIMARY KEY (`id`),
            INDEX `teacher_name_indx` (`name`) 
        )
        ENGINE=InnoDB
        DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci');

        $this->execute('CREATE TABLE `group` (
            `id`  int NOT NULL AUTO_INCREMENT ,
            `name`  varchar(255) NOT NULL ,
            `teacher_id`  int NOT NULL ,
            PRIMARY KEY (`id`),
            CONSTRAINT `group_techer_fk` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        )
        ENGINE=InnoDB
        DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci');

        $this->execute('CREATE TABLE `lesson` (
            `id`  int NOT NULL AUTO_INCREMENT ,
            `name`  varchar(255) NOT NULL ,
            `time`  timestamp NULL DEFAULT NULL ,
            PRIMARY KEY (`id`),
            INDEX `lesson_name_indx` (`name`) ,
            INDEX `lesson_time_indx` (`time`) 
        )
        ENGINE=InnoDB
        DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci');

        $this->execute('CREATE TABLE `lesson_group` (
            `lesson_id`  int NOT NULL ,
            `group_id`  int NOT NULL ,
            PRIMARY KEY (`lesson_id`, `group_id`),
            CONSTRAINT `lesson_fk` FOREIGN KEY (`lesson_id`) REFERENCES `lesson` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `group_fk` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        )
        ENGINE=InnoDB
        DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190330_115521_create cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190330_115521_create cannot be reverted.\n";

        return false;
    }
    */
}
