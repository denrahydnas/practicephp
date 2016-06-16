<?php 

include("incs/funcs.php");

$pageTitle = "Media Catalog";
$section = null;
$search = null;
$items_per_page = 8;

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

if (isset($_GET["s"])) ;{
    $search = filter_input(INPUT_GET, "s", FILTER_SANITIZE_STRING);
}

if (isset($_GET["pg"])) ;{
    $current_page = filter_input(INPUT_GET, "pg", FILTER_SANITIZE_NUMBER_INT);
}
if (empty($current_page)) {
    $current_page = 1;
}
$total_items = get_catalog_count($section,$search);
$total_pages = 1;
$offset = 0;
    if ($total_items >0) {
    $total_pages = ceil($total_items / $items_per_page);

    //limit results in redirection
    $limit_results = " ";
    if (!empty($search)) {
        $limit_results = "s=".urlencode(htmlspecialchars($search))."&";
    } else if (empty($section)) {
        $limit_results = "cat-" . $section . "&";
    }

    // redirect too lg page nos to last pg
    if ($current_page > $total_pages) {
        header("location:catalog.php?"
               . $limit_results
               . "pg=" . $total_pages);
    }
    // redirect too sm pg nos to first pg
    if ($current_page < 1) {
        header("location:catalog.php?"
               . $limit_results
               . "pg=1");
    }
    //determine the offset (number of items to skip for current page)
    // ie - on page 3 w 8 items per page, the offset would be 16

    $offset = ($current_page - 1) * $items_per_page;

    $pagination = "<div class='pagination'>";
    $pagination .=    "Pages: ";
        for ($i = 1;$i <= $total_pages;$i++){
            if($i == $current_page) {
               $pagination .= " <span>$i</span>";
            }else {
                $pagination .= " <a href='catalog.php?";
            if (!empty($search)) {
                $pagination .= "s=".urlencode(htmlspecialchars($search))."&";
            } else if (!empty($section)) {
                $pagination .= "cat=".$section."&";
            }
                $pagination .= "pg=$i'>$i</a>";
            }
        }
    $pagination .= "</div>";
}

if(!empty($search)) { 
    $catalog = search_catalog_array($search,items_per_page,$offset);
} else if(empty($section)) {
$catalog = full_catalog_array($items_per_page,$offset);
    }else{
 $catalog = category_catalog_array($section,$items_per_page,$offset);   
}

include("incs/header.php"); ?>

<div class=" section catalog page">
    
    
    <div class = "wrapper">
        <h1><?php 
            if ($search != null){
                echo "Search Results for \"".htmlspecialchars($search)."\"";
            } else {
                if ($section != null){
               echo "<a href ='catalog.php'> Full Catalog </a> &gt; "; 
            }
            echo $pageTitle; } ?></h1>
            <?php 
               if ($total_items < 1) {
                   echo "<p> No items were found matching that search term. </p>";
                   echo "<p> Search again, "
                       . "<a href=\"catalog.php\">Browse the Full Catalog </a> or "
                       . "<a href=\"suggest.php\">Make a Suggestion </a> </p>";
               } else {
        echo $pagination ?>
        <ul class ="items">
            <?php  
					foreach($catalog as $item){
                    echo get_item_html($item);        
                    } ?>
        </ul>
            <?php echo $pagination; } ?>
    </div>
</div>

<?php include("incs/footer.php"); ?>