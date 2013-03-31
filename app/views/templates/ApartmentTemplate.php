<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $header . '_header' . EXT ;?>
<div id="content" class="no-sidebar">
    <div id="apartments">
        <?php foreach($apartments as $apartment):?>
            <div class="apartment">
                <?php if(isset($notif_count)):?>
                    <span class="notif-count bubble">3</span>
                <?php endif;?>
                <a href="<?php echo base_url();?>apartments/view/<?php echo $apartment['apartment_key']; ?>">
                    <img src="<?php echo asset_url() . 'uploads' . DS . $apartment['image']; ?>.png">
                <span class="apartment-number"><?php echo $apartment['apartment_key']; ?></span>
                </a>
            </div>
        <?php endforeach;?>

    </div>
</div>
<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $footer . '_footer' . EXT ;?>