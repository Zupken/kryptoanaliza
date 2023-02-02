<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<body>
    <div class="row">
        <div class="col-2">
            <h2 class="display-2">@include('author')</h2>
        </div>
        <div class="col-8">
            @include('menu-krypto')

            <div class="main" style="margin-left: 20px">
                <h1 class="display-1" style="text-align: center">Kryptoanaliza online</h1>
                <p class="lead" style="font-size: 24px">
                    Poniżej znajduje się narzędzie ułatwiające kryptoanalizę. Wprowadź tekst do złamania przez program. 
                </p>
                <br>
                <select class="form-select" id="algorytm" aria-label="select">
                    <option selected value="1" class="algorytm">MD5</option>
                    <option value="2" class="algorytm">SHA 1</option>
                  </select>
                <div class="form-check">
                    <input class="form-check-input" id="zaszyfruj" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      Zaszyfruj
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" id="deszyfruj" for="flexRadioDefault2">
                      Deszyfruj
                    </label>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="tekstDoDeszyfrowania" rows="8" placeholder="Wprowadź wiadomość do złamania."></textarea>
                    {{-- {{-- <label class="form-label" for="textAreaExample">Wprowadź wiadomość do złamania.</label> --}}
                    <button type="button" class="btn btn-outline-primary float-right" onclick="szyfrowanieWiadomosci()">Deszyfruj.</button>
                </div>
                {{-- <form action="/deszyfrowanie" method="get">
                    Name: <input type="text" name="tekst"><br>
                    <input type="submit">
                {{-- </form> --}}
                <br>
                <div class="form-group">
                    <textarea readonly class="form-control" id="zdeszyfrowanyTekst" rows="8" placeholder="Tu pojawi się zdeszyfrowana wiadomosć."></textarea>
                </div>

                
            </div>

        </div>
        
    </div>
</body>
<script>
    function szyfrowanieWiadomosci() {
        var textarea1 = document.getElementById("tekstDoDeszyfrowania");
        var radio1 = document.getElementById("zaszyfruj")
        var radio2 = document.getElementById("deszyfruj")
        
        if (radio1.checked) {
            var link = '/szyfrowanie';
        }
            
        else {
            var link = '/deszyfrowanie';
        }
        
        //var algorytm = document.getElementById("algorytm").value
        var algorytm = document.getElementById("algorytm").value
        if (algorytm==1){
            link+="md5"
        }
        else {
            link+="sha1"
        }

            
        var tekst = textarea1.value
        var data = {"tekst": tekst}
        $.ajax({

         url: link,
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         data: data,
         success:function(data){
            console.log(data)
            var textarea2 = document.getElementById("zdeszyfrowanyTekst");
            textarea2.value = data
         }})


    }
</script>