<!--this page should only have html creation-->

<!DOCTYPE html>
<html>
    <h1>Welcome to the sign up page. Simply sign up and get your food order online.<br> Save Time,<br> No Hassle</h1>

<!--php if (!empty($errors)): ?>-->
<!--<ul class="errors">-->
<!--    php foreach ($errors as $error): ?>-->
        <!--php /* @var $error Error */ ?>-->
<!--        <li>php echo $error->getMessage(); ?></li>-->
<!--    php endforeach; ?>-->
<!--</ul>-->
<!--php endif; ?>-->


<form action="#" method="post">
   
        <div class="signup">
            Set your user name: <br>
            <input type="text" name="username"/>
        </div>
        
        <div class="signup">
            Set your password: <br>
           <input type="password" name="password"/>
           
        </div>
                <div class="signup">
            Phone number: <br>
           <input type="number" name="phone-number"/>
           
        </div>
                <div class="signup">
            Email: <br>
           <input type="text" name="email"/>
           
        </div>
        <div class="signup">
            <input type="submit" name="signup"  class="submit" value = "signup"/>
            
        </div>
   
</form>