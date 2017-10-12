<div class="panel panel-default">
    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>id #</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Most Recent Order</th>
                <th class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($customer_list as $customer):?>
                <tr>
                    <td>
                        <?=$customer["id"]?>
                    </td>
                    <td>
                        <?=$customer["name"]?>
                    </td>
                    <td>
                        <?=$customer["email"]?>
                    </td>
                    <td>
                        <?=$customer["phone"]?>
                    </td>
                    <td>
                        #xxxxxx [status is color coded]
                    </td>
                    <td>
                        <a class="btn btn-xs btn-default" href="/customer/details?id=<?=$customer["id"]?>">
                            View Details
                        </a>
                        <a class="btn btn-xs btn-primary" href="/order/list/?product=<?=$customer["id"]?>">
                            View Orders
                        </a>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>