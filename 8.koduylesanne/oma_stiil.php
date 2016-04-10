<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>8. kodutöö</title>
 
</head>

<body>

 
<?php 
$txt_color="#fff"; // vaikimisi valge
$bg_color="#fff"; // vaikimisi valge
$border_style="none"; // vaikimisi ei ole
$border_weight="0"; // vaikimisi 0
$border_col="#fff"; // vaikimisi valge
$border_radius="0"; // vaikimisi 0
if (isset($_POST['txt_col']) && $_POST['txt_col']!="") {
    $txt_color=htmlspecialchars($_POST['txt_col']);}
if (isset($_POST['bgr_col']) && $_POST['bgr_col']!="") {
    $bg_color=htmlspecialchars($_POST['bgr_col']);}
if (isset($_POST['border']) && $_POST['border']!="") {
    $border_style=htmlspecialchars($_POST['border']);}
if (isset($_POST['weight']) && $_POST['weight']!="") {
    $border_weight=htmlspecialchars($_POST['weight']);}
if (isset($_POST['radius']) && $_POST['radius']!="") {
    $border_radius=htmlspecialchars($_POST['radius']);}
if (isset($_POST['b_color']) && $_POST['b_color']!="") {
    $border_col=htmlspecialchars($_POST['b_color']);
} 
?>
<style scoped>
 .result {
    color: <?php echo $txt_color; ?>;
    background-color: <?php echo $bg_color; ?>;
    border-style: <?php echo $border_style; ?>;
    border-color: <?php echo $border_col; ?>;
    border-width: <?php echo $border_weight; ?>px;
    border-radius: <?php echo $border_radius; ?>px;
    width: 500px;
    min-height: 100px;
    text-align: center;
    margin-left: 20px;
    margin-top: 20px;
    padding-left: 20px;
    padding-bottom: 20px;
    padding-right: 20px;
    padding-top: 20px;
    font-size: 30px;
    font-family: "Times New Roman", Georgia, Serif;
    
    
    
} 
</style>
<p class="result">
<?php
if (isset($_POST['user']) && $_POST['user']!="") {
	echo $_POST['user'];}
?>
</p>

<form method="post" action="oma_stiil.php">

<table>
		<tr>
       <td>Your text: <br /><br /></td>
       <td><textarea name="user" cols="50" rows="5" ><?php if (isset($_POST['user'])) echo htmlspecialchars( $_POST['user']);?></textarea><br /><br /></td>
     </tr> 
 </table>
<table>
       <tr>
       <td>Tekstivärvus<br /><br /></td>
       <td> <input type="color" name="txt_col" value="<?php if (isset($_POST['txt_col'])) echo htmlspecialchars( $_POST['txt_col']); ?>"><br /><br /></td>
    	 </tr> 
    	 <tr>
    	  <td>Taustavärvus<br /><br /></td>
       <td> <input type="color" name="bgr_col" value= "<?php if (isset($_POST['bgr_col'])) echo htmlspecialchars( $_POST['bgr_col']); ?>"><br /><br /></td>
    	 </tr> 
 </table>
 <table class="borderP">
     <tr>
      <td>Piirjoone tüüp:<br /><br /></td>
      <td>
       <select name="border">
       <option value="<?php if (isset($_POST['border'])) {echo $_POST['border'];} else echo "select" ?>"><?php if (isset($_POST['border'])) {echo htmlspecialchars ($_POST['border']);} else echo "select" ?></option>
        <option value="dotted">dotted</option>
        <option value="dashed">dashed</option>
        <option value="solid">solid</option>
        <option value="double">double</option>
        <option value="groove">groove</option>
        <option value="ridge">ridge</option>
        <option value="inset">inset</option>
        <option value="outset">outset</option>
       </select><br /><br />
      </td>
     </tr>
  		<tr>
       <td>Piirjoone laius (0-20px) <br /><br /></td>
       <td> <input type="number" name="weight" value="<?php if (isset($_POST['weight'])) echo htmlspecialchars ($_POST['weight']); ?>" min="0" max="20" step="1"><br /><br /></td>
    	 </tr> 
     <tr>
       <td>Piirjoone nurga raadius (0-100px) <br /><br /></td>
       <td> <input type="number" name="radius" value="<?php if (isset($_POST['radius'])) echo htmlspecialchars($_POST['radius']); ?>" min="0" max="100" step="1"><br /><br /></td>
    	 </tr> 
    <tr>
       <td>Piirjoone värvus<br /><br /></td>
       <td> <input type="color" name="b_color" value="<?php if (isset($_POST['b_color'])) echo htmlspecialchars ( $_POST['b_color']); ?>"><br /><br /></td>
    	 </tr> 
    	 <tr>  
     <td colspan=2>
     <button type="submit">Esita</button> </td>
     </tr>
 </table> 
</form>
<br><br>
<p>
 		<a href="http://validator.w3.org/check?uri=referer">
  		<img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
		</a>
	</p>
</body>
</html>