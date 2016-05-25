/*! =======================================================
                      VERSION  0.1
=========================================================
* customdrink.js
*
* Maintainers:
* Jan Burmeister
*	 - Twitter: @JBurmaister
*	 - Github:  SidekickJohn
*
* =========================================================
*/
(function($) {
    $(document).ready(function() {
      /*UI Elements*/
      var rdGend1 = $("#rdGend1");
      var rdGend2 = $("#rdGend2");
      var rdAge1 = $("#rdAge1");
      var rdAge2 = $("#rdAge2");
      var slTired1 = $("#slTired1");
      var slTired2 = $("#slTired2");
      var slTired3 = $("#slTired3");
      var slConcentrate = $("#slConcentrate");
      var slHealth1 = $("#slHealth1");
      var slHealth2 = $("#slHealth2");
      var slHealth3 = $("#slHealth3");
      var slFit1 = $("#slFit1");
      var slFit2 = $("#slFit2");
      var rdLoss1 = $("#rdLoss1");
      var rdLoss2 = $("#rdLoss2");
      var slLife1 = $("#slLife1");
      var slLife2 = $("#slLife2");
      var slLife3 = $("#slLife3");
      var btnSubmitMix = $("#submitMix");

      /*Variables*/
      var sliderArray = [slTired1, slTired2, slTired3, slConcentrate, slHealth1, slHealth2, slHealth3, slFit1, slFit2, slLife1, slLife2, slLife3];
      var gender = {value: null};
      var age = {value: null};
      var tired1 = {value: null};
      var tired2 = {value: null};
      var tired3 = {value: null};
      var concentrate = {value: null};
      var health1 = {value: null};
      var health2 = {value: null};
      var health3 = {value: null};
      var fit1 = {value: null};
      var fit2 = {value: null};
      var wLoss = {value: null};
      var life1 = {value: null};
      var life2 = {value: null};
      var life3 = {value: null};
      var initializeArray = [tired1, tired2, tired3, concentrate, health1, health2, health3, fit1, fit2, life1, life2, life3];
      var ingredients = [];

      /* Create slider widgets */
      for (i = 0; i < sliderArray.length; i++){
        sliderArray[i].slider({
          min: 1,
          max: 5,
          value: 3,
          range: "min"
        });
      };

    /* Initialize Variables */
    for (i = 0; i < sliderArray.length; i++){
      initializeArray[i].value = sliderArray[i].slider( "option", "value" );
    }

    /* Add event handling */
      slTired1.on("slide", function(event, ui){
        tired1.value = ui.value;
      });

      slTired2.on("slide", function(event, ui){
        tired2.value = ui.value;
      });

      slTired3.on("slide", function(event, ui){
        tired3.value = ui.value;
      });

      slConcentrate.on("slide", function(event, ui){
        concentrate.value = ui.value;
      })

      slHealth1.on("slide", function(event, ui){
        health1.value = ui.value;
      });

      slHealth2.on("slide", function(event, ui){
        health2.value = ui.value;
      });

      slHealth3.on("slide", function(event, ui){
        health3.value = ui.value;
      });

      slFit1.on("slide", function(event, ui){
        fit1.value = ui.value;
      });

      slFit2.on("slide", function(event, ui){
        fit2.value = ui.value;
      });

      slLife1.on("slide", function(event, ui){
        life1.value = ui.value;
      });

      slLife2.on("slide", function(event, ui){
        life2.value = ui.value;
      });

      slLife3.on("slide", function(event, ui){
        life3.value = ui.value;
      });

      btnSubmitMix.on("click", function(event){
        // get current value of gender
        gender.value = $('input[name = "gender"]:checked').val();
        if(gender.value == null){
          gender.value = "option1";
        }
        age.value = $('input[name = "ageGroup"]:checked').val();
        if(age.value == null){
          age.value = "option1";
        }
        wLoss.value = $('input[name = "wLoss"]:checked').val();
        if(wLoss.value == null){
          wLoss.value = "option1";
        }
        handleUserData(gender, age, tired1, tired2, tired3, concentrate, health1, health2, health3, fit1, fit2, wLoss, life1, life2, life3);
      });

      /* Functions */
      function handleUserData(uGender, uAge, uTired1, uTired2, uTired3, uConcentrate, uHealth1, uHealth2, uHealth3, uFit1, uFit2, uWLoss, uLife1, uLife2, uLife3){
        if(ingredients.length != 0){
          ingredients = [];
        }
        callPhp(uGender.value, uAge.value, uTired1.value, uTired2.value, uTired3.value, uConcentrate.value, uHealth1.value, uHealth2.value, uHealth3.value, uFit1.value, uFit2.value, uWLoss.value, uLife1.value, uLife2.value, uLife3.value);
      }

      function callPhp(gender, age, tired1, tired2, tired3, concentrate, health1, health2, health3, fit1, fit2, wLoss, life1, life2, life3){
        var array = [gender, age, tired1, tired2, tired3, concentrate, health1, health2, health3, fit1, fit2, wLoss, life1, life2, life3];

        // callPhp.php aufrufen über POST aufrufen
        $.post("../wp-content/themes/your-daily-green-modern/callPhp.php",
            {
              a: 'callDoMagic',
              b: array
            },
            function(data){
              //console.log(data);

                window.location.href="http://localhost/yourdailygreen/produkt/dein-perfekter-mix/";
            });
      }

    });
})(jQuery);
