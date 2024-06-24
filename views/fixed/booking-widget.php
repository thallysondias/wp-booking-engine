<style>
  .motor-reserva {
    background:
      <?php echo get_option('omnibees_bg');
      ?>
      !important;
  }

  .flatpicker-omnibees-be input,
  .hospedes #lista-hospede,
  .hotel-selection,
  #codigo-promocional input {
    color:
      <?php echo get_option('omnibees_texto');
      ?>
      !important;
  }

  .motor-reserva .ativa {
    display: <?php echo get_option('omnibees_balao');?> !important;
  }


  .booknow button {
    background:
      <?php echo get_option('omnibees_botao');
      ?>
      !important;
  }

  .flatpickr-day.selected.startRange+.endRange:not(:nth-child(7n+1)),
  .flatpickr-day.startRange.startRange+.endRange:not(:nth-child(7n+1)),
  .flatpickr-day.endRange.startRange+.endRange:not(:nth-child(7n+1)) {
    -webkit-box-shadow: -10px 0 0
      <?php echo get_option('omnibees_botao');
      ?>
      !important;
    box-shadow: -10px 0 0
      <?php echo get_option('omnibees_botao');
      ?>
      !important;
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
    background:
      <?php echo get_option('omnibees_botao');
      ?>
      !important;
    border-color:
      <?php echo get_option('omnibees_botao');
      ?>
      !important;
  }
</style>
<div class="motor-reserva">
  <?php
  $url = content_url();
  $versionBe = get_option('omnibees_versao');
  $customUrl = get_option('omnibees_url');

  if ($customUrl !== '' && $customUrl !== false) {
    $actionBe = $customUrl;
  } else {
    $actionBe = "https://book.omnibees.com/hotelresults";
  }
  ?>

  <form action="<?php echo $actionBe ?>" method="GET" target="_blank" class="motor-reserva-v2">
    <?php
    $selectedHotelId = get_option('hotel_id');
    $selectedHotelName = get_option('hotel_name');
    $can_foreach = is_array($selectedHotelId) || is_object($selectedHotelId);

    if ($can_foreach) {
      $selectedHotel = array_combine($selectedHotelId, $selectedHotelName);

      if (count($selectedHotel) > 1) {
        ?>
        <select name="q" class="hotel-selection">
          <?php
          foreach ($selectedHotel as $id => $name) { ?>
            <option value="<?php echo $id; ?>">
              <?php echo $name; ?>
            </option>

          <?php } ?>
        </select>
      <?php } else {
        foreach ($selectedHotel as $id => $name) { ?>
          <input type="hidden" id="hotel" name="q" value="<?php echo $id; ?>">
        <?php }
      }
    } ?>

    <input type="hidden" id="lang" name="lang" value="<?php echo get_option('omnibees_idioma'); ?>" />
    <input type="hidden" id="version" name="version" value="<?php echo $versionBe; ?>">
    <div class="flatpicker-omnibees-be">
      <a class="input-button" title="toggle" data-toggle>
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
          x="0px" y="0px" viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve">
          <g>
            <path
              d="M57,4h-7V1c0-0.553-0.447-1-1-1h-7c-0.553,0-1,0.447-1,1v3H19V1c0-0.553-0.447-1-1-1h-7c-0.553,0-1,0.447-1,1v3H3 C2.447,4,2,4.447,2,5v11v43c0,0.553,0.447,1,1,1h54c0.553,0,1-0.447,1-1V16V5C58,4.447,57.553,4,57,4z M43,2h5v3v3h-5V5V2z M12,2h5 v3v3h-5V5V2z M4,6h6v3c0,0.553,0.447,1,1,1h7c0.553,0,1-0.447,1-1V6h22v3c0,0.553,0.447,1,1,1h7c0.553,0,1-0.447,1-1V6h6v9H4V6z M4,58V17h52v41H4z"
              fill="<?php echo get_option('omnibees_texto'); ?>" />
            <path
              d="M38,23h-7h-2h-7h-2h-9v9v2v7v2v9h9h2h7h2h7h2h9v-9v-2v-7v-2v-9h-9H38z M31,25h7v7h-7V25z M38,41h-7v-7h7V41z M22,34h7v7h-7 V34z M22,25h7v7h-7V25z M13,25h7v7h-7V25z M13,34h7v7h-7V34z M20,50h-7v-7h7V50z M29,50h-7v-7h7V50z M38,50h-7v-7h7V50z M47,50h-7 v-7h7V50z M47,41h-7v-7h7V41z M47,25v7h-7v-7H47z"
              fill="<?php echo get_option('omnibees_texto'); ?>" />
          </g>
        </svg>
      </a>
      <input id="checkInOut" type="text" placeholder="Selecione a data" data-input>
      <input type="hidden" name="CheckIn" id="checkin" value="" />
      <input type="hidden" name="CheckOut" id="checkout" value="" />
      <input type="hidden" name="NRooms" id="NRooms" value="1" />
    </div>
    <div class="hospedes">
      <div id="lista-hospede">
        <span id="adultos-numero">2</span>
        <?php echo "$adulto"; ?><span id="plural-adulto" class="">s</span>,
        <span id="lista-crianca"><span id="crianca-numero">0</span>
          <?php echo "$crianca"; ?><span id="plural-crianca" class="esconde">s</span>
        </span>
      </div>
      <div id="box-hospede" class="esconde">
        <div class="adultos clearfix opcoes-hospede">
          <span for="ad">
            <?php echo "$adulto"; ?>s
          </span>
          <select name="ad" id="ad">
            <option>1</option>
            <option selected>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <div class="criancas  clearfix opcoes-hospede">
          <span for="ch">
            <?php echo "$crianca"; ?>s
          </span>
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
          <div id="salvar-idade" class="button-ag">
            <?php echo "$guardar"; ?>
          </div>
        </div>
      </div>
    </div>
    <div id="codigo-promocional" class="clearfix">
      <input type="text" name="Code" id="code" placeholder='<?php echo "$code"; ?>'>
    </div>
    <div class="booknow">
      <div id="aviso-reserva">
        <?php echo "$aviso"; ?><br>
        <span>▼</span>
      </div>
      <button type="submit">
        <?php echo "$booknow"; ?>
      </button>
    </div>
  </form>
</div>
<script>
  console.log("Init Omnibees Booking Engine 5.0");

  var bookingEngine = {
    init: function () {
      this.selectedDate();
      this.showGuest();
      this.showAlert();
    },

    selectedDate: function () {
      Date.prototype.addDays = function (days) {
        var dat = new Date(this.valueOf());
        dat.setDate(dat.getDate() + days);
        return dat;
      };

      var dat = new Date();
      var flatpickrElements = document.querySelectorAll(".flatpicker-omnibees-be");

      flatpickrElements.forEach(function (element) {
        flatpickr(element, {
          mode: "range",
          minDate: "today",
          dateFormat: "d/m/Y",
          locale: "<?php echo $local; ?>",
          wrap: true,
          defaultDate: ["today", dat.addDays(2)],
          onChange: function (selectedDates) {
            var _this = this;
            var dateArr = selectedDates.map(function (date) {
              return _this.formatDate(date, 'dmY');
            });
            document.getElementById('checkin').value = dateArr[0];
            document.getElementById('checkout').value = dateArr[1];
          }
        });
      });
    },

    showGuest: function () {
      document.getElementById('lista-hospede').addEventListener('click', function () {
        document.getElementById('box-hospede').classList.remove('esconde');
      });

      var chInput = document.getElementById('ch');
      chInput.addEventListener('input', function () {
        var val = chInput.value;
        var output;
        if (val < 1) {
          document.getElementById('ag').classList.remove('ativa');
          document.getElementById('ag').classList.add('esconde');
        }
        var outputContainer = document.getElementById('output');
        outputContainer.innerHTML = "";
        var idade = 1;
        for (var i = 0; i < val; i++) {
          output = '<div class="clearfix"><span><?php echo "$idade"; ?> ' + idade + ':</span> <input type="number" value="1" min="1" class="idade" id="ag' + i + '"/></div>';
          idade++;
          outputContainer.insertAdjacentHTML('beforeend', output);
        }

        var salvarIdadeButton = document.querySelector(".button-ag");
        var pontoevirgula = ";";
        salvarIdadeButton.addEventListener('click', function () {
          var texto = "";
          var qtd = parseInt(document.getElementById('ch').value);
          for (var i = 0; i < qtd; i++) {
            var agElement = document.getElementById('ag' + i);
            if (agElement.value) {
              if (i !== qtd) {
                if (i === 0) {
                  texto += agElement.value;
                } else {
                  texto += pontoevirgula + agElement.value;
                }
              }
            }
          }
          document.getElementById('ag').value = texto;

          if (parseInt(document.getElementById('ad').value) > 1) {
            document.getElementById('plural-adulto').classList.remove('esconde');
          } else {
            document.getElementById('plural-adulto').classList.add('esconde');
          }

          document.getElementById('adultos-numero').innerHTML = document.getElementById('ad').value;

          if (parseInt(document.getElementById('ch').value) === 0) {
            document.getElementById('plural-crianca').classList.add('esconde');
          } else if (parseInt(document.getElementById('ch').value) == 1) {
            document.getElementById('lista-crianca').classList.remove('esconde');
            document.getElementById('plural-crianca').classList.add('esconde');
          } else {
            document.getElementById('plural-crianca').classList.remove('esconde');
            document.getElementById('lista-crianca').classList.remove('esconde');
          }

          document.getElementById('crianca-numero').innerHTML = document.getElementById('ch').value;
          document.getElementById('box-hospede').classList.add('esconde');
        });
      });
    },

    showAlert: function () {
      setTimeout(function () {
        document.getElementById('aviso-reserva').classList.add('ativa');
      }, 5000);

      document.getElementById('aviso-reserva').addEventListener('click', function () {
        document.getElementById('aviso-reserva').classList.remove('ativa');
      });
    }
  };

  document.addEventListener('DOMContentLoaded', function () {
    bookingEngine.init();
  });
</script>