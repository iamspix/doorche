<div id="sidebar">
    <aside id="apartment-info">
        <img src="<?php echo asset_url(); ?>uploads/apartment1-thumb.jpg" class="apartment-image left one-third">
        <div id="apartment-details" class="two-third right">
            <section class="apartment-number">
                Apt#: <span><?php echo isset($apt_details['apartment_id']) ? $apt_details['apartment_key'] : 'temp';?></span>
            </section>
            <section class="apartment-manager">
                Manager: <span>
                            <?php echo
                            isset($apt_details['apartment_id'])
                            ? $apt_details['firstname'] . ' ' . $apt_details['lastname']
                            : 'not set';?>
                        </span>
            </section>
            <section class="manager-contact">
                Contact: <span>
                            <?php echo
                                isset($apt_details['apartment_id'])
                                ? $apt_details['mobile_number']
                                : 'not set';
                            ?>
                         </span>
            </section>
        </div>
        <div class="clearfix"></div>
    </aside>
    <div class="drag-to-hide"></div>
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