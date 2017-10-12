<h2>Product Info</h2>
<p>id #: <?=$product["id"]?></p>

<div class="product-data">
    <p>Name: <?=$product["name"]?></p>
    <p>Info: <?=$product["info"]?></p>
    <p>Quantity: <?=$product["quantity"]?></p>
    <button class="btn btn-default toggle-hidden-form">
        Edit product info
    </button>
</div>

<form class="hide hidden-form" method="post" action="/api/product/edit">
    <input type="hidden" name="id" value="<?=$product["id"]?>" />
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="edit-product-name">Name</span>
            <input type="text" name="name" class="form-control" aria-describedby="edit-product-name" value="<?=$product["name"]?>"/>
        </div>
    </div>
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="edit-product-info">Info</span>
            <input type="text" name="info" class="form-control" aria-describedby="edit-product-info" value="<?=$product["info"]?>"/>
        </div>
    </div>
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="edit-product-quantity">quantity</span>
            <input type="text" name="quantity" class="form-control" aria-describedby="edit-product-quantity" value="<?=$product["quantity"]?>"/>
        </div>
    </div>
    <button class="btn btn-default">
        Save product info
    </button>
</form>

<a class="btn btn-danger" href="/api/product/delete?id=<?=$product["id"]?>">Delete Product</a>