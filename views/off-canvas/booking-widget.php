<style>
  .motor-reserva,
  .promolateral,
  #button-reserva-flutuante {
    background: <?php echo get_option('omnibees_bg');
    ?> !important;
  }

  .flatpicker-omnibees-be input,
  .hospedes #lista-hospede,
  #codigo-promocional input,
  #button-reserva-flutuante h5 {
    color: <?php echo get_option('omnibees_texto');
    ?> !important;
  }

  .motor-reserva svg path {
    fill: <?php echo get_option('omnibees_texto');
    ?> !important;
  }

  .booknow button {
    background: <?php echo get_option('omnibees_botao');
    ?> !important;
  }

  .calendar-icon {
    background-color: <?php echo get_option('omnibees_texto');
    ?> !important;
  }

  .flatpickr-day.selected,
  .flatpickr-day.startRange,
  .flatpickr-day.endRange,
  .flatpickr-day.selected.inRange,
  .flatpickr-day.startRange.inRange,
  .flatpickr-day.endRange.inRange,
  .flatpickr-day.selected:focus,
  .flatpickr-day.startRange:focus,
  .flatpickr-day.endRange:focus,
  .flatpickr-day.selected:hover,
  .flatpickr-day.startRange:hover,
  .flatpickr-day.endRange:hover,
  .flatpickr-day.selected.prevMonthDay,
  .flatpickr-day.startRange.prevMonthDay,
  .flatpickr-day.endRange.prevMonthDay,
  .flatpickr-day.selected.nextMonthDay,
  .flatpickr-day.startRange.nextMonthDay,
  .flatpickr-day.endRange.nextMonthDay {
    background: <?php echo get_option('omnibees_botao');
    ?> !important;
    border-color: <?php echo get_option('omnibees_botao');
    ?> !important;
  }

</style>

<div id="omnibees-off-canvas">
  <div id="be-off-canvas" class="promolateral">
    <a href="javascript:void(0)" class="closebtn" id="closebtn">&times;</a>
    <div class="conteudo-fora">
      <div class="conteudo-dentro">
       
       <?php
          $versionBe = get_option('omnibees_versao');

          if ($versionBe === "4" || $versionBe === "3"  ){
            $actionBe = "https://book.omnibees.com/hotelresults";
          }elseif ($versionBe === "2"){
            $actionBe = "https://myreservations.omnibees.com/default.aspx";    
          } else {
            $actionBe = "https://book.omnibees.com/hotelresults";
          } 
       ?>
       
        <form action="<?php echo $actionBe ?>" method="GET" target="_blank" class="motor-reserva-v1" id="form-booking">
          
          <input type="hidden" id="lang" name="lang" value="<?php echo get_option('omnibees_idioma');?>" />
          <input type="hidden" id="version" name="version" value="<?php echo $versionBe; ?>">
          <input type="hidden" id="NRooms" name="NRooms" value="1" />
          <input class="flatpicker-omnibees-be" id="checkInOut" type="text" placeholder="Selecione a data" style="display: none">
          <input type="hidden" name="CheckIn" id="checkin" value="" />
          <input type="hidden" name="CheckOut" id="checkout" value="" />
          <br>
          
          <?php
                $selectedHotelId = get_option('hotel_id');
                $selectedHotelName = get_option('hotel_name');                  
                $can_foreach = is_array($selectedHotelId) || is_object($selectedHotelId);
             
              if ($can_foreach) {
                 $selectedHotel = array_combine($selectedHotelId, $selectedHotelName); 
                
                if (count($selectedHotel) > 1){
                  ?>
                   <select name="q" class="hotel-selection">
                   <?php 
                    foreach ($selectedHotel as $id => $name) {  ?>
                      <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
               
                    <?php } ?>
                   </select>
                <?php } else {
                  foreach ($selectedHotel as $id => $name) {  ?>               
                  <input type="hidden" id="hotel" name="q" value="<?php echo $id; ?>">
                 <?php }}
               }?>
          
          <div class="adulto">
            <select name="ad">
              <option value="1">1 <?php echo "$adulto" ;?></option>
              <option value="2" selected>2 <?php echo "$adulto" ;?>s</option>
              <option value="3">3 <?php echo "$adulto" ;?>s</option>
              <option value="4">4 <?php echo "$adulto" ;?>s</option>
              <option value="5">5 <?php echo "$adulto" ;?>s</option>
            </select>
          </div>
          <div class="crianca">
            <select name="ch" id="ch">
              <option value="0" selected>0 <?php echo "$crianca" ;?></option>
              <option value="1">1 <?php echo "$crianca" ;?></option>
              <option value="2">2 <?php echo "$crianca" ;?>s</option>
              <option value="3">3 <?php echo "$crianca" ;?>s</option>
              <option value="4">4 <?php echo "$crianca" ;?>s</option>
              <option value="5">5 <?php echo "$crianca" ;?>s</option>
            </select>
          </div>

          <div class="criancas  clearfix">
            <div id="output"></div>
            <input type="hidden" id="ag" name="ag" class="esconde" hidden="hidden" value="">
          </div>


          <div class="codigo">
            <input type="text" name="Code" placeholder='<?php echo "$code" ;?>'>
          </div>

          <div class="booknow">
            <button type="submit"><?php echo "$booknow" ;?></button>
          </div>
        </form>
      </div>
    </div>
    <a href="https://www.omnibees.com">
      <img src="https://widgets.omnibees.com/duda/imagens/powered-byomnibees-v3.png" alt="Omnibees - Intelligent Hotel Distribution">
    </a>
  </div>
  <div id="main-button">
    <div id="button-reserva-flutuante" class="btn-reservar">
      <div class="calendar-icon"></div>
      <h5 class="h5reservar"><?php echo "$booknow" ;?></h5>
    </div>
  </div>
</div>

<script>
  console.log("Init Omnibees Booking Engine 3.1");
  var bookingEngine = {
    init: function() {
      bookingEngine.selectedDate();
      bookingEngine.openCanvas();
      bookingEngine.childAge();
    },
    selectedDate: function() {
      jQuery(document).ready(function($) {
        setTimeout(function() {
          Date.prototype.addDays = function(days) {
            var dat = new Date(this.valueOf());
            dat.setDate(dat.getDate() + days);
            return dat;
          }
          var dat = new Date();
          $(".flatpicker-omnibees-be").flatpickr({
            mode: "range",
            inline: true,
            minDate: "today",
            dateFormat: "d/m/Y",
            locale: "<?php echo $local ;?>",

            defaultDate: ["today", dat.addDays(2)],
            
             onChange: function(selectedDates) {
              var _this = this;
              var dateArr = selectedDates.map(function(date) {
                return _this.formatDate(date, 'dmY');
              });
              $('#checkin').val(dateArr[0]);
              $('#checkout').val(dateArr[1]);
            }
            
          });
        }, 1);
      });
    },
    childAge: function() {
      jQuery(document).ready(function($) {
        setTimeout(function() {

          $('#ch').on('change keyup blur', function() {
            var val = $(this).val();
            var output;
            if (val < 1) {
              document.getElementById('ag').className -= ' ativa';
              document.getElementById('ag').className += ' esconde';
            }
            $('#output').empty();
            var idade = 1;
            for (var i = 0, length = val; i < length; i++) {
              output = '<div class="clearfix"><span><?php echo "$idade" ;?> ' + idade + ':</span> <input type="number" value="1" min="1" class="idade" id="ag' + i + '" style="margin-bottom:10px;"/></div>';
              idade++;
              $('#output').append(output);
            }
          });

          var pontoevirgula = ";";
          $("#form-booking").submit(function() {

            var texto = "";
            var qtd = $("#ch").val();
            qtd = +qtd;
            for (var i = 0; i < qtd; i++) {
              if ($('#ag' + i).val()) {
                if (i !== qtd) {
                  if (i === 0) {
                    texto += $('#ag' + i).val();
                  } else {
                    texto += pontoevirgula + $('#ag' + i).val();
                  }
                }
              }
            }
            $('#ag').val(texto);
            if ($("#ad").val() > 1) {
              document.getElementById('plural-adulto').className -= ' esconde';
            } else {
              document.getElementById('plural-adulto').className += ' esconde';
            }
            $('#adultos-numero').empty();
            $('#adultos-numero').append($("#ad").val());
            //Crianças
            if ($("#ch").val() === 0) {
              document.getElementById('plural-crianca').className += ' esconde';
            } else if ($("#ch").val() == 1) {
              document.getElementById('lista-crianca').className -= ' esconde';
              document.getElementById('plural-crianca').className += ' esconde';
            } else {
              document.getElementById('plural-crianca').className -= ' esconde';
              document.getElementById('lista-crianca').className -= ' esconde';
            }
            $('#crianca-numero').empty();
            $('#crianca-numero').append($("#ch").val());
            document.getElementById('box-hospede').className += ' esconde';
          });

        }, 1);
      });
    },

    openCanvas: function() {
      jQuery(document).ready(function($) {
        setTimeout(function() {
          $("#button-reserva-flutuante").click(function() {
            $("#be-off-canvas").css("width", "345");
          });
          $("#closebtn").click(function() {
            $("#be-off-canvas").css("width", "0");
          });
        }, 1);
      });
    }
  };

  jQuery(document).ready(function($) {
    setTimeout(function() {
      bookingEngine.init();
    }, 500);
  });

</script>
