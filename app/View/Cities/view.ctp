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
    <div style="height: 127px;">Hotéis </br>
       <?php 
        foreach ($hotels as $value) {
            echo $this->Html->link($value['Manager']['name'],str_replace('***', $value['Short']['name'], $value['Manager']['link']))."</br>";
            
        }
        ?>
    </div>
</div>
<div class="column">
    <div id="clima" style="min-height: 190px">
        <?php 
            foreach ($climate as $value) {
                echo (str_replace('***', $value['Short']['name'], $value['Manager']['link']));
            }
        ?>
    </div>
    <div style="height: 400px">
        Notícias
    
    </div>
    <div style="">
       ...
    </div>
</div>
