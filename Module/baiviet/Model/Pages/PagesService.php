<?php

namespace Module\baiviet\Model\Pages;

class PagesService extends \Model\DB implements \Model\IModelService, \Model\IModelToOptions {

    public $Id, $Name, $Images, $Content, $Des, $Keyword, $Title, $Alias;

    //put your code here
    public function __construct($pages = null) {
        parent::$TableName = prefixTable . "pages";
        parent::__construct();
        if ($pages) {
            if (!is_array($pages)) {
                $Id = $pages;
                $pages = $this->GetById($Id);
            }
            $this->Id = isset($pages["Id"]) ? $pages["Id"] : null;
            $this->Name = isset($pages["Name"]) ? $pages["Name"] : null;
            $this->Images = isset($pages["Images"]) ? $pages["Images"] : null;
            $this->Content = isset($pages["Content"]) ? $pages["Content"] : null;
            $this->Des = isset($pages["Des"]) ? $pages["Des"] : null;
            $this->Keyword = isset($pages["Keyword"]) ? $pages["Keyword"] : null;
            $this->Title = isset($pages["Title"]) ? $pages["Title"] : null;
            $this->Alias = isset($pages["Alias"]) ? $pages["Alias"] : null;
        }
    }

    public function Delete($Id) {
        
    }

    public function GetById($Id) {
        
    }

    public function GetItems($param, $indexPage, $pageNumber, &$total) {
        $where = "`name` like '%{$param["keyword"]}%' ";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function Post($model) {
        
    }

    public function Put($model) {
        
    }

    public static function ToSelect() {
        
    }

    public static function btnPost() {
        ?> 
        <a href="/baiviet/pages/post" class="btn btn-success" >Thêm Mới</a>
        <?php
    }

}
