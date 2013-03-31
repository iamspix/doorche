<div id="sidebar">
    <aside id="apartment-info">
        <img src="<?php echo asset_url(); ?>uploads/apartment1-thumb.jpg" class="apartment-image left one-third">
        <div id="apartment-details" class="two-third right">
            <section class="apartment-number">
                Apt#: <span><?php echo isset($apartment_id) ? $apartment_id : 'temp';?></span>
            </section>
            <section class="apartment-manager">
                Manager: <span>Joey Hipolito</span>
            </section>
            <section class="manager-contact">
                Contact: <span>09056214344</span>
            </section>
        </div>
        <div class="clearfix"></div>
    </aside>
    <div class="drag-to-hide"></div>
    <nav id="manage-nav">
        <ul class="side-nav">
            <li class="menu-units menu-parent">
                <a href="units"><span>Manage Units</span></a>
            </li>
            <li class="menu-tenants menu-parent">
                <a href="tenants"><span>Manage Tenants</span></a>
            </li>
            <li class="menu-settings menu-parent">
                <a href="settings"><span>Settings</span></a>
            </li>
        </ul>
    </nav>
</div>