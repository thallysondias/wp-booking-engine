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
        <form action="<?php echo get_option('omnibees_versao');?>" method="GET" target="_blank" class="motor-reserva-v1">
          <input type="hidden" id="hotel-0" name="q" value="<?php echo get_option('omnibees_id');?>">
          <input type="hidden" id="lang" name="lang" value="<?php echo get_option('omnibees_idioma');?>" />
          <input type="hidden" id="NRooms" name="NRooms" value="1" />
          <input class="flatpicker-omnibees-be" id="checkInOut" type="text" placeholder="Selecione a data" style="display: none">
          <input type="hidden" name="CheckIn" id="checkin" value="" />
          <input type="hidden" name="CheckOut" id="checkout" value="" />
          <br>
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
            <select name="ch" id="child">
              <option value="0" selected>0 <?php echo "$crianca" ;?></option>
              <option value="1">1 <?php echo "$crianca" ;?></option>
              <option value="2">2 <?php echo "$crianca" ;?>s</option>
              <option value="3">3 <?php echo "$crianca" ;?>s</option>
              <option value="4">4 <?php echo "$crianca" ;?>s</option>
              <option value="5">5 <?php echo "$crianca" ;?>s</option>
            </select>
          </div>
          <input type="text" id="ag" name="ag" class="esconde" hidden="hidden">
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
  console.log("Init Omnibees Booking Engine");
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
            onChange: function(selectedDates, dateStr, instance) {

              let checkInOut = $('#checkInOut').val().replace(/\s/g, '');
              let checkIn = checkInOut.split("<?php echo $separador ;?>", 6)[0].replace(/[.*+?^=!:${}()|\[\]\/\\]/g, "");
              let checkOut = checkInOut.split("<?php echo $separador ;?>", 6)[1].replace(/[.*+?^=!:${}()|\[\]\/\\]/g, "");

              $('#checkin').val(checkIn);
              $('#checkout').val(checkOut);
            }
          });
        }, 1);
      });
    },
    childAge: function() {
      jQuery(document).ready(function($) {
        setTimeout(function() {
          $("#child").change(function() {
            console.log("teste");
            var pontoevirgula = ";";
            var qtdChild = parseInt($("#ch").val());
            var agesChild = "";

            qtdChild = +qtdChild;
            for (var i = 0; i < qtdChild; i++) {
              if (i !== qtdChild) {
                if (i === 0) {
                  agesChild += 0;
                } else {
                  agesChild += pontoevirgula + 0;
                }
              }
            }
            $('#ag').val(agesChild);
            console.log(agesChild);
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
  },

  jQuery(document).ready(function($) {
    setTimeout(function() {
      bookingEngine.init();
    }, 500);
  });

</script>
