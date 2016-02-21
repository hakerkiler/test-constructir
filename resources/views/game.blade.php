@extends('master')
@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <style>
        body {
            min-width: 520px;
        }
        .column {
            width: 170px;
            float: left;
            padding-bottom: 100px;
        }
        .portlet {
            margin: 0 1em 1em 0;
            padding: 0.3em;
        }
        .portlet-header {
            padding: 0.2em 0.3em;
            margin-bottom: 0.5em;
            position: relative;
        }
        .portlet-toggle {
            position: absolute;
            top: 50%;
            right: 0;
            margin-top: -8px;
        }
        .portlet-content {
            padding: 0.4em;
        }
        .portlet-placeholder {
            border: 1px dotted black;
            margin: 0 1em 1em 0;
            height: 50px;
        }
    </style>
    <script>
        $(function() {

            var build_nr = 0;

            $( ".column" ).sortable({
                connectWith: ".column",
                handle: ".portlet-header",
                cancel: ".portlet-toggle",
                placeholder: "portlet-placeholder ui-corner-all",
                start: function( event, ui ) {
                    $('.builder').sortable( "option", "disabled", false );
                },
                stop: function(event, ui){
                    console.log(ui);

                    if(build_nr == 0 && $(ui.item[0]).attr('id') == 'casa_1'){
                        $('.sanatate').text(parseInt($('.sanatate').text()) - 20);
                        $('.bani').text(parseInt($('.bani').text()) - 1000);
                        $(ui.item[0]).parent().sortable( "option", "disabled", true );
                        build_nr++;
                    } else if(build_nr == 1 && $(ui.item[0]).attr('id') == 'casa_2'){
                        $('.sanatate').text(parseInt($('.sanatate').text()) - 40);
                        $('.bani').text(parseInt($('.bani').text()) - 2000);
                        $(ui.item[0]).parent().sortable( "option", "disabled", true );
                        build_nr++;
                    } else if(build_nr == 2 && $(ui.item[0]).attr('id') == 'casa_3'){
                        $('.sanatate').text(parseInt($('.sanatate').text()) - 60);
                        $('.bani').text(parseInt($('.bani').text()) - 4000);
                        $(ui.item[0]).parent().sortable( "option", "disabled", true );
                        build_nr++;
                    } else if(build_nr == 3 && $(ui.item[0]).attr('id') == 'casa_4'){
                        $('.sanatate').text(parseInt($('.sanatate').text()) - 80);
                        $('.bani').text(parseInt($('.bani').text()) - 8000);
                        $(ui.item[0]).parent().sortable( "option", "disabled", true );
                        build_nr++;
                    } else {
                        alert('Construit casele pe rind');
                        return false;
                    }
                    $('.column').sortable( "option", "disabled", false );


                }
            });

            $( ".portlet" )
                    .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
                    .find( ".portlet-header" )
                    .addClass( "ui-widget-header ui-corner-all" )
                    .prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");

            $( ".portlet-toggle" ).click(function() {
                var icon = $( this );
                icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
                icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
            });
        });
    </script>
    <div>
        <div class="sanatate">200</div><br>
        <div class="bani">20000</div><br>
    </div>
    <div class="column" style="border: 1px solid black">

        <div class="portlet" id="casa_1">
            <div class="portlet-header">Casa 1</div>
            <div class="portlet-content">
                <img width="135" src="/image/casa.png">
            </div>
        </div>

        <div class="portlet" id="casa_2">
            <div class="portlet-header">Casa 2</div>
            <div class="portlet-content">
                <img width="135" src="/image/casa.png">
            </div>
        </div>
        <div class="portlet" id="casa_3">
            <div class="portlet-header">Casa 3</div>
            <div class="portlet-content">
                <img width="135" src="/image/casa.png">
            </div>
        </div>

        <div class="portlet" id="casa_4">
            <div class="portlet-header">Casa 4</div>
            <div class="portlet-content">
                <img width="135" src="/image/casa.png">
            </div>
        </div>

    </div>

    <div class="column builder" style="border: 1px solid black">



    </div>
@endsection