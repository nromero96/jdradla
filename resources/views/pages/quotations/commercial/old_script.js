jQuery(function ($) {
    $('.quform-field').not('textarea').on('keydown keypress', function (e) {
        if (e.which === 13) {
            e.preventDefault();
        }
    });
});

jQuery(document).ready(function($) {

    var codcontricu="";


    $("select[name='quform_41_941']").change(function () {
        var paselect = $("select[name='quform_41_941']").val();
        var getcodcont = codpaises(paselect);
        
        var ac = new google.maps.places.Autocomplete(
        (document.getElementById('quform_41_5023_abcde2')), {
                types: ['(regions)'],
                componentRestrictions: {
                    country: getcodcont
                }
        });
    
        var ac1 = new google.maps.places.Autocomplete(
        (document.getElementById('quform_41_5055_abcde2')), {
                types: ['(regions)'],
                componentRestrictions: {
                    country: getcodcont
                }
        });
    });
    
    
    $("select[name='quform_24_489']").change(function () {
        var paselect = $("select[name='quform_24_489']").val();
        var getcodcont = codpaises(paselect);
        
    
        var ac2 = new google.maps.places.Autocomplete(
        (document.getElementById('quform_24_2797_abcde1')), {
                types: ['(regions)'],
                componentRestrictions: {
                    country: getcodcont
                }
        });
    
        var ac3 = new google.maps.places.Autocomplete(
        (document.getElementById('quform_24_3818_abcde1')), {
                types: ['(regions)'],
                componentRestrictions: {
                    country: getcodcont
                }
        });
    
        var ac4 = new google.maps.places.Autocomplete(
        (document.getElementById('quform_24_2015_abcde1')), {
                types: ['(regions)'],
                componentRestrictions: {
                    country: getcodcont
                }
        });
    
    });
    
    
    $("select[name='quform_24_941']").change(function () {
        var paselect = $("select[name='quform_24_941']").val();
        var getcodcont = codpaises(paselect);
        
    
        var ac2 = new google.maps.places.Autocomplete(
        (document.getElementById('quform_24_2798_abcde1')), {
                types: ['(regions)'],
                componentRestrictions: {
                    country: getcodcont
                }
        });
    
        var ac3 = new google.maps.places.Autocomplete(
        (document.getElementById('quform_24_2009_abcde1')), {
                types: ['(regions)'],
                componentRestrictions: {
                    country: getcodcont
                }
        });
    
    
        var ac4 = new google.maps.places.Autocomplete(
        (document.getElementById('quform_24_2017_abcde1')), {
                types: ['(regions)'],
                componentRestrictions: {
                    country: getcodcont
                }
        });
    
    });
    
    
    $("select[name='quform_24_2918']").change(function () {
        var paselect = $("select[name='quform_24_2918']").val();
        var getcodcont = codpaises(paselect);
        
    
        var ac2 = new google.maps.places.Autocomplete(
        (document.getElementById('quform_24_5475_abcde1')), {
                types: ['(regions)'],
                componentRestrictions: {
                    country: getcodcont
                }
        });
    });
    
    
    $("select[name='quform_24_2919']").change(function () {
        var paselect = $("select[name='quform_24_2919']").val();
        var getcodcont = codpaises(paselect);
        
    
        var ac2 = new google.maps.places.Autocomplete(
        (document.getElementById('quform_24_5477_abcde1')), {
                types: ['(regions)'],
                componentRestrictions: {
                    country: getcodcont
                }
        });
    });

   
        /*Inicializar buscador ciaudad*/
        codcontricu2 = "us";

        var accu = new google.maps.places.Autocomplete(
        (document.getElementById('quform_41_5017_abcde2')), {
            types: ['(regions)'],
            componentRestrictions: {
                country: codcontricu2
            }
        });
    /*-------*/
    
    

    /**FORM (quform-form-abcde1)   ESPAÑOL */ 

    $("select[name='quform_47_489']").change(function () {
        var paselect = $("select[name='quform_47_489']").val();
        var getcodcont = codpaises(paselect);
        
    
        var fe2 = new google.maps.places.Autocomplete(
        (document.getElementById('quform_47_2797_abcde1')), {
                types: ['(regions)'],
                componentRestrictions: {
                    country: getcodcont
                }
        });
    
        var fe3 = new google.maps.places.Autocomplete(
        (document.getElementById('quform_47_2015_abcde1')), {
                types: ['(regions)'],
                componentRestrictions: {
                    country: getcodcont
                }
        });

        var fe4 = new google.maps.places.Autocomplete(
            (document.getElementById('quform_47_3818_abcde1')), {
                    types: ['(regions)'],
                    componentRestrictions: {
                        country: getcodcont
                    }
            });
    
    });

    $("select[name='quform_47_941']").change(function () {
        var paselect = $("select[name='quform_47_941']").val();
        var getcodcont = codpaises(paselect);
        
    
        var fe2 = new google.maps.places.Autocomplete(
        (document.getElementById('quform_47_2017_abcde1')), {
                types: ['(regions)'],
                componentRestrictions: {
                    country: getcodcont
                }
        });
    
        var fe3 = new google.maps.places.Autocomplete(
        (document.getElementById('quform_47_2798_abcde1')), {
                types: ['(regions)'],
                componentRestrictions: {
                    country: getcodcont
                }
        });

        var fe4 = new google.maps.places.Autocomplete(
            (document.getElementById('quform_47_2009_abcde1')), {
                    types: ['(regions)'],
                    componentRestrictions: {
                        country: getcodcont
                    }
            });
    
    });

  /* Inicializar buscador USA */
        codcontricu1 = "us";
        var accu = new google.maps.places.Autocomplete(
        (document.getElementById('quform_48_5017_abcde2')), {
            types: ['(regions)'],
            componentRestrictions: {
                country: codcontricu1
            }
        });
   /*-----*/


    $("select[name='quform_47_2918']").change(function () {
        var paselect = $("select[name='quform_47_2918']").val();
        var getcodcont = codpaises(paselect);
        
    
        var ac2 = new google.maps.places.Autocomplete(
        (document.getElementById('quform_47_5475_abcde1')), {
                types: ['(regions)'],
                componentRestrictions: {
                    country: getcodcont
                }
        });
    });

    $("select[name='quform_47_2919']").change(function () {
        var paselect = $("select[name='quform_47_2919']").val();
        var getcodcont = codpaises(paselect);
        
    
        var ac2 = new google.maps.places.Autocomplete(
        (document.getElementById('quform_47_5477_abcde1')), {
                types: ['(regions)'],
                componentRestrictions: {
                    country: getcodcont
                }
        });
    });

    $("select[name='quform_48_941']").change(function () {
        var paselect = $("select[name='quform_48_941']").val();
        var getcodcont = codpaises(paselect);
        
        var ac = new google.maps.places.Autocomplete(
        (document.getElementById('quform_48_5055_abcde2')), {
                types: ['(regions)'],
                componentRestrictions: {
                    country: getcodcont
                }
        });
    
        var ac1 = new google.maps.places.Autocomplete(
        (document.getElementById('quform_48_5023_abcde2')), {
                types: ['(regions)'],
                componentRestrictions: {
                    country: getcodcont
                }
        });
    });
    
    /**END FORM (quform-form-abcde1)   ESPAÑOL */ 
    
    
    function codpaises(paselect){
        if( paselect == "Afghanistan" ){ codcontri = "af" }
        if( paselect == "Åland Islands" ){ codcontri = "ax" }
        if( paselect == "Albania" ){ codcontri = "al" }
        if( paselect == "Algeria" ){ codcontri = "dz" }
        if( paselect == "American Samoa" ){ codcontri = "as" }
        if( paselect == "Andorra" ){ codcontri = "ad" }
        if( paselect == "Angola" ){ codcontri = "ao" }
        if( paselect == "Anguilla" ){ codcontri = "ai" }
        if( paselect == "Antarctica" ){ codcontri = "aq" }
        if( paselect == "Antigua and Barbuda" ){ codcontri = "ag" }
        if( paselect == "Argentina" ){ codcontri = "ar" }
        if( paselect == "Armenia" ){ codcontri = "am" }
        if( paselect == "Aruba" ){ codcontri = "aw" }
        if( paselect == "Australia" ){ codcontri = "au" }
        if( paselect == "Austria" ){ codcontri = "at" }
        if( paselect == "Azerbaijan" ){ codcontri = "az" }
        if( paselect == "Bahamas" ){ codcontri = "bs" }
        if( paselect == "Bahrain" ){ codcontri = "bh" }
        if( paselect == "Bangladesh" ){ codcontri = "bd" }
        if( paselect == "Barbados" ){ codcontri = "bb" }
        if( paselect == "Belarus" ){ codcontri = "by" }
        if( paselect == "Belgium" ){ codcontri = "be" }
        if( paselect == "Belize" ){ codcontri = "bz" }
        if( paselect == "Benin" ){ codcontri = "bj" }
        if( paselect == "Bermuda" ){ codcontri = "bm" }
        if( paselect == "Bhutan" ){ codcontri = "bt" }
        if( paselect == "Bolivia" ){ codcontri = "bo" }
        if( paselect == "Bonaire, Sint Eustatius and Saba" ){ codcontri = "bq" }
        if( paselect == "Bosnia and Herzegovina" ){ codcontri = "ba" }
        if( paselect == "Botswana" ){ codcontri = "bw" }
        if( paselect == "Bouvet Island" ){ codcontri = "bv" }
        if( paselect == "Brazil" ){ codcontri = "br" }
        if( paselect == "British Indian Ocean Territory" ){ codcontri = "io" }
        if( paselect == "Brunei Darussalam" ){ codcontri = "bn" }
        if( paselect == "Bulgaria" ){ codcontri = "bg" }
        if( paselect == "Burkina Faso" ){ codcontri = "bf" }
        if( paselect == "Burundi" ){ codcontri = "bi" }
        if( paselect == "Cabo Verde" ){ codcontri = "cv" }
        if( paselect == "Cambodia" ){ codcontri = "kh" }
        if( paselect == "Cameroon" ){ codcontri = "cm" }
        if( paselect == "Canada" ){ codcontri = "ca" }
        if( paselect == "Cayman Islands" ){ codcontri = "ky" }
        if( paselect == "Central African Republic" ){ codcontri = "cf" }
        if( paselect == "Chad" ){ codcontri = "td" }
        if( paselect == "Chile" ){ codcontri = "cl" }
        if( paselect == "China" ){ codcontri = "cn" }
        if( paselect == "Christmas Island" ){ codcontri = "cx" }
        if( paselect == "Cocos (Keeling) Islands" ){ codcontri = "cc" }
        if( paselect == "Colombia" ){ codcontri = "co" }
        if( paselect == "Comoros" ){ codcontri = "km" }
        if( paselect == "Congo" ){ codcontri = "cg" }
        if( paselect == "Congo, Democratic Republic of the" ){ codcontri = "cd" }
        if( paselect == "Cook Islands" ){ codcontri = "ck" }
        if( paselect == "Costa Rica" ){ codcontri = "cr" }
        if( paselect == "Côte d'Ivoire" ){ codcontri = "ci" }
        if( paselect == "Croatia" ){ codcontri = "hr" }
        if( paselect == "Cuba" ){ codcontri = "cu" }
        if( paselect == "Curaçao" ){ codcontri = "cw" }
        if( paselect == "Cyprus" ){ codcontri = "cy" }
        if( paselect == "Czech Republic" ){ codcontri = "cz" }
        if( paselect == "Denmark" ){ codcontri = "dk" }
        if( paselect == "Djibouti" ){ codcontri = "dj" }
        if( paselect == "Dominica" ){ codcontri = "dm" }
        if( paselect == "Dominican Republic" ){ codcontri = "do" }
        if( paselect == "Ecuador" ){ codcontri = "ec" }
        if( paselect == "Egypt" ){ codcontri = "eg" }
        if( paselect == "El Salvador" ){ codcontri = "sv" }
        if( paselect == "Equatorial Guinea" ){ codcontri = "gq" }
        if( paselect == "Eritrea" ){ codcontri = "er" }
        if( paselect == "Estonia" ){ codcontri = "ee" }
        if( paselect == "Eswatini" ){ codcontri = "sz" }
        if( paselect == "Ethiopia" ){ codcontri = "et" }
        if( paselect == "Falkland Islands (Malvinas)" ){ codcontri = "fk" }
        if( paselect == "Faroe Islands" ){ codcontri = "fo" }
        if( paselect == "Fiji" ){ codcontri = "fj" }
        if( paselect == "Finland" ){ codcontri = "fi" }
        if( paselect == "France" ){ codcontri = "fr" }
        if( paselect == "French Guiana" ){ codcontri = "gf" }
        if( paselect == "French Polynesia" ){ codcontri = "pf" }
        if( paselect == "French Southern Territories" ){ codcontri = "tf" }
        if( paselect == "Gabon" ){ codcontri = "ga" }
    if( paselect == "Gambia" ){ codcontri = "gm" }
    if( paselect == "Georgia" ){ codcontri = "ge" }
    if( paselect == "Germany" ){ codcontri = "de" }
    if( paselect == "Ghana" ){ codcontri = "gh" }
    if( paselect == "Gibraltar" ){ codcontri = "gi" }
    if( paselect == "Greece" ){ codcontri = "gr" }
    if( paselect == "Greenland" ){ codcontri = "gl" }
    if( paselect == "Grenada" ){ codcontri = "gd" }
    if( paselect == "Guadeloupe" ){ codcontri = "gp" }
    if( paselect == "Guam" ){ codcontri = "gu" }
    if( paselect == "Guatemala" ){ codcontri = "gt" }
    if( paselect == "Guernsey" ){ codcontri = "gg" }
    if( paselect == "Guinea" ){ codcontri = "gn" }
    if( paselect == "Guinea-Bissau" ){ codcontri = "gw" }
    if( paselect == "Guyana" ){ codcontri = "gy" }
    if( paselect == "Haiti" ){ codcontri = "ht" }
    if( paselect == "Heard and McDonald Islands" ){ codcontri = "hm" }
    if( paselect == "Holy See (Vatican City State)" ){ codcontri = "va" }
    if( paselect == "Honduras" ){ codcontri = "hn" }
    if( paselect == "Hong Kong" ){ codcontri = "hk" }
    if( paselect == "Hungary" ){ codcontri = "hu" }
    if( paselect == "Iceland" ){ codcontri = "is" }
    if( paselect == "India" ){ codcontri = "in" }
    if( paselect == "Indonesia" ){ codcontri = "id" }
    if( paselect == "Iran" ){ codcontri = "ir" }
    if( paselect == "Iraq" ){ codcontri = "iq" }
    if( paselect == "Ireland" ){ codcontri = "ie" }
    if( paselect == "Isle of Man" ){ codcontri = "im" }
    if( paselect == "Israel" ){ codcontri = "il" }
    if( paselect == "Italy" ){ codcontri = "it" }
    if( paselect == "Jamaica" ){ codcontri = "jm" }
    if( paselect == "Japan" ){ codcontri = "jp" }
    if( paselect == "Jersey" ){ codcontri = "je" }
    if( paselect == "Jordan" ){ codcontri = "jo" }
    if( paselect == "Kazakhstan" ){ codcontri = "kz" }
    if( paselect == "Kenya" ){ codcontri = "ke" }
    if( paselect == "Kiribati" ){ codcontri = "ki" }
    if( paselect == "Korea, North" ){ codcontri = "kp" }
    if( paselect == "Korea, South" ){ codcontri = "kr" }
    if( paselect == "Kuwait" ){ codcontri = "kw" }
    if( paselect == "Kyrgyzstan" ){ codcontri = "kg" }
    if( paselect == "Laos" ){ codcontri = "la" }
    if( paselect == "Latvia" ){ codcontri = "lv" }
    if( paselect == "Lebanon" ){ codcontri = "lb" }
    if( paselect == "Lesotho" ){ codcontri = "ls" }
    if( paselect == "Liberia" ){ codcontri = "lr" }
    if( paselect == "Libya" ){ codcontri = "ly" }
    if( paselect == "Liechtenstein" ){ codcontri = "li" }
    if( paselect == "Lithuania" ){ codcontri = "lt" }
    if( paselect == "Luxembourg" ){ codcontri = "lu" }
    if( paselect == "Macao" ){ codcontri = "mo" }
    if( paselect == "Madagascar" ){ codcontri = "mg" }
    if( paselect == "Malawi" ){ codcontri = "mw" }
    if( paselect == "Malaysia" ){ codcontri = "my" }
    if( paselect == "Maldives" ){ codcontri = "mv" }
    if( paselect == "Mali" ){ codcontri = "ml" }
    if( paselect == "Malta" ){ codcontri = "mt" }
    if( paselect == "Marshall Islands" ){ codcontri = "mh" }
    if( paselect == "Martinique" ){ codcontri = "mq" }
    if( paselect == "Mauritania" ){ codcontri = "mr" }
    if( paselect == "Mauritius" ){ codcontri = "mu" }
    if( paselect == "Mayotte" ){ codcontri = "yt" }
    if( paselect == "Mexico" ){ codcontri = "mx" }
    if( paselect == "Micronesia" ){ codcontri = "fm" }
    if( paselect == "Moldova" ){ codcontri = "md" }
    if( paselect == "Monaco" ){ codcontri = "mc" }
    if( paselect == "Mongolia" ){ codcontri = "mn" }
    if( paselect == "Montenegro" ){ codcontri = "me" }
    if( paselect == "Montserrat" ){ codcontri = "ms" }
    if( paselect == "Morocco" ){ codcontri = "ma" }
    if( paselect == "Mozambique" ){ codcontri = "mz" }
    if( paselect == "Myanmar" ){ codcontri = "mm" }
    if( paselect == "Namibia" ){ codcontri = "na" }
    if( paselect == "Nauru" ){ codcontri = "nr" }
    if( paselect == "Nepal" ){ codcontri = "np" }
    if( paselect == "Netherlands" ){ codcontri = "nl" }
    if( paselect == "New Caledonia" ){ codcontri = "nc" }
    if( paselect == "New Zealand" ){ codcontri = "nz" }
    if( paselect == "Nicaragua" ){ codcontri = "ni" }
    if( paselect == "Niger" ){ codcontri = "ne" }
    if( paselect == "Nigeria" ){ codcontri = "ng" }
    if( paselect == "Niue" ){ codcontri = "nu" }
    if( paselect == "Norfolk Island" ){ codcontri = "nf" }
    if( paselect == "North Macedonia" ){ codcontri = "mk" }
    if( paselect == "Northern Mariana Islands" ){ codcontri = "mp" }
    if( paselect == "Norway" ){ codcontri = "no" }
    if( paselect == "Oman" ){ codcontri = "om" }
    if( paselect == "Pakistan" ){ codcontri = "pk" }
    if( paselect == "Palau" ){ codcontri = "pw" }
    if( paselect == "Palestine" ){ codcontri = "ps" }
    if( paselect == "Panama" ){ codcontri = "pa" }
    if( paselect == "Papua New Guinea" ){ codcontri = "pg" }
    if( paselect == "Paraguay" ){ codcontri = "py" }
    if( paselect == "Peru" ){ codcontri = "pe" }
    if( paselect == "Philippines" ){ codcontri = "ph" }
    if( paselect == "Pitcairn" ){ codcontri = "pn" }
    if( paselect == "Poland" ){ codcontri = "pl" }
    if( paselect == "Portugal" ){ codcontri = "pt" }
    if( paselect == "Puerto Rico" ){ codcontri = "pr" }
    if( paselect == "Qatar" ){ codcontri = "qa" }
    if( paselect == "Réunion" ){ codcontri = "re" }
    if( paselect == "Romania" ){ codcontri = "ro" }
    if( paselect == "Russian Federation" ){ codcontri = "ru" }
    if( paselect == "Rwanda" ){ codcontri = "rw" }
    if( paselect == "Saint Barthélemy" ){ codcontri = "bl" }
    if( paselect == "Saint Helena, Ascension and Tristan da Cunha" ){ codcontri = "sh" }
    if( paselect == "Saint Kitts and Nevis" ){ codcontri = "kn" }
    if( paselect == "Saint Lucia" ){ codcontri = "lc" }
    if( paselect == "Saint Martin (French part)" ){ codcontri = "mf" }
    if( paselect == "Saint Pierre and Miquelon" ){ codcontri = "pm" }
    if( paselect == "Saint Vincent and the Grenadines" ){ codcontri = "vc" }
    if( paselect == "Samoa" ){ codcontri = "ws" }
    if( paselect == "San Marino" ){ codcontri = "sm" }
    if( paselect == "Sao Tome and Principe" ){ codcontri = "st" }
    if( paselect == "Saudi Arabia" ){ codcontri = "sa" }
    if( paselect == "Senegal" ){ codcontri = "sn" }
    if( paselect == "Serbia" ){ codcontri = "rs" }
    if( paselect == "Seychelles" ){ codcontri = "sc" }
    if( paselect == "Sierra Leone" ){ codcontri = "sl" }
    if( paselect == "Singapore" ){ codcontri = "sg" }
    if( paselect == "Sint Maarten (Dutch part)" ){ codcontri = "sx" }
    if( paselect == "Slovakia" ){ codcontri = "sk" }
    if( paselect == "Slovenia" ){ codcontri = "si" }
    if( paselect == "Solomon Islands" ){ codcontri = "sb" }
    if( paselect == "Somalia" ){ codcontri = "so" }
    if( paselect == "South Africa" ){ codcontri = "za" }
    if( paselect == "South Georgia and the South Sandwich Islands" ){ codcontri = "gs" }
    if( paselect == "South Sudan" ){ codcontri = "ss" }
    if( paselect == "Spain" ){ codcontri = "es" }
    if( paselect == "Sri Lanka" ){ codcontri = "lk" }
    if( paselect == "Sudan" ){ codcontri = "sd" }
    if( paselect == "Suriname" ){ codcontri = "sr" }
    if( paselect == "Svalbard And Jan Mayen Islands" ){ codcontri = "sj" }
    if( paselect == "Sweden" ){ codcontri = "se" }
    if( paselect == "Switzerland" ){ codcontri = "ch" }
    if( paselect == "Syria" ){ codcontri = "sy" }
    if( paselect == "Taiwan" ){ codcontri = "tw" }
    if( paselect == "Tajikistan" ){ codcontri = "tj" }
    if( paselect == "Tanzania" ){ codcontri = "tz" }
    if( paselect == "Thailand" ){ codcontri = "th" }
    if( paselect == "Timor-Leste" ){ codcontri = "tl" }
    if( paselect == "Togo" ){ codcontri = "tg" }
    if( paselect == "Tokelau" ){ codcontri = "tk" }
    if( paselect == "Tonga" ){ codcontri = "to" }
    if( paselect == "Trinidad and Tobago" ){ codcontri = "tt" }
    if( paselect == "Tunisia" ){ codcontri = "tn" }
    if( paselect == "Turkey" ){ codcontri = "tr" }
    if( paselect == "Turkmenistan" ){ codcontri = "tm" }
    if( paselect == "Turks and Caicos Islands" ){ codcontri = "tc" }
    if( paselect == "Tuvalu" ){ codcontri = "tv" }
    if( paselect == "Uganda" ){ codcontri = "ug" }
    if( paselect == "Ukraine" ){ codcontri = "ua" }
    if( paselect == "United Arab Emirates" ){ codcontri = "ae" }
    if( paselect == "United Kingdom" ){ codcontri = "gb" }
    if( paselect == "United States" ){ codcontri = "us" }
    if( paselect == "Uruguay" ){ codcontri = "uy" }
    if( paselect == "Uzbekistan" ){ codcontri = "uz" }
    if( paselect == "Vanuatu" ){ codcontri = "vu" }
    if( paselect == "Venezuela" ){ codcontri = "ve" }
    if( paselect == "Vietnam" ){ codcontri = "vn" }
    if( paselect == "Virgin Islands (British)" ){ codcontri = "vg" }
    if( paselect == "Virgin Islands (U.S.)" ){ codcontri = "vi" }
    if( paselect == "Wallis and Futuna" ){ codcontri = "wf" }
    if( paselect == "Western Sahara" ){ codcontri = "eh" }
    if( paselect == "Yemen" ){ codcontri = "ye" }
    if( paselect == "Zambia" ){ codcontri = "zm" }
    if( paselect == "Zimbabwe" ){ codcontri = "zw" }
    
        return codcontri;
    }
    
    
    /*... REFRESH INPUT AIR...*/
    
    // refresh input fields 1
    
        $('.quform-field-24_3050').change(function () {
            $('.quform-field-24_2357').prop('selectedIndex', 0).triggerHandler('change');
            $('.quform-field-24_3040').val('').triggerHandler('change');
            $('.quform-field-24_2352').val('').triggerHandler('change');
            $('.quform-field-24_3028').val('').triggerHandler('change');
            $('.quform-field-24_3902').prop('selectedIndex', 0).triggerHandler('change');
            $('.quform-field-24_3032').val('').triggerHandler('change');
            $('.quform-field-24_3034').val('').triggerHandler('change');
            $('.quform-field-24_3036').val('').triggerHandler('change');
            $('.quform-field-24_3903').prop('selectedIndex', 0).triggerHandler('change');
        });
    
    /*... REFRESH INPUT PERSONAL...*/
    
    // refresh input fields 1
    
        $('.quform-field-41_4702').change(function () {
            $('.quform-field-41_4934').prop('selectedIndex', 0).triggerHandler('change');
            $('.quform-field-41_941').prop('selectedIndex', 0).triggerHandler('change');
            $('.quform-field-41_5074').prop('selectedIndex', 0).triggerHandler('change');
            $('.quform-field-41_5076').prop('selectedIndex', 0).triggerHandler('change');
        });
    
    // Perso refresh input fields 2 Auto
    
        $('.quform-field-41_4934').change(function () {
            $('.quform-field-41_5005').prop('checked', false).triggerHandler('change');
            $('.quform-field-41_5012').prop('checked', false).triggerHandler('change');
            $('.quform-field-41_5081').prop('checked', false).triggerHandler('change');
            $('.quform-field-41_5017').val('').triggerHandler('change');
            $('.quform-field-41_5018').prop('selectedIndex', 0).triggerHandler('change');
        });
    
    // Perso refresh input fields 3 Auto
    
        $('.quform-field-41_941').change(function () {
            $('.quform-field-41_5005').prop('checked', false).triggerHandler('change');
            $('.quform-field-41_5012').prop('checked', false).triggerHandler('change');
            $('.quform-field-41_5081').prop('checked', false).triggerHandler('change');
            $('.quform-field-41_5023').val('').triggerHandler('change');
            $('.quform-field-41_5055').val('').triggerHandler('change');
        });
    
    // Perso refresh input fields 4 Auto
    
        $('.quform-field-41_5005').change(function () {
            $('.quform-field-41_5017').val('').triggerHandler('change');
            $('.quform-field-41_5018').prop('selectedIndex', 0).triggerHandler('change');
    
        });
    
    // Perso refresh input fields 5 Auto
    
        $('.quform-field-41_5012').change(function () {
            $('.quform-field-41_5023').val('').triggerHandler('change');
            $('.quform-field-41_5055').val('').triggerHandler('change');
        });
    
    // Perso refresh input fields 6 Auto
    
        $('.quform-field-41_5081').change(function () {
            $('.quform-field-41_5023_abcde2').val('').triggerHandler('change');
            $('.quform-field-41_5055_abcde2').val('').triggerHandler('change');
        });
    

/*... REFRESH INPUT PERSONAL SPANISH...*/
    
    // refresh input fields 1
    
        $('.quform-field-48_4702').change(function () {
            $('.quform-field-48_4934').prop('selectedIndex', 0).triggerHandler('change');
            $('.quform-field-48_941').prop('selectedIndex', 0).triggerHandler('change');
            $('.quform-field-48_5074').prop('selectedIndex', 0).triggerHandler('change');
            $('.quform-field-48_5076').prop('selectedIndex', 0).triggerHandler('change');
        });
    
    // Perso refresh input fields 2 Auto
    
        $('.quform-field-48_4934').change(function () {
            $('.quform-field-48_5005').prop('checked', false).triggerHandler('change');
            $('.quform-field-48_5012').prop('checked', false).triggerHandler('change');
            $('.quform-field-48_5081').prop('checked', false).triggerHandler('change');
            $('.quform-field-48_5017').val('').triggerHandler('change');
            $('.quform-field-48_5018').prop('selectedIndex', 0).triggerHandler('change');
        });
    
    // Perso refresh input fields 3 Auto
    
        $('.quform-field-48_941').change(function () {
            $('.quform-field-48_5005').prop('checked', false).triggerHandler('change');
            $('.quform-field-48_5012').prop('checked', false).triggerHandler('change');
            $('.quform-field-48_5081').prop('checked', false).triggerHandler('change');
            $('.quform-field-48_5023').val('').triggerHandler('change');
            $('.quform-field-48_5055').val('').triggerHandler('change');
        });
    
    // Perso refresh input fields 4 Auto
    
        $('.quform-field-48_5005').change(function () {
            $('.quform-field-48_5017').val('').triggerHandler('change');
            $('.quform-field-48_5018').prop('selectedIndex', 0).triggerHandler('change');
    
        });
    
    // Perso refresh input fields 5 Auto
    
        $('.quform-field-48_5012').change(function () {
            $('.quform-field-48_5023').val('').triggerHandler('change');
            $('.quform-field-48_5055').val('').triggerHandler('change');
        });
    
    // Perso refresh input fields 6 Auto
    
        $('.quform-field-48_5081').change(function () {
            $('.quform-field-48_5023_abcde2').val('').triggerHandler('change');
            $('.quform-field-48_5055_abcde2').val('').triggerHandler('change');
        });
    
    
        /*... RESETEAR FORM NUEVO ...*/
           var count_click1 = 0;
           
           $('.optionstransport').on('change', function() {
            count_click1_add();
           
            if(count_click1=="2"){
                 count_click1 = 0;
                 
                $(this).closest('.quform-form').data('quform').reset();
                $("#quform-form-abcde1 select").prop("selectedIndex", 0);
    
                $('#mivaltotalweight').text("0.00" + " Kg");
                $('.valsumatotalcdweight').val('0.00');
    
                $('#mivaltotalcbmot').text("0.00" + " m³");
                $('.valsumatotalcbm').val('0.00');
    
                $('#mivaltotalnfcbm').text("0.00" + " m³");
                $('input[name="quform_24_3809"]').val('0.00');
    
                return false;
           } 
           
           });
           
           function count_click1_add() {
             count_click1 += 1;
            }
       
          
          $(".quform-element-24_2927").addClass("d-none");
          $(".quform-element-24_2924").addClass("d-none");
    
    
            $(".quform-back").on( "click", function() {
                $(".quform-next").removeClass("d-none");
            });
       
       /*... CALCULAR CARGO DETAIL AIR/LCL/LTL/BREAK BULK ...*/
       
       /*... CARGO DETAILS #1 ...*/
           $(".valcgdl1, .valcgdlqt1").keyup(function(){
               if($(".measuretypecd1 option:selected").val() == "M."){
                   metersvalcgdl1_nf();
               } else if($(".measuretypecd1 option:selected").val() == "Cm."){
                   centimetersvalcgdl1_nf();
               } else if($(".measuretypecd1 option:selected").val() == "Inch"){
                   inchvalcgdl1_nf();
               } else if($(".measuretypecd1 option:selected").val() == "Feet"){
                   feetvalcgdl1_nf();
               }
               totalvolwgt();
    
           });
       
           $(".measuretypecd1").on('change', function(){
               if(this.value == "M."){
                    metersvalcgdl1_nf();
               } else if(this.value == "Cm."){
                    centimetersvalcgdl1_nf();
               } else if(this.value == "Inch"){
                    inchvalcgdl1_nf();
               } else if(this.value == "Feet"){
                    feetvalcgdl1_nf();     
               }
               totalvolwgt();
    
           });
       
           
           function metersvalcgdl1_nf(){
               quant = parseInt($('.valcgdlqt1').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl1").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               volumencbm = (total * quant).toFixed(2);
               $('.resulvolumencbm1').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 0.006).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt1').val(volumencwt);
               
           }
       
           function centimetersvalcgdl1_nf(){
               quant = parseInt($('.valcgdlqt1').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl1").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 1000000).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm1').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 6000).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt1').val(volumencwt);
           }
           
           function inchvalcgdl1_nf(){
               quant = parseInt($('.valcgdlqt1').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl1").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 61023.7).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm1').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 366.14).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt1').val(volumencwt);
           }
           
           function feetvalcgdl1_nf(){ 
               quant = parseInt($('.valcgdlqt1').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl1").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 35.3147).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm1').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 0.2118).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt1').val(volumencwt);
           }
       
       
       /*... CARGO DETAILS #2 ...*/
           $(".valcgdl2, .valcgdlqt2").keyup(function(){
       
               if($(".measuretypecd2 option:selected").val() == "M."){
                   metersvalcgdl2_nf();
               } else if($(".measuretypecd2 option:selected").val() == "Cm."){
                   centimetersvalcgdl2_nf();
               } else if($(".measuretypecd2 option:selected").val() == "Inch"){
                   inchvalcgdl2_nf();
               } else if($(".measuretypecd2 option:selected").val() == "Feet"){
                   feetvalcgdl2_nf();
               }
               totalvolwgt();
           });
       
           $(".measuretypecd2").on('change', function(){
               if(this.value == "M."){
                   metersvalcgdl2_nf();
               } else if(this.value == "Cm."){
                   centimetersvalcgdl2_nf();
               } else if(this.value == "Inch"){
                   inchvalcgdl2_nf();
               } else if(this.value == "Feet"){
                   feetvalcgdl2_nf();
               }
               totalvolwgt();
           });
       
           
           function metersvalcgdl2_nf(){
               quant = parseInt($('.valcgdlqt2').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl2").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               volumencbm = (total * quant).toFixed(2);
               $('.resulvolumencbm2').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 0.006).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt2').val(volumencwt);
               
           }
       
           function centimetersvalcgdl2_nf(){
               quant = parseInt($('.valcgdlqt2').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl2").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 1000000).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm2').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 6000).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt2').val(volumencwt);
           }
           
           function inchvalcgdl2_nf(){
               quant = parseInt($('.valcgdlqt2').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl2").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 61023.7).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm2').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 366.14).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt2').val(volumencwt);
           }
           
           function feetvalcgdl2_nf(){ 
               quant = parseInt($('.valcgdlqt2').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl2").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 35.3147).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm2').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 0.2118).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt2').val(volumencwt);
           }
       
       
       /*... CARGO DETAILS #3 ...*/
           $(".valcgdl3, .valcgdlqt3").keyup(function(){
       
               if($(".measuretypecd3 option:selected").val() == "M."){
                   metersvalcgdl3_nf();
               } else if($(".measuretypecd3 option:selected").val() == "Cm."){
                   centimetersvalcgdl3_nf();
               } else if($(".measuretypecd3 option:selected").val() == "Inch"){
                   inchvalcgdl3_nf();
               } else if($(".measuretypecd3 option:selected").val() == "Feet"){
                   feetvalcgdl3_nf();
               }
               totalvolwgt();
           });
       
           $(".measuretypecd3").on('change', function(){
               if(this.value == "M."){
                   metersvalcgdl3_nf();
               } else if(this.value == "Cm."){
                   centimetersvalcgdl3_nf();
               } else if(this.value == "Inch"){
                   inchvalcgdl3_nf();
               } else if(this.value == "Feet"){
                   feetvalcgdl3_nf();
               }
               totalvolwgt();
           });
       
           
           function metersvalcgdl3_nf(){
               quant = parseInt($('.valcgdlqt3').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl3").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               volumencbm = (total * quant).toFixed(2);
               $('.resulvolumencbm3').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 0.006).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt3').val(volumencwt);
               
           }
       
           function centimetersvalcgdl3_nf(){
               quant = parseInt($('.valcgdlqt3').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl3").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 1000000).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm3').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 6000).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt3').val(volumencwt);
           }
           
           function inchvalcgdl3_nf(){
               quant = parseInt($('.valcgdlqt3').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl3").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 61023.7).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm3').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 366.14).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt3').val(volumencwt);
           }
           
           function feetvalcgdl3_nf(){ 
               quant = parseInt($('.valcgdlqt3').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl3").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 35.3147).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm3').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 0.2118).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt3').val(volumencwt);
           }
       
       
       /*... CARGO DETAILS #4 ...*/
           $(".valcgdl4, .valcgdlqt4").keyup(function(){
       
               if($(".measuretypecd4 option:selected").val() == "M."){
                   metersvalcgdl4_nf();
               } else if($(".measuretypecd4 option:selected").val() == "Cm."){
                   centimetersvalcgdl4_nf();
               } else if($(".measuretypecd4 option:selected").val() == "Inch"){
                   inchvalcgdl4_nf();
               } else if($(".measuretypecd4 option:selected").val() == "Feet"){
                   feetvalcgdl4_nf();
               }
               totalvolwgt();
           });
       
           $(".measuretypecd4").on('change', function(){
               if(this.value == "M."){
                   metersvalcgdl4_nf();
               } else if(this.value == "Cm."){
                   centimetersvalcgdl4_nf();
               } else if(this.value == "Inch"){
                   inchvalcgdl4_nf();
               } else if(this.value == "Feet"){
                   feetvalcgdl4_nf();
               }
               totalvolwgt();
           });
       
           
           function metersvalcgdl4_nf(){
               quant = parseInt($('.valcgdlqt4').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl4").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               volumencbm = (total * quant).toFixed(2);
               $('.resulvolumencbm4').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 0.006).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt4').val(volumencwt);
               
           }
       
           function centimetersvalcgdl4_nf(){
               quant = parseInt($('.valcgdlqt4').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl4").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 1000000).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm4').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 6000).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt4').val(volumencwt);
           }
           
           function inchvalcgdl4_nf(){
               quant = parseInt($('.valcgdlqt4').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl4").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 61023.7).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm4').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 366.14).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt4').val(volumencwt);
           }
           
           function feetvalcgdl4_nf(){ 
               quant = parseInt($('.valcgdlqt4').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl4").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 35.3147).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm4').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 0.2118).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt4').val(volumencwt);
           }
       
       
       /*... CARGO DETAILS #5 ...*/
           $(".valcgdl5, .valcgdlqt5").keyup(function(){
       
               if($(".measuretypecd5 option:selected").val() == "M."){
                   metersvalcgdl5_nf();
               } else if($(".measuretypecd5 option:selected").val() == "Cm."){
                   centimetersvalcgdl5_nf();
               } else if($(".measuretypecd5 option:selected").val() == "Inch"){
                   inchvalcgdl5_nf();
               } else if($(".measuretypecd5 option:selected").val() == "Feet"){
                   feetvalcgdl5_nf();
               }
               totalvolwgt();
           });
       
           $(".measuretypecd5").on('change', function(){
               if(this.value == "M."){
                   metersvalcgdl5_nf();
               } else if(this.value == "Cm."){
                   centimetersvalcgdl5_nf();
               } else if(this.value == "Inch"){
                   inchvalcgdl5_nf();
               } else if(this.value == "Feet"){
                   feetvalcgdl5_nf();
               }
               totalvolwgt();
           });
       
           
           function metersvalcgdl5_nf(){
               quant = parseInt($('.valcgdlqt5').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl5").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               volumencbm = (total * quant).toFixed(2);
               $('.resulvolumencbm5').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 0.006).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt5').val(volumencwt);
               
           }
       
           function centimetersvalcgdl5_nf(){
               quant = parseInt($('.valcgdlqt5').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl5").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 1000000).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm5').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 6000).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt5').val(volumencwt);
           }
           
           function inchvalcgdl5_nf(){
               quant = parseInt($('.valcgdlqt5').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl5").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 61023.7).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm5').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 366.14).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt5').val(volumencwt);
           }
           
           function feetvalcgdl5_nf(){ 
               quant = parseInt($('.valcgdlqt5').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl5").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 35.3147).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm5').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 0.2118).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt5').val(volumencwt);
           }
       
       
       /*... CARGO DETAILS #6 ...*/
           $(".valcgdl6, .valcgdlqt6").keyup(function(){
    
               if($(".measuretypecd6 option:selected").val() == "M."){
                   metersvalcgdl6_nf();
               } else if($(".measuretypecd6 option:selected").val() == "Cm."){
                   centimetersvalcgdl6_nf();
               } else if($(".measuretypecd6 option:selected").val() == "Inch"){
                   inchvalcgdl6_nf();
               } else if($(".measuretypecd6 option:selected").val() == "Feet"){
                   feetvalcgdl6_nf();
               }
               totalvolwgt();
           });
       
           $(".measuretypecd6").on('change', function(){
               if(this.value == "M."){
                   metersvalcgdl6_nf();
               } else if(this.value == "Cm."){
                   centimetersvalcgdl6_nf();
               } else if(this.value == "Inch"){
                   inchvalcgdl6_nf();
               } else if(this.value == "Feet"){
                   feetvalcgdl6_nf();
               }
               totalvolwgt();
           });
       
           
           function metersvalcgdl6_nf(){
               quant = parseInt($('.valcgdlqt6').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl6").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               volumencbm = (total * quant).toFixed(2);
               $('.resulvolumencbm6').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 0.006).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt6').val(volumencwt);
               
           }
       
           function centimetersvalcgdl6_nf(){
               quant = parseInt($('.valcgdlqt6').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl6").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 1000000).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm6').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 6000).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt6').val(volumencwt);
           }
           
           function inchvalcgdl6_nf(){
               quant = parseInt($('.valcgdlqt6').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl6").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 61023.7).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm6').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 366.14).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt6').val(volumencwt);
           }
           
           function feetvalcgdl6_nf(){ 
               quant = parseInt($('.valcgdlqt6').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl6").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 35.3147).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm6').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 0.2118).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt6').val(volumencwt);
           }
       
       
       /*... CARGO DETAILS #7 ...*/
           $(".valcgdl7, .valcgdlqt7").keyup(function(){
       
               if($(".measuretypecd7 option:selected").val() == "M."){
                   metersvalcgdl7_nf();
               } else if($(".measuretypecd7 option:selected").val() == "Cm."){
                   centimetersvalcgdl7_nf();
               } else if($(".measuretypecd7 option:selected").val() == "Inch"){
                   inchvalcgdl7_nf();
               } else if($(".measuretypecd7 option:selected").val() == "Feet"){
                   feetvalcgdl7_nf();
               }
               totalvolwgt();
           });
       
           $(".measuretypecd7").on('change', function(){
               if(this.value == "M."){
                   metersvalcgdl7_nf();
               } else if(this.value == "Cm."){
                   centimetersvalcgdl7_nf();
               } else if(this.value == "Inch"){
                   inchvalcgdl7_nf();
               } else if(this.value == "Feet"){
                   feetvalcgdl7_nf();
               }
               totalvolwgt();
           });
       
           
           function metersvalcgdl7_nf(){
               quant = parseInt($('.valcgdlqt7').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl7").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               volumencbm = (total * quant).toFixed(2);
               $('.resulvolumencbm7').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 0.006).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt7').val(volumencwt);
               
           }
       
           function centimetersvalcgdl7_nf(){
               quant = parseInt($('.valcgdlqt7').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl7").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 1000000).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm7').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 6000).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt7').val(volumencwt);
           }
           
           function inchvalcgdl7_nf(){
               quant = parseInt($('.valcgdlqt7').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl7").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 61023.7).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm7').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 366.14).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt7').val(volumencwt);
           }
           
           function feetvalcgdl7_nf(){ 
               quant = parseInt($('.valcgdlqt7').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl7").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 35.3147).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm7').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 0.2118).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt7').val(volumencwt);
           }
       
       
       /*... CARGO DETAILS #8 ...*/
       $(".valcgdl8, .valcgdlqt8").keyup(function(){
       
               if($(".measuretypecd8 option:selected" ).val() == "M."){
                   metersvalcgdl8_nf();
               } else if($(".measuretypecd8 option:selected" ).val() == "Cm."){
                   centimetersvalcgdl8_nf();
               } else if($(".measuretypecd8 option:selected" ).val() == "Inch"){
                   inchvalcgdl8_nf();
               } else if($(".measuretypecd8 option:selected" ).val() == "Feet"){
                   feetvalcgdl8_nf();
               }
               totalvolwgt();
           });
       
           $(".measuretypecd8").on('change', function(){
               if(this.value == "M."){
                   metersvalcgdl8_nf();
               } else if(this.value == "Cm."){
                   centimetersvalcgdl8_nf();
               } else if(this.value == "Inch"){
                   inchvalcgdl8_nf();
               } else if(this.value == "Feet"){
                   feetvalcgdl8_nf();
               }
               totalvolwgt();
           });
       
           
           function metersvalcgdl8_nf(){
               quant = parseInt($('.valcgdlqt8').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl8").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               volumencbm = (total * quant).toFixed(2);
               $('.resulvolumencbm8').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 0.006).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt8').val(volumencwt);
               
           }
       
           function centimetersvalcgdl8_nf(){
               quant = parseInt($('.valcgdlqt8').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl8").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 1000000).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm8').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 6000).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt8').val(volumencwt);
           }
           
           function inchvalcgdl8_nf(){
               quant = parseInt($('.valcgdlqt8').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl8").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 61023.7).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm8').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 366.14).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt8').val(volumencwt);
           }
           
           function feetvalcgdl8_nf(){ 
               quant = parseInt($('.valcgdlqt8').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl8").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 35.3147).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm8').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 0.2118).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt8').val(volumencwt);
           }
       
       
       /*... CARGO DETAILS #9 ...*/
           $(".valcgdl9, .valcgdlqt9").keyup(function(){
       
               if($(".measuretypecd9 option:selected").val() == "M."){
                   metersvalcgdl9_nf();
               } else if($(".measuretypecd9 option:selected").val() == "Cm."){
                   centimetersvalcgdl9_nf();
               } else if($(".measuretypecd9 option:selected").val() == "Inch"){
                   inchvalcgdl9_nf();
               } else if($(".measuretypecd9 option:selected").val() == "Feet"){
                   feetvalcgdl9_nf();
               }
               totalvolwgt();
           });
       
           $(".measuretypecd9").on('change', function(){
               if(this.value == "M."){
                   metersvalcgdl9_nf();
               } else if(this.value == "Cm."){
                   centimetersvalcgdl9_nf();
               } else if(this.value == "Inch"){
                   inchvalcgdl9_nf();
               } else if(this.value == "Feet"){
                   feetvalcgdl9_nf();
               }
               totalvolwgt();
           });
       
           
           function metersvalcgdl9_nf(){
               quant = parseInt($('.valcgdlqt9').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl9").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               volumencbm = (total * quant).toFixed(2);
               $('.resulvolumencbm9').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 0.006).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt9').val(volumencwt);
               
           }
       
           function centimetersvalcgdl9_nf(){
               quant = parseInt($('.valcgdlqt9').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl9").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 1000000).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm9').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 6000).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt9').val(volumencwt);
           }
           
           function inchvalcgdl9_nf(){
               quant = parseInt($('.valcgdlqt9').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl9").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 61023.7).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm9').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 366.14).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt9').val(volumencwt);
           }
           
           function feetvalcgdl9_nf(){ 
               quant = parseInt($('.valcgdlqt9').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl9").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 35.3147).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm9').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 0.2118).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt9').val(volumencwt);
           }
       
       
       /*... CARGO DETAILS #10 ...*/
           $(".valcgdl10, .valcgdlqt10").keyup(function(){
       
               if($(".measuretypecd10 option:selected").val() == "M."){
                   metersvalcgdl10_nf();
               } else if($(".measuretypecd10 option:selected").val() == "Cm."){
                   centimetersvalcgdl10_nf();
               } else if($(".measuretypecd10 option:selected").val() == "Inch"){
                   inchvalcgdl10_nf();
               } else if($(".measuretypecd10 option:selected").val() == "Feet"){
                   feetvalcgdl10_nf();
               }
               totalvolwgt();
           });
       
           $(".measuretypecd10").on('change', function(){
               if(this.value == "M."){
                   metersvalcgdl10_nf();
               } else if(this.value == "Cm."){
                   centimetersvalcgdl10_nf();
               } else if(this.value == "Inch"){
                   inchvalcgdl10_nf();
               } else if(this.value == "Feet"){
                   feetvalcgdl10_nf();
               }
               totalvolwgt();
           });
       
           
           function metersvalcgdl10_nf(){
               quant = parseInt($('.valcgdlqt10').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl10").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               volumencbm = (total * quant).toFixed(2);
               $('.resulvolumencbm10').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 0.006).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt10').val(volumencwt);
               
           }
       
           function centimetersvalcgdl10_nf(){
               quant = parseInt($('.valcgdlqt10').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl10").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 1000000).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm10').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 6000).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt10').val(volumencwt);
           }
           
           function inchvalcgdl10_nf(){
               quant = parseInt($('.valcgdlqt10').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl10").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 61023.7).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm10').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 366.14).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt10').val(volumencwt);
           }
           
           function feetvalcgdl10_nf(){ 
               quant = parseInt($('.valcgdlqt10').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdl10").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               /*CBM*/
               divalorescbm = (total / 35.3147).toFixed(2);
               volumencbm = (divalorescbm * quant).toFixed(2);
               $('.resulvolumencbm10').val(volumencbm);
       
               /*Chargeable Weight*/
               divalores = (total / 0.2118).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.resulvolumencwt10').val(volumencwt);
           }
       
       
       
       function totalvolwgt(){
       
       
           valmodetransport = $(".optionstransport:checked").val();
       
           if(valmodetransport == "Air" || valmodetransport == "Aéréo"){
       
       
               valtotalcdweight1 = parseFloat($('.resulvolumencwt1').val());
               if(isNaN(valtotalcdweight1) || valtotalcdweight1 =='') { var valtotalcdweight1 = 0;}
       
               valtotalcdweight2 = parseFloat($('.resulvolumencwt2').val());
               if(isNaN(valtotalcdweight2) || valtotalcdweight2 =='') { var valtotalcdweight2 = 0;}
       
               valtotalcdweight3 = parseFloat($('.resulvolumencwt3').val());
               if(isNaN(valtotalcdweight3) || valtotalcdweight3 =='') { var valtotalcdweight3 = 0;}
       
               valtotalcdweight4 = parseFloat($('.resulvolumencwt4').val());
               if(isNaN(valtotalcdweight4) || valtotalcdweight4 =='') { var valtotalcdweight4 = 0;}
       
               valtotalcdweight5 = parseFloat($('.resulvolumencwt5').val());
               if(isNaN(valtotalcdweight5) || valtotalcdweight5 =='') { var valtotalcdweight5 = 0;}
       
               valtotalcdweight6 = parseFloat($('.resulvolumencwt6').val());
               if(isNaN(valtotalcdweight6) || valtotalcdweight6 =='') { var valtotalcdweight6 = 0;}
       
               valtotalcdweight7 = parseFloat($('.resulvolumencwt7').val());
               if(isNaN(valtotalcdweight7) || valtotalcdweight7 =='') { var valtotalcdweight7 = 0;}
       
               valtotalcdweight8 = parseFloat($('.resulvolumencwt8').val());
               if(isNaN(valtotalcdweight8) || valtotalcdweight8 =='') { var valtotalcdweight8 = 0;}
       
               valtotalcdweight9 = parseFloat($('.resulvolumencwt9').val());
               if(isNaN(valtotalcdweight9) || valtotalcdweight9 =='') { var valtotalcdweight9 = 0;}
       
               valtotalcdweight10 = parseFloat($('.resulvolumencwt10').val());
               if(isNaN(valtotalcdweight10) || valtotalcdweight10 =='') { var valtotalcdweight10 = 0;}
       
               sumatotalcdweight = (valtotalcdweight1 + valtotalcdweight2 + valtotalcdweight3 + valtotalcdweight4 + valtotalcdweight5 + valtotalcdweight6 + valtotalcdweight7 + valtotalcdweight8 + valtotalcdweight9 + valtotalcdweight10).toFixed(2);
                           
               $('#mivaltotalweight').text(sumatotalcdweight + " Kg");
               $('.valsumatotalcdweight').val(sumatotalcdweight);
       
               if(sumatotalcdweight < 150.00){
                   $(".quform-next-24_2969").addClass("d-none");
                   $(".quform-element-24_2927").removeClass("d-none");
               }else{
                   $(".quform-next-24_2969").removeClass("d-none");
                   $(".quform-element-24_2927").addClass("d-none");
               }
       
       
           }else{
       
               valtotalcdweight1 = parseFloat($('.resulvolumencbm1').val());
               if(isNaN(valtotalcdweight1) || valtotalcdweight1 =='') { var valtotalcdweight1 = 0;}
       
               valtotalcdweight2 = parseFloat($('.resulvolumencbm2').val());
               if(isNaN(valtotalcdweight2) || valtotalcdweight2 =='') { var valtotalcdweight2 = 0;}
       
               valtotalcdweight3 = parseFloat($('.resulvolumencbm3').val());
               if(isNaN(valtotalcdweight3) || valtotalcdweight3 =='') { var valtotalcdweight3 = 0;}
       
               valtotalcdweight4 = parseFloat($('.resulvolumencbm4').val());
               if(isNaN(valtotalcdweight4) || valtotalcdweight4 =='') { var valtotalcdweight4 = 0;}
       
               valtotalcdweight5 = parseFloat($('.resulvolumencbm5').val());
               if(isNaN(valtotalcdweight5) || valtotalcdweight5 =='') { var valtotalcdweight5 = 0;}
       
               valtotalcdweight6 = parseFloat($('.resulvolumencbm6').val());
               if(isNaN(valtotalcdweight6) || valtotalcdweight6 =='') { var valtotalcdweight6 = 0;}
       
               valtotalcdweight7 = parseFloat($('.resulvolumencbm7').val());
               if(isNaN(valtotalcdweight7) || valtotalcdweight7 =='') { var valtotalcdweight7 = 0;}
       
               valtotalcdweight8 = parseFloat($('.resulvolumencbm8').val());
               if(isNaN(valtotalcdweight8) || valtotalcdweight8 =='') { var valtotalcdweight8 = 0;}
       
               valtotalcdweight9 = parseFloat($('.resulvolumencbm9').val());
               if(isNaN(valtotalcdweight9) || valtotalcdweight9 =='') { var valtotalcdweight9 = 0;}
       
               valtotalcdweight10 = parseFloat($('.resulvolumencbm10').val());
               if(isNaN(valtotalcdweight10) || valtotalcdweight10 =='') { var valtotalcdweight10 = 0;}
       
               sumatotalcbm = (valtotalcdweight1 + valtotalcdweight2 + valtotalcdweight3 + valtotalcdweight4 + valtotalcdweight5 + valtotalcdweight6 + valtotalcdweight7 + valtotalcdweight8 + valtotalcdweight9 + valtotalcdweight10).toFixed(2);
                           
               $('#mivaltotalcbmot').text(sumatotalcbm + " m³");
               $('.valsumatotalcbm').val(sumatotalcbm);
       
               if(sumatotalcbm < 1.00){
                   $(".quform-next-24_2969").addClass("d-none");
                   $(".quform-element-24_2924").removeClass("d-none");
               }else{
                   $(".quform-next-24_2969").removeClass("d-none");
                   $(".quform-element-24_2924").addClass("d-none");
               }
       
           }
       
       
       }
       
    
    
    
    /*.... PERSONAL ::::::::::::::::::::::::::::::::::: ..*/
    
      /*... YOUR VEHICLE #1 ...*/
      $(".valcgdlvei1").keyup(function(){
        if($(".selecgdlveic1 option:selected").val() == "M."){
            metersvalcgdlvei1_nf();
        } else if($(".selecgdlveic1 option:selected").val() == "Cm."){
            centimetersvalcgdlvei1_nf();
        } else if($(".selecgdlveic1 option:selected").val() == "Inch"){
            inchvalcgdlvei1_nf();
        } else if($(".selecgdlveic1 option:selected").val() == "Feet"){
            feetvalcgdlvei1_nf();
        }
    });
    
    $(".selecgdlveic1").on('change', function(){
        if(this.value == "M."){
            metersvalcgdlvei1_nf();
        } else if(this.value == "Cm."){
            centimetersvalcgdlvei1_nf();
        } else if(this.value == "Inch"){
            inchvalcgdlvei1_nf();
        } else if(this.value == "Feet"){
            feetvalcgdlvei1_nf();
        }
    });
    
    
    function metersvalcgdlvei1_nf(){
         var quant = 1;
        var total = 1;
        var change= false;
        $(".valcgdlvei1").each(function(){
            if (!isNaN(parseFloat($(this).val()))) {
                change= true;
                total *= parseFloat($(this).val());
            }});
        total = (change)? total:0;
        volumencwt = (total * quant).toFixed(2);
        $('.valuetotalvclcbm1').val(volumencwt);
        $('#valtotalvclcbm1').text(volumencwt + 'm³');
        
    }
    
    function centimetersvalcgdlvei1_nf(){
         var quant = 1;
        var total = 1;
        var change= false;
        $(".valcgdlvei1").each(function(){
            if (!isNaN(parseFloat($(this).val()))) {
                change= true;
                total *= parseFloat($(this).val());
            }});
        total = (change)? total:0;
        divalores = (total / 1000000).toFixed(2);
        volumencwt = (divalores * quant).toFixed(2);
        $('.valuetotalvclcbm1').val(volumencwt);
        $('#valtotalvclcbm1').text(volumencwt + 'm³');
    }
    
    function inchvalcgdlvei1_nf(){
         var quant = 1;
        var total = 1;
        var change= false;
        $(".valcgdlvei1").each(function(){
            if (!isNaN(parseFloat($(this).val()))) {
                change= true;
                total *= parseFloat($(this).val());
            }});
        total = (change)? total:0;
        divalores = (total / 61023.7).toFixed(2);
        volumencwt = (divalores * quant).toFixed(2);
        $('.valuetotalvclcbm1').val(volumencwt);
        $('#valtotalvclcbm1').text(volumencwt + 'm³');
    }
    
    function feetvalcgdlvei1_nf(){ 
         var quant = 1;
        var total = 1;
        var change= false;
        $(".valcgdlvei1").each(function(){
            if (!isNaN(parseFloat($(this).val()))) {
                change= true;
                total *= parseFloat($(this).val());
            }});
        total = (change)? total:0;
        divalores = (total / 35.3147).toFixed(2);
        volumencwt = (divalores * quant).toFixed(2);
        $('.valuetotalvclcbm1').val(volumencwt);
        $('#valtotalvclcbm1').text(volumencwt + 'm³');
    }
    
    
    /*... YOUR VEHICLE #2 ...*/
    $(".valcgdlvei2").keyup(function(){
        if($(".selecgdlveic2 option:selected").val() == "M."){
            metersvalcgdlvei2_nf();
        } else if($(".selecgdlveic2 option:selected").val() == "Cm."){
            centimetersvalcgdlvei2_nf();
        } else if($(".selecgdlveic2 option:selected").val() == "Inch"){
            inchvalcgdlvei2_nf();
        } else if($(".selecgdlveic2 option:selected").val() == "Feet"){
            feetvalcgdlvei2_nf();
        }
    });
    
    $(".selecgdlveic2").on('change', function(){
        if(this.value == "M."){
            metersvalcgdlvei2_nf();
        } else if(this.value == "Cm."){
            centimetersvalcgdlvei2_nf();
        } else if(this.value == "Inch"){
            inchvalcgdlvei2_nf();
        } else if(this.value == "Feet"){
            feetvalcgdlvei2_nf();
        }
    });
    
    
    function metersvalcgdlvei2_nf(){
         var quant = 1;
        var total = 1;
        var change= false;
        $(".valcgdlvei2").each(function(){
            if (!isNaN(parseFloat($(this).val()))) {
                change= true;
                total *= parseFloat($(this).val());
            }});
        total = (change)? total:0;
        volumencwt = (total * quant).toFixed(2);
        $('.valuetotalvclcbm2').val(volumencwt);
        $('#valtotalvclcbm2').text(volumencwt + 'm³');
        
    }
    
    function centimetersvalcgdlvei2_nf(){
         var quant = 1;
        var total = 1;
        var change= false;
        $(".valcgdlvei2").each(function(){
            if (!isNaN(parseFloat($(this).val()))) {
                change= true;
                total *= parseFloat($(this).val());
            }});
        total = (change)? total:0;
        divalores = (total / 1000000).toFixed(2);
        volumencwt = (divalores * quant).toFixed(2);
        $('.valuetotalvclcbm2').val(volumencwt);
        $('#valtotalvclcbm2').text(volumencwt + 'm³');
    }
    
    function inchvalcgdlvei2_nf(){
         var quant = 1;
        var total = 1;
        var change= false;
        $(".valcgdlvei2").each(function(){
            if (!isNaN(parseFloat($(this).val()))) {
                change= true;
                total *= parseFloat($(this).val());
            }});
        total = (change)? total:0;
        divalores = (total / 61023.7).toFixed(2);
        volumencwt = (divalores * quant).toFixed(2);
        $('.valuetotalvclcbm2').val(volumencwt);
        $('#valtotalvclcbm2').text(volumencwt + 'm³');
    }
    
    function feetvalcgdlvei2_nf(){ 
         var quant = 1;
        var total = 1;
        var change= false;
        $(".valcgdlvei2").each(function(){
            if (!isNaN(parseFloat($(this).val()))) {
                change= true;
                total *= parseFloat($(this).val());
            }});
        total = (change)? total:0;
        divalores = (total / 35.3147).toFixed(2);
        volumencwt = (divalores * quant).toFixed(2);
        $('.valuetotalvclcbm2').val(volumencwt);
        $('#valtotalvclcbm2').text(volumencwt + 'm³');
    }
    
    /*... YOUR VEHICLE #3 ...*/
    $(".valcgdlvei3").keyup(function(){
        if($(".selecgdlveic3 option:selected").val() == "M."){
            metersvalcgdlvei3_nf();
        } else if($(".selecgdlveic3 option:selected").val() == "Cm."){
            centimetersvalcgdlvei3_nf();
        } else if($(".selecgdlveic3 option:selected").val() == "Inch"){
            inchvalcgdlvei3_nf();
        } else if($(".selecgdlveic3 option:selected").val() == "Feet"){
            feetvalcgdlvei3_nf();
        }
    });
    
    $(".selecgdlveic3").on('change', function(){
        if(this.value == "M."){
            metersvalcgdlvei3_nf();
        } else if(this.value == "Cm."){
            centimetersvalcgdlvei3_nf();
        } else if(this.value == "Inch"){
            inchvalcgdlvei3_nf();
        } else if(this.value == "Feet"){
            feetvalcgdlvei3_nf();
        }
    });
    
    
    function metersvalcgdlvei3_nf(){
         var quant = 1;
        var total = 1;
        var change= false;
        $(".valcgdlvei3").each(function(){
            if (!isNaN(parseFloat($(this).val()))) {
                change= true;
                total *= parseFloat($(this).val());
            }});
        total = (change)? total:0;
        volumencwt = (total * quant).toFixed(2);
        $('.valuetotalvclcbm3').val(volumencwt);
        $('#valtotalvclcbm3').text(volumencwt + 'm³');
        
    }
    
    function centimetersvalcgdlvei3_nf(){
         var quant = 1;
        var total = 1;
        var change= false;
        $(".valcgdlvei3").each(function(){
            if (!isNaN(parseFloat($(this).val()))) {
                change= true;
                total *= parseFloat($(this).val());
            }});
        total = (change)? total:0;
        divalores = (total / 1000000).toFixed(2);
        volumencwt = (divalores * quant).toFixed(2);
        $('.valuetotalvclcbm3').val(volumencwt);
        $('#valtotalvclcbm3').text(volumencwt + 'm³');
    }
    
    function inchvalcgdlvei3_nf(){
         var quant = 1;
        var total = 1;
        var change= false;
        $(".valcgdlvei3").each(function(){
            if (!isNaN(parseFloat($(this).val()))) {
                change= true;
                total *= parseFloat($(this).val());
            }});
        total = (change)? total:0;
        divalores = (total / 61023.7).toFixed(2);
        volumencwt = (divalores * quant).toFixed(2);
        $('.valuetotalvclcbm3').val(volumencwt);
        $('#valtotalvclcbm3').text(volumencwt + 'm³');
    }
    
    function feetvalcgdlvei3_nf(){ 
         var quant = 1;
        var total = 1;
        var change= false;
        $(".valcgdlvei3").each(function(){
            if (!isNaN(parseFloat($(this).val()))) {
                change= true;
                total *= parseFloat($(this).val());
            }});
        total = (change)? total:0;
        divalores = (total / 35.3147).toFixed(2);
        volumencwt = (divalores * quant).toFixed(2);
        $('.valuetotalvclcbm3').val(volumencwt);
        $('#valtotalvclcbm3').text(volumencwt + 'm³');
    }
    
    
    /*... YOUR VEHICLE #4 ...*/
    $(".valcgdlvei4").keyup(function(){
        if($(".selecgdlveic4 option:selected").val() == "M."){
            metersvalcgdlvei4_nf();
        } else if($(".selecgdlveic4 option:selected").val() == "Cm."){
            centimetersvalcgdlvei4_nf();
        } else if($(".selecgdlveic4 option:selected").val() == "Inch"){
            inchvalcgdlvei4_nf();
        } else if($(".selecgdlveic4 option:selected").val() == "Feet"){
            feetvalcgdlvei4_nf();
        }
    });
    
    $(".selecgdlveic4").on('change', function(){
        if(this.value == "M."){
            metersvalcgdlvei4_nf();
        } else if(this.value == "Cm."){
            centimetersvalcgdlvei4_nf();
        } else if(this.value == "Inch"){
            inchvalcgdlvei4_nf();
        } else if(this.value == "Feet"){
            feetvalcgdlvei4_nf();
        }
    });
    
    
    function metersvalcgdlvei4_nf(){
         var quant = 1;
        var total = 1;
        var change= false;
        $(".valcgdlvei4").each(function(){
            if (!isNaN(parseFloat($(this).val()))) {
                change= true;
                total *= parseFloat($(this).val());
            }});
        total = (change)? total:0;
        volumencwt = (total * quant).toFixed(2);
        $('.valuetotalvclcbm4').val(volumencwt);
        $('#valtotalvclcbm4').text(volumencwt + 'm³');
        
    }
    
    function centimetersvalcgdlvei4_nf(){
         var quant = 1;
        var total = 1;
        var change= false;
        $(".valcgdlvei4").each(function(){
            if (!isNaN(parseFloat($(this).val()))) {
                change= true;
                total *= parseFloat($(this).val());
            }});
        total = (change)? total:0;
        divalores = (total / 1000000).toFixed(2);
        volumencwt = (divalores * quant).toFixed(2);
        $('.valuetotalvclcbm4').val(volumencwt);
        $('#valtotalvclcbm4').text(volumencwt + 'm³');
    }
    
    function inchvalcgdlvei4_nf(){
         var quant = 1;
        var total = 1;
        var change= false;
        $(".valcgdlvei4").each(function(){
            if (!isNaN(parseFloat($(this).val()))) {
                change= true;
                total *= parseFloat($(this).val());
            }});
        total = (change)? total:0;
        divalores = (total / 61023.7).toFixed(2);
        volumencwt = (divalores * quant).toFixed(2);
        $('.valuetotalvclcbm4').val(volumencwt);
        $('#valtotalvclcbm4').text(volumencwt + 'm³');
    }
    
    function feetvalcgdlvei4_nf(){ 
        var quant = 1;
        var total = 1;
        var change= false;
        $(".valcgdlvei4").each(function(){
            if (!isNaN(parseFloat($(this).val()))) {
                change= true;
                total *= parseFloat($(this).val());
            }});
        total = (change)? total:0;
        divalores = (total / 35.3147).toFixed(2);
        volumencwt = (divalores * quant).toFixed(2);
        $('.valuetotalvclcbm4').val(volumencwt);
        $('#valtotalvclcbm4').text(volumencwt + 'm³');
    }
    
    
    /*... YOUR VEHICLE #5 ...*/
    $(".valcgdlvei5, .valcgdlqtro5").keyup(function(){
        if($(".selecgdlveic5 option:selected").val() == "M."){
            metersvalcgdlvei5_nf();
        } else if($(".selecgdlveic5 option:selected").val() == "Cm."){
            centimetersvalcgdlvei5_nf();
        } else if($(".selecgdlveic5 option:selected").val() == "Inch"){
            inchvalcgdlvei5_nf();
        } else if($(".selecgdlveic5 option:selected").val() == "Feet"){
            feetvalcgdlvei5_nf();
        }
    });
    
    $(".selecgdlveic5").on('change', function(){
        if(this.value == "M."){
            metersvalcgdlvei5_nf();
        } else if(this.value == "Cm."){
            centimetersvalcgdlvei5_nf();
        } else if(this.value == "Inch"){
            inchvalcgdlvei5_nf();
        } else if(this.value == "Feet"){
            feetvalcgdlvei5_nf();
        }
    });
    
    
    function metersvalcgdlvei5_nf(){
         var quant = 1;
        var total = 1;
        var change= false;
        $(".valcgdlvei5").each(function(){
            if (!isNaN(parseFloat($(this).val()))) {
                change= true;
                total *= parseFloat($(this).val());
            }});
        total = (change)? total:0;
        volumencwt = (total * quant).toFixed(2);
        $('.valuetotalvclcbm5').val(volumencwt);
        $('#valtotalvclcbm5').text(volumencwt + 'm³');
        
    }
    
    function centimetersvalcgdlvei5_nf(){
         var quant = 1;
        var total = 1;
        var change= false;
        $(".valcgdlvei5").each(function(){
            if (!isNaN(parseFloat($(this).val()))) {
                change= true;
                total *= parseFloat($(this).val());
            }});
        total = (change)? total:0;
        divalores = (total / 1000000).toFixed(2);
        volumencwt = (divalores * quant).toFixed(2);
        $('.valuetotalvclcbm5').val(volumencwt);
        $('#valtotalvclcbm5').text(volumencwt + 'm³');
    }
    
    function inchvalcgdlvei5_nf(){
         var quant = 1;
        var total = 1;
        var change= false;
        $(".valcgdlvei5").each(function(){
            if (!isNaN(parseFloat($(this).val()))) {
                change= true;
                total *= parseFloat($(this).val());
            }});
        total = (change)? total:0;
        divalores = (total / 61023.7).toFixed(2);
        volumencwt = (divalores * quant).toFixed(2);
        $('.valuetotalvclcbm5').val(volumencwt);
        $('#valtotalvclcbm5').text(volumencwt + 'm³');
    }
    
    function feetvalcgdlvei5_nf(){ 
         var quant = 1;
        var total = 1;
        var change= false;
        $(".valcgdlvei5").each(function(){
            if (!isNaN(parseFloat($(this).val()))) {
                change= true;
                total *= parseFloat($(this).val());
            }});
        total = (change)? total:0;
        divalores = (total / 35.3147).toFixed(2);
        volumencwt = (divalores * quant).toFixed(2);
        $('.valuetotalvclcbm5').val(volumencwt);
        $('#valtotalvclcbm5').text(volumencwt + 'm³');
    }
    /*.... ...END PERSONAL ::::::::::::::::::::::::::::::::::: ..*/
    
    
    
    
       
       
       /*... CALCULAR CARGO DETAIL RORO :::::::::::::::::::::::::::::::::: ...*/
       
       /*... CARGO DETAILS #1 ...*/
           $(".valcgdlro1, .valcgdlqtro1").keyup(function(){
               if($(".measuretyperorocd1 option:selected").val() == "M."){
                   metersvalcgdlro1_nf();
               } else if($(".measuretyperorocd1 option:selected").val() == "Cm."){
                   centimetersvalcgdlro1_nf();
               } else if($(".measuretyperorocd1 option:selected").val() == "Inch"){
                   inchvalcgdlro1_nf();
               } else if($(".measuretyperorocd1 option:selected").val() == "Feet"){
                   feetvalcgdlro1_nf();
               }
           });
       
           $(".measuretyperorocd1").on('change', function(){
               if(this.value == "M."){
                   metersvalcgdlro1_nf();
               } else if(this.value == "Cm."){
                   centimetersvalcgdlro1_nf();
               } else if(this.value == "Inch"){
                   inchvalcgdlro1_nf();
               } else if(this.value == "Feet"){
                   feetvalcgdlro1_nf();
               }
           });
       
           
           function metersvalcgdlro1_nf(){
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro1").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               volumencwt = (total * quant).toFixed(2);
               $('.valuetotalcdcbm1').val(volumencwt);
               $('#valtotalcdcbm1').text(volumencwt + 'm³');
               
           }
       
           function centimetersvalcgdlro1_nf(){
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro1").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               divalores = (total / 1000000).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.valuetotalcdcbm1').val(volumencwt);
               $('#valtotalcdcbm1').text(volumencwt + 'm³');
           }
           
           function inchvalcgdlro1_nf(){
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro1").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               divalores = (total / 61023.7).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.valuetotalcdcbm1').val(volumencwt);
               $('#valtotalcdcbm1').text(volumencwt + 'm³');
           }
           
           function feetvalcgdlro1_nf(){ 
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro1").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               divalores = (total / 35.3147).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.valuetotalcdcbm1').val(volumencwt);
               $('#valtotalcdcbm1').text(volumencwt + 'm³');
           }
       
       
       /*... CARGO DETAILS #2 ...*/
           $(".valcgdlro2, .valcgdlqtro2").keyup(function(){
               if($(".measuretyperorocd2 option:selected").val() == "M."){
                   metersvalcgdlro2_nf();
               } else if($(".measuretyperorocd2 option:selected").val() == "Cm."){
                   centimetersvalcgdlro2_nf();
               } else if($(".measuretyperorocd2 option:selected").val() == "Inch"){
                   inchvalcgdlro2_nf();
               } else if($(".measuretyperorocd2 option:selected").val() == "Feet"){
                   feetvalcgdlro2_nf();
               }
           });
       
           $(".measuretyperorocd2").on('change', function(){
               if(this.value == "M."){
                   metersvalcgdlro2_nf();
               } else if(this.value == "Cm."){
                   centimetersvalcgdlro2_nf();
               } else if(this.value == "Inch"){
                   inchvalcgdlro2_nf();
               } else if(this.value == "Feet"){
                   feetvalcgdlro2_nf();
               }
           });
       
           
           function metersvalcgdlro2_nf(){
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro2").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               volumencwt = (total * quant).toFixed(2);
               $('.valuetotalcdcbm2').val(volumencwt);
               $('#valtotalcdcbm2').text(volumencwt + 'm³');
               
           }
       
           function centimetersvalcgdlro2_nf(){
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro2").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               divalores = (total / 1000000).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.valuetotalcdcbm2').val(volumencwt);
               $('#valtotalcdcbm2').text(volumencwt + 'm³');
           }
           
           function inchvalcgdlro2_nf(){
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro2").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               divalores = (total / 61023.7).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.valuetotalcdcbm2').val(volumencwt);
               $('#valtotalcdcbm2').text(volumencwt + 'm³');
           }
           
           function feetvalcgdlro2_nf(){ 
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro2").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               divalores = (total / 35.3147).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.valuetotalcdcbm2').val(volumencwt);
               $('#valtotalcdcbm2').text(volumencwt + 'm³');
           }
       
       /*... CARGO DETAILS #3 ...*/
           $(".valcgdlro3, .valcgdlqtro3").keyup(function(){
               if($(".measuretyperorocd3 option:selected").val() == "M."){
                   metersvalcgdlro3_nf();
               } else if($(".measuretyperorocd3 option:selected").val() == "Cm."){
                   centimetersvalcgdlro3_nf();
               } else if($(".measuretyperorocd3 option:selected").val() == "Inch"){
                   inchvalcgdlro3_nf();
               } else if($(".measuretyperorocd3 option:selected").val() == "Feet"){
                   feetvalcgdlro3_nf();
               }
           });
       
           $(".measuretyperorocd3").on('change', function(){
               if(this.value == "M."){
                   metersvalcgdlro3_nf();
               } else if(this.value == "Cm."){
                   centimetersvalcgdlro3_nf();
               } else if(this.value == "Inch"){
                   inchvalcgdlro3_nf();
               } else if(this.value == "Feet"){
                   feetvalcgdlro3_nf();
               }
           });
       
           
           function metersvalcgdlro3_nf(){
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro3").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               volumencwt = (total * quant).toFixed(2);
               $('.valuetotalcdcbm3').val(volumencwt);
               $('#valtotalcdcbm3').text(volumencwt + 'm³');
               
           }
       
           function centimetersvalcgdlro3_nf(){
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro3").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               divalores = (total / 1000000).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.valuetotalcdcbm3').val(volumencwt);
               $('#valtotalcdcbm3').text(volumencwt + 'm³');
           }
           
           function inchvalcgdlro3_nf(){
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro3").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               divalores = (total / 61023.7).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.valuetotalcdcbm3').val(volumencwt);
               $('#valtotalcdcbm3').text(volumencwt + 'm³');
           }
           
           function feetvalcgdlro3_nf(){ 
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro3").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               divalores = (total / 35.3147).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.valuetotalcdcbm3').val(volumencwt);
               $('#valtotalcdcbm3').text(volumencwt + 'm³');
           }
       
       
       /*... CARGO DETAILS #4 ...*/
           $(".valcgdlro4, .valcgdlqtro4").keyup(function(){
               if($(".measuretyperorocd4 option:selected").val() == "M."){
                   metersvalcgdlro4_nf();
               } else if($(".measuretyperorocd4 option:selected").val() == "Cm."){
                   centimetersvalcgdlro4_nf();
               } else if($(".measuretyperorocd4 option:selected").val() == "Inch"){
                   inchvalcgdlro4_nf();
               } else if($(".measuretyperorocd4 option:selected").val() == "Feet"){
                   feetvalcgdlro4_nf();
               }
           });
       
           $(".measuretyperorocd4").on('change', function(){
               if(this.value == "M."){
                   metersvalcgdlro4_nf();
               } else if(this.value == "Cm."){
                   centimetersvalcgdlro4_nf();
               } else if(this.value == "Inch"){
                   inchvalcgdlro4_nf();
               } else if(this.value == "Feet"){
                   feetvalcgdlro4_nf();
               }
           });
       
           
           function metersvalcgdlro4_nf(){
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro4").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               volumencwt = (total * quant).toFixed(2);
               $('.valuetotalcdcbm4').val(volumencwt);
               $('#valtotalcdcbm4').text(volumencwt + 'm³');
               
           }
       
           function centimetersvalcgdlro4_nf(){
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro4").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               divalores = (total / 1000000).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.valuetotalcdcbm4').val(volumencwt);
               $('#valtotalcdcbm4').text(volumencwt + 'm³');
           }
           
           function inchvalcgdlro4_nf(){
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro4").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               divalores = (total / 61023.7).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.valuetotalcdcbm4').val(volumencwt);
               $('#valtotalcdcbm4').text(volumencwt + 'm³');
           }
           
           function feetvalcgdlro4_nf(){ 
               quant = parseInt($('input[name="quform_24_3356"]').val());
               if(isNaN(quant)) {
                   var quant = 0;
               }
               var total = 1;
               var change= false;
               $(".valcgdlro4").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               divalores = (total / 35.3147).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.valuetotalcdcbm4').val(volumencwt);
               $('#valtotalcdcbm4').text(volumencwt + 'm³');
           }
       
       
       /*... CARGO DETAILS #5 ...*/
           $(".valcgdlro5, .valcgdlqtro5").keyup(function(){
               if($(".measuretyperorocd5 option:selected").val() == "M."){
                   metersvalcgdlro5_nf();
               } else if($(".measuretyperorocd5 option:selected").val() == "Cm."){
                   centimetersvalcgdlro5_nf();
               } else if($(".measuretyperorocd5 option:selected").val() == "Inch"){
                   inchvalcgdlro5_nf();
               } else if($(".measuretyperorocd5 option:selected").val() == "Feet"){
                   feetvalcgdlro5_nf();
               }
           });
       
           $(".measuretyperorocd5").on('change', function(){
               if(this.value == "M."){
                   metersvalcgdlro5_nf();
               } else if(this.value == "Cm."){
                   centimetersvalcgdlro5_nf();
               } else if(this.value == "Inch"){
                   inchvalcgdlro5_nf();
               } else if(this.value == "Feet"){
                   feetvalcgdlro5_nf();
               }
           });
       
           
           function metersvalcgdlro5_nf(){
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro5").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               volumencwt = (total * quant).toFixed(2);
               $('.valuetotalcdcbm5').val(volumencwt);
               $('#valtotalcdcbm5').text(volumencwt + 'm³');
               
           }
       
           function centimetersvalcgdlro5_nf(){
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro5").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               divalores = (total / 1000000).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.valuetotalcdcbm5').val(volumencwt);
               $('#valtotalcdcbm5').text(volumencwt + 'm³');
           }
           
           function inchvalcgdlro5_nf(){
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro5").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               divalores = (total / 61023.7).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.valuetotalcdcbm5').val(volumencwt);
               $('#valtotalcdcbm5').text(volumencwt + 'm³');
           }
           
           function feetvalcgdlro5_nf(){ 
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro5").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               divalores = (total / 35.3147).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.valuetotalcdcbm5').val(volumencwt);
               $('#valtotalcdcbm5').text(volumencwt + 'm³');
           }
       
       
       /*... CARGO DETAILS #6 ...*/
           $(".valcgdlro6, .valcgdlqtro6").keyup(function(){
               if($(".measuretyperorocd6 option:selected" ).val() == "M."){
                   metersvalcgdlro6_nf();
               } else if($(".measuretyperorocd6 option:selected" ).val() == "Cm."){
                   centimetersvalcgdlro6_nf();
               } else if($(".measuretyperorocd6 option:selected" ).val() == "Inch"){
                   inchvalcgdlro6_nf();
               } else if($(".measuretyperorocd6 option:selected" ).val() == "Feet"){
                   feetvalcgdlro6_nf();
               }
           });
       
           $(".measuretyperorocd6").on('change', function(){
               if(this.value == "M."){
                   metersvalcgdlro6_nf();
               } else if(this.value == "Cm."){
                   centimetersvalcgdlro6_nf();
               } else if(this.value == "Inch"){
                   inchvalcgdlro6_nf();
               } else if(this.value == "Feet"){
                   feetvalcgdlro6_nf();
               }
           });
       
           
           function metersvalcgdlro6_nf(){
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro6").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               volumencwt = (total * quant).toFixed(2);
               $('.valuetotalcdcbm6').val(volumencwt);
               $('#valtotalcdcbm6').text(volumencwt + 'm³');
               
           }
       
           function centimetersvalcgdlro6_nf(){
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro6").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               divalores = (total / 1000000).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.valuetotalcdcbm6').val(volumencwt);
               $('#valtotalcdcbm6').text(volumencwt + 'm³');
           }
           
           function inchvalcgdlro6_nf(){
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro6").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               divalores = (total / 61023.7).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.valuetotalcdcbm6').val(volumencwt);
               $('#valtotalcdcbm6').text(volumencwt + 'm³');
           }
           
           function feetvalcgdlro6_nf(){ 
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro6").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               divalores = (total / 35.3147).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.valuetotalcdcbm6').val(volumencwt);
               $('#valtotalcdcbm6').text(volumencwt + 'm³');
           }
       
       
       /*... CARGO DETAILS #7 ...*/
           $(".valcgdlro7, .valcgdlqtro7").keyup(function(){
               if($(".measuretyperorocd7 option:selected").val() == "M."){
                   metersvalcgdlro7_nf();
               } else if($(".measuretyperorocd7 option:selected").val() == "Cm."){
                   centimetersvalcgdlro7_nf();
               } else if($(".measuretyperorocd7 option:selected").val() == "Inch"){
                   inchvalcgdlro7_nf();
               } else if($(".measuretyperorocd7 option:selected").val() == "Feet"){
                   feetvalcgdlro7_nf();
               }
           });
       
           $(".measuretyperorocd7").on('change', function(){
               if(this.value == "M."){
                   metersvalcgdlro7_nf();
               } else if(this.value == "Cm."){
                   centimetersvalcgdlro7_nf();
               } else if(this.value == "Inch"){
                   inchvalcgdlro7_nf();
               } else if(this.value == "Feet"){
                   feetvalcgdlro7_nf();
               }
           });
       
           
           function metersvalcgdlro7_nf(){
                var quant = 1;
               var total = 1;
               var change= false;
               $(".valcgdlro7").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               volumencwt = (total * quant).toFixed(2);
               $('.valuetotalcdcbm7').val(volumencwt);
               $('#valtotalcdcbm7').text(volumencwt + 'm³');
               
           }
       
           function centimetersvalcgdlro7_nf(){
                var quant = 1;
                var total = 1;
                var change= false;
                $(".valcgdlro7").each(function(){
                    if (!isNaN(parseFloat($(this).val()))) {
                        change= true;
                        total *= parseFloat($(this).val());
                    }});
                total = (change)? total:0;
                divalores = (total / 1000000).toFixed(2);
                volumencwt = (divalores * quant).toFixed(2);
                $('.valuetotalcdcbm7').val(volumencwt);
                $('#valtotalcdcbm7').text(volumencwt + 'm³');
           }
           
           function inchvalcgdlro7_nf(){
                var quant = 1;
                var total = 1;
                var change= false;
                $(".valcgdlro7").each(function(){
                    if (!isNaN(parseFloat($(this).val()))) {
                        change= true;
                        total *= parseFloat($(this).val());
                    }});
                total = (change)? total:0;
                divalores = (total / 61023.7).toFixed(2);
                volumencwt = (divalores * quant).toFixed(2);
                $('.valuetotalcdcbm7').val(volumencwt);
                $('#valtotalcdcbm7').text(volumencwt + 'm³');
           }
           
           function feetvalcgdlro7_nf(){ 
                var quant = 1;
                var total = 1;
                var change= false;
                $(".valcgdlro7").each(function(){
                    if (!isNaN(parseFloat($(this).val()))) {
                        change= true;
                        total *= parseFloat($(this).val());
                    }});
                total = (change)? total:0;
                divalores = (total / 35.3147).toFixed(2);
                volumencwt = (divalores * quant).toFixed(2);
                $('.valuetotalcdcbm7"]').val(volumencwt);
                $('#valtotalcdcbm7').text(volumencwt + 'm³');
           }
       
       
       /*... CARGO DETAILS #8 ...*/
           $(".valcgdlro8, .valcgdlqtro8").keyup(function(){
               if($(".measuretyperorocd8 option:selected").val() == "M."){
                   metersvalcgdlro8_nf();
               } else if($(".measuretyperorocd8 option:selected").val() == "Cm."){
                   centimetersvalcgdlro8_nf();
               } else if($(".measuretyperorocd8 option:selected").val() == "Inch"){
                   inchvalcgdlro8_nf();
               } else if($(".measuretyperorocd8 option:selected").val() == "Feet"){
                   feetvalcgdlro8_nf();
               }
           });
       
           $(".measuretyperorocd8").on('change', function(){
               if(this.value == "M."){
                   metersvalcgdlro8_nf();
               } else if(this.value == "Cm."){
                   centimetersvalcgdlro8_nf();
               } else if(this.value == "Inch"){
                   inchvalcgdlro8_nf();
               } else if(this.value == "Feet"){
                   feetvalcgdlro8_nf();
               }
           });
       
           
           function metersvalcgdlro8_nf(){
                var quant = 1;
                var total = 1;
                var change= false;
                $(".valcgdlro8").each(function(){
                    if (!isNaN(parseFloat($(this).val()))) {
                        change= true;
                        total *= parseFloat($(this).val());
                    }});
                total = (change)? total:0;
                volumencwt = (total * quant).toFixed(2);
                $('.valuetotalcdcbm8"]').val(volumencwt);
                $('#valtotalcdcbm8').text(volumencwt + 'm³');
               
           }
       
           function centimetersvalcgdlro8_nf(){
                var quant = 1;
                var total = 1;
                var change= false;
                $(".valcgdlro8").each(function(){
                    if (!isNaN(parseFloat($(this).val()))) {
                        change= true;
                        total *= parseFloat($(this).val());
                    }});
                total = (change)? total:0;
                divalores = (total / 1000000).toFixed(2);
                volumencwt = (divalores * quant).toFixed(2);
                $('.valuetotalcdcbm8').val(volumencwt);
                $('#valtotalcdcbm8').text(volumencwt + 'm³');
           }
           
           function inchvalcgdlro8_nf(){
                var quant = 1;
                var total = 1;
                var change= false;
                $(".valcgdlro8").each(function(){
                    if (!isNaN(parseFloat($(this).val()))) {
                        change= true;
                        total *= parseFloat($(this).val());
                    }});
                total = (change)? total:0;
                divalores = (total / 61023.7).toFixed(2);
                volumencwt = (divalores * quant).toFixed(2);
                $('.valuetotalcdcbm8').val(volumencwt);
                $('#valtotalcdcbm8').text(volumencwt + 'm³');
           }
           
           function feetvalcgdlro8_nf(){ 
                var quant = 1;
                var total = 1;
                var change= false;
                $(".valcgdlro8").each(function(){
                    if (!isNaN(parseFloat($(this).val()))) {
                        change= true;
                        total *= parseFloat($(this).val());
                    }});
                total = (change)? total:0;
                divalores = (total / 35.3147).toFixed(2);
                volumencwt = (divalores * quant).toFixed(2);
                $('.valuetotalcdcbm8').val(volumencwt);
                $('#valtotalcdcbm8').text(volumencwt + 'm³');
           }
       
       
       /*... CARGO DETAILS #9 ...*/
           $(".valcgdlro9, .valcgdlqtro9").keyup(function(){
               if($(".measuretyperorocd9 option:selected").val() == "M."){
                   metersvalcgdlro9_nf();
               } else if($(".measuretyperorocd9 option:selected").val() == "Cm."){
                   centimetersvalcgdlro9_nf();
               } else if($(".measuretyperorocd9 option:selected").val() == "Inch"){
                   inchvalcgdlro9_nf();
               } else if($(".measuretyperorocd9 option:selected").val() == "Feet"){
                   feetvalcgdlro9_nf();
               }
           });
       
           $(".measuretyperorocd9").on('change', function(){
               if(this.value == "M."){
                   metersvalcgdlro9_nf();
               } else if(this.value == "Cm."){
                   centimetersvalcgdlro9_nf();
               } else if(this.value == "Inch"){
                   inchvalcgdlro9_nf();
               } else if(this.value == "Feet"){
                   feetvalcgdlro9_nf();
               }
           });
       
           
           function metersvalcgdlro9_nf(){
                var quant = 1;
                var total = 1;
                var change= false;
                $(".valcgdlro9").each(function(){
                    if (!isNaN(parseFloat($(this).val()))) {
                        change= true;
                        total *= parseFloat($(this).val());
                    }});
                total = (change)? total:0;
                volumencwt = (total * quant).toFixed(2);
                $('.valuetotalcdcbm9').val(volumencwt);  
                $('#valtotalcdcbm9').text(volumencwt + 'm³');
           }
       
           function centimetersvalcgdlro9_nf(){
                var quant = 1;
                var total = 1;
                var change= false;
                $(".valcgdlro9").each(function(){
                    if (!isNaN(parseFloat($(this).val()))) {
                        change= true;
                        total *= parseFloat($(this).val());
                    }});
                total = (change)? total:0;
                divalores = (total / 1000000).toFixed(2);
                volumencwt = (divalores * quant).toFixed(2);
                $('.valuetotalcdcbm9').val(volumencwt);
                $('#valtotalcdcbm9').text(volumencwt + 'm³');
           }
           
           function inchvalcgdlro9_nf(){
                var quant = 1;
                var total = 1;
                var change= false;
                $(".valcgdlro9").each(function(){
                    if (!isNaN(parseFloat($(this).val()))) {
                        change= true;
                        total *= parseFloat($(this).val());
                    }});
                total = (change)? total:0;
                divalores = (total / 61023.7).toFixed(2);
                volumencwt = (divalores * quant).toFixed(2);
                $('.valuetotalcdcbm9').val(volumencwt);
                $('#valtotalcdcbm9').text(volumencwt + 'm³');
           }
           
           function feetvalcgdlro9_nf(){ 
                var quant = 1;
                var total = 1;
                var change= false;
                $(".valcgdlro9").each(function(){
                    if (!isNaN(parseFloat($(this).val()))) {
                        change= true;
                        total *= parseFloat($(this).val());
                    }});
                total = (change)? total:0;
                divalores = (total / 35.3147).toFixed(2);
                volumencwt = (divalores * quant).toFixed(2);
                $('.valuetotalcdcbm9').val(volumencwt);
                $('#valtotalcdcbm9').text(volumencwt + 'm³');
           }
       
       
       /*... CARGO DETAILS #10 ...*/
           $(".valcgdlro10, .valcgdlqtro10").keyup(function(){
               if($(".measuretyperorocd10 option:selected" ).val() == "M."){
                   metersvalcgdlro10_nf();
               } else if($(".measuretyperorocd10 option:selected" ).val() == "Cm."){
                   centimetersvalcgdlro10_nf();
               } else if($(".measuretyperorocd10 option:selected" ).val() == "Inch"){
                   inchvalcgdlro10_nf();
               } else if($(".measuretyperorocd10 option:selected" ).val() == "Feet"){
                   feetvalcgdlro10_nf();
               }
           });
       
           $(".measuretyperorocd10").on('change', function(){
               if(this.value == "M."){
                   metersvalcgdlro10_nf();
               } else if(this.value == "Cm."){
                   centimetersvalcgdlro10_nf();
               } else if(this.value == "Inch"){
                   inchvalcgdlro10_nf();
               } else if(this.value == "Feet"){
                   feetvalcgdlro10_nf();
               }
           });
       
           
           function metersvalcgdlro10_nf(){
                var quant = 1;
                var total = 1;
                var change= false;
                $(".valcgdlro10").each(function(){
                    if (!isNaN(parseFloat($(this).val()))) {
                        change= true;
                        total *= parseFloat($(this).val());
                    }});
                total = (change)? total:0;
                volumencwt = (total * quant).toFixed(2);
                $('.valuetotalcdcbm10').val(volumencwt);
                $('#valtotalcdcbm10').text(volumencwt + 'm³');
               
           }
       
           function centimetersvalcgdlro10_nf(){
                var quant = 1;
                var total = 1;
                var change= false;
                $(".valcgdlro10").each(function(){
                    if (!isNaN(parseFloat($(this).val()))) {
                        change= true;
                        total *= parseFloat($(this).val());
                    }});
                total = (change)? total:0;
                divalores = (total / 1000000).toFixed(2);
                volumencwt = (divalores * quant).toFixed(2);
                $('.valuetotalcdcbm10').val(volumencwt);
                $('#valtotalcdcbm10').text(volumencwt + 'm³');
           }
           
           function inchvalcgdlro10_nf(){
                var quant = 1;
                var total = 1;
                var change= false;
                $(".valcgdlro10").each(function(){
                   if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                   }});
               total = (change)? total:0;
               divalores = (total / 61023.7).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.valuetotalcdcbm10').val(volumencwt);
               $('#valtotalcdcbm10').text(volumencwt + 'm³');
           }
           
           function feetvalcgdlro10_nf(){ 
                var quant = 1;
                var total = 1;
                var change= false;
                $(".valcgdlro10").each(function(){
                    if (!isNaN(parseFloat($(this).val()))) {
                       change= true;
                       total *= parseFloat($(this).val());
                    }});
               total = (change)? total:0;
               divalores = (total / 35.3147).toFixed(2);
               volumencwt = (divalores * quant).toFixed(2);
               $('.valuetotalcdcbm10').val(volumencwt);
               $('#valtotalcdcbm10').text(volumencwt + 'm³');
           }
       
     /*... ...END CALCULAR CARGO DETAIL RORO :::::::::::::::::::::::::::::::::: ...*/
    
    
    
       /*... START SUCCESS SEND FORM POPUP EN...*/
       $('.quform-form-13, .quform-form-10, .quform-12, .quform-form-17, .quform-form-24, .quform-form-41, .quform-form-44, .quform-form-43').on('quform:successStart', function (e, form, confirmation) {    
        var $message = $('<p style="text-align: center"><img class="aligncenter" style="margin: 0 auto;max-width: 100%;" src="https://www.latinamericancargo.com/wp-content/uploads/2020/06/Thanks-for-contacting-us.png" alt="Ace" width="500"></p>');  
        $.fancybox.open({
            src  : $message,
            type : 'inline',
            opts : {
              afterShow : function( instance, current ) {
                console.info( 'done!' );
              }
            }
          });
        });
        /*... END SUCCESS SEND FORM POPUP EN...*/

        /*... START SUCCESS SEND FORM POPUP ESP...*/
        $('.quform-form-47, .quform-form-48').on('quform:successStart', function (e, form, confirmation) {
            var $message = $('<p style="text-align: center"><img class="aligncenter" style="margin: 0 auto;max-width: 100%;" src="https://www.latinamericancargo.com/wp-content/uploads/2022/02/gracias-por-contactarnos.jpg" alt="Ace" width="500"></p>');  
            $.fancybox.open({
                src  : $message,
                type : 'inline',
                opts : {
                afterShow : function( instance, current ) {
                    console.info( 'done!' );
                }
                }
            });
            });
            /*... END SUCCESS SEND FORM POPUP ESP...*/
       
       
           /*... REEMPLAZAR COMA POR PUNTO..*/
           $('.valcgdl1,.valcgdl2,.valcgdl3,.valcgdl4,.valcgdl5,.valcgdl6,.valcgdl7,.valcgdl8,.valcgdl9,.valcgdl10,.valcgdl11,.valcgdl12,.valcgdl13,.valcgdl14,.valcgdl15,.valcgdl16,.valcgdl17,.valcgdl18,.valcgdl19,.valcgdl20').keyup(function() {
               $(this).val($(this).val().replace(',', '.'));
           });
           
           /*... OTRAS FUNCIONE ...*/
           
           $('#quform_13_1538_abcde1').on('change', function(){
              if(this.value == "NO"){
                $(".quform-label-13_847").html('<label class="quform-label-text" for="quform_13_847_abcde1">Weight / Piece<span class="quform-required">*</span></label>');
              } else if(this.value == "YES"){
               $(".quform-label-13_847").html('<label class="quform-label-text" for="quform_13_847_abcde1">Total Weight<span class="quform-required">*</span></label>');
             } else {
           
             }
           
           });
       
           
           /*... RESETEAR FORM ...*/
           var count_click = 0;
           
           $('input[name="quform_13_1104"]').on('change', function() {
       
               $('input[name="quform_13_2714"]').val('0');
               $('input[name="quform_13_2716"]').val('0');
               $('input[name="quform_13_2718"]').val('0');
               $('input[name="quform_13_2720"]').val('0');
               $('input[name="quform_13_2722"]').val('0');
               $('input[name="quform_13_2724"]').val('0');
               $('input[name="quform_13_2726"]').val('0');
               $('input[name="quform_13_2729"]').val('0');
               $('input[name="quform_13_2730"]').val('0');
               $('input[name="quform_13_2733"]').val('0');
               $('input[name="quform_13_2735"]').val('0');
               $('input[name="quform_13_2737"]').val('0');
               $('input[name="quform_13_2739"]').val('0');
               $('input[name="quform_13_2741"]').val('0');
               $('input[name="quform_13_2743"]').val('0');
               $('input[name="quform_13_2745"]').val('0');
               $('input[name="quform_13_2747"]').val('0');
               $('input[name="quform_13_2749"]').val('0');
               $('input[name="quform_13_2751"]').val('0');
               $('input[name="quform_13_2753"]').val('0');
       
               $('input[name="quform_13_2713"]').val('0');
               $('input[name="quform_13_2715"]').val('0');
               $('input[name="quform_13_2717"]').val('0');
               $('input[name="quform_13_2719"]').val('0');
               $('input[name="quform_13_2721"]').val('0');
               $('input[name="quform_13_2723"]').val('0');
               $('input[name="quform_13_2725"]').val('0');
               $('input[name="quform_13_2728"]').val('0');
               $('input[name="quform_13_2731"]').val('0');
               $('input[name="quform_13_2732"]').val('0');
               $('input[name="quform_13_2734"]').val('0');
               $('input[name="quform_13_2736"]').val('0');
               $('input[name="quform_13_2738"]').val('0');
               $('input[name="quform_13_2740"]').val('0');
               $('input[name="quform_13_2742"]').val('0');
               $('input[name="quform_13_2744"]').val('0');
               $('input[name="quform_13_2746"]').val('0');
               $('input[name="quform_13_2748"]').val('0');
               $('input[name="quform_13_2750"]').val('0');
               $('input[name="quform_13_2752"]').val('0');
       
               $('#mivaltotalweight').text("");
               $('#mivaltotalcbm').text("");
       
       
             var radioValue = $('input[name="quform_13_1104"]:checked').val();
           
            count_click_add();
           
            if(count_click=="2"){
                 count_click = 0;
                 
               $(this).closest('.quform-form').data('quform').reset();
                   $("#quform-form-abcde1 select").prop("selectedIndex", 0);
                   return false;
           } 
           
           });
           
           function count_click_add() {
             count_click += 1;
            }
           
           
           $('.reset-form').click(function () {
                   $(this).closest('.quform-form').data('quform').reset();
                   $("#quform-form-abcde1 select").prop("selectedIndex", 0);
                   return false;
               });
           
       
       
           
    
    });