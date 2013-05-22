<?php
$template = $scriptProperties['tpl'] ? $scriptProperties['tpl'] : $scriptProperties['thumbTpl'];
$crop = $scriptProperties['crop'] ? $scriptProperties['crop'] : 0;
$tvPrefix = $scriptProperties['tvPrefix'] ? $scriptProperties['tvPrefix'] : '';
$modx->setPlaceHolder('tvPrefix', $tvPrefix);
$processImage = $scriptProperties['processImage'] ? $scriptProperties['processImage'] : '';
$modx->setPlaceHolder('processImage', $processImage);
$total = empty($scriptProperties['limit']) ? 0 : $scriptProperties['limit'];
$scriptProperties['limit'] = $lineLimit;
$scriptProperties['includeTVs'] = $lineLimit;
$scriptProperties['tpl'] = '@INLINE "[[+id]]":"[[+'.$tvPrefix.$processImage.']]"';
$scriptProperties['thumbTpl'] = 'tpl.AlignImage';
$scriptProperties['outputSeparator'] = ',';
$scriptProperties['linkToImage'] = 1;
$shippet = $scriptProperties['snippet']; //modify by Ser1ous for modx 2.2.4 Revo
$all_img = array();// add for full url by Ser1ous for modx 2.2.4 Revo
$output = '';

$Lines = array();
$i = 0;
$isItems = true;
while ($isItems) {
  $scriptProperties['offset'] = $scriptProperties['start'] = $i;
  $subTotal = $scriptProperties['offset'] + $lineLimit;
  if ($total && $subTotal > $total) $scriptProperties['limit'] = $total - $scriptProperties['offset'];
  $result = $modx->runSnippet($snippet, $scriptProperties);
  if (!$result) break;
  if (substr($result,-1,1) == ',') $result = substr($result,0,-1);
  $Lines[] = '{' . $result . '}';
  $total = $total ? $total : $modx->getPlaceholder('total');
  $i = $i + $lineLimit;
  if ($i >= $total) $isItems = false;
}
foreach ($Lines as $line) {
    
    $line = $modx->fromJSON($line);  
    $all_img = $all_img+ $line; // build array full url to img
    $images = $w = $h = array();
    foreach ($line as $id => $img) {
        if (substr($img,0,1) == '/') $img = substr($img,1);
        if ($crop) {
            $path_info = pathinfo($img);
            $cropedFile_alt  = $path_info['dirname'].'/croped-'.$lineWidth.'/';
            $cropedFile_alt .= $path_info['basename'];
            if (!file_exists($cropedFile_alt)) //check croped file exist
            {
          $im = new Imagick($img);
          $im->trimImage(0);
          $path_info = pathinfo($img);
          $cropedFile  = $path_info['dirname'].'/croped-'.$lineWidth.'/';
          if (!file_exists($cropedFile)) mkdir($cropedFile);
          $cropedFile .= $path_info['basename'];
               $im->writeImage($cropedFile);
          $img = $cropedFile;
            }
            else
            {
            $img = $cropedFile_alt;
            }
        }
        
        $size = getimagesize($img);
        $w[] = $size[0];
        $h[] = $size[1];
        $images[$id] = $img;
         
    }
    foreach ($w as $k => $w_old) {
        $w[$k] = floor($w_old * min($h) / $h[$k]);
    }
    $lineHeight = floor(min($h) * $lineWidth / array_sum($w));
   
    foreach ($images as $id => $image) {
          $ph = $tvPrefix.$processImage;
         $path_info = pathinfo($image);
         $image_path  = $path_info['dirname'].'/h-'.$lineHeight.'/';
          $image_alt = $image_path.$path_info['basename'];
        if (!file_exists($image_alt)) //Check file exist
        {
        $ph = $tvPrefix.$processImage;
        $im = new Imagick($image);
        $im->resizeImage(0,$lineHeight,0,1);
        $image  = $image_path;
        if (!file_exists($image)) mkdir($image);
        $image .= $path_info['basename'];
        $im->writeImage($image);
        }
        else
        {
           $image .= $image_path.$path_info['basename'];
        }
        $prop = array($ph => $image, 'id' => $id, 'album' => $scriptProperties['album'], 'origin' => $all_img[$id]); //small modify add full_url
        $output .= $modx->getChunk($template, $prop)."\n";
        
    }
}

return $output;