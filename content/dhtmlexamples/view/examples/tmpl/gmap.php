<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
  function initializegmap() {
//http://maps.google.com/maps?q=Tampere,+Finland&hl=en&ll=61.500874,23.761024&spn=0.020313,0.104628&sll=37.0625,-95.677068&sspn=34.534108,107.138672&hnear=Tampere,+Finland&t=m&z=14
	    var myLatlng = new google.maps.LatLng(61.500874,23.761024);
    var myOptions = {
      zoom: 4,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    
    var marker = new google.maps.Marker({
        position: myLatlng, 
        map: map,
        title:"Tampere!"
    });   
  }
  jQuery(function() { initializegmap() });
</script>
<style type="text/css">
html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}
</style>
<div id="map_canvas" style="height:400px;width:550px"></div>