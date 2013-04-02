<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $header . '_header' . EXT; ?>
<div id="content" class="no-sidebar">
    <div id="lease-unit">
        <form method="POST" action="<?php echo base_url();?>units/occupy">
            <h1>Rent</h1>
            <label>Tenant ID:</label>
            <input type="text" value="<?php echo $tenant_info['tenant_id'];?>" placeholder="Tenant Identification" disabled>
            <input name="tenant_id" type="hidden" value="<?php echo $tenant_info['tenant_id'];?>">
            <label>First Name:</label>
            <input name="firstname" type="text" value="<?php echo ucwords($tenant_info['firstname']);?>" disabled placeholder="First Name">
            <label>Last Name:</label>
            <input name="lastname" type="text" value="<?php echo ucwords($tenant_info['lastname']);?>" disabled placeholder="Last Name">
            <label>Unit Number:</label>
            <input type="text" placeholder="Unit ID*" value="<?php echo$tenant_info['unit_id'];?>" disabled required>
            <input type="hidden"  value="<?php echo $tenant_info['unit_id'];?>" required>
            <label>Date and Time(Today):</label>
            <input type="text" required placeholder="Date Today YYYY-MM-DD" value="<?php echo date("Y-m-d H:i:s")?>" disabled>
            <label>Deposit:</label>
            <input name="deposit" type="text" placeholder="Deposit Amount*" required>
            <label>Advance:</label>
            <input name="advance" type="text" placeholder="Advance Amount" required>
            <input type="hidden" name="rental_date" value="<?php echo date("d")?>">
            <input type="submit" class="button btn" value="Complete Lease">
        </form>
    </div>
</div>
<div class="clearfix"></div>
<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $footer . '_footer' . EXT; ?>