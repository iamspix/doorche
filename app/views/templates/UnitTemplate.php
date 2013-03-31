<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $header . '_header' . EXT ;?>
<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $sidebar . '_sidebar' . EXT ;?>
<div id="content">
    <div id="unit-view">
        <div class="unit-number">Unit # <span>110</span></div>
        <div class="tenant-list">
            <a  href="<?php echo base_url(); ?>tenants/view/20130001" class="tenant">
                <img src="<?php echo asset_url(); ?>uploads/tenants/tenant20130001.jpg">
                <h1>Hipolito, Jose Marcelius S.</h1>
                <span class="mobile tenant-info">+639056214344</span>
                <span class="email tenant-info">iamspix@gmail.com</span>
            </a>
            <a  href="<?php echo base_url(); ?>tenants/view/20130002" class="tenant">
                <img src="<?php echo asset_url(); ?>uploads/tenants/tenant20130002.jpg">
                <h1>Viardo, Joel M..</h1>
                <span class="mobile tenant-info">+639198444143</span>
                <span class="email tenant-info">spixel@gmail.com</span>
            </a>
            <a href="tenants/add" class="add-tenant">
                <h1>Add Tenant</h1>
            </a>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $footer . '_footer' . EXT ;?>