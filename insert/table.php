<?php 
 global $wpdb;
        //table name
        $table_name = $wpdb->prefix."all_student";
        //table in rows
        $sqls = ["CREATE TABLE  IF NOT EXISTS {$table_name}(
                id INT NOT NULL AUTO_INCREMENT,
                name VARCHAR(250),  
                birth VARCHAR(250),  
                father VARCHAR(250), 
                mother VARCHAR(250), 
                address VARCHAR(250), 
                email VARCHAR(250), 
                phone VARCHAR(11), 
                PRIMARY KEY(id)

    )"];
   /* require_once(ABSPATH."wp-admin/includes/upgrade.php");
         dbDelta($sql);

         add_option("dbdemo_db_version",DBDEMO_DB_VERSION);
*/

 ?>

