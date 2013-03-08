<div class="widget hiddenPhone dashboard dashboardMain">
    <fieldset>
        <div class="fieldWrap">
            <input type="text" name="email" tabindex="1" placeholder="Email" />
        </div>
    </fieldset>
    <fieldset>
        <div class="fieldWrap">
            <input type="password" name="password" tabindex="2" placeholder="Password" autocomplete="off" />
        </div>
    </fieldset>
    <fieldset>
        <div class="buttons">
            <input class="button" type="submit" name="submit" value="Sign In" /> <a href="#">Lost Password?</a> <?php echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'register')); ?>
        </div>
    </fieldset>
</div>