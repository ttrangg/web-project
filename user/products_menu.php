<style>
    a:visited{
        border-bottom: 1px solid black;
    }
    
    input.search_box{
        border: 1px solid lightgrey;
        border-radius: 5px;
    }
</style>
<div class="flex-w flex-sb-m p-b-52">
    <div class="flex-w flex-l-m filter-tope-group m-tb-10">
        <!-- All Products -->
        <a href="products_all.php">
            <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter="*">
                All Products
            </button>
        </a>
        
        <!-- Women -->
        <a href="products_women.php">
            <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
                Women
            </button>
        </a>

        <!-- Men -->
        <a href="products_men.php">
            <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
                Men
            </button>
        </a>

        <!-- Bag -->
        <a href="products_bag.php">
            <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".bag">
                Bag
            </button>
        </a>

        <!-- Shoes -->
        <a href="products_shoes.php">
            <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".shoes">
                Shoes
            </button>
        </a>

        <!-- Watches -->
        <a href="products_watches.php">
            <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".watches">
                Watches
            </button>
        </a>
    </div>
<!--    <form method="get" action="search_resultl.php">
    <div class="flex-w flex-c-m m-tb-10">
        <button><i class="zmdi zmdi-search"></i></button>
        <input class="search_box " type="text" name="search" placeholder="Search">
        <input type="submit" value="Search">
    </div>
    </form>-->
    
</div>