<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $header . '_header' . EXT ;?>
<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $sidebar . '_sidebar' . EXT ;?>
<div id="content">
    <div id="unit-view">
        <div class="unit-number">Unit # <span><?php echo $unit?></span></div>
        <div class="tenant-list">
            <?php foreach($tenants as $tenant): ?>
                <a  href="<?php echo base_url(); ?>tenants/view/<?php echo $tenant['tenant_id']; ?>" class="tenant">
                    <img src="<?php echo asset_url(); ?>uploads/tenants/<?php echo $tenant['image']; ?>.jpg">
                    <h1><?php echo $tenant['lastname'] . ', ' . $tenant['firstname'] ; ?></h1>
                    <?php if (isset($tenant['mobile_number'])): ?>
                    <span class="mobile tenant-info"><?php echo $tenant['mobile_number'];?></span>
                    <?php endif; ?>
                    <?php if (isset($tenant['email_address'])): ?>
                    <span class="email tenant-info"><?php echo $tenant['email_address'];?></span>
                    <?php endif; ?>
                </a>
            <?php endforeach;?>
            <?php if($tenant_count < 3) :?>
                <a href="<?php echo base_url(); ?>tenants/add/<?php echo $unit?>" class="add-tenant">
                    <h1>Add Tenant</h1>
                </a>
            <?php endif;?>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $footer . '_footer' . EXT ;?>