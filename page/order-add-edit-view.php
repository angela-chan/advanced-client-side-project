<h1>Make a Chinese food order</h1>
<!--if the user haven't login, the message will pop up and ask for login -->
<?php if(!isset($_SESSION['user_id'])):?>
<p>To make an order, please login first.</p>
<?php else:?>

<?php if (!empty($errors)): ?>
<ul class="errors">
    <?php foreach ($errors as $error): ?>
        <?php /* @var $error Error */ ?>
        <li><?php echo $error->getMessage(); ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<!--meals are getting from the data.-->
<form action = "index.php?page=order-add-edit">
<fieldset>

    
 <select name = "food_order[order_list]">
            <?php $count = 1; foreach ($products as $product): ?>
                 <option <?php echo $product->getProductId() === $product_id ? "selected='true'": ''; ?>value="<?php echo $count;?>"><?php echo $product -> getProductName(); ?></option>
                 <?php $count++; ?>
            <?php endforeach; ?>
                 
</select>
    
   <?php if(isset($_SESSION['role'])&&$_SESSION['role']=='admin'):?>
 <select name = "food_order[status]">
     <option value = "PENDING">Pending</option>
      <option value= "COOKING">Cooking</option>
       <option value= "READY">Ready</option>
                 
</select>

<?php endif;?>


<!--<div class="field">
            <label>Date:</label>
            <input type="date" name="food_order[date]" value="<?php 
            echo Utils::escape($foodOrder->getDate()->format('Y-m-d'));?>"/>
        </div>
        -->
       
    <!--<select name = "food_order[pickup_time]">-->
    <!--<option value=""disabled selected>Pick up time -->
    <!--<option value="a">17:00</option>-->
    <!--<option value="b">17:15</option>-->
    <!--<option value="c">17:30</option>-->
    <!--<option value="d">17:45</option>-->
    <!--<option value="e">18:00</option>-->
    <!--<option value="f">18:15</option>-->
    <!--<option value="g">18:30</option>-->
    <!--<option value="h">18:45</option>-->
    <!--<option value="i">19:00</option>-->
    <!--<option value="j">19:15</option>-->
    <!--<option value="k">19:30</option>-->
    <!--<option value="l">19:45</option>-->
    <!--<option value="m">20:00</option>-->
    
    
    <!--</option>-->
        
        
        
        <div class="wrapper">
            
            <button><input type="submit" name="save" value="Submit" class="submit" >
            </button>
           
        </div>
    
    </fieldset>
</form>
<?php endif; ?>
<!-- echo $foodOrder->getOrderId(); -->