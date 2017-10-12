<form method="post" action="/api/product/create">
    <div class="form-group">
        Add a new product
    </div>
    
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="new-product-name">Name</span>
            <input type="text" name="name" class="form-control" aria-describedby="new-product-name" />
        </div>
    </div>
    
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="new-product-info">Info</span>
            <textarea name="info" class="form-control autoresize" aria-describedby="new-product-info" rows="1"></textarea>
        </div>
    </div>
    
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="new-product-quantity">Quantity</span>
            <input type="number" name="quantity" class="form-control" aria-describedby="new-product-quantity" />
        </div>
    </div>
    
    <div class="form-group">
        <button type="submit" class="submit-btn btn btn-default">Create Product</button>
    </div>
</form>