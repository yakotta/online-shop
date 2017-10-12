<div class="panel panel-default">
    <div class="panel-body">
        There are <?=$num_products?> products
        <a href='/product/create'>Create Product</a><br/>
    </div>
</div>

<div class="panel panel-default">
    <!-- Table -->
    <table class="table">
        <thead>
             <tr> 
                <th>id #</th>
                <th>Name</th>
                <th>Info</th>
                <th>Quantity</th>
                <th class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($product_list as $product):?>
                <tr>
                    <td>
                        <?=$product["id"]?>
                    </td>
                    <td>
                        <?=$product["name"]?>
                    </td>
                    <td>
                        <?=$product["info"]?>
                    </td>
                    <td>
                        <?=$product["quantity"]?>
                    </td>
                    <td>
                        <a class="btn btn-xs btn-default" href="/product/details?id=<?=$product["id"]?>">
                            View Details
                        </a>
                        <a class="btn btn-xs btn-primary" href="/order/list/?product=<?=$product["id"]?>">
                            View Orders
                        </a>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>