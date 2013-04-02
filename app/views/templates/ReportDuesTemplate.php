<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $header . '_header' . EXT; ?>
<img class="logo" src="<?php echo asset_url(); ?>img/logo.jpg">
<div id="apt-details">
    <h1>EEC APARTMENTS</h1>
    <p>Branch Address:
        <span class="branch-addr">
           <?php echo isset($trans_info['address']) ? $trans_info['address'] : "586 Main St., Sampaloc, Manila"?>
        </span>
    </p>
</div>
<br>
<div id="wrap">
    <div class="left">
        <h1>Payment Receipt</h1>
        <p class="label">Transaction Code:
            <span>
                <?php echo isset($trans_info['transaction_id']) ? $trans_info['transaction_id'] : "##########"?>
            </span>
        </p>
    </div>
    <div class="right">
        <ul>
            <li>EEC APARTMENTS</li>
            <li>736-5823</li>
            <li>Tin #: 282-887-398-000</li>
        </ul>
    </div>
    <div class="divider"></div>
    <p><?php echo isset($trans_info['transaction_date']) ? $trans_info['transaction_date'] : "Wed, April 02, 2013"?></p>
    <p>Receipt #: <?php echo isset($trans_info['receipt_number']) ? $trans_info['receipt_number'] : 'n/a'?></p>
    <hr>
    <div id="customer-info">
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td class="icon">
                    <!--<img src="<?php echo asset_url(); ?>img/icons/tenant.jpg">-->
                </td>
                <td>
                    <h1>
                        <?php echo isset($trans_info['tenant_firstname']) ? $trans_info['tenant_firstname'] . ' ' . $trans_info['tenant_lastname'] : "TENANT NAME"?>
                    </h1>
                    <span>Name</span>
                </td>
                <td class="icon">
                    <!--<img src="<?php echo asset_url(); ?>img/icons/unit.jpg">-->
                </td>
                <td>
                    <h1><?php echo isset($trans_info['unit_id']) ? $trans_info['unit_id'] : "####"?></h1>
                    <span>Unit #</span>
                </td>
            </tr>
            <tr>
                <td class="icon">
                    <!--<img src="<?php echo asset_url(); ?>img/icons/apartment.jpg">-->
                </td>
                <td>
                    <h1><?php echo isset($trans_info['apartment_key']) ? $trans_info['apartment_key'] : "####"?></h1>
                    <span>Apartment</span>
                </td>
                <td class="icon">
                    <!--<img src="<?php echo asset_url(); ?>img/icons/contact.jpg">-->
                </td>
                <td>
                    <h1><?php echo isset($trans_info['mobile_number']) ? $trans_info['mobile_number'] : "09XXXXX"?></h1>
                    <span>Contact #</span>
                </td>
            </tr>
        </table>
    </div>
    <hr>
    <h1>Payment Details</h1>
    <div id="transaction-details">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th style="width: 170px;">Description</th>
                <th style="width: 340px">Period</th>
                <th style="width: 210px" class="last">Cost</th>
            </tr>
            <?php foreach($transactions as $transaction):?>
            <tr>
                <td><?php echo $transaction['transaction_type'];?></td>
                <td><?php
                    $timestamp = strtotime($transaction['date']);
                    $prevMonth = strtotime($transaction['date'] . ' -1 month');
                    echo date('F', $prevMonth) . ' ' . $trans_info['payment_period'] . ' - ' . date('F', $timestamp). ' ' . $trans_info['payment_period'];
                ?></td>
                <td class="last"><?php echo $transaction['cost'];?></td>
            </tr>
            <?php endforeach;?>
        </table>
        <div id="total-cost">
            <span>Total: </span> <?php echo isset($trans_info['transaction_cost']) ? $trans_info['transaction_cost'] : '####.##';?>
        </div>
        <div id="received-by">
            <span>Received by:</span> <?php echo isset($trans_info['user_firstname']) ? $trans_info['user_firstname'] . ' ' . $trans_info['user_lastname'] : 'Building Manager'; ?>
        </div>
    </div>
</div>
<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $footer . '_footer' . EXT; ?>