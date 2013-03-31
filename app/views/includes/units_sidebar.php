<div id="sidebar">
    <nav id="manage-nav">
        <ul class="side-nav">
            <?php if($_SESSION['accessLevel'] == 'manager'):?>
            <li class="menu-units menu-parent">
                <a href="<?php echo base_url()?>units"><span>Manage Units</span></a>
            </li>
            <?php endif;?>
            <li class="menu-tenants menu-parent">
                <a href="<?php echo base_url()?>tenants"><span>Manage Tenants</span></a>
            </li>
            <li class="menu-settings menu-parent">
                <a href="<?php echo base_url()?>settings"><span>Settings</span></a>
            </li>
        </ul>
    </nav>
</div>