<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="/"><?=get_shop_config("Shop Name")?></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="/">Customers <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/customer/list">List</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="/customer/create">Create</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="/">Products <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/product/list">List</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="/product/create">Create</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="/admin/config">Config</a></li>
                </ul>
                <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            </div>
        </div>
    </nav>
</header>