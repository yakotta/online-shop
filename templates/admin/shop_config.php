<h3>Shop Configuration Details</h3>
    
<div class="panel panel-default">
    <!-- Table -->
    <table class="table data-table">
        <tbody>
            <?php foreach($shop_config_list as $config):?>
                <tr>
                    <td>
                        <span class="view-field"><?=$config["field"]?></span>
                        <input type="text" form="row_<?=$config["id"]?>" name="field" class="form-control edit-field hide" value="<?=$config["field"]?>" />
                    </td>
                    <td>
                        <span class="view-field"><?=$config["value"]?></span>
                        <input type="text" form="row_<?=$config["id"]?>" name="value" class="form-control edit-field hide" value="<?=$config["value"]?>" />
                    </td>
                    <td>
                        <button class="btn btn-default toggle-edit-field view-field">Edit</button>
                        <form id="row_<?=$config["id"]?>" class="edit-field hide" method="post" action="/api/admin/config/edit">
                            <input type="hidden" name="id" value="<?=$config["id"]?>" />
                            <button type="submit" class="btn btn-default">Save</button>
                            <a class="btn btn-danger" href="/api/admin/config/delete?id=<?=$config["id"]?>">Delete</a>
                        </form>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
        <tfoot>
            <tr>
                <td>
                    <input type="text" name="field" form="row_new" class="form-control" />
                </td>
                <td>
                    <input type="text" name="value" form="row_new" class="form-control" />
                </td>
                <td>
                    <form id="row_new" method="post" action="/api/admin/config/create">
                        <button type="submit" class="btn btn-default">Create New</button>
                    </form>
                </td>
            </tr>
        </tfoot>
    </table>
</div>