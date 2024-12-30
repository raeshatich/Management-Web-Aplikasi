<?php

  require_once("../../../modules/config.php");
  //require_once("func_connection.php");
  //require_once("../../modules/func_modular.php");
  //require_once("func_encryptdecrypt.php");
function get71d9eb844bbc71f7a3973f37fba7dbdd($path, $backUpLevel = 0){
  global $gAppPath;

  $strHTML          = "";
  $items            = scandir($path);
  $nd               = isset($_REQUEST["nd"])? $_REQUEST["nd"]:"";
  $ld               = isset($_REQUEST["ld"])? $_REQUEST["ld"]:"";
  
  if($backUpLevel == 1){
    if($nd != ""){
      $strHTML        .= "<div><img src='../../../styles/images/folderopen.gif'><a href='DirList.php?nd=".$ld."'>../</a></div>";       
    }
  }
  
  foreach($items as $item){
    // Ignore the . and .. folders
    if($item != "." AND $item != ".."){

      if(is_file($path.$item)) {
        $link      = "FileDown.php?path=".$path."&filename=".$item;
        $strHTML    .= "<div><img src='../../../styles/images/page.gif'><a href='".$link."'>".$item."</a></div>";
        //$strHTML    .= "<div><img src='styles/images/page.gif'><a href='".$path.$item."'>".$item."</a></div>";
      }else{
        //echo "<li>folder = ".$path.$item;
        // this is the directory
        // do the list it again!
        $directory  = $path;//str_replace($_SERVER['DOCUMENT_ROOT']."/".$gAppPath."/","",$path);
        $strHTML    .= "<div><img src='../../../styles/images/folder.gif'><a href='DirList.php?nd=".$directory.$item."&ld=".$nd."'>".strtolower($item)."</a></div>";
        $strHTML    .= "<div style='padding-left: 20px'>";
        $strHTML    .= "</div>";
      }
    }
  }
  //echo "<pre>".htmlentities($strHTML)."</pre>";
  return $strHTML;
}

GLOBAL $gAppPath;
$nd               = isset($_REQUEST["nd"])? $_REQUEST["nd"]:"";
$dir              = ($nd == "")?$_SERVER['DOCUMENT_ROOT']."/".$gAppPath."/":$nd."/";
$backUpLevel      = 1;
$strHTML          = get71d9eb844bbc71f7a3973f37fba7dbdd($dir, $backUpLevel);
print $strHTML;

  
?>