<?php       
    
    echo $this->Form->create('Contact',array('type'=>'file'));
    echo "Plano de fundo:<input name='uploaded' type='file'/>";
    echo "<input type='checkbox' name='check' value='check'/>Retirar plano de fundo";
    echo $this->Form->end('Confirmar');
    
?>
