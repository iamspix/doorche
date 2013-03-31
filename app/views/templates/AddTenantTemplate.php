<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $header . '_header' . EXT; ?>
<div id="content" class="no-sidebar">
    <div id="add-tenant">
        <form method="POST" action="<?php echo base_url();?>tenants/register">
            <h1>Register a Tenant</h1>
            <input name="lastname" type="text" placeholder="Lastname*" maxlength="128" required>
            <input name="firstname" type="text" placeholder="Firstname*" maxlength="128" required>
            <input name="mobile" type="text" placeholder="Mobile Number*" pattern="((\+63)|(63)|0)?\d{10}" required>
            <select name="gender" required>
                <option>Gender*</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <h1>Select a Unit</h1>
            <label for="apartment">Apartment:</label>
            <?php if(isset($reg_info['apartment_key'])): ?>
            <select disabled>
                <option selected><?php echo $reg_info['apartment_key'];?></option>
            </select>
            <input name="apartment" type="hidden" value="<?php echo $reg_info['apartment_key'];?>">
            <?php else:?>
            <input class="apt-select" type="text" name="apartment">
            <?php endif;?>

            <label for="unit">Unit:</label>
            <?php if(isset($reg_info['unit_id'])): ?>
            <select disabled>
                <option selected><?php echo $reg_info['unit_id'];?></option>
            </select>
            <input name="unit" type="hidden" value="<?php echo $reg_info['unit_id'];?>">
            <?php else:?>
            <input class="unit-select" type="text" name="unit">
            <?php endif;?>

            <h1>Continue</h1>
            <input type="submit" class="button" value="Add Tenant">
        </form>
    </div>
</div>
<div class="clearfix"></div>
<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $footer . '_footer' . EXT; ?>