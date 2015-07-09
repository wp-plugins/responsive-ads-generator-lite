<div class="wrap">  
    <h2><?php _e('Responsive Ads Generator Lite', 'rag-service'); ?></h2>
<br>
<hr>
<br>
<h3><?php _e('Heading','rag-service');?></h3>
  <form name="cform" method="post" action="" id="rag_options_form">
		<?php settings_fields('rag_full_options'); ?>
      <!-- Headings -->
      
    <fieldset id="buildyourform">
      <?php
global $wpdb;
$head = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}rag_headers ORDER BY id ASC LIMIT 1 ");
foreach ($head as $head ){
    $id = $head->id;
    $title = $head->title;
        
echo  "<div class='fieldwrapper' name='rag-header$id'>";
    echo "<input type='text' class='fieldname' name='header$id'  value='$title' size='50'>";
    
    echo "</div>";
}
?>
      
      
</fieldset>
<br>
<h3><?php _e('Ads', 'rag-service');?></h3>
<!-- Affiliates -->
        
    <fieldset id="ragaffiliateform">
      <?php
global $wpdb;
$advertise = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}rag_records ORDER BY id ASC LIMIT 4 ");
foreach ($advertise as $advertise ){
    $id = $advertise->id;
    $atitle = $advertise->title;
    $source = $advertise->link_source;
    $coder = $advertise->type_code;
    $ahref = $advertise->ahref;
    echo  "<div class='fieldwrapper' name='rag_aff$id'>";
    echo "Select Ad:";
    echo   "<input type='checkbox' name='aff[]' value='$id'>";
    echo "<br>";
    echo "Ad Title:";
    echo "<input type='text' class='fieldname' name='atitle$id'  value='$atitle' size='30'>";
    echo "<br>";
    echo  "Ad Link:";
    echo "<input type='text' class='fieldname' name='link$id'  value='$ahref' size='30'>";
    echo "<br>";
    echo  "Paste Image URL or Javascript Code:";
    echo "<br>";
    echo "<textarea name='rag_aff$id' rows='4' cols='50'>" . $source . "</textarea>";
    echo "<br>";
    echo  "Input Type:(image,script,linked)";
    echo "<input type='text' class='fieldname' name='type_code$id'  value='$coder'>";
    echo "</div>";
echo "<br>";
echo "<br>";

}
?>
  
</fieldset>

	<!-- End of Ad Generator -->
      
		<p class="submit">
			<input type="submit" name="rag-submit" id="rag-submit" class="button-primary" value="<?php _e('Generate', 'rag-services') ?>" />
		</p>
    </form>

<div class="welcome-panel">
# Please copy and paste the below code into your page/post. 
    </div>
<textarea name="rag-code" rows="12" cols="100" />
    <div id="rag-block">
<?php
global $wpdb;
$hbox = $wpdb->get_var("SELECT title FROM {$wpdb->prefix}rag_headers LIMIT 1");
echo "[rag_head]" . $hbox . "[/rag_head]";


?>
[rag]
<?php
global $wpdb;
$advertise = $wpdb->get_var("SELECT spacing
FROM {$wpdb->prefix}rag_settings");

$tags = explode(',', $advertise);

foreach( $tags as $tag ){
    
  $ads = $wpdb->get_results(
  "
	SELECT * FROM {$wpdb->prefix}rag_records WHERE id='$tag'"
  );
  foreach ( $ads as $ads )
 {
  $pic = $ads->ad;
  $type = $ads->type_code;
  $link = $ads->link_source;
  $a = $ads->ahref;

 if($type == 'image'){   
  echo "[rag_img width='125' height='125']" . $link . "[/rag_img]";
     
 }elseif($type == 'script'){
     echo "[rag_js]" . $link . "[/rag_js]";
 }elseif($type == 'linked'){
     echo "[rag_a]" . $a . "[/rag_a]";
     echo "[rag_href]" . $link . "[/rag_href]";
 }

}  
       
    
}
    
?>
[/rag]
    </div>
</textarea>
<div id="rag-block">
    <h2><?php echo $hbox;?></h2>
<?php
echo "<ul>";
global $wpdb;

$advertise = $wpdb->get_var("SELECT spacing
FROM {$wpdb->prefix}rag_settings");

$tags = explode(',', $advertise);

foreach( $tags as $tag ){
    $ads = $wpdb->get_results(
  "
	SELECT * FROM {$wpdb->prefix}rag_records WHERE id='$tag'"
  );
  foreach ( $ads as $ads )
 {
  $pic = $ads->ad;
  $type = $ads->type_code;
  $link = $ads->link_source;
  $a = $ads->ahref;

 if($type == 'image'){   
  echo "<li>";  
  echo "<img src='$link'  width='125' height='125'>";
  echo "</li>";
     
 }
  
 if($type == 'linked'){   
  echo "<li>" . $a ;  
  echo "<img src='$link'  width='125' height='125'>";
  echo "</a></li>";
     
 }


 if($type == 'script'){
  echo "<li>";
   echo $link;
  echo "</li>";  
 }
      
      
}
    
}
echo "</ul>";
?>
</div>
	<!-- dashboard ends -->
	<br>
<br>
<br>
<br>
	<!-- Support -->
	<div id="rag_support">
		<h3><?php _e('Support & bug report', 'rag-services'); ?></h3>
		<p><?php printf(__('If you have any idea to improve this plugin or any bug to report, please email me at : <a href="%1$s">%2$s</a>', 'rag-services'), 'mailto:rag@cbfreeman.com?subject=[Responsive Ads Generator Plugin]', 'rag@cbfreeman.com'); ?></p>
	
	<?php $donation_link = 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=BAZNKCE6Q78PJ'; ?>
		<p><?php printf(__('You like this plugin ? You use it in a business context ? Please, consider a <a href="%s" target="_blank" rel="external">donation</a>.', 'rag-services'), $donation_link ); ?></p>
        
        <?php $upgrade_link = 'http://cbfreeman.com/downloads/responsive-ads-generator/'; ?>
		<p><?php printf(__('You like this lite version but need more ? Upgrade to the full version by clicking <a href="%s" target="_blank" rel="external">here</a>.', 'rag-services'), $upgrade_link ); ?></p>
	</div>
	
</div>