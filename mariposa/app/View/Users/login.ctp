<div style="width:100%; margin-top:2em;">
<center>
<h3 style="font-family:Verdana, Geneva, sans-serif; color:#9247A7">Bienvenid@ al sistema de gestión interna de viajesde15.com</h3>
<div class="users form" style="width:600px;border:solid 1px #9148EA; text-align:left;height:300px; margin-left:3em; margin-top:2em">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User');?>
    <fieldset>
    <center>
    <?php
        echo $this->Form->input('username',array('label'=>'Usuario'));
        echo $this->Form->input('password',array('label'=>'Contraseña'));
    ?>
    </center>
    </fieldset>
<center><?php echo $this->Form->end(__(' '));?></center>
</div>
</center>
</div>