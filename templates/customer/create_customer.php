<form method="post" action="/api/customer/create">
    <div class="form-group">
        New Customer Information
    </div>
    
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-user" id="new-customer-name"></span>
            <input type="text" name="name" placeholder="Name" class="form-control" aria-describedby="new-customer-name">
        </div>
    </div>
    
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-envelope" id="new-customer-email"></span>
            <input type="text" name="email" placeholder="Email" class="form-control" aria-describedby="new-customer-email">
        </div>
    </div>
    
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-earphone" id="new-customer-phone"></span>
            <input type="text" name="phone" placeholder="Phone" class="form-control" aria-describedby="new-customer-phone">
        </div>
    </div>
    
    <div class="form-group">
        <button type="submit" class="submit-btn btn btn-default">Create Customer</button>
    </div>
</form>