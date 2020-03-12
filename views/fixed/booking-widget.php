<style>
    .motor-reserva{
        background: <?php echo get_option('omnibees_bg');?>!important;
    }
    .flatpicker input,
    .hospedes #lista-hospede,
    #codigo-promocional input {
        color:<?php echo get_option('omnibees_texto');?> !important;
    }
    .motor-reserva svg path {
        fill: <?php echo get_option('omnibees_texto');?>!important;
    }
    .booknow button{
        background: <?php echo get_option('omnibees_botao');?> !important;
    }
    .flatpickr-day.selected, .flatpickr-day.startRange, .flatpickr-day.endRange, .flatpickr-day.selected.inRange, .flatpickr-day.startRange.inRange, .flatpickr-day.endRange.inRange, .flatpickr-day.selected:focus, .flatpickr-day.startRange:focus, .flatpickr-day.endRange:focus, .flatpickr-day.selected:hover, .flatpickr-day.startRange:hover, .flatpickr-day.endRange:hover, .flatpickr-day.selected.prevMonthDay, .flatpickr-day.startRange.prevMonthDay, .flatpickr-day.endRange.prevMonthDay, .flatpickr-day.selected.nextMonthDay, .flatpickr-day.startRange.nextMonthDay, .flatpickr-day.endRange.nextMonthDay {
        background: <?php echo get_option('omnibees_botao');?> !important;
        border-color: <?php echo get_option('omnibees_botao');?> !important;
    }
</style>
<div class="motor-reserva">
    <form action="https://myreservations.omnibees.com/default.aspx" method="GET" target="_blank" class="motor-reserva-v2 ">
        <input type="hidden" id="hotel-0" name="q" value="<?php echo get_option('omnibees_id');?>"> 
        <input type="hidden" id="lang" name="lang" value="<?php echo get_option('omnibees_idioma');?>" />
        <div class="flatpicker">
            <a class="input-button" title="toggle" data-toggle>
                <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNjAgNjAiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDYwIDYwOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8Zz4NCgk8cGF0aCBkPSJNNTcsNGgtN1YxYzAtMC41NTMtMC40NDctMS0xLTFoLTdjLTAuNTUzLDAtMSwwLjQ0Ny0xLDF2M0gxOVYxYzAtMC41NTMtMC40NDctMS0xLTFoLTdjLTAuNTUzLDAtMSwwLjQ0Ny0xLDF2M0gzDQoJCUMyLjQ0Nyw0LDIsNC40NDcsMiw1djExdjQzYzAsMC41NTMsMC40NDcsMSwxLDFoNTRjMC41NTMsMCwxLTAuNDQ3LDEtMVYxNlY1QzU4LDQuNDQ3LDU3LjU1Myw0LDU3LDR6IE00MywyaDV2M3YzaC01VjVWMnogTTEyLDJoNQ0KCQl2M3YzaC01VjVWMnogTTQsNmg2djNjMCwwLjU1MywwLjQ0NywxLDEsMWg3YzAuNTUzLDAsMS0wLjQ0NywxLTFWNmgyMnYzYzAsMC41NTMsMC40NDcsMSwxLDFoN2MwLjU1MywwLDEtMC40NDcsMS0xVjZoNnY5SDRWNnoNCgkJIE00LDU4VjE3aDUydjQxSDR6Ii8+DQoJPHBhdGggZD0iTTM4LDIzaC03aC0yaC03aC0yaC05djl2MnY3djJ2OWg5aDJoN2gyaDdoMmg5di05di0ydi03di0ydi05aC05SDM4eiBNMzEsMjVoN3Y3aC03VjI1eiBNMzgsNDFoLTd2LTdoN1Y0MXogTTIyLDM0aDd2N2gtNw0KCQlWMzR6IE0yMiwyNWg3djdoLTdWMjV6IE0xMywyNWg3djdoLTdWMjV6IE0xMywzNGg3djdoLTdWMzR6IE0yMCw1MGgtN3YtN2g3VjUweiBNMjksNTBoLTd2LTdoN1Y1MHogTTM4LDUwaC03di03aDdWNTB6IE00Nyw1MGgtNw0KCQl2LTdoN1Y1MHogTTQ3LDQxaC03di03aDdWNDF6IE00NywyNXY3aC03di03SDQ3eiIvPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPC9zdmc+DQo=" alt="Calendário">
            </a>
            <input id="checkInOut" type="text" placeholder="Selecione a data" data-input>
            <input type="hidden" name="CheckIn" id="checkin" value=""/>
            <input type="hidden" name="CheckOut" id="checkout" value=""/> 
            <input type="hidden" name="NRooms" id="NRooms" value="1"/> 
        </div>
        <div class="hospedes">
            <div id="lista-hospede">
                <span id="adultos-numero">2</span> <?php echo "$adulto" ;?><span id="plural-adulto" class="">s</span>,
                <span id="lista-crianca"><span id="crianca-numero">0</span> <?php echo "$crianca";?><span id="plural-crianca" class="esconde">s</span> </span>
            </div>
            <div id="box-hospede" class="esconde">
                <div class="adultos clearfix opcoes-hospede">
                    <span for="ad"><?php echo "$adulto" ;?>s </span>
                    <select name="ad" id="ad">
                        <option>1</option>
                        <option selected>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="criancas  clearfix opcoes-hospede">
                    <span for="ch"><?php echo "$crianca" ;?>s </span>
                    <select name="ch" id="ch">
                        <option selected>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <br>
                </div>
                <div class="criancas  clearfix">
                    <div id="output"></div>
                    <input type="text" id="ag" name="ag" class="esconde" hidden="hidden" value="">
                    <div id="salvar-idade" class="button-ag"> <?php echo "$guardar" ;?></div>
                </div>
            </div>
        </div>
        <div id="codigo-promocional" class="clearfix">
            <input type="text" name="Code" id="code" placeholder='<?php echo "$code" ;?>'>
        </div>
        <div class="booknow">
            <div id="aviso-reserva">
              <?php echo "$aviso" ;?><br>
                <span>▼</span>
            </div>
            <button type="submit"><?php echo "$booknow" ;?></button>
        </div>
    </form>
</div>
<script>
    jQuery(document).ready(function( $ ) {
        "use strict";
        //DATAPICKER E DATA ATUAL
        Date.prototype.addDays = function(days) {
            var dat = new Date(this.valueOf());
            dat.setDate(dat.getDate() + days);
            return dat;
        }
        var dat = new Date();  
        $(".flatpicker").flatpickr({
            mode: "range",
            minDate: "today",
            dateFormat: "d/m/Y",
            locale: "<?php echo $local ;?>",              
            wrap: true,
            defaultDate: ["today", dat.addDays(2)],
            onChange: function (selectedDates, dateStr, instance) {
                let checkInOut = $('#checkInOut').val().replace(/\s/g,'');
                let checkIn = checkInOut.split("<?php echo $separador ;?>",6)[0].replace(/[.*+?^=!:${}()|\[\]\/\\]/g,"");
                let checkOut = checkInOut.split("<?php echo $separador ;?>",6)[1].replace(/[.*+?^=!:${}()|\[\]\/\\]/g,"");                
             
                $('#checkin').val(checkIn);
                $('#checkout').val(checkOut);
            }
        });
        //Ativa bloco de hospedes
        $("#lista-hospede").click(function() {
            document.getElementById('box-hospede').className -= ' esconde';
        });
        //Detectar a quantidade de crianças
        $('#ch').on('change keyup blur', function() {
            var val = $(this).val();
            var output;
            if (val < 1){                       
                document.getElementById('ag').className -= ' ativa';
                document.getElementById('ag').className += ' esconde';
            }
            $('#output').empty();
            var idade = 1;
            for (var i = 0, length = val; i < length; i++) {
                output = '<div class="clearfix"><span><?php echo "$idade" ;?> ' + idade + ':</span> <input type="number" value="1" min="1" class="idade" id="ag' + i + '"/></div>';
                idade++;
                $('#output').append(output);
            }
        });
        //Inserir as idades das crianças no input #ag   
        var $salvarIdade = $(".button-ag");
        var pontoevirgula =  ";";
        $salvarIdade.click(function() {
            var texto = "";
            var qtd = $("#ch").val();                   
            qtd = +qtd;
            for (var i = 0; i < qtd; i++) {
                if ($('#ag' + i).val()) {
                    if (i !== qtd ) {
                        if (i === 0){
                            texto += $('#ag'+i).val();
                        }else{
                            texto += pontoevirgula + $('#ag'+i).val();
                        }
                    }
                }
            }             
            $('#ag').val(texto);
            //Adultos
            if ($("#ad").val() > 1){  
                document.getElementById('plural-adulto').className -= ' esconde';
            }else{
                document.getElementById('plural-adulto').className += ' esconde';
            }
            $('#adultos-numero').empty();
            $('#adultos-numero').append($("#ad").val());
            //Crianças
            if ($("#ch").val() === 0){
                document.getElementById('plural-crianca').className += ' esconde';
            }else if($("#ch").val() == 1){
                document.getElementById('lista-crianca').className -= ' esconde';
                document.getElementById('plural-crianca').className += ' esconde';
            }else{
                document.getElementById('plural-crianca').className -= ' esconde';
                document.getElementById('lista-crianca').className -= ' esconde';
            }
            $('#crianca-numero').empty();
            $('#crianca-numero').append($("#ch").val());
            document.getElementById('box-hospede').className += ' esconde';
        });
        
        setTimeout(function(){
            $('#aviso-reserva').addClass('ativa');
        }, 5000);
        $("#aviso-reserva").click(function() {
            document.getElementById('aviso-reserva').className -= ' ativa';
        });
    });
</script>
