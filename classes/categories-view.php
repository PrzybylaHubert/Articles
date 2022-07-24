<?php
    require_once('categories.php');

    class categoriesView extends categories{

        public function displayCategories(){
            $categories = $this->queryAllCategories();
            foreach($categories as $category){
                echo "<option value='$category[id]'>$category[name]</option>";
            }
        }

        public function getCategory($category_id){
            $category = $this->queryCategory($category_id);
            return $category;
        }
    }
?>