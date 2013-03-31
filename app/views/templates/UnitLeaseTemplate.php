<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $header . '_header' . EXT; ?>
<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $sidebar . '_sidebar' . EXT; ?>
<div id="content">
    <div id="lease-unit">
        <form method="POST" action="<?php echo base_url();?>units/leaseSubmit">
            <h1>Rent</h1>
            <input type="text" value="<?php echo $tenant_info['tenant_id'];?>" placeholder="Tenant Identification" disabled>
            <input name="tenant_id" type="hidden" value="<?php echo $tenant_info['tenant_id'];?>">
            <input name="firstname" type="text" value="<?php echo ucwords($tenant_info['firstname']);?>" disabled placeholder="First Name">
            <input name="lastname" type="text" value="<?php echo ucwords($tenant_info['lastname']);?>" disabled placeholder="Last Name">
            <input type="text" placeholder="Unit ID*" value="<?php echo$tenant_info['unit_id'];?>" disabled required>
            <input type="hidden"  value="<?php echo $tenant_info['unit_id'];?>" required>
            <input type="text" required placeholder="Date Today YYYY-MM-DD" value="<?php echo date("Y-m-d H:i:s")?>" disabled>
            <input name="deposit" type="text" placeholder="Deposit Amount*" required>
            <input type="hidden" name="rental_date" value="<?php echo date("m")?>">
            <input type="submit" class="button" value="Complete Registration">
        </form>
    </div>
</div>
<div class="clearfix"></div>
<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $footer . '_footer' . EXT; ?>