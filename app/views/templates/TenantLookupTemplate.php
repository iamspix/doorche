<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $header . '_header' . EXT ;?>
<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $sidebar . '_sidebar' . EXT ;?>
<div id="content">
    <div id="tenant-lookup">
        <?php print_r($tenant);?>
        <div>
            <img src="<?php echo asset_url(); ?>uploads/tenants/<?php echo $tenant['image']; ?>.jpg">
            <h1><?php echo $tenant['lastname'] . ', ' . $tenant['firstname'] ; ?></h1>
            <span class="mobile tenant-info">Mobile: <?php echo $tenant['mobile_number'];?></span><br>
            <span class="email tenant-info">Email: <?php echo $tenant['email_address'];?></span>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $footer . '_footer' . EXT ;?>