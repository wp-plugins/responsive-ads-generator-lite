<div class="wrap">  
    <h2><?php _e('Responsive Ads Generator Plugin Instructions', 'rag-service'); ?></h2>
   <p>These instruction are intended to be used to properly configure ads for generation.
    The below settings will cover all typical types of ads. There are (2) primary settings as described below.</p> 
    
    
     <h4><?php _e('Images Only', 'rag-service'); ?></h4>
    <p>
    Simple paste the IMAGE URL inside the large textarea window. Then set the Input Type to 'image'.
    <BR><br>
        <?php
echo '<img src="' . plugins_url( 'images/ad1.jpg', __FILE__ ) . '" > ';
?>
        </p> 
        <br>
        <hr>
      <br>
        <h4><?php _e('LINKED BANNERS & JAVASCRIPTS', 'rag-service'); ?></h4>
    <p>
        Simple paste the CODE BLOCK inside the large textarea window. Then set the Input Type to 'script'.
    <BR><br>
        <?php
echo '<img src="' . plugins_url( 'images/ad2.jpg', __FILE__ ) . '" > ';
?>
        </p> 
    <br>
    
    
    IMPORTANT: REMEMBER TO SET THE 'INPUT TYPE' OR AD WILL NOT GENERATE.
        <br>
        <br>
        <br>
        <br>
    
</div>