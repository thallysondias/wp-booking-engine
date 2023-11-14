<style>
  .motor-reserva,
  .promolateral,
  #button-reserva-flutuante,
  .btn-circle,
  .btn-square {
    background:
      <?php echo get_option('omnibees_bg'); ?>
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

  .flatpicker-omnibees-be input,
  .hospedes #lista-hospede,
  #codigo-promocional input,
  #button-reserva-flutuante h5 {
    color:
      <?php echo get_option('omnibees_texto');
      ?>
    ;
  }

  .motor-reserva svg path {
    fill:
      <?php echo get_option('omnibees_texto');
      ?>
      !important;
  }

  .booknow button {
    background:
      <?php echo get_option('omnibees_botao');
      ?>
      !important;
  }

  .calendar-icon {
    background-color:
      <?php echo get_option('omnibees_texto');
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

<div id="omnibees-off-canvas">
  <div id="be-off-canvas" class="promolateral">

    <div class="conteudo-fora">
      <div class="conteudo-dentro">

        <div class="header-be">
          <span class="book-now-title">Reserva Agora</span>
          <a href="javascript:void(0)" class="closebtn" id="closebtn">&times;</a>
        </div>

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

        <form action="<?php echo $actionBe ?>" method="GET" target="_blank" class="motor-reserva-v1" id="form-booking">

          <input type="hidden" id="lang" name="lang" value="<?php echo get_option('omnibees_idioma'); ?>" />
          <input type="hidden" id="version" name="version" value="<?php echo $versionBe; ?>">
          <input type="hidden" id="NRooms" name="NRooms" value="1" />
          <input type="hidden" id="affliate" name="affiliate" value="<?php echo get_option('omnibees_affiliate'); ?>" />

          <input class="flatpicker-omnibees-be" id="checkInOut" type="text" placeholder="Selecione a data"
            style="display: none">
          <input type="hidden" name="CheckIn" id="checkin" value="" />
          <input type="hidden" name="CheckOut" id="checkout" value="" />
          <br>
          <?php
          $selectedHotelId = get_option('hotel_id');
          $selectedHotelName = get_option('hotel_name');
          $can_foreach = is_array($selectedHotelId) || is_object($selectedHotelId);

          if ($can_foreach) {
            $selectedHotel = array_combine($selectedHotelId, $selectedHotelName);

            if (count($selectedHotel) > 1) {
              ?>
              <div class="hotel input-container">
                <label for="q">
                  <img class="input-image" src="<?php echo plugin_dir_url(__FILE__) . 'img/hotel-outlined.svg' ?>">
                </label>
                <div class="select-wrapper-omnibees">
                  <select name="q" class="hotel-selection icon-input">
                    <?php
                    foreach ($selectedHotel as $id => $name) { ?>
                      <option value="<?php echo $id; ?>">
                        <?php echo $name; ?>
                      </option>

                    <?php } ?>
                  </select>
                </div>
              </div>
            <?php } else {
              foreach ($selectedHotel as $id => $name) { ?>
                <input type="hidden" id="hotel" name="q" value="<?php echo $id; ?>">
              <?php }
            }
          } ?>
          <div class="guests">
            <div class="adulto input-container">
              <label for="ad">
                <img class="input-image" src="<?php echo plugin_dir_url(__FILE__) . 'img/guest-outline.svg' ?>">
              </label>
              <div class="select-wrapper-omnibees">
                <select id="ad" name="ad" class="icon-input">
                  <option value="1">1
                    <?php echo "$adulto"; ?>
                  </option>
                  <option value="2" selected>2
                    <?php echo "$adulto"; ?>s
                  </option>
                  <option value="3">3
                    <?php echo "$adulto"; ?>s
                  </option>
                  <option value="4">4
                    <?php echo "$adulto"; ?>s
                  </option>
                  <option value="5">5
                    <?php echo "$adulto"; ?>s
                  </option>
                </select>
              </div>
            </div>
            <div class="crianca input-container">
              <label for="ch">
                <img class="input-image" src="<?php echo plugin_dir_url(__FILE__) . 'img/child-outline.svg' ?>">
              </label>
              <div class="select-wrapper-omnibees">
                <select name="ch" id="ch" class="icon-input">
                  <option value="0" selected>0
                    <?php echo "$crianca"; ?>
                  </option>
                  <option value="1">1
                    <?php echo "$crianca"; ?>
                  </option>
                  <option value="2">2
                    <?php echo "$crianca"; ?>s
                  </option>
                  <option value="3">3
                    <?php echo "$crianca"; ?>s
                  </option>
                  <option value="4">4
                    <?php echo "$crianca"; ?>s
                  </option>
                  <option value="5">5
                    <?php echo "$crianca"; ?>s
                  </option>
                </select>
              </div>
            </div>
          </div>
          <div class="criancas clearfix">
            <div id="output"></div>
            <input type="hidden" id="ag" name="ag" class="esconde" hidden="hidden" value="">
          </div>


          <div class="codigo input-container">
            <label for="Code">
              <img class="input-image" src="<?php echo plugin_dir_url(__FILE__) . 'img/cupom-outlined.svg' ?>">
            </label>
            <input type="text" name="Code" placeholder='<?php echo "$code"; ?>' class="icon-input">
          </div>

          <div class="booknow">
            <button type="submit">
              <?php echo "$booknow"; ?>
            </button>
          </div>
        </form>
      </div>
    </div>
    <a href="https://www.omnibees.com" target="_blank">
      <img id="by-omnibees-logo" src="<?php echo plugin_dir_url(__FILE__) . 'img/by-omnibees.svg'; ?>">
    </a>
  </div>
  <div id="main-button">
    <?php

    if (get_option('omnibees_style') === "1") { ?>

      <div id="button-reserva-flutuante" class="btn-reservar btn-square">
        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42" fill="none">
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M21 42C32.598 42 42 32.598 42 21C42 9.40202 32.598 0 21 0C9.40202 0 0 9.40202 0 21C0 32.598 9.40202 42 21 42ZM28.0001 30V34L30 34V30H34V28.0001H30V24.0001H28.0001V28.0001H24.0001V30H28.0001ZM10.3667 30.3C10.8334 30.7667 11.4035 31 12.077 31H21.4795C21.3701 30.6667 21.2949 30.3333 21.2539 30C21.2129 29.6667 21.1924 29.3334 21.1924 29H12.077C11.9744 29 11.8804 28.9573 11.7949 28.8718C11.7094 28.7863 11.6667 28.6923 11.6667 28.5897V18.7437H27.6667V21.2872C28 21.2462 28.3334 21.2257 28.6667 21.2257C29 21.2257 29.3333 21.2462 29.6667 21.2872V13.4103C29.6667 12.7368 29.4333 12.1667 28.9667 11.7001C28.5 11.2334 27.9299 11.0001 27.2564 11.0001H25.4102V8.17957H23.4103V11.0001H15.9744V8.17957H13.9232V11.0001H12.077C11.4035 11.0001 10.8334 11.2334 10.3667 11.7001C9.90008 12.1667 9.66675 12.7368 9.66675 13.4103V28.5897C9.66675 29.2632 9.90008 29.8333 10.3667 30.3ZM27.6667 16.7437H11.6667V13.4103C11.6667 13.3078 11.7094 13.2137 11.7949 13.1282C11.8804 13.0428 11.9744 13 12.077 13H27.2564C27.359 13 27.453 13.0428 27.5385 13.1282C27.624 13.2137 27.6667 13.3078 27.6667 13.4103V16.7437Z"
            fill="white" />
        </svg>
        <h5 class="h5reservar">
          <?php echo "$booknow"; ?>
        </h5>
      </div>

    <?php } else { ?>

      <div id="button-reserva-flutuante" class="btn-reservar ">
        <div class="btn-circle">
          <div class="text-book-now">
            <?php echo "$booknow"; ?>
          </div>
          <div class="icon-btn">
            <img src="<?php echo plugin_dir_url(__FILE__) . 'img/calendar_add_on.svg'; ?>">

          </div>
        </div>
      </div>

    <?php } ?>
  </div>
</div>
<script>
  console.log("Init Omnibees Booking Engine 5.0");

  var bookingEngine = {
    init: function () {
      this.selectedDate();
      this.openCanvas();
      this.childAge();
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
          inline: true,
          minDate: "today",
          dateFormat: "d/m/Y",
          locale: "<?php echo $local; ?>",
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
    childAge: function () {
      var promolateral = document.querySelector('.promolateral');
      var computedStyle = window.getComputedStyle(promolateral);
      rgb = computedStyle.backgroundColor;

      var colors = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);

      var r = colors[1];
      var g = colors[2];
      var b = colors[3];
      var o = Math.round(((parseInt(r) * 299) + (parseInt(g) * 587) + (parseInt(b) * 114)) / 1000);

      if (o > 125) {
        document.getElementById('omnibees-off-canvas').classList.add('constrast-color');
      }

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
          output = '<div class="child-items"><span><?php echo "$idade"; ?> <?php echo "$da"; ?> ' + idade + 'ª <?php echo "$crianca"; ?>:</span> <input type="number" value="1" min="1" class="idade" id="ag' + i + '" /></div>';
          idade++;
          outputContainer.insertAdjacentHTML('beforeend', output);
        }
      });

      var formBooking = document.getElementById('form-booking');
      formBooking.addEventListener('submit', function (event) {
        event.preventDefault();
        var ages = "";
        var qtd = parseInt(document.getElementById('ch').value);

        for (var i = 0; i < qtd; i++) {
          var agElement = document.getElementById('ag' + i);
          if (agElement.value) {
            if (i !== qtd) {
              if (i === 0) {
                ages += agElement.value;
              } else {
                ages += ';' + agElement.value;
              }
            }
          }
        }
        var ageChild = document.getElementById('ag');
        ageChild.value = ages;
        formBooking.submit();
      });
    },
    openCanvas: function () {
      document.getElementById('button-reserva-flutuante').addEventListener('click', function () {
        document.getElementById('be-off-canvas').style.width = '340px';
      });
      document.getElementById('closebtn').addEventListener('click', function () {
        document.getElementById('be-off-canvas').style.width = '0';
      });
    }
  };
  document.addEventListener('DOMContentLoaded', function () {
    bookingEngine.init();
  });
</script>