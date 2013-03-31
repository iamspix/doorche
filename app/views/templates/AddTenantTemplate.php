<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $header . '_header' . EXT; ?>
<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $sidebar . '_sidebar' . EXT; ?>
<div id="content">
    <div id="add-tenant">
        <form method="POST" action="<?php echo base_url();?>tenants/addSubmit">
            <h1>Register a Tenant</h1>
            <input name="lastname" type="text" placeholder="Lastname*" maxlength="128" required>
            <input name="firstname" type="text" placeholder="Firstname*" maxlength="128" required>
            <input name="birthday" type="text" placeholder="Birthday MM-DD-YYYY*" pattern="(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d" required>
            <input name="mobile" type="text" placeholder="Mobile Number*" pattern="((\+63)|(63)|0)?\d{10}" required>
            <input name="email" type="email" placeholder="Email Address">
            <select name="gender" required>
                <option>Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <h1>Select a Unit</h1>
            <select name="apartment">
                <?php if(isset($reg_info['apartment_key'])): ?>
                    <option value="<?php echo $reg_info['apartment_key'];?>" selected><?php echo $reg_info['apartment_key'];?></option>
                <?php else:?>
                <option>Select Apartment</option>
                <?php endif;?>
            </select>
            <select name="unit">
                <?php if(isset($reg_info['unit_id'])): ?>
                    <option value="<?php echo $reg_info['unit_id'];?>" selected><?php echo $reg_info['unit_id'];?></option>
                <?php else:?>
                <option>Select Unit</option>
                <?php endif;?>
            </select>
            <h1>Continue</h1>
            <input type="submit" class="button" value="Add Tenant">
        </form>
    </div>
</div>
<div class="clearfix"></div>
<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $footer . '_footer' . EXT; ?>