<?php

class Page extends BaseModel
{
    protected $table = 'navigation';
    protected $pk = 'page_id';

    public $page_id = 0;
    public $slug;
    public $title;
    public $content;
    public $template;
    public $name;

    

    public function save($data)
    {
        global $db;

        $data = [
            ':slug' => $this->slug,
            ':name' => $this->name,
            ':title' => $this->title,
            ':content' => $this->content,
            ':template' => $this->template,
        ];

        if ($this->page_id > 0) {
            //update
            $sql = 'UPDATE `navigation` 
                    SET `slug` = :slug, `name` = :name, `title` = :title, `content` = :content, `template` = :template
                    WHERE `page_id` = :page_id ';

            $data['page_id'] = $this->page_id;

            $update_statement = $db->prepare($sql);
            $update_statement->execute($data);
        } else {
            //insert
            $sql = 'INSERT INTO `navigation` (`slug`, `name`, `title`, `content`, `template`)
                    VALUES (:slug, :name, :title, :content, :template)';

            $insert_statement = $db->prepare($sql);
            $insert_statement->execute($data);

            $this->page_id = $db->lastInsertId();
        }
    }
    public static function deleteAdminPage($page_id)
    {
        global $db;
        $sql = 'DELETE FROM `navigation` WHERE `page_id` = :page_id';

        $stmnt = $db->prepare($sql);
        $stmnt->execute([ ':page_id' =>$page_id ]);
    }
}
