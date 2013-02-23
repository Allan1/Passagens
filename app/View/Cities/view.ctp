<style>
    #t div{
        float: left;
        margin-right: 20px;
    }
    input[type='submit']{
        cursor: pointer;
    }
</style>
<div class="header">
    <div>
        <?php echo $this->Form->create('City',array('action'=>'index'));?>
    </div>
    <div>
        <?php echo $this->Form->input('city_id',array('label'=>'Selecione seu destino','options'=>$cities));?>
    </div>
    <div>
        [Mais parâmetros]
    </div>
    <div>
        <?php echo $this->Form->end('Buscar');?>
    </div>
</div>
<div class="column">
    <div style="height: 60px;">
        <dl>
                <dt><?php echo __('Nome'); ?></dt>
                <dd>
                        <?php echo h($city['City']['name']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Estado'); ?></dt>
                <dd>
                        <?php echo h($city['City']['state']); ?>
                        &nbsp;
                </dd>
        </dl>
    </div>
    <div style="height: 400px;">
        Passagens
    </div>
    <div style="height: 127px;">
       ...
    </div>
</div>
<div class="column">
    <div style="min-height: 170px">
        Clima
        <iframe allowtransparency="true" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" src="http://www.cptec.inpe.br/widget/widget.php?p=242&w=h&c=607065&f=ffffff" height="200px" width="215px"></iframe><noscript>Previs&atilde;o de <a href="http://www.cptec.inpe.br/cidades/tempo/242">Salvador/BA</a> oferecido por <a href="http://www.cptec.inpe.br">CPTEC/INPE</a></noscript>
    </div>
    <div style="height: 400px">
        Notícias
    </div>
    <div style="">
       ...
    </div>
</div>