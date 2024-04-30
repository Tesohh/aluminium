<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="HandheldFriendly" content="true"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width, user-scalable=0, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0"/>
    <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="../../plugins/bootstrap-jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../plugins/fontawesome-free-5.10.2-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="../../plugins/datepicker/locales/bootstrap-datepicker.it.js"></script>
    <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
    <script src="../../plugins/icheck-1.x/icheck.js"></script>
    <link rel="stylesheet" href="../../plugins/icheck-1.x/skins/square/green.css">
    <link rel="stylesheet" href="../../plugins/iCheck/all.css">
    <link rel="stylesheet" type="text/css" href="../../plugins/slick-master/slick/slick.css">
    <script src="../../plugins/slick-master/slick/slick.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../plugins/tag-it/css/jquery.tagit.css">
    <link rel="stylesheet" type="text/css" href="../../plugins/tag-it/css/tagit.ui-zendesk.css">
    <link rel="stylesheet" type="text/css" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/skins/_all-skins.css">
    <link href="../../immagini/favicon/favicon-120x120.png" rel="apple-touch-icon"/>
    <link href="../../immagini/favicon/favicon-120x120.png" rel="apple-touch-icon" sizes="57x57">
    <link href="../../immagini/favicon/favicon-120x120.png" rel="apple-touch-icon" sizes="60x60">
    <link href="../../immagini/favicon/favicon-152x152.png" rel="apple-touch-icon" sizes="152x152"/>
    <link href="../../immagini/favicon/favicon-167x167.png" rel="apple-touch-icon" sizes="167x167"/>
    <link href="../../immagini/favicon/favicon-180x180.png" rel="apple-touch-icon" sizes="180x180"/>
    <link href="../../immagini/favicon/favicon-192x192.png" rel="icon" sizes="192x192"/>
    <link href="../../immagini/favicon/favicon-128x128.png" rel="icon" sizes="128x128"/>
    <script src="../../plugins/typeahead/dist/typeahead.bundle.js"></script>
    <script type="text/javascript" language="javascript">
    function inArray(v, a) {
        var length = a.length;
        for (var i = 0; i < length; i++) {
            if (a[i] == v)
                return true;
        }
        return false;
    }
    function replaceAll(str, cerca, sostituisci) {
        return str.split(cerca).join(sostituisci);
    }
    function nascondi_classe(classe, on_off) {
        var classi = document.getElementsByClassName(classe),
            i;
        for (var i = 0; i < classi.length; i++) {
            if (on_off == 1) {
                $(classi[i]).addClass("no-active");

            } else {
                $(classi[i]).removeClass("no-active");
            }
        }

    }
    function nascondi_classe2(classe, on_off) {
        var classi = document.getElementsByClassName(classe),
            i;
        for (var i = 0; i < classi.length; i++) {
            if (on_off == 1) {
                classi[i].style.display = 'none';
            } else {
                classi[i].style.display = 'block';
            }
        }

    }
    function ora() {
        var t = new Date().toLocaleTimeString();
        t = t.replace('CET', '');
        t = t.replace('CEST', '');
        if (document.getElementById("ora")) {
            document.getElementById("ora").innerHTML = t;
        }
        setTimeout('ora()', 1000);
    }
    function elemento_nuovo(valore) {
        document.nuovo_elemento.da.value = valore;
        document.nuovo_elemento.submit();
    }
    function accorcia_numero(n) {
        var b = 0;
        var nd = '';
        var str = '';
        var a_n = n.split(",");
        var i = a_n[0];
        var d = a_n[1];
        if (d > 0) {
            var nc = d.length;
            for (ii = 0; ii < nc; ii++) {
                var cn = nc - ii - 1;
                var c = d[cn];
                if (b == 1) {
                    nd += c;
                } else {
                    if (c != 0) {
                        b = 1;
                        nd += c;
                    }
                }
                var rev = nd.split('').reverse().join('');
                str = i + ',' + rev;
            }
        } else {
            str = i;
        }
        return str;
    }
    function toFixedFix(n, precisione) {
        var k = Math.pow(10, precisione);
        return '' + Math.round(n * k) / k;
    }
    function number_format(numero, decimali, dec_separatore, mig_separatore) {
        var n = 0;
        var precisione = 0;
        var separatore = '.';
        var dec = ',';
        var s = '';
        //numero = numero.replace(/[^0-9\.\-]?/gi,""); // Elimino i caratteri che non sono numeri (lascio il segno meno e il punto)
        if (isFinite(+numero)) {
            n = numero;
        } // Controllo se valore numerico
        if (isFinite(+decimali) && decimali > -1) {
            precisione = decimali;
        } // Controllo se i decimali sono accettabili
        if (typeof mig_separatore != 'undefined') {
            separatore = mig_separatore;
        } // Recupero caratteri separatori
        if (typeof dec_separatore != 'undefined') {
            var dec = dec_separatore;
        }
        if (precisione != 0) {
            s = toFixedFix(n, precisione);
        } else {
            s = '' + Math.round(n);
        } // Arrotondo il valore se necessario - Utilizzo funzione toFixedFix
        s = s.split('.'); // Taglio il valore in parte intera e parte decimale
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, separatore);
        } // Aggiungo il separatore delle migliaia - ogni 3 numeri sulla parte intera
        if ((s[1] || '').length < precisione) {
            s[1] = s[1] || '';
            s[1] += new Array(precisione - s[1].length + 1).join('0');
        } // Formatto la parte decimale - aggiungo degli 0 se necessari
        return s.join(dec); // Aggiungo parte decimale a parte intera - separati da separatore decimali
    }
    function numero_data(data, divisore) {
        var a_data = data.split(divisore);
        return a_data[2] + a_data[1] + a_data[0]
    }
    function vai_a(oggetto) {
        var p = $("#" + oggetto);
        var offset = p.offset();
        var top = offset['top'] - 60;
        scrollTo(0, top);
    }
    function attiva_toolbox(element, id) {
        //	var p_x = element.offsetLeft-75;
        //	var p_y = element.offsetTop - 105;
        var dati = '';
        var elem = $(element);
        var offset = elem.offset();
        var x = offset.left;
        var y = offset.top;
        var da_cambiare = document.getElementById("fumetto");
        da_cambiare.innerHTML = '';
        $.get("../../05_elementi/fumetti.php", {
            id: id
        },
        function(data) {
            var dati = data;
            da_cambiare.innerHTML = dati;
        });
        da_cambiare.style.display = 'block';
    }
    function setClipboardText(text) {
        var id = "mycustom-clipboard-textarea-hidden-id";
        var existsTextarea = document.getElementById(id);

        if (!existsTextarea) {
            console.log("Creating textarea");
            var textarea = document.createElement("textarea");
            textarea.id = id;
            // Place in top-left corner of screen regardless of scroll position.
            textarea.style.position = 'fixed';
            textarea.style.top = 0;
            textarea.style.left = 0;

            // Ensure it has a small width and height. Setting to 1px / 1em
            // doesn't work as this gives a negative w/h on some browsers.
            textarea.style.width = '1px';
            textarea.style.height = '1px';

            // We don't need padding, reducing the size if it does flash render.
            textarea.style.padding = 0;

            // Clean up any borders.
            textarea.style.border = 'none';
            textarea.style.outline = 'none';
            textarea.style.boxShadow = 'none';

            // Avoid flash of white box if rendered for any reason.
            textarea.style.background = 'transparent';
            document.querySelector("body").appendChild(textarea);
            console.log("The textarea now exists :)");
            existsTextarea = document.getElementById(id);
        } else {
            console.log("The textarea already exists :3")
        }

        existsTextarea.value = text;
        existsTextarea.select();

        try {
            var status = document.execCommand('copy');
            if (!status) {
                console.error("Cannot copy text");
            } else {
                console.log("The text is now on the clipboard");
            }
        } catch (err) {
            console.log('Unable to copy.');
        }
    }
    function operazione(a, b, o) {
        var x = 10000;
        var xx = x * x;
        a = (a) * x;
        b = (b) * x;
        if (o == '+') {
            var c = a + b;
            c = c / x;
        } else
        if (o == '-') {
            var c = a - b;
            c = c / x;
        } else
        if (o == '*') {
            var c = a * b;
            c = c / xx;
        } else
        if (o == ':') {
            var c = a / b;
        }
        return c
    }
    </script>
    <link rel="stylesheet" href="../../css/2019.css">
    <title>Menù Alumix</title>
    <script language="javascript" type="text/javascript">
    function cambia_lingua(lingua) {
        if (lingua == 'de') {
            document.getElementById('quiTitolo').innerHTML = 'Mittagsmenü';
            document.getElementById('div_it').style.display = 'none';
            document.getElementById('div_de').style.display = '';
        } else {
            document.getElementById('quiTitolo').innerHTML = '<strong>Menù</strong>';
            document.getElementById('div_it').style.display = '';
            document.getElementById('div_de').style.display = 'none';
        }
        setCookie('lingua', lingua, 60);
        window.scrollTo(0, 0);

    }
    //setCookie('GDPR', '', 0)
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    var cookie = getCookie('GDPR');
    console.log(cookie)
    var lng = getCookie('lingua');
    console.log(lng)
    function conferma_cookie() {
        setCookie('GDPR', 1, 60);
    }
    setTimeout("location.href = 'index.php'", 60000);
    //	window.setInterval(window.location.reload(), 1000?>);
    </script>
    <style>
    hr {
        height: 3px;
        margin-bottom: 10px;
        background-color: #eb152e;
        color: #eb152e;
    }

    .logo {
        margin-bottom: 20px;
        text-align: center;
    }

    .border-no {
        border: 0px;
    }

    .sfCat {
        background-color: #eb152e;
        color: #f7f2f3;
    }

    .coTex {
        color: #2e2e2e;
    }

    .coPre {
        color: #2e2e2e;
    }

    a {
        color: #f7f2f3;
    }

    a:hover {
        color: #f7f2f3;
    }

    .piede {
        position: fixed;
        bottom: 0px;
        left: 0;
        right: 0;
        z-index: 9999;
    }/*Cookie Consent Begin*/

    #cookieConsent {
        background-color: rgba(20, 20, 20, 0.8);
        min-height: 26px;
        font-size: 14px;
        color: #ccc;
        line-height: 26px;
        padding: 8px 0 8px 30px;
        font-family: "Trebuchet MS", Helvetica, sans-serif;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        display: none;
        z-index: 9999;
    }

    #cookieConsent a {
        color: #4B8EE7;
        text-decoration: none;
    }

    #closeCookieConsent {
        float: right;
        display: inline-block;
        cursor: pointer;
        height: 20px;
        width: 20px;
        margin: -15px 0 0 0;
        font-weight: bold;
    }

    #closeCookieConsent:hover {
        color: #FFF;
    }

    #cookieConsent a.cookieConsentOK {
        background-color: #F1D600;
        color: #000;
        display: inline-block;
        border-radius: 5px;
        padding: 0 20px;
        cursor: pointer;
        float: right;
        margin: 0 60px 0 10px;
    }

    #cookieConsent a.cookieConsentOK:hover {
        background-color: #E0C91F;
    }/*Cookie Consent End*/
    </style>

</head>
<body class="">
    <div class="wrapper">
        <div class="content">
            <section class="content-header">
                <div class="logo">
                    <div class="text-center">
                        <img src="../../public/02888610215-alumix-s-r-l-/alumix/immagini/png_3517.png" style="height: 150px;">
                    </div>
                </div>
                <div class="logo">
                    <h2 id="quiTitolo">Menù pranzo</h2>
                </div>
            </section>
            <div class="row">
                <div class="col-md-12">
                    <div id="div_principale" style="">
                        <div id="div_it">
                            <div class="box-solid border-no">
                                <div class="box-body no-padding" style="border: 0px">
                                    <div style="border: 0px">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li>
                                                <div class="box-body sfCat">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin">
                                                                    <strong>Primi piatti</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Pennette alla trevigiana con salsiccia mantovana, panna, pomodoro e radicchio rosso</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>9,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Pennette integrali con Melanzane fritte, pomodoro e mozzarella</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>9,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Canederli pressati ai formaggi con burro e parmigiano su insalata di cappucci</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>9,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Fusilli salentini con crema di asparagi e speck</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>10,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Tagliolini alla Top Manager con salmone, gamberetti, panna, pomodoro e rucola**</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>11,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Pizza di stagione....Bolzanina 
                                                                pomodoro, mozzarella, asparagi, prosciutto di Pasqua e salsa bolzanina</h3>
                                                                <h5 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella, asparagi, prosciutto di Pasqua e salsa bolzanina</h5>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>15,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body sfCat">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin">
                                                                    <strong>Secondi piatti</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Petto di pollo alla griglia con verdure</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>11,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Scaloppina di Pollo ai funghi Champignon con patate Rosti</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>12,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Roast-beef all' inglese con rucola, pomodorini, grana a scaglie, salsa tartara e insalata di cappucci</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>14,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Controfiletto di manzo con salsa agli asparagi e patate Rosti</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>15,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Filetto di Salmone al forno con pesto di rucola su insalatina di valeriana, mele, sedano e noci con fagiolini verdi</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>15,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Poke bowl con Pollo e Gamberi alla soia, riso thai con verdure, cappuccio viola, avocado, semi di sesamo e maionese al curry**</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>13,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Cheesburger di manzo “Alto Adige“ con speck, mozzarella di Bufala, insalata, pomodoro, salsa tartara e patate**</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>12,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Cotoletta di pollo alla milanese con patate a spicchio</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>12,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body sfCat">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin">
                                                                    <strong>Insalate</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Insalata con Gamberi grigliati, crostini e ricotta**</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>12,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Insalata con Pollo grigliato, crostini e grana a scaglie</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>11,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Insalata con crudo di Parma, mozzarella di bufala e olive taggiasche</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>11,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Insalata con Tacchino arrosto, carciofi trifolati e grana a scaglie</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>11,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Insalata Mediterranea con tonno e mozzarelline ciliegine</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>10,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Insalata Greca con formaggio feta, cetrioli, olive nere ed origano</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>10,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body sfCat">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin">
                                                                    <strong>Dolci</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Scomposta di millefoglie con crema chantilly e fragole</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>5,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Tortino al cioccolato con cuore caldo e gelato alla vaniglia</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>5,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Tiramisù della casa</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>4,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Crema Catalana</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>4,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Semifreddo al torroncino</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>4,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Tartufo bianco affogato al caffè</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>4,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Tartufo nero affogato al caffè</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>4,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Ananas fresco</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>4,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body sfCat">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin">
                                                                    <strong>Pizze dal forno a legna</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Margherita</h3>
                                                                <h5 class="no-margin coTex" style="padding-right:10px">pomodoro e mozzarella</h5>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>6,80</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Prosciutto e funghi</h3>
                                                                <h5 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella, prosciutto cotto e funghi</h5>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>8,20</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Salamino piccante</h3>
                                                                <h5 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella e salamino piccante</h5>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>8,30</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Bufala</h3>
                                                                <h5 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella di bufala, mozzarella e basilico</h5>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>8,80</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Salamino e Gorgonzola</h3>
                                                                <h5 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella, salamino piccante e gorgonzola</h5>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>9,80</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Tonno e cipolla</h3>
                                                                <h5 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella, tonno e cipolla</h5>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>8,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Diavola</h3>
                                                                <h5 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella, salamino piccante, peperoni e olive nere</h5>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>8,80</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Capricciosa</h3>
                                                                <h5 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella, carciofi, prosciutto e funghi</h5>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>8,80</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Verdure grigliate</h3>
                                                                <h5 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella, melanzane, zucchine, peperoni e grana padano</h5>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>9,80</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Calzone farcito</h3>
                                                                <h5 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella, prosciutto cotto, funghi e salamino piccante</h5>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>8,80</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Cornetti piccanti</h3>
                                                                <h5 class="no-margin coTex" style="padding-right:10px">mozzarella, prosciutto cotto, funghi, salamino e salsa piccante pomodoro e Tabasco</h5>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>9,90</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Tiffany</h3>
                                                                <h5 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella, zucchine, stracchino e bresaola</h5>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>10,80</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Nontiscordardime</h3>
                                                                <h5 class="no-margin coTex" style="padding-right:10px">Pomodoro, mozzarella, salamino piccante, gorgonzola, peperoni e speck</h5>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>10,20</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Sfiziosa</h3>
                                                                <h5 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella di bufala, salsiccia e salamino piccante</h5>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>10,20</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Alumix</h3>
                                                                <h5 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella di bufala, prosciutto crudo, pomodorini cirietti e grana a scaglie</h5>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>11,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div style="border: 0px">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin" style="padding-right:10px">Coperto</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin">
                                                                    <strong>0,80</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <hr>
                                            </li>
                                            <li>
                                                <div class="box-body text-center">
                                                    <h3 class="no-margin" style="text-align: center;">Informazioni Allergie, piatti Vegani o senza Glutine chiedere al personale di servizio</h3>
                                                    <h3 class="no-margin" style="text-align: center;">
                                                        Ordini e prenotazioni: 
                                                        <a style="color:#000" href="tel:0471 934124">
                                                            <strong>0471 934124</strong>
                                                        </a>
                                                    </h3>
                                                </div>
                                            </li>
                                            <li>
                                                <hr>
                                                <div class="box-body text-center">
                                                    <div class="text-center">
                                                        <a href="javascript:cambia_lingua('de')">
                                                            <img src="../../immagini/flag/de.png">
                                                        </a>
                                                    </div>
                                                    <h4 class="no-margin" style="text-align: center;">Wenn Sie auf Deutsch bevorzugen!</h4>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="box-solid border-no" style="">
                                <hr>
                                <div class="box-body no-padding text-center">
                                    <p class="no-margin">
                                        <strong>Alumix</strong>
                                         di 
                                        <strong>Alumix</strong>
                                        <span>S.r.l.</span>
                                    </p>
                                    <p>
                                        created by 
                                        <a style="color:#777" href="https://www.lelegante.it">
                                            <strong>Lelegante</strong>
                                            .it
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div id="div_de" style="display: none">
                            <div class="box-solid border-no">
                                <div class="box-body no-padding" style="border: 0px">
                                    <div style="border: 0px">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li>
                                                <div class="box-body sfCat">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin">
                                                                    <strong>Warme Vorspeisen</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Pennette nach “Trevigiana-Art“ mit Wurst, Sahne, Tomaten und Radicchio</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>9,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Vollkornnudeln mit Auberginen, Tomatensauce und Mozzarella</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>9,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Käsepressknödel mit Butter und Parmesankäse auf Krautsalat</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>9,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Fusilli salentini mit Spargelcreme und Speck</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>10,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Tagliolini mit Lachs, Garnelen, Sahne, Tomaten und Rucola**</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>11,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella, asparagi, prosciutto di Pasqua e salsa bolzanina</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>15,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body sfCat">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin">
                                                                    <strong>Hauptspeisen</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Gegrillte Hühnerbrust mit Gemüse</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>11,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Hühnerschnitzel mit Champignonsauce und Röstinchen</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>12,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Englisches Roastbeef mit Rauke, Kirschtomaten, Parmesan, Tartarsauce und Krautsalat</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>14,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Rinder-Entrecôte mit Spargelsauce und Röstinchen</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>15,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Lachsfilet mit Rucola-Pesto auf Baldriansalat, Äpfeln, Sellerie, Walnüssen mit grünen Bohnen</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>15,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Poke-Bowl mit Hühnerbrust, Soja-Garnelen, Thai-Reis mit Gemüse, Rotkohl, Avocado, Sesam und Curry-Mayonnaise**</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>13,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Cheesburger mit Speck, Büffelmozzarella, Salat, Tomaten, Tartaresauce und Kartoffeln**</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>12,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Wienerschnitzel mit Kartoffeln</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>12,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body sfCat">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin">
                                                                    <strong>Salatteller</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Garnelen Salat mit gegrillten Garnelen, Brotwürfel und Ricottakäse</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>12,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Hühner Salat mit  gegrillten Hühnerstreifen, Brotwürfeln und Parmesan</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>11,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Salat mit Parmaschinken, Büffelmozzarella und Taggiasche-Oliven</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>11,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Salat mit gebratenem Truthahn, Artischocken und Parmesan</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>11,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Mediterraner Salat mit Thunfisch und Mozzarella</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>10,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Griechischer Salat mit Fetakäse, Gurken, Oliven und Oregano</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>10,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body sfCat">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin">
                                                                    <strong>Nachspeisen</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Millefeuille mit Chantilly-Creme und Erdbeeren</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>5,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Schokotörtchen mit flüssigem Herz und  Vanilleeis</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>5,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Tiramisù nach art des Hauses</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>4,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Katalanische Creme</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>4,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Nougat-Semifreddo</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>4,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Tartufo Bianco auf heißem Espresso</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>4,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Tartufo Nero auf heißem Espresso</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>4,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Frische Ananas</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>4,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body sfCat">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin">
                                                                    <strong>Pizze</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">pomodoro e mozzarella</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>6,80</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella, prosciutto cotto e funghi</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>8,20</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella e salamino piccante</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>8,30</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella di bufala, mozzarella e basilico</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>8,80</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella, salamino piccante e gorgonzola</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>9,80</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella, tonno e cipolla</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>8,50</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella, salamino piccante, peperoni e olive nere</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>8,80</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella, carciofi, prosciutto e funghi</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>8,80</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella, melanzane, zucchine, peperoni e grana padano</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>9,80</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella, prosciutto cotto, funghi e salamino piccante</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>8,80</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">mozzarella, prosciutto cotto, funghi, salamino e salsa piccante pomodoro e Tabasco</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>9,90</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella, zucchine, stracchino e bresaola</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>10,80</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">Pomodoro, mozzarella, salamino piccante, gorgonzola, peperoni e speck</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>10,20</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella di bufala, salsiccia e salamino piccante</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>10,20</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin coTex" style="padding-right:10px">pomodoro, mozzarella di bufala, prosciutto crudo, pomodorini cirietti e grana a scaglie</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin coPre">
                                                                    <strong>11,00</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div style="border: 0px">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li>
                                                <div class="box-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="center">
                                                                <h3 class="no-margin" style="padding-right:10px">Gedeck</h3>
                                                            </td>
                                                            <td align="right" valign="center">
                                                                <h3 class="no-margin">
                                                                    <strong>0,80</strong>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <hr>
                                            </li>
                                            <li>
                                                <div class="box-body text-center">
                                                    <h3 class="no-margin" style="text-align: center;">**In assenza di prodotto fresco possono essere utilizzate sostanze alimentari congelate</h3>
                                                    <h3 class="no-margin" style="text-align: center;">
                                                        Bestellungen und Reservierungen: 
                                                        <a style="color:#000" href="tel:0471 934124">
                                                            <strong>0471 934124</strong>
                                                        </a>
                                                    </h3>
                                                </div>
                                                <hr>
                                            </li>
                                            <li>
                                                <div class="box-body text-center">
                                                    <div class="text-center">
                                                        <a href="javascript:cambia_lingua('it')">
                                                            <img src="../../immagini/flag/it.png">
                                                        </a>
                                                    </div>
                                                    <h4 class="no-margin" style="text-align: center;">Se preferisci in lingua italiana!</h4>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="box-solid border-no" style="">
                                <hr>
                                <div class="box-body no-padding text-center">
                                    <p class="no-margin">
                                        <strong>Alumix</strong>
                                         di 
                                        <strong>Alumix</strong>
                                        <span>S.r.l.</span>
                                    </p>
                                    <p>
                                        created by 
                                        <a style="color:#777" href="https://www.lelegante.it">
                                            <strong>Lelegante</strong>
                                            .it
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="cookieConsent">
        Questo sito utilizza i cookies. 
        <a class="cookieConsentOK" href="javascript:conferma_cookie()">OK</a>
    </div>
    <script>
    if (!cookie) {
        $(document).ready(function() {
            setTimeout(function() {
                $("#cookieConsent").fadeIn(200);
            }, 200);
            $("#closeCookieConsent, .cookieConsentOK").click(function() {
                $("#cookieConsent").fadeOut(200);
            });
            cambia_lingua(lng);
        });
    } else {
        $(document).ready(function() {
            cambia_lingua(lng);
        });
    }
    </script>

    <script src="../../plugins/lelegante/app.js"></script>
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="../../plugins/icheck-1.x/icheck.js"></script>
    <script src="../../plugins/tag-it/js/tag-it.js"></script>
    <script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>
    <script language="javascript" type="text/javascript">
    $(function() {
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_square-blue'
        });
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });
    $(function() {
        $('.data-datepicker').datepicker({
            autoclose: true,
            language: 'it',
            format: 'dd/mm/yyyy'
        });
    });
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    function sortByKey(array, key) {
        return array.sort(function(a, b) {
            var x = a[key];
            var y = b[key];
            return ( (x < y) ? -1 : ((x > y) ? 1 : 0)) ;
        });
    }
    function cambia_ordine(my_array, campo, posizione, cname) {
        if (tipo_sort == 'desc') {
            tipo_sort = 'asc';
        } else if (tipo_sort == 'asc') {
            tipo_sort = 'desc';
        }
        filtra(my_array, campo, ultimo_sort, posizione, cname)
    }
    function ordine_lele(array, _sort, posizione) {
        var text = '';
        var filtro = 0
        var x = array.length;
        if (!_sort) {
            _sort = ultimo_sort;
            filtro = 1;
        }
        ultimo_sort = _sort;
        sortByKey(array, _sort);
        if (tipo_sort == 'no') {} else
        if (tipo_sort == 'desc') {
            array.reverse();
        }
        for (i = 0; i < x; i++) {
            text += array[i]['table'];
        }
        document.getElementById(posizione).innerHTML = text;
    }
    var filtrati = 0
    function filtra(filtro, my_array, campo, _sort, posizione, cname, posnr) {
        var c = 0;
        var d = 0;
        var text = '';
        var resultArray = new Array();
        var x = my_array.length;
        valore = document.getElementById(filtro).value;
        var campi = campo.split(',');
        var n_campi = campi.length;
        if (n_campi == 1) {
            var campo = campi[0];
            for (i = 0; i < x; i++) {
                if ((my_array[i][campo]).toLowerCase().search(valore.toLowerCase()) > -1) {
                    resultArray[c] = my_array[i];
                    c++;
                }
            }
        } else {
            var record_ok = new Array();
            for (ii = 0; ii < campi.length; ii++) {
                var x_campo = campi[ii];
                for (i = 0; i < x; i++) {
                    if ((my_array[i][x_campo]).toLowerCase().search(valore.toLowerCase()) > -1) {
                        if (inArray(i, record_ok) == false) {
                            record_ok[d] = i;
                            d++;
                        }
                    }
                }
            }
            var n_record = record_ok.length;
            for (i = 0; i < n_record; i++) {
                var id = record_ok[i]
                resultArray[c] = my_array[id];
                c++;
            }
        }
        if (!posnr) {
            if (document.getElementById('numero_in_tabella')) {
                document.getElementById('numero_in_tabella').innerHTML = c;
            }
        } else {
            if (document.getElementById(posnr)) {
                document.getElementById(posnr).innerHTML = c;
            }
        }
        filtrati = c;
        if (filtrati == 0) {
            resultArray = new Array();
            resultArray[0] = new Array();
            resultArray[0]['table'] = '<h4 class=\"col-md-12 no-margin\"><strong class=\"red\">Spiacente, la ricerca non ha prodotto nessun risultato!</strong></h4>';
        }
        if (cname) {
            setCookie(cname, valore, 1);
        }
        ordine_lele(resultArray, _sort, posizione);
    }
    function filtro_ricerca(my_array, campo, _sort, posizione, cname, tot, rcampo) {
        var c = 0;
        var d = 0;
        var text = '';
        var resultArray = new Array();
        var x = my_array.length;
        valore = document.getElementById(rcampo).value;
        var campi = campo.split(',');
        var n_campi = campi.length;
        if (n_campi == 1) {
            var campo = campi[0];
            for (i = 0; i < x; i++) {
                if ((my_array[i][campo]).toLowerCase().search(valore.toLowerCase()) > -1) {
                    resultArray[c] = my_array[i];
                    c++;
                }
            }
        } else {
            var record_ok = new Array();
            for (ii = 0; ii < campi.length; ii++) {
                var x_campo = campi[ii];
                for (i = 0; i < x; i++) {
                    if ((my_array[i][x_campo]).toLowerCase().search(valore.toLowerCase()) > -1) {
                        if (inArray(i, record_ok) == false) {
                            record_ok[d] = i;
                            d++;
                        }
                    }
                }
            }
            var n_record = record_ok.length;
            for (i = 0; i < n_record; i++) {
                var id = record_ok[i]
                resultArray[c] = my_array[id];
                c++;
            }
        }
        if (tot) {
            document.getElementById(tot).innerHTML = c;
        }
        filtrati = c;
        if (filtrati == 0) {
            resultArray = new Array();
            resultArray[0] = new Array();
            resultArray[0]['table'] = '<h4 class=\"col-md-12 no-margin\"><strong class=\"red\">Spiacente, la ricerca non ha prodotto nessun risultato!</strong></h4>';
        }
        setCookie(cname, valore, 1)
        ordine_lele(resultArray, _sort, posizione);
    }
    function filtra_m(filtro, my_array, campo, _sort, posizione, cname) {
        var c = 0;
        var d = 0;
        var text = '';
        var resultArray = new Array();
        var x = my_array.length;
        valore = document.getElementById(filtro).value;
        var campi = campo.split(',');
        var n_campi = campi.length;
        if (n_campi == 1) {
            var campo = campi[0];
            for (i = 0; i < x; i++) {
                if ((my_array[i][campo]).toLowerCase().search(valore.toLowerCase()) > -1) {
                    resultArray[c] = my_array[i];
                    c++;
                }
            }
        } else {
            var record_ok = new Array();
            for (ii = 0; ii < campi.length; ii++) {
                var x_campo = campi[ii];
                for (i = 0; i < x; i++) {
                    if ((my_array[i][x_campo]).toLowerCase().search(valore.toLowerCase()) > -1) {
                        if (inArray(i, record_ok) == false) {
                            record_ok[d] = i;
                            d++;
                        }
                    }
                }
            }
            var n_record = record_ok.length;
            for (i = 0; i < n_record; i++) {
                var id = record_ok[i]
                resultArray[c] = my_array[id];
                c++;
            }
        }
        if (document.getElementById('numero_in_tabella')) {
            document.getElementById('numero_in_tabella').innerHTML = c;
        }
        filtrati = c;
        if (filtrati == 0) {
            resultArray = new Array();
            resultArray[0] = new Array();
            resultArray[0]['table'] = '<h4 class=\"col-md-12 no-margin\"><strong class=\"red\">Spiacente, la ricerca non ha prodotto nessun risultato!</strong></h4>';
        }
        setCookie(cname, valore, 1)
        ordine_lele(resultArray, _sort, posizione);
    }
    function seleziona(valore, my_array) {
        var c = 0;
        var text = '';
        var resultArray = new Array();
        var x = my_array.length;
        if (valore) {
            for (i = 0; i < x; i++) {
                var cat = my_array[i]['categorie'];
                var a_cat = cat.split(',');
                var n_cat = a_cat.length;
                for (ii = 0; ii < n_cat; ii++) {
                    if (a_cat[ii] == valore) {
                        resultArray[c] = my_array[i]['table'];
                        c++;
                    }
                }
            }
        } else {
            for (i = 0; i < x; i++) {
                resultArray[c] = my_array[i]['table'];
                c++;
            }
        }
        for (i = 0; i < c; i++) {
            console.log()
            text += resultArray[i];
        }
        document.getElementById('qui').innerHTML = text;
    }
    function presenta_msg() {
        var msg = '';
        if (msg) {
            alert(msg);
        }
    }
    $(document).ready(function() {
        ora();
    });
    $(window).bind("load", function() {
        presenta_msg();
    });
    $('.no-enter').bind("keypress", function(e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            return false;
        }
    });
    </script>
</body>
</html>

