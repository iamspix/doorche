<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $header . '_header' . EXT ;?>
<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $sidebar . '_sidebar' . EXT ;?>
<div id="content">
    <div class="unit-list">
        <!-- start isotope options -->
        <div id="filter-container">
            <div class="left">
                <h1>Arrange By:</h1>
                <div class="options left">
                    <span class="selected-arrangement"></span>
                    <ul>
                        <li>Chronological</li>
                        <li>Number of Notifications</li>
                        <li>Number of Tenants</li>
                    </ul>
                    <span class="drop-icon"></span>
                </div>

            </div>
            <div class="right">
                <h1>Filter By:</h1>
                <div class="options right">
                    <span class="selected-filter"></span>
                    <ul>
                        <li>All</li>
                        <li>Vacant Units</li>
                        <li>With Notifications</li>
                        <li>Without Notifications</li>
                    </ul>
                    <span class="drop-icon"></span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--- end isotope options --->
        <!-- start unit lookup -->
        <div id="units">
            <!-- start mock units -->
            <?php foreach($units as $unit) :?>
            <div class="unit-holder">
                <?php if(isset($unit['notif_count'])):?>
                    <span class="notif-count bubble"><?php echo $unit['notif_count']; ?></span>
                <?php endif;?>
                    <a href="<?php echo base_url() . 'units' . DS . 'view' . DS . $unit['unit_id'];?>">
                    <div class="unit"><span class="unit-number"><?php echo $unit['unit_id'];?></span></div>
                </a>
            </div>
            <?php endforeach;?>

            <!--- end mock units --->
        </div>
        <!--- end unit lookup --->
    </div>
</div>
<div class="clearfix"></div>
<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $footer . '_footer' . EXT ;?>