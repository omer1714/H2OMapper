<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
      <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Waterlog.css">
    <link href="/apis/fusiontables/docs/samples/style/default.css"
          rel="stylesheet" type="text/css">
      <script type="text/javascript"
          src="http://maps.google.com/maps/api/js?sensor=false"></script>

      <script type="text/javascript">
          function initialize() {
            var map = new google.maps.Map(document.getElementById('googleMap'), {
                center: new google.maps.LatLng(49.887945, -119.495721),
                zoom: 15,
              mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infoWindow = new google.maps.InfoWindow();

            // Initialize the first layer
            var firstLayer = new google.maps.FusionTablesLayer({
                query: {
                  select: 'Service Address Kelowna',
                    from: '1LLHFX9Zn4nd5lJ4fRo-6s8u_M1rROjkVILieAC9T'
                },
                map: map,
                suppressInfoWindows: true
            });
            google.maps.event.addListener(firstLayer, 'click', function(e) {
                windowControl(e, infoWindow, map);
            });

            // Initialize the second layer
            var secondLayer = new google.maps.FusionTablesLayer({
                query: {
                  select: ,
                  from: '1AAaHbH3IK0maqpawjnVrZ5R0RAswWDBEKvMp2zDk'
                },
                map: map,
                suppressInfoWindows: true
            });
            google.maps.event.addListener(secondLayer, 'click', function(e) {
                windowControl(e, infoWindow, map);
            });
          }

          // Open the info window at the clicked location
          function windowControl(e, infoWindow, map) {
            infoWindow.setOptions({
                content: e.infoWindowHtml,
                position: e.latLng,
                pixelOffset: e.pixelOffset
            });
            infoWindow.open(map);
          }

          google.maps.event.addDomListener(window, 'load', initialize);
    </script>

  </head>

  <body>
    <h1 id="welcome">Welcome to WaterLogging</h1>

    <div id="searchArea">
      <form method="POST" id="form" action="/H2OMapper/table.php">
      <fieldset>
        <input type="text" name="search" placeholder="Search..." id="searchtab"></input><br><br>
                <h3>
          <!--KID: <input type="text" name="kid" required size="6"><br>  kid has only 6 numbers so make a limit of 6 digits with constraints -->
        </h3>
        <h3>
          Billable ID: <input type="text" name="bid"><br><!-- Same for kid -->
        </h3>
        <h3>
          Address: <input type="text" name="addr"><br> <!-- 32 Characters no constraints-->
        </h3>
        <h3>
          Rate Code: <!--<input type="text" name="kid"><br> --> 
          <!-- Dropdown with all the consumption codes-->
          <select name="rateCode">
            <option value="500">550 - WTR FLAT RESIDENTIAL</option>
            <option value="501">501 - WATER FLATRATE-SFD NO METER</option>
            <option value="544">544 - 5/8" METER - MIXED USE - COMM & RES</option>
            <option value="545">545 - 3/4" METER - MIXED USE -  COMM & RES</option>
            <option value="546">546 - 1" METER - MIXED USE - COMM & RES</option>
            <option value="547">547 - 1 1/2" METER - MIX USE - COMM & RES</option>
            <option value="548">548 - 2" METER - MIX USE - COMM & RES</option>
            <option value="549">549 - 3" METER - MIX USE - COMM & RES</option>
            <option value="550">550 - 4" METER - MIX USE - COMM & RES</option>
            <option value="551">551 - 6" METER - MIX USE - COMM & RES</option>

            <option value="552">552 - 8" METER - MIX USE - COMM & RES</option>
            <option value="553">553 - MIXED USE - COMPOUND METER LOW SIDE</option>
            <option value="555">555 - RES WATER USE CU MTR</option>
            <option value="556">556 - RES WATER USE CU MTR</option>
            <option value="557">557 - RES WATER USE CU MTR</option>
            <option value="560">560 - RES WATER USE CU MTR</option>
            <option value="565">565 - WTR QUAL ENHANCEMENT</option>
            <option value="570">570 - WATER FLAT RESIDENTIAL</option>
            <option value="571">571 - RES WATER NO METER</option>
            <option value="572">572 - RES WATER NO METER</option>

            <option value="573">573 - RESIDENTIAL WATER NO METER 1 1/2"</option>
            <option value="574">574 - RESIDENTIAL WATER NO METER 2"</option>
            <option value="580">580 - WATER 5/8" MULTI-FAM</option>
            <option value="581">581 - WATER 1" MULTI-FAM.</option>
            <option value="582">582 - WTR 1 1/2" MULTI-FAM</option>
            <option value="583">583 - WTR 2" MULTI-FAMILY</option>
            <option value="584">584 - WTR 3" MULTI-FAMILY</option>
            <option value="585">585 - WTR 4" MULTI-FAMILY</option>
            <option value="586">586 - WTR 6" MULTI-FAMILY</option>
            <option value="587">587 - WTR 8" MULTI-FAMILY</option>

            <option value="588">588 - WATER MTR MULTI-FAM</option>
            <option value="589">589 - FIRE LINE MULTI-FAM</option>
            <option value="590">590 - 5/8"X3/4" WATER METER SINGLE FAM STRATA</option>
            <option value="591">591 - 1" WATER METER SINGLE FAM STRATA</option>
            <option value="592">592 - 1 1/2" WATER METER SINGLE FAM STRATA</option>
            <option value="593">593 - 2" WATER METER SINGLE FAM STRATA</option>
            <option value="594">594 - 3" WATER METER SINGLE FAM STRATA</option>
            <option value="595">595 - 4" WATER METER SINGLE FAM STRATA</option>
            <option value="596">596 - 6" WATER METER SINGLE FAM STRATA</option>
            <option value="597">597 - 8" WATER METER SINGLE FAM STRATA</option>

            <option value="598">598 - STRATA LOW SIDE COMPOUND WATER METER</option>
            <option value="599">599 - FIRE LINE STRATA FAMILY</option>
            <option value="600">600 - WATER 5/8" METER</option>
            <option value="601">601 - WATER 1" METER</option>
            <option value="602">602 - WATER 1 1/2" METER</option>
            <option value="603">603 - WATER 2" METER</option>
            <option value="604">604 - WATER 3" METER</option>
            <option value="605">605 - WATER 4" METER</option>
            <option value="606">606 - WATER 6" METER</option>
            <option value="607">607 - WATER 8" METER</option>

            <option value="608">608 - WATER COMPOUND METER</option>
            <option value="609">609 - WATER 3/4" METER</option>
            <option value="619">619 - WATER METER</option>
            <option value="625">625 - RWW 100 IMP.GAL/M3</option>
            <option value="626">626 - RWW 1000 IMP.GAL/M3</option>
            <option value="650">650 - FLATRATE WATER IRRIG</option>
            <option value="651">651 - FLAT WATER 5/8" SFD- WATER ON FOR CONSTRUCTION</option>
            <option value="652">652 - FLAT WATER 1"</option>
            <option value="653">653 - FLAT WATER 1.5"</option>
            <option value="654">654 - FLAT WATER CONSTR.</option>

            <option value="655">655 - FLAT WATER 2"</option>
            <option value="656">656 - FLAT WATER CONST 1"</option>
            <option value="657">657 - FLAT WATER 3"</option>
            <option value="658">658 - FLAT WATER 4"</option>
            <option value="659">659 - FLAT WATER 6"</option>
            <option value="660">660 - 5/8" METER BEAVER LAKE</option>
            <option value="661">661 - 3/4" METER BEAVER LAKE</option>
            <option value="662">662 - 1" METER BEAVER LAKE</option>
            <option value="663">663 - 1 1/2" METER BEAVER LAKE</option>
            <option value="664">664 - 2" METER BEAVER LAKE</option>

            <option value="665">665 - 3" METER BEAVER LAKE</option>
            <option value="666">666 - 4" METER BEAVER LAKE</option>
            <option value="667">667 - 6" METER BEAVER LAKE</option>
            <option value="668">668 - 8" METER BEAVER LAKE</option>
            <option value="669">669 - BEAVER LAKE COMPOUND METER LOW SIDE</option>
            <option value="670">670 - FIRE LINE - ONE</option>
            <option value="671">671 - 5/8" METER NON-ALR FARM USE</option>
            <option value="672">672 - 3/4" METER NON-ALR FARM USE</option>
            <option value="673">673 - 1" METER  NON-ALR FARM USE</option>
            <option value="674">674 - 1 1/2" METER NON-ALR FARM USE</option>

            <option value="675">675 - 2" METER NON-ALR FARM USE</option>
            <option value="676">676 - 3" METER NON-ALR FARM USE</option>
            <option value="680">680 - 5/8" WATER METER</option>
            <option value="681">681 - 1" WATER METER</option>
            <option value="682">682 - 1 1/2" WATER METER</option>
            <option value="683">683 - 2" WATER METER</option>
            <option value="684">684 - 3" WATER METER</option>
            <option value="685">685 - 4" WATER METER</option>
            <option value="686">686 - 6" WATER METER</option>
            <option value="687">687 - 8" WATER METER</option>

            <option value="688">688 - LOW SIDE COMPOUND WATER</option>
            <option value="691">691 - 5/8"  PARK METER</option>
            <option value="692">692 - 3/4" PARK METER</option>
            <option value="693">693 - 1" PARK METER</option>
            <option value="694">694 - 1 1/2" PARK METER</option>
            <option value="695">695 - 2" PARK METER</option>
            <option value="696">696 - 3" PARK METER</option>
            <option value="697">697 - 4" PARK METER</option>
            <option value="698">698 - 6" PARK METER</option>
            <option value="699">699 - 8" PARK METER</option>
          </select>
        </h3>
        <h3>
          Billable Dates:><!-- Done it-->
                  <input type="date" name="fromDate"></input>
                  <input type="date" name="toDate"></input>

        </h3>
        <h3>
          Consumptions: <input type="text" name="consump"><br><!-- 5 digits no constraints-->
        </h3>
        <div id="outputOption">
                <h3><label for="outputType" >Output</label></h3>
                <input type="checkbox" name="outputType1" value="Sum" class="outputType">Sum</input>
                <input type="checkbox" name="outputType2" value="Average" class="outputType">Average</input>
            </div>
        <input type="submit" value="Submit">
        </fieldset>
      </form>
    </div>
    <div id="googleMap"></div>

    <script type="text/javascript">
      
    </script>

    <!--
    <?php
      //include 'connection.php';
    ?>
-->
    
  </body>
</html>
