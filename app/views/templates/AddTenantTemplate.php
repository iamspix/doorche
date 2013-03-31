<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $header . '_header' . EXT; ?>
<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $sidebar . '_sidebar' . EXT; ?>
<div id="content">
    <div id="add-tenant">
        <form method="POST" action="submit">
            <h1>Register a Tenant</h1>
            <input name="lastname" type="text" placeholder="Lastname*" maxlength="128" required>
            <input name="firstname" type="text" placeholder="Firstname*" maxlength="128" required>
            <input name="birthday" type="text" placeholder="Birthday MM-DD-YYYY*" pattern="(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d" required> 
            <input name="mobile" type="text" placeholder="Mobile Number*" pattern="((\+63)|(63)|0)?\d{10}" required> 
            <input name="email" type="email" placeholder="Email Address">
            <select name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>     
            <h1>Select a Unit</h1> 
            <div class="selection">
                <div class="apartment">
                    <img src="<?php echo asset_url();?>uploads/apartment1-smallthumb.jpg">
                </div>
                <div class="unit"></div>
            </div>
            <input type="submit" class="button" value="Add Tenant"> 
        </form>
    </div>
</div>
<div class="clearfix"></div>
<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $footer . '_footer' . EXT; ?>