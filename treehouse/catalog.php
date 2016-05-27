<?php 
include("incs/data.php");
include("incs/funcs.php");

$pageTitle = "Media Catalog";
$section = null;

if (isset($_GET["cat"])){
    if ($_GET["cat"] == "books"){
        $pageTitle = "Book Catalog";
        $section = "books";
    } else if ($_GET["cat"] == "movies"){
        $pageTitle = "Movie Catalog";
        $section = "movies";
    } else if ($_GET["cat"] == "music"){
        $pageTitle = "Music Catalog";
        $section = "music";
    } 
}

include("incs/header.php"); ?>

<div class=" section catalog page">
    
    
    <div class = "wrapper">
        <h1><?php 
            if ($section != null){
               echo "<a href ='catalog.php'> Full Catalog </a> &gt; "; 
            }
            echo $pageTitle ?></h1>
        
        <ul class ="items">
            <?php 
                    $categories = array_category($catalog,$section);
					foreach($categories as $id){
                    echo get_item_html($id, $catalog[$id]);        
                    } ?>
        </ul>
        
    </div>
</div>

<?php include("incs/footer.php"); ?>