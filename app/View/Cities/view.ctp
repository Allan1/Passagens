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
    
    $(function() {
        $( "#CityFrom" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 2,
            onClose: function( selectedDate ) {
                $( "#to" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#CityTo" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 2,
            onClose: function( selectedDate ) {
                $( "#from" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
        $( "#CityFrom" ).datepicker( "option", "dateFormat", "dd/mm/yy" );
        $( "#CityTo" ).datepicker( "option", "dateFormat", "dd/mm/yy" );
    });
    
     $(document).ready(function(){
        if(!$("#CityPassages").is(':checked')){
                $('#CityOrigin').parent('div').css('display','none');
                $('#CityFrom').parent('div').css('display','none');
                $('#CityTo').parent('div').css('display','none');
            }
            else{
                $('#CityOrigin').parent('div').css('display','block');
                $('#CityFrom').parent('div').css('display','block');
                $('#CityTo').parent('div').css('display','block');
            }
        $("#CityPassages").click(function(){
            if(!$(this).is(':checked')){
                $('#CityOrigin').parent('div').css('display','none');
                $('#CityFrom').parent('div').css('display','none');
                $('#CityTo').parent('div').css('display','none');
            }
            else{
                $('#CityOrigin').parent('div').css('display','block');
                $('#CityFrom').parent('div').css('display','block');
                $('#CityTo').parent('div').css('display','block');
            }
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
        <?php echo $this->Form->input('destination',array('label'=>'Qual o seu destino?'));?>
        <?php echo $this->Form->input('passages',array('label'=>'Passagens','type'=>'checkbox'));?>
        <?php echo $this->Form->input('origin',array('label'=>'Onde você está?'));?>
    </div>
    <div>
        <?php echo $this->Form->input('from',array('label'=>'Partida'));?>
        <?php echo $this->Form->input('to',array('label'=>'Retorno'));?>
        <?php echo $this->Form->input('hotels',array('label'=>'Hotéis','type'=>'checkbox','checked'=>'checked'));?>
        <?php echo $this->Form->input('climate',array('label'=>'Clima','type'=>'checkbox','checked'=>'checked'));?>
        <?php echo $this->Form->input('news',array('label'=>'Notícias','type'=>'checkbox','checked'=>'checked'));?>
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
    <?php if(isset($passagesList)):?>
    <div id="passages"style="height: 400px;">
        Passagens
        <?php 
        foreach ($passagesList as $value) {
            
            $aux = $this->Html->link($value['Manager']['name'],  preg_replace('/\*\*\*/', $value['Short']['name'], $value['Manager']['link'], 1));
            $aux = preg_replace('/\*\*\*/', $value['Short2']['name'], $aux, 1);
            $aux = preg_replace('/\*ano\*/', $city['City']['from']['ano'], $aux, 1);
            $aux = preg_replace('/\*ano\*/', $city['City']['to']['ano'], $aux, 1);
            $aux = preg_replace('/\*mes\*/', $city['City']['from']['mes'], $aux, 1);
            $aux = preg_replace('/\*mes\*/', $city['City']['to']['mes'], $aux, 1);
            $aux = preg_replace('/\*dia\*/', $city['City']['from']['dia'], $aux, 1);
            $aux = preg_replace('/\*dia\*/', $city['City']['to']['dia'], $aux, 1);
            
            echo '</br>'.$aux;
        }
        ?>
    </div>
    <?php    endif;?>
    <?php if(isset($hotelsList)):?>
    <div style="height: 127px;">Hotéis </br>
       <?php 
        foreach ($hotelsList as $value) {
            echo $this->Html->link($value['Manager']['name'],str_replace('***', $value['Short']['name'], $value['Manager']['link']))."</br>";
            
        }
        ?>
    </div>
    <?php endif;?>
</div>
<div class="column">
    <div style="height: 200px; background: none">
        <?php if(isset($climateList)):?>
        <div id="clima" style="float:left; width: 49%;margin-bottom: 0px">
            <?php 
                foreach ($climateList as $value) {
                    echo (str_replace('***', $value['Short']['name'], $value['Manager']['link']));
                }
            ?>
        </div>
        <?php        endif;?>
        <div style="float:left; width: 49%; height: 200px;overflow: auto; margin-left: 2%;margin-bottom: 0px">
            Destinos mais buscados:
            <?php 
                foreach ($ranking_cities as $value) {
                    echo '</br>'.$value[0]['rank'].'º - <a href="'.$this->webroot.'cities/view/'.$value['City']['name'].'">'.$value['City']['name'].'</a>';
                }
            ?>
        </div>
        <div style='clear:both'></div>
    </div>
    <?php if(isset($newsList)):?>
    <div id="news" style="height: 400px">
        Notícias
    
    </div>
    <?php endif;?>
    <div style="">
       ...
    </div>
</div>
