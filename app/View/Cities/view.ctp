<?php
    echo $this->Html->script('jquery-ui');    
    echo $this->Html->css('jquery-ui');
?>
<script>
    $(function() {
            var availableTags = [
                <?php echo $sugestion_name; ?>
            ];
            $( "#CityName" ).autocomplete({
                    source: availableTags
            });
    });
</script>
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
        <?php echo $this->Form->create('City',array('action'=>'view'));?>
    </div>
    <div>
        <?php echo $this->Form->input('name',array('label'=>'Qual o seu destino?'));?>
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
    <div style="min-height: 190px">
        <div id="clima" style="float:left; width: 50%;">
            <?php 
                foreach ($climate as $value) {
                    echo (str_replace('***', $value['Short']['name'], $value['Manager']['link']));
                }
            ?>
        </div>
        <div style="float:left; width: 50%; overflow: auto">
            Destinos mais buscados:
            <?php 
                foreach ($ranking_cities as $value) {
                    echo '</br>'.$value[0]['rank'].'º - <a href="'.$this->webroot.'cities/view/'.$value['City']['name'].'">'.$value['City']['name'].'</a>';
                }
            ?>
        </div>
        <div style='clear:both'></div>
    </div>
    <div style="height: 400px">
        Notícias
    
    </div>
    <div style="">
       ...
    </div>
</div>
