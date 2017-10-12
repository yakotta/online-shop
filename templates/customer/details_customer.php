<h2>Customer Info</h2>
<p>id #: <?=$customer["id"]?></p>

<div class="customer-data">
    <p>Name: <?=$customer["name"]?></p>
    <p>Email: <?=$customer["email"]?></p>
    <p>Phone: <?=$customer["phone"]?></p>
    <button class="btn btn-default toggle-hidden-form">
        Edit customer info
    </button>
</div>

<form class="hide hidden-form" method="post" action="/api/customer/edit">
    <input type="hidden" name="id" value="<?=$customer["id"]?>" />
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="edit-customer-name">Name</span>
            <input type="text" name="name" class="form-control" aria-describedby="edit-customer-name" value="<?=$customer["name"]?>"/>
        </div>
    </div>
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="edit-customer-email">Email</span>
            <input type="text" name="email" class="form-control" aria-describedby="edit-customer-email" value="<?=$customer["email"]?>"/>
        </div>
    </div>
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="edit-customer-phone">Phone</span>
            <input type="text" name="phone" class="form-control" aria-describedby="edit-customer-phone" value="<?=$customer["phone"]?>"/>
        </div>
    </div>
    <button class="btn btn-default">
        Save customer info
    </button>
</form>

<h3>Orders</h3>
<p>Most Recent Order: #xxxxxx open/fufilled/cancelled/etc.</p>
<button class="btn btn-default toggle-hidden-rows" 
        data-show-text="Show previous orders" 
        data-hide-text="Hide previous orders">Show previous orders</button>

<div class="panel panel-default">
    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>Order #</th>
                <th>Status</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    #xxx1
                </td>
                <td>
                    open/fufilled/cancelled/etc.
                </td>
                <td>
                    $xxx
                </td>
            </tr>
            <!---php foreach loop goes here--->
                <tr class="hide hidden-row">
                    <td>
                        #xxx2
                    </td>
                    <td>
                        open/fufilled/cancelled/etc.
                    </td>
                    <td>
                        $xxx
                    </td>
                </tr>
                <tr class="hide hidden-row">
                    <td>
                        #xxx3
                    </td>
                    <td>
                        open/fufilled/cancelled/etc.
                    </td>
                    <td>
                        $xxx
                    </td>
                </tr>
            <!---close php foreach--->
        </tbody>
    </table>
</div>

<a class="btn btn-danger" href="/api/customer/delete?id=<?=$customer["id"]?>">Delete Customer</a>