<?php require 'partials/flashes.php'?>
<h1><?php echo $title; ?></h1>

<?php if (empty($foodOrders)): ?>
    <p>No food order found.</p>
<?php else: ?>


<!--list view when order's made-->
    <table>
        <thead>
            <tr>
                <th>Food order</th>
                <th>Name of the order</th>

                <th>Pick-up date</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!--joint the tables to make the food_order and product_name together so view both of the order?-->
            <?php foreach ($foodOrders as $foodOrder): ?>
                <tr>
                    <td><?php echo $foodOrder->getProductName(); ?></td>

                    <td><?php echo $foodOrder->getFullName(); ?></td>
                    <!--<td>//php echo $foodOrder->getPhoneNumber(); ?></td>-->
                    <td><?php echo Utils::escape(Utils::formatDateTime($foodOrder->getDate())); ?></td>
                    <!--<td>//php echo $foodOrder->pickupTime();?></td>>-->
                    <td><a href="index.php?page=order-add-edit&id=<?php 
                     echo $foodOrder->getOrderId(); ?>&product_id=<?php 
                     echo $foodOrder->getProductId(); ?>">Change status</a>  
                        <a href="index.php?page=change-status&id=<?php 
                     echo $foodOrder->getOrderId(); ?>&cmd=<?php 
                     echo FoodOrder::VOIDED; ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
