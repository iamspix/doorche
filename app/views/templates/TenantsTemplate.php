<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $header . '_header' . EXT ;?>
<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $sidebar . '_sidebar' . EXT ;?>
<div id="content">
    <div id="tenant-list">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Unit No.</th>
                    <th>Apt No.</th>
                    <th colspan="3">Manage</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tenants as $tenant):?>
                    <tr>
                        <td><?php echo ucfirst($tenant['lastname']) . ', ' . ucfirst($tenant['firstname']);?></td>
                        <td><?php echo ucfirst($tenant['unit_id']);?></td>
                        <td><?php echo ucfirst($tenant['apartment_key']);?></td>
                        <td colspan="3"><a href="<?php echo base_url() . 'tenants/delete/' . $tenant['tenant_id']?>">Delete</a></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<div class="clearfix"></div>
<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $footer . '_footer' . EXT ;?>